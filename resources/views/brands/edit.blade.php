@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Marca</h1>
    <form method="POST" action="{{ route('brands.update', $brand->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $brand->name) }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $brand->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Marca</button>
    </form>
</div>
@endsection
