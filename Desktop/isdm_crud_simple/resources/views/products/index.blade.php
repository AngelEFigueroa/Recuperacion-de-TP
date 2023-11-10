@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
    @if ($products->count())
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Stock</th>
                    <th>Ultima actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            {{-- Botones de acción VER, EDITAR y ELIMINAR --}}
                            <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>No hay productos cargados!!!</h4>
    @endif
@endsection
