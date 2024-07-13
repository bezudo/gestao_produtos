<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('stock_movements.index', compact('products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock_movements.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'operation' => 'required|in:entrada,saida,balanco',
        ]);

        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');
        $operation = $request->input('operation');

        switch ($operation) {
            case 'entrada':
                $product->quantity += $quantity;
                break;
            case 'saida':
                $product->quantity -= $quantity;
                break;
            case 'balanco':
                $product->quantity = $quantity;
                break;
        }

        $product->save();

        return redirect()->route('stock_movements.index')->with('success', 'Estoque atualizado com sucesso.');
    }

    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        return view('stock_movements.edit', compact('product'));
    }

    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'operation' => 'required|in:entrada,saida,balanco',
        ]);

        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity');
        $operation = $request->input('operation');

        switch ($operation) {
            case 'entrada':
                $product->quantity += $quantity;
                break;
            case 'saida':
                $product->quantity -= $quantity;
                break;
            case 'balanco':
                $product->quantity = $quantity;
                break;
        }

        $product->save();

        return redirect()->route('stock_movements.index')->with('success', 'Estoque atualizado com sucesso!');
    }
}

