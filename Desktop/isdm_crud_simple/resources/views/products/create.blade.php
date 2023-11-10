@extends('layouts.app')

@section('title', 'Crear un nuevo Producto')

@section('content')
<div class="container">
    <h1>Crear un nuevo Producto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <textarea class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Precio Unitario:</label>
            <input type="number" class="form-control" name="unit_price" value="{{ old('unit_price') }}">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
