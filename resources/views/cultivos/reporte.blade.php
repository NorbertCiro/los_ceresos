<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>

        h5{
        font-size: 35px;
        font-family: 'Bungee Spice', cursive;
        text-align: center;
        color: rgb(73, 156, 32);
        }
        h2{
        font-size: 25px;
        font-family: 'Bungee Spice', cursive;
        text-align: left;
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
    <main class="container">
        <h5>{{$cultivo->nombre}}</h5>
        <section>
            @foreach ($fases as $fase)
                <h2>Fase {{$fase->nombre}}</h2>
                <div>
                    <section>
                        <h3>Mano de obra</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Actividad</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $actividades = DB::table('movimientos_actividad')
                                    ->select(
                                    'actividads.nombre as nombre_actividad',
                                    'movimientos_actividad.cantidad as cantidad_movimiento',
                                    'movimientos_actividad.valor as valor_movimiento',
                                    'movimientos_actividad.created_at as fecha_movimiento',
                                    )
                                    ->where('cultivo_fase_id', $fase->cultivo_fase_id)
                                    ->join('actividads', 'movimientos_actividad.actividad_id', '=', 'actividads.id')
                                    ->get();

                                    $valorTotalM = 0;
                                @endphp
                                @foreach ($actividades as $actividad)
                                @php
                                    $valor = $actividad->cantidad_movimiento * $actividad->valor_movimiento;
                                    $valorTotalM += $valor;
                                @endphp
                                <tr>
                                    <td>{{$actividad->nombre_actividad}}</td>
                                    <td>{{$valor}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td>{{$valorTotalM}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </section>
                    <section>
                        <h3>Insumos</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo movimiento</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $insumos = DB::table('movimientos_insumos')
                                ->select(
                                'insumos.nombre as nombre_insumo',
                                'movimientos_insumos.tipo as tipo_movimiento',
                                'movimientos_insumos.cantidad as cantidad_movimientos_insumos',
                                'insumos.precio as precio_insumo',
                                'movimientos_insumos.created_at as fecha_movimiento',
                                )
                                ->where('cultivo_fase_id', $fase->cultivo_fase_id)
                                ->join('insumos', 'movimientos_insumos.insumo_id', '=', 'insumos.id')
                                ->get();
                    
                                $valorTotalI = 0;
                                @endphp
                                @foreach ($insumos as $insumo)
                                @php
                                $valor = $insumo->precio_insumo * $insumo->cantidad_movimientos_insumos;
                                $valorTotalI += $valor;
                                @endphp
                                <tr>
                                    <td>{{$insumo->nombre_insumo}}</td>
                                    <td>{{$insumo->tipo_movimiento ? "Devolución" : "Salida"}}</td>
                                    <td>{{$insumo->cantidad_movimientos_insumos}}</td>
                                    <td>{{$insumo->precio_insumo}}</td>
                                    <td>{{$valor}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td>{{$valorTotalI}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </section>
                    <section>
                        <h3>Costos adicionales</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>descripcion</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $costos = DB::table('costo_adicionals')
                                ->select(
                                'costo_adicionals.fecha as fecha',
                                'costo_adicionals.descripcion as descripcion',
                                'costo_adicionals.precio as precio',
                                )
                                ->where('cultivo_fase_id', $fase->cultivo_fase_id)
                                ->get();
                    
                                $valorTotalC = 0;
                                @endphp
                                @foreach ($costos as $costo)
                                @php
                                $valor = $costo->precio;
                                $valorTotalC += $valor;
                                @endphp
                                <tr>
                                    <td>{{$costo->fecha}}</td>
                                    <td>{{$costo->descripcion}}</td>
                                    <td>{{$costo->precio}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{$valorTotalC}}</td>
                            </tr>
                        </table>
                    </section>
                    @php
                    $valorTotal= $valorTotalM+$valorTotalI+$valorTotalC;
                    @endphp
                   <section>
                    <h3>Valor total: ${{$valorTotal}}</h3>
                   </section>
                </div>
            @endforeach
        </section>
    </main>
</body>
</html>