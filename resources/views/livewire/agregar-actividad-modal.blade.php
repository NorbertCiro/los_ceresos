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

    <button  id="grand" wire:click="$toggle('abrirModal')">Agregar Actividad
    </button>

    <x-jet-dialog-modal wire:model="abrirModal">
        <x-slot name="title">
            <div class="p-2">
                <h2>Agregar Actividad</h2>
            </div>
        </x-slot>

        <x-slot name="content">
            <div>
                <div class="my-1 p-2">
                    <x-jet-label>Nombre de la Actividad</x-jet-label>
                    {{-- {{ $actividads }} --}}
                    <select
                        class="border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                        rounded-md shadow-sm w-full"
                        wire:model="keyActividadSelected" wire:change='onChangeActividad'>
                        <option value="">-- Seleccione la actividad --</option>
                        @foreach ($actividads as $key => $actividad)
                            <option value="{{ $key }}">{{ $actividad->nombre }}</option>
                        @endforeach
                    </select>
                    {{-- <br>
                    {{ $keyactividadSelected }} --}}
                    {{-- <br>
                    {{ $actividadSelected }} --}}

                </div>
                @if ($actividadSelected)
                    <div class="my-1 p-2">
                        <table class="table table-bordered">
                            <tr>
                                <th>Actividad</th>

                            </tr>
                            <tr>
                                <td>
                                    {{ $actividadSelected->nombre }}
                                </td>

                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>Horas laboradas
                                    <x-jet-input type="number" class="w-full" wire:model='cantidad'
                                        wire:input='updatePrice' min="0"
                                        max="{{ $actividadSelected->cantidad }}" />
                                </th>
                            </tr>
                    </div>
                    <div class="my-1 p-2">
                        <table class="table table-bordered">
                            <tr>
                                <th>Cantidad Horas</th>
                                <th>Jornales</th>
                                <th>Hora labor</th>
                                <th>Precio total</th>
                            </tr>
                            <tr>
                                <td>
                                    {{ $cantidad }}
                                </td>
                                <td>
                                    {{ $jornales}}
                                </td>
                                <td>
                                    ${{ $actividadSelected->valor }}
                                </td>
                                <td>
                                    ${{ $valor }}
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
                @endif
            </div>
        </x-slot>


        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('abrirModal')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <!-- <x-jet-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                Guardar
            </x-jet-button> -->
            <button
                class="inline-flex items-center px-4 py-2
             bg-gray-800 border border-transparent rounded-md
             font-semibold text-xs text-white uppercase tracking-widest
             hover:bg-gray-700 active:bg-gray-900 focus:outline-none
             focus:border-gray-900 focus:ring focus:ring-gray-300
             disabled:opacity-25 transition ml-2"
                {{ $disableForm ? 'disabled' : '' }} wire:click="save" wire:loading.attr="disabled">
                Guardar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
