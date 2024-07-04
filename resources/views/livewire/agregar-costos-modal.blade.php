<div>
    <style> 
        button#grand{
         background-color: rgb(74, 224, 127);
         color: white;
         width: 190px;
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

    <button id="grand" wire:click="$toggle('abrirModal')">Agregar Costo Adicional
    </button>

    <x-jet-dialog-modal wire:model="abrirModal">
        <x-slot name="title">
            <div class="p-2">
                <h2>Agregar Costo</h2>
            </div>
        </x-slot>
        

        <x-slot name="content">
            <div class="my-1 p-2">
                <table class="table table-bordered  mt-2">
                    <tr>
                        <th>Id Fase Cultivo</th>
                    </tr>
                    <tr>
                        <td>
                            {{ $cultivo_fase_id}}
                        </td>
                    </tr>
        
                </table>
                <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                <x-jet-input id="fecha" class="block mt-1 w-full" wire:model='fecha' type="date" name="fecha"
                    :value="old('fecha')" required autofocus />
                <x-jet-label for="precio" value="{{ __('Precio') }}" />
                <x-jet-input id="precio" class="block mt-1 w-full" wire:model='precio' type="number"
                    name="precio" :value="old('precio')" required autofocus />
                <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                <x-jet-input id="descripcion" class="block mt-1 w-full" wire:model='descripcion' type="text"
                    name="descripcion" :value="old('descripcion')" required autofocus />
            </div>
            <table class="table table-bordered m-2 p-2">
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
            



        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('abrirModal')" wire:loading.attr="disabled">
                Atras
            </x-jet-secondary-button>

            <button
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-2"
                {{ $disableForm ? 'disabled' : '' }}
                wire:click="save" wire:loading.attr="disabled">
                Guardar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


{{-- <div>
    <x-jet-button wire:click="$toggle('abrirModal')">Agregar Costo Adicional
    </x-jet-button>

    <x-jet-dialog-modal wire:model="abrirModal">
        <x-slot name="title">
            <div class="p-2">
                <h2>Agregar Costo</h2>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="my-1 p-2">
                <div class="block">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <x-jet-input id="fecha" class="block mt-1 w-full" wire:model='fecha' type="date" name="fecha"
                        :value="old('fecha')" required autofocus />
                    <x-jet-label for="precio" value="{{ __('Precio') }}" />
                    <x-jet-input id="precio" class="block mt-1 w-full" wire:model='precio' type="number"
                        name="precio" :value="old('precio')" required autofocus />
                    <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                    <x-jet-input id="descripcion" class="block mt-1 w-full" wire:model='descripcion' type="text"
                        name="descripcion" :value="old('descripcion')" required autofocus />
                </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('abrirModal')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <button
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-2"
                {{ $disableForm ? 'disabled' : '' }} wire:click="save" wire:loading.attr="disabled">
                Guardar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div> --}}
