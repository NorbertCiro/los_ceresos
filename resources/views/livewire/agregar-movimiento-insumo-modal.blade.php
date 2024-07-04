<div>
    <style>
        button#grand{
         background-color: rgb(74, 224, 127);
         color: white;
         width: 170px;
         height: 30px;
         border-radius: 0.2rem;
         margin: 2px;
         font-family: Thin italic;
         font-size: 15px;
         letter-spacing: 1px;

     }

     button#grand:hover{
         background-color: white;
         border:solid 1px rgb(74, 224, 127);
         color: rgb(74, 224, 127);
     }
     </style>

    <button id="grand"wire:click="$toggle('abrirModal')">Agregar Movimiento
    </button>

    <x-jet-dialog-modal wire:model="abrirModal">
        <x-slot name="title">
            <div class="p-2">
                <a  href="{{ route('insumos.create') }}"><button id="ex"> Crear insumo</button>  </a>
            </div>
        </x-slot>

        <x-slot name="content">
            <div>
{{$tipoMovimiento}}
                <div class="my-1 p-2">
                    <x-jet-label>Nombre del insumo</x-jet-label>
                    {{-- {{ $insumos }} --}}
                    <select
                        class="border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                        rounded-md shadow-sm w-full"
                        wire:model="keyInsumoSelected" wire:change='onChangeInsumo'>
                        <option value="">-- Seleccione el insumo --</option>
                        @foreach ($insumos as $key => $insumo)
                            <option value="{{ $key }}">{{ $insumo->nombre }}</option>
                        @endforeach
                    </select>
                    {{-- <br>
                    {{ $keyInsumoSelected }} --}}
                    {{-- <br>
                    {{ $insumoSelected }} --}}

                </div>


                @if ($insumoSelected)
                    <div class="my-1 p-2">
                        <x-jet-label>Fecha del movimiento</x-jet-label>
                        <x-jet-input id="fecha" class="block mt-1" type="date" name="fecha"
                            wire:model='fecha' />

                    </div>
                    <div class="my-1 p-2">
                        <table class="table table-bordered">
                            <tr>
                                <th>Insumo</th>
                                <th>Cantidad actual</th>
                            </tr>
                            <tr>
                                <td>
                                    {{ $insumoSelected->nombre }}
                                </td>
                                <td>
                                    {{ $insumoSelected->cantidad }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="my-1 p-2">
                        <x-jet-label>Tipo de movimiento</x-jet-label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento1"
                                wire:click="setTipoMovimiento('entrada')" @if ($tipoMovimiento == 'entrada') checked @endif>
                            <label class="form-check-label" for="tipoMovimiento1">
                                Entrada
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento2"
                                wire:click="setTipoMovimiento('salida')" @if ($tipoMovimiento == 'salida') checked @endif>
                            <label class="form-check-label" for="tipoMovimiento2">
                                Salida
                            </label>
                        </div>
                        {{-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento3"
                                wire:click="setTipoMovimiento('devolucion')" @if ($tipoMovimiento == 'devolucion') checked @endif>
                            <label class="form-check-label" for="tipoMovimiento3">
                                Devolucion
                            </label>
                        </div> --}}
                    </div>

                    @if ($tipoMovimiento == 'entrada')
                        <div class="my-1 p-2">
                            <x-jet-label>Cantidad de entrada</x-jet-label>
                            <x-jet-input type="number" class="w-full" wire:model='cantidad' wire:input='updatePrice'
                                min="0" />
                        </div>
                        {{-- posibilidad de devolucion --}}
                    {{-- @elseif($tipoMovimiento == 'devolucion')
                        <div class="my-1 p-2">
                            <x-jet-label>Cantidad de devolucion</x-jet-label>
                            <x-jet-input type="number" class="w-full" wire:model='cantidad' wire:input='updatePrice'
                                min="0" />
                        </div> --}}
                    @else
                        <div class="my-1 p-2">
                            <x-jet-label>Cantidad de salida</x-jet-label>
                            <x-jet-input type="number" class="w-full" wire:model='cantidad' wire:input='updatePrice'
                                min="0" max="{{ $insumoSelected->cantidad }}" />
                        </div>
                    @endif

                    <div class="my-1 p-2">
                        <table class="table table-bordered">
                            <tr>
                                <th>Cantidad</th>
                                <th>Precio unidad</th>
                                <th>Precio total</th>
                            </tr>
                            <tr>
                                <td>
                                    {{ $cantidad }}
                                </td>
                                <td>
                                    ${{ $insumoSelected->precio }}
                                </td>
                                <td>
                                    ${{ $precio }}
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>Id Usuario</th>
                                <th>Nombre</th>
                                <th>Email</th>
                            </tr>
                            <tr>

                                <td>
                                    {{ Auth::user()->id }}
                                </td>
                                <td>
                                    {{ Auth::user()->name }}
                                </td>
                                <td>
                                    {{ Auth::user()->email }}
                                </td>
                            </tr>
                        </table>
                        {{-- {{Auth::user()}}
                    {{Auth::user()->id}}
                    {{Auth::user()->name}} --}}
                    </div>

                    <div class="my-1 p-2">
                        <x-jet-label>Observaciones</x-jet-label>
                        <textarea class="form-control" wire:model='observacion' name="observacion" id="observacion" style="height: 100px"></textarea>
                    </div>





                @endif
            </div>
        </x-slot>


        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('abrirModal')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            {{-- <x-jet-button class="ml-2" wire:click="save" wire:loading.attr="disabled" disabled="false">
                Guardar
            </x-jet-button> --}}
            <button
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-2"
                {{ $disableForm ? 'disabled' : '' }} wire:click="save" wire:loading.attr="disabled">
                Guardar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
