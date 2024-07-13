@extends('layouts.app')

@section('content')
<div class="container welcome-page">
    <h1>{{ config('app.name', 'Trabalho 2') }}</h1>
    <p class="lead">Este é o sistema de gestão de produtos. Você pode adicionar novos produtos, listar todos os produtos ou gerenciar o estoque.</p>
    <div class="text-center">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Listar Produtos</a>
       <!--  <a href="{{ route('products.create') }}" class="btn btn-secondary btn-lg">Adicionar Novo Produto</a> -->
        <a href="{{ route('brands.index') }}" class="btn btn-primary btn-lg">Listar Marcas</a>
    <!--     <a href="{{ route('brands.create') }}" class="btn btn-secondary btn-lg">Adicionar Nova Marca</a> -->
        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg">Listar Categorias</a>
    <!--     <a href="{{ route('categories.create') }}" class="btn btn-secondary btn-lg">Adicionar Nova Categoria</a> -->
        <a href="{{ route('stock_movements.index') }}" class="btn btn-primary btn-lg">Movimentos de Estoque</a>
   <!--      <a href="{{ route('stock_movements.create') }}" class="btn btn-secondary btn-lg">Registrar Novo Movimento de Estoque</a> -->
    </div>
</div>
@endsection
