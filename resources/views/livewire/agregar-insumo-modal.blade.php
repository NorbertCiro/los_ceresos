<div>
   
    <button id="grand" wire:click="$toggle('abrirModal')">Agregar Insumo
    </button>

    <x-jet-dialog-modal wire:model="abrirModal">
        <x-slot name="title">
        <div class="p-2">
                <h2>Agregar Insumo</h2>
            </div>
        </x-slot>

        <x-slot name="content">
            <div>

                <div class="my-1 p-2">
                    <x-jet-label>Nombre del insumo</x-jet-label>
                    {{-- {{ $insumos }} --}}
                    <select class="border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                        rounded-md shadow-sm w-full" wire:model="keyInsumoSelected" wire:change='onChangeInsumo'>
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
                    <table class="table table-bordered">
                        <tr>
                            <th>Insumo</th>
                            <th>Cantidad actual</th>
                            <th>Unidad Medida</th>
                        </tr>
                        <tr>
                            <td>
                                {{ $insumoSelected->nombre }}
                            </td>
                            <td>
                                {{ $insumoSelected->cantidad }}
                            </td>
                            <td>
                                {{ $insumoSelected->unidad}}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="my-1 p-2">
                    <x-jet-label>Tipo de movimiento</x-jet-label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento1" wire:click="setTipoMovimiento(true)" @if ($tipoMovimiento==true) checked @endif>
                        <label class="form-check-label" for="tipoMovimiento1">
                            Devolucion
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento2" wire:click="setTipoMovimiento(false)" @if ($tipoMovimiento==false) checked @endif>
                        <label class="form-check-label" for="tipoMovimiento2">
                            Salida
                        </label>
                    </div>
                </div>

                @if ($tipoMovimiento == true)
                <div class="my-1 p-2">
                    <x-jet-label>Cantidad de entrada</x-jet-label>
                    <x-jet-input type="number" class="w-full" wire:model='cantidad' wire:input='updatePrice' min="0" />
                </div>
                @else
                <div class="my-1 p-2">
                    <x-jet-label>Cantidad de salida</x-jet-label>
                    <x-jet-input type="number" class="w-full" wire:model='cantidad' wire:input='updatePrice' min="0" max="{{ $insumoSelected->cantidad }}" />
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
                                {{Auth::user()->id}}
                            </td>
                            <td>
                                {{Auth::user()->name}}
                            </td>
                            <td>
                                {{Auth::user()->email}}
                            </td>
                        </tr>
                    </table>
                    {{-- {{Auth::user()}}
                    {{Auth::user()->id}}
                    {{Auth::user()->name}} --}}
                </div>
                @endif
            </div>
        </x-slot>


        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('abrirModal')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <!-- <x-jet-button class="ml-2" wire:click="save" wire:loading.attr="disabled" disabled="false">
                Guardar
            </x-jet-button> -->
            <button class="inline-flex items-center px-4 py-2
             bg-gray-800 border border-transparent rounded-md
             font-semibold text-xs text-white uppercase tracking-widest
             hover:bg-gray-700 active:bg-gray-900 focus:outline-none
             focus:border-gray-900 focus:ring focus:ring-gray-300
             disabled:opacity-25 transition ml-2" {{ $disableForm ? 'disabled' : '' }} wire:click="save" wire:loading.attr="disabled">
                Guardar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
