@csrf

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="my-2 px-6">
                    <x-jet-label for="nombre" value="{{ __('Nombre')}}"/>
                    <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $fase->nombre)" required autofocus />
                </div>

                <div class="my-1 flex justify-center">
                    <a href="{{('fases.create')}}">
                        <x-jet-button type="submit"> Guardar </x-jet-button>
                    </a>
                </div>

            </div>
        </div>
    
    </div>
