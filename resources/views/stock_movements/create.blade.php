@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Operação de Estoque</h1>
    <form method="POST" action="{{ route('stock_movements.store') }}">
        @csrf

        <div class="form-group">
            <label for="product_id">Produto</label>
            <select id="product_id" class="form-control @error('product_id') is-invalid @enderror" name="product_id" required>
                <option value="">Selecione o Produto</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="operation">Operação</label>
            <select id="operation" class="form-control @error('operation') is-invalid @enderror" name="operation" required>
                <option value="">Selecione a Operação</option>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
                <option value="balanco">Balanço</option>
            </select>
            @error('operation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Estoque</button>
    </form>
</div>
@endsection
