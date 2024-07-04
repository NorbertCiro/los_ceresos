
<div>
    <style>
           button#hov{
             color: white;
             background-color: rgb(85, 85, 85);
        }

        button#hov:hover{
             
             background-color: rgba(128, 128, 128, 0.774);
        }
    </style>
    <x-jet-button wire:click="$toggle('abrirModal')">Ver</x-jet-button>

    <x-jet-dialog-modal wire:model="abrirModal">
        <x-slot name="title">
            <div class="p-2">
                <h2>Ver Estado
                    {{-- {{ $cultivo_fase_id }}  --}}
                    {{-- {{$costoAdicionals}} --}}
                </h2>
            </div>
        </x-slot>
        <x-slot name="content">
            {{-- {{ $insumos }} --}}
            <div class="border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                        rounded-md shadow-sm w-full"
                wire:model="keyInsumoSelected">

                @foreach ($insumos as $key => $insumoSelected)
                    <p value="{{ $key }}">{{ $insumoSelected->insumo }}</p>
                @endforeach
            </div>
            @if ($insumoSelected)
                <div class="my-1 p-2">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button id="hov" class="accordion-button collapsed focus:border-gray-900 focus:ring focus:ring-gray-300 " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Insumos
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <!-- {{ $movimientosInsumos }} -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre Insumo</th>
                                                <th>Tipo movimiento</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Total</th>
                                                <th>Fecha Movimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($movimientosInsumos as $item)
                                                <tr>
                                                    <td>{{ $item->nombre_insumo }}</td>
                                                    <td>
                                                        @if ($item->tipo_movimiento)
                                                            Devolución
                                                        @else
                                                            Salida
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->cantidad_movimientos_insumos }}</td>
                                                    <td>{{ $item->precio_insumo }}</td>
                                                    <td>{{ $item->precio_insumo * $item->cantidad_movimientos_insumos }}
                                                    </td>
                                                    <td>{{ $item->fecha_movimiento }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button id="hov" class="accordion-button collapsed focus:border-gray-900 focus:ring focus:ring-gray-300 " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Actividades
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- {{ $movimientosInsumos }} -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre Actividad</th>
                                                <th>Horas Laboradas</th>
                                                <th>Jornales</th>
                                                <th>Precio</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($movimientosActividad as $item)
                                                <tr>
                                                    <td>{{ $item->nombre_actividad }}</td>
                                                    <td>{{ $item->cantidad_movimiento }}</td>
                                                    <td>{{ $item->cantidad_jornales }}</td>
                                                    <td>{{ $item->valor_movimiento }}</td>
                                                    <td>{{ $item->fecha_movimiento }}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button id="hov" class="accordion-button collapsed focus:border-gray-900 focus:ring focus:ring-gray-300 " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Costos Adicionales
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $costosAdicionales }}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Precio</th>
                                                <th>Descripcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($costoAdicionals as $item)
                                                <tr>
                                                    <td>{{ $item->fecha_costo }}</td>
                                                    <td>{{ $item->precio_costo }}</td>
                                                    <td>{{ $item->descripcion_costo }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('abrirModal')" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>

            </x-slot>
        </x-slot>
    </x-jet-dialog-modal>
</div>
