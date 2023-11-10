<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paginación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped table-warning mt-5">
                    <thead>
                        <th class="text-primary">ID</th>
                        <th class="text-primary">NOMBRE</th>
                        <th class="text-primary">DESCRIPCIÓN</th>
                        <th class="text-primary">PRECIO UNITARIO</th>
                        <th class="text-primary">STOCK</th>
                        <th class="text-primary">CREADO EN</th>
                        <th class="text-primary">ACTUALIZADO EN</th>
                    </thead>        
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id  }}</td>
                            <td>{{ $product->name  }}</td>
                            <td>{{ $product->description  }}</td>
                            <td>{{ $product->unit_price   }}</td>
                            <td>{{ $product->stock  }}</td>
                            <td>{{ $product->created_at  }}</td>
                            <td>{{ $product->updated_at  }}</td>
                            <td>                            
                                <td>
                                    <form action="{{ route('products.edit', $product->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </form>
                                    
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">             
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>        
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $products->links() !!}
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>