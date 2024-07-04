@csrf
<div class="block">
    <div class="my-2 px-6">
        <x-jet-label for="nombre" value="{{ __('Nombre')}}" />
        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $actividad->nombre)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="estado" value="{{ __('Estado')}}" />
        <x-jet-input id="estado" class="block mt-1 w-full" type="enum" name="estado" :value="old('estado', $actividad->estado)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="fecha_realizacion" value="{{ __('Fecha Realizacion')}}" />
        <x-jet-input id="fecha_realizacion" class="block mt-1 w-full" type="date" name="fecha_realizacion" :value="old('fecha_realizacion', $actividad->fecha_realizacion)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="valor" value="{{ __('Valor')}}" />
        <x-jet-input id="valor" class="block mt-1 w-full" type="integer" name="valor" :value="old('valor', $actividad->valor)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="observacion" value="{{ __('Observacion')}}" />
        <x-jet-input id="observacion" class="block mt-1 w-full" type="longtext" name="observacion" :value="old('observacion', $actividad->observacion)" required autofocus />
    </div>
    <div class="flex justify-center">
        <div class="p-2">
            <div class="flex justify-end">
                <a href="{{('actividads.create')}}">
                    <x-jet-button type="submit">
                        Guardar
                    </x-jet-button>
            </div>
        </div>
    </div>
</div>