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
                        {{ __('Ver Insumo') }}
                    </span>
                    </div>
            </nav>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                

                    <div class="my-2 px-6">
                        <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $insumo->nombre)" readonly />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="unidad" value="{{ __('unidad') }}" />
                        <x-jet-input id="unidad" class="block mt-1 w-full" type="text" name="unidad" :value="old('unidad', $insumo->unidad)" readonly />
                    </div>
                    <div class="my-2 px-6">
                        <x-jet-label for="precio" value="{{ __('precio') }}" />
                        <x-jet-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio', $insumo->precio)" readonly />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="cantidad" value="{{ __('Cantidad') }}" />
                        <x-jet-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad" :value="old('cantidad', $insumo->cantidad)" readonly />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="tipo" value="{{ __('Tipo') }}" />
                        <x-jet-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo', $insumo->tipo)" readonly />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="fecha_vencimiento" value="{{ __('Fecha_vencimiento') }}" />
                        <x-jet-input id="fecha_vencimiento" class="block mt-1 w-full" type="text" name="fecha_vencimiento" :value="old('fecha_vencimiento', $insumo->fecha_vencimiento)" readonly />
                    </div>
               


                
                <div class="my-1 flex justify-center">
                    <a style="color" href="{{route('insumos.index')}}">
                    <x-jet-button >Volver</x-jet-button>
                    </a>
                </div>

            </div>
        </div>
    </div>

 
</x-app-layout>

