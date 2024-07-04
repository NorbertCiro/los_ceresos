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
        <h5 class=" font-weight-bold">Listado de Cosechas</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Cultivo Id</th>
                    <th>Fecha </th>
                    <th>Cantidad</th>
                    <th>User Id</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cosechas as $cosecha)
                <tr>
                    <td>{{ $cosecha->cultivo_id }}</td>
                    <td>{{ $cosecha->fecha }}</td>
                    <td>{{ $cosecha->cantidad }}</td>
                    <td>{{ $cosecha->user_id }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>