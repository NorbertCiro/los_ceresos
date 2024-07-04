@csrf

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">

    <div class="my-2 px-6">
        <x-jet-label for="nombre" value="{{ __('Nombre')}}" />
        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $cultivo->nombre)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="fecha_inicio" value="{{ __('Fecha Inicio')}}" />
        <x-jet-input id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio" :value="old('fecha_inicio', $cultivo->fecha_inicio)" required autofocus />
    </div>

    <div class="my-2 px-6">
        <x-jet-label for="fecha_cosecha" value="{{ __('Fecha Cosecha')}}" />
        <x-jet-input id="fecha_cosecha" class="block mt-1 w-full" type="date" name="fecha_cosecha" :value="old('fecha_cosecha', $cultivo->fecha_cosecha)" required autofocus />
    </div>

    <div class="my-2 px-6">
        <x-jet-label for="area_terreno" value="{{ __('Area Terreno')}}" />
        <x-jet-input id="area_terreno" class="block mt-1 w-full" type="double" name="area_terreno" :value="old('area_terreno', $cultivo->area_terreno)" required autofocus />
    </div>

    <div class="my-2 px-6">
        <x-jet-label for="plantas_area" value="{{ __('Plantas por Area')}}" />
        <x-jet-input id="plantas_area" class="block mt-1 w-full" type="double" name="plantas_area" :value="old('plantas_area', $cultivo->plantas_area)" required autofocus />
    </div>

    <div class="my-2 px-6">
        <x-jet-label for="densidad" value="{{ __('Densidad ')}}" />
        <x-jet-input id="densidad" class="block mt-1 w-full" type="double" name="densidad" :value="old('densidad', $cultivo->densidad)" required autofocus />
    </div>

    <div class="my-2 px-6">
        <x-jet-label for="tipo" value="{{ __('Tipo Cultivo')}}" />
        <select name="tipo" id="tipo">
            <option value="corta duración">Corta duración</option>
            <option value="perenne">Perenne</option>
        </select>
    </div>


    <div class="flex justify-center">
        <div class="p-2">
            <div class="flex justify-end">
                <a href="{{('cultivos.create')}}">
                    <x-jet-button type="submit">
                        Guardar
                    </x-jet-button>
            </div>
        </div>
    </div>
</div>
    </div>
</div>