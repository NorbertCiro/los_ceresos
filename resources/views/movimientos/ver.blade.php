<x-app-layout>

    <style>
        .heading-primary-bottom {

            display: block;
            font-size: 18px;
            letter-spacing: 5px;
            font-weight: 700;
        }
    </style>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <br>
        <div class="overflow-hidden  shadow-xl sm:rounded-lg">
            <nav class="navbar bg-white">
                <div class="container-fluid">
                    <span class="heading-primary-bottom">
                        {{ __('Ver Movimiento') }}
                    </span>
                </div>
            </nav>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="my-4 px-6">
                    <x-jet-label for="insumo_nombre" value="{{ __('Nombre Insumo') }}" />
                    <x-jet-input id="insumo_nombre" class="block mt-1 w-full" type="text" name="insumo_nombre"
                        :value="old('insumo_nombre', $movimiento->insumo_id)" readonly />
                </div>
                <div class="my-4 px-6">
                    <x-jet-label for="insumo_nombre" value="{{ __('Nombre Insumo') }}" />
                    <x-jet-input id="insumo_nombre" class="block mt-1 w-full" type="text" name="insumo_nombre"
                        :value="old('insumo_nombre', $movimiento->insumo_nombre)" readonly />
                </div>

                <div class="my-4 px-6">
                    <x-jet-label for="tipoMovimiento" value="{{ __('Tipo de movimiento') }}" />
                    <x-jet-input id="tipoMovimiento" class="block mt-1 w-full" type="text" name="tipoMovimiento"
                        :value="old('tipoMovimiento', $movimiento->tipo)" readonly />
                </div>

                <div class="my-4 px-6">
                    <x-jet-label for="cantidad" value="{{ __('Cantidad Insumos') }}" />
                    <x-jet-input id="cantidad" class="block mt-1 w-full" type="text" name="cantidad"
                        :value="old('cantidad', $movimiento->cantidad)" readonly />
                </div>
                <div class="my-4 px-6">
                    <x-jet-label for="insumo_precio" value="{{ __('Precio Unidad Insumo') }}" />
                    <x-jet-input id="insumo_precio" class="block mt-1 w-full" type="text" name="insumo_precio"
                        :value="old('insumo_precio', $movimiento->insumo_precio)" readonly />
                </div>

                <div class="my-4 px-6">
                    <x-jet-label for="valor" value="{{ __('Valor total Movimiento') }}" />
                    <x-jet-input id="valor" class="block mt-1 w-full" type="text" name="valor"
                        :value="old('valor', $movimiento->precio)" readonly />
                </div>
                <div class="my-4 px-6">
                    <x-jet-label for="observacion" value="{{ __('Valor total Movimiento') }}" />
                    <x-jet-input id="observacion" class="block mt-1 w-full" type="text" name="observacion"
                        :value="old('observacion', $movimiento->observacion)" readonly />
                </div>

                <div class="my-4 px-6">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <x-jet-input id="fecha" class="block mt-1 w-full" type="double" name="fecha"
                        :value="old('fecha', $movimiento->fecha)" readonly />
                </div>
                <div class="my-1 flex justify-center">
                    <a href="{{ route('movimientos.index') }}">
                        <x-jet-button>Volver</x-jet-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
