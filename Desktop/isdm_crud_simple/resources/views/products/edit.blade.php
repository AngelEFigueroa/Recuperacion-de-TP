@extends('layouts.app')

@section('title', 'Edición del Producto #' . $product->id)

@section('content')
    <div class="container">
        <h1>Edición del Producto #{{ $product->id }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" name="description" cols="30" rows="10">{{ old('description', $product->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="unit_price" class="form-label">Precio Unitario:</label>
                <input type="number" class="form-control" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection