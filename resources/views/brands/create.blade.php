@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Marca</h1>
    <form method="POST" action="{{ route('brands.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Marca</button>
    </form>
</div>
@endsection
