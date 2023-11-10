<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:20',
            'description' => 'nullable|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
        ];

        $messages = [
            'name.required' => 'El título es obligatorio.',
            'name.max' => 'El título no debe tener más de 20 caracteres.',
            'description.max' => 'La descripción no debe tener más de 255 caracteres.',
            'unit_price.required' => 'El precio unitario es obligatorio.',
            'unit_price.min' => 'El precio unitario debe ser mayor o igual a 0.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock debe ser mayor o igual a 1 cuando no sea nulo.',
        ];



        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('products.create')
                ->withErrors($validator)
                ->withInput();
        }


        Product::create($request->all());

        return redirect()->route('products.index')->with('status', 'Producto creado satisfactoriamente!');

    }

    public function index()
    {
        $products = Product::paginate(10); // 
        return view('product', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' =>$product]);
    }

    public function update(Request $request, $id)
    {
        
        // Busqueda del producto
        $product = Product::findOrFail($id);

        // Validacion de los datos

        $rules = [
            'name' => 'required|string|max:20|unique:products,name,' . $id, 
            'description' => 'nullable|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
        ];

        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no debe tener más de 20 caracteres.',
            'name.unique' => 'El nombre ya está en uso.',
            'description.max' => 'La descripción no debe tener más de 255 caracteres.',
            'unit_price.required' => 'El precio unitario es obligatorio.',
            'unit_price.min' => 'El precio unitario debe ser mayor o igual a 0.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock debe ser mayor o igual a 1 cuando no sea nulo.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('products.edit', $id) // Redirecciona de vuelta a la página de edición
                ->withErrors($validator)
                ->withInput();
        }

        // Actualizacion del producto
        $product->update($request->all());

        // Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto actualizado satisfactoriamente!');
    }


    // Borrado de producto

    public function destroy($id) 
    {
        // Busqueda del producto
        $product = Product::findOrFail($id);

        // Eliminacion del producto
        $product->delete();

        // Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto actualizado satisfactoriamente!!');
    }


}
