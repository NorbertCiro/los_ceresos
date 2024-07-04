<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Movimiento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <livewire:total-salida :insumos="$insumos"/>
                   <!-- @csrf
                    <div class="my-1">
                        <x-jet-label for="insumo_id">insumo</x-jet-label>
                        <x-jet-input type="text" id="insumo_id" name="insumo_id" class="w-full" />
                    </div>
                    <div class="my-1">
                        <x-jet-label for="tipoMovimiento">Tipo de Movimiento</x-jet-label>
                        <x-jet-input type="text" id="tipoMovimiento" name="tipoMovimiento" class="w-full" />
                    </div>
                    <div class="my-1">
                        <x-jet-label for="cantidad">Cantidad</x-jet-label>
                        <x-jet-input type="number" id="cantidad" name="cantidad" class="w-full" />
                    </div>
                    <div class="my-1">
                        <x-jet-label for="valor">Valor</x-jet-label>
                        <x-jet-input type="number" id="valor" name="valor" class="w-full" />
                    </div>
                    <div class="my-1">
                        <x-jet-label for="fecha">Fecha</x-jet-label>
                        <x-jet-input type="date" id="fecha" name="fecha" class="w-full" />
                    </div>
                    
                    <x-jet-button>Guardar</x-jet-button>
                </form>-->
                <form action="{{ route('movimientos.store') }}" method="post">
                    @include('movimientos.form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
