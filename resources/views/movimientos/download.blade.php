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
        <h5 class=" font-weight-bold">Listado de Movimientos</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Id del insumo</th>
                    <th>Fecha</th>
                    <th>Cantidad </th>
                    <th>tipo </th>
                    <th>Observacion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movimientos as $movimiento)
                <tr>
                    <td>{{ $movimiento->insumo_id }}</td>
                    <td>{{ $movimiento->fecha }}</td>
                    <td>{{ $movimiento->cantidad }}</td>
                    <td>{{ $movimiento->tipo }}</td>
                    <td>{{ $movimiento->observacion }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>