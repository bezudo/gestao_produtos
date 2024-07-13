@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Adicionar Nova Categoria</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome da Categoria</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Categoria</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
