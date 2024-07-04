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
                        {{ __('Ver Cosecha') }}
                    </span>
                </div>
            </nav>
        </div>
    </div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                
                    <div class="my-1">
                        <x-jet-label for="cultivo_id" value="{{ __('Cultivo Id')}}" />
                        <x-jet-input id="cultivo_id" class="w-full" type="integer" name="cultivo_id" :value="old('cultivo_id', $cosecha->cultivo_id)" readonly />
                    </div>
                    <div class="my-1">
                        <x-jet-label for="fecha" value="{{ __('Fecha')}}" />
                        <x-jet-input id="fecha" class=" w-full" type="date" name="fecha" :value="old('fecha', $cosecha->fecha)" readonly />
                    </div>
                    <div class="my-1">
                        <x-jet-label for="cantidad" value="{{ __('cantidad')}}" />
                        <x-jet-input id="cantidad" class=" w-full" type="integer" name="cantidad" :value="old('cantidad', $cosecha->cantidad)" readonly />
                    </div>
                    <div class="my-1">
                        <x-jet-label for="user_id" value="{{ __('Usuario Id')}}" />
                        <x-jet-input id="user_id" class="w-full" type="integer" name="user_id" :value="old('user_id', $cosecha->user_id)" readonly />
                    </div>

                <div class="my-4 flex justify-center">
                    <x-jet-button>
                        Volver
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>