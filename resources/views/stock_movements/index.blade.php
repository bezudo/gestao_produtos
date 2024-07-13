@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gerenciar Estoque</h1>
    <a href="{{ route('stock_movements.create') }}" class="btn btn-primary mb-3">Adicionar Operação de Estoque</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Imagem do produto" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('stock_movements.edit', $product->id) }}" class="btn btn-primary">Atualizar Estoque</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
