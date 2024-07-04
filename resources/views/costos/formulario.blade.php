@csrf
@foreach ($costos as $costo)
<div class="block">
    <x-jet-label for="fecha" value="{{ __('Fecha')}}"/>
    <x-jet-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha', $costo->fecha)" required autofocus />
    <x-jet-label for="precio" value="{{ __('Precio')}}"/>
    <x-jet-input id="precio" class="block mt-1 w-full" type="number" name="precio" :value="old('precio', $costo->precio)" required autofocus />
    <x-jet-label for="descripcion" value="{{ __('Descripcion')}}"/>
    <x-jet-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion', $costo->descripcion)" required autofocus />

    <div class="flex justify-center">
    <div class="p-2">
        <div class="flex justify-end">
        <a href="{{('costos.create')}}">
            <x-jet-button type="submit">
                Guardar
            </x-jet-button>
        </div>
    </div>
    </div>
    </div>


@endforeach

