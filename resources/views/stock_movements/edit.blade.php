@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Atualizar Estoque do Produto: {{ $product->name }}</h1>
    <form action="{{ route('stock_movements.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">
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
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
