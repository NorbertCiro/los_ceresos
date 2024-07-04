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
                        {{ __('Ver Actividad') }}
                    </span>
                </div>
            </nav>
        </div>
    </div>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="block">

                    <div class="my-2 px-6">
                        <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $actividad->nombre)" readonly />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="estado" value="{{ __('Estado') }}" />
                        <x-jet-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado', $actividad->estado)" readonly />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="fecha_realizacion" value="{{ __('Fecha de Realizacion') }}" />
                        <x-jet-input id="fecha_realizacion" class="block mt-1 w-full" type="text" name="fecha_realizacion" :value="old('fecha_realizacion', $actividad->fecha_realizacion)" readonly />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="valor" value="{{ __('Valor') }}" />
                        <x-jet-input id="valor" class="block mt-1 w-full" type="text" name="valor" :value="old('valor', $actividad->valor)" readonly />
                    </div>
                    
                    <div class="my-2 px-6">
                        <x-jet-label for="observacion" value="{{ __('Observacion') }}" />
                        <x-jet-input id="observacion" class="block mt-1 w-full" type="text" name="cantidad" :value="old('observacion', $actividad->observacion)" readonly />
                    </div>

                </div>


                <div class="my-4 flex justify-center">
                    <a  href="{{route('actividads.index')}}">
                       <x-jet-button> Volver</x-jet-button>
                    </a>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>