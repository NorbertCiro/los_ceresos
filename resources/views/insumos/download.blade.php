<!DOCTYPE html>
<html lang="en">
<head>
    <style>

        
        h5{

        font-size: 30px;
        font-family: 'Bungee Spice', cursive;
        text-align: center;
        color: rgb(73, 156, 32);
        }

        html{
            padding: 0;
            margin: 0;
        }
        body{
            font-family: sans-serif;
        }
        .container{
            width: 80%;
            margin: 0px auto;
        }

        table{
            border-color: #000;
            border-collapse: collapse;
            width: 100%;
            
            
        }
        tr, td, th{
            padding: 15px;
            text-align: :left;
            border: 1px solid;
            

        }

    </style>
</head>

<body>
    <div class="container py-5">
        <h5 class=" font-weight-bold">Listado de insumos</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Unidad </th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Tipo</th>
                    <th>Fecha de vencimiento</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($insumos as $insumo)
                <tr>
                    <td>{{ $insumo->codigo }}</td>
                    <td>{{ $insumo->nombre }}</td>
                    <td>{{ $insumo->unidad }}</td>
                    <td>{{ $insumo->precio }}</td>
                    <td>{{ $insumo->cantidad }}</td>
                    <td>{{ $insumo->tipo }}</td>
                    <td>{{ $insumo->fecha_vencimiento }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>