<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images/products', 'public') : null;

        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'image' => $imagePath,
            'brand_id' => $request->input('brand_id'),
            'category_id' => $request->input('category_id'),
        ]);

        // Adiciona ao estoque
        $product->addStock($request->input('quantity'));

        return redirect()->route('products.index')->with('success', 'Produto adicionado com sucesso.');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images/products', 'public') : $product->image;

        // Atualiza o estoque
        $product->adjustStock($request->input('quantity'));

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'image' => $imagePath,
            'brand_id' => $request->input('brand_id'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Product $product)
    {
        $product->adjustStock(0);  // Remover todo o estoque ao excluir

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto removido com sucesso.');
    }
}
