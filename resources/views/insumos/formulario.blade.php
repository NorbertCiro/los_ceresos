


@csrf
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
    <div class="my-2 px-6">
        <x-jet-label for="codigo" value="{{ __('Codigo') }}" />
        <x-jet-input id="codigo" class="w-full" type="text" name="codigo" :value="old('codigo', $insumo->codigo)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
        <x-jet-input id="nombre" class="w-full" type="text" name="nombre" :value="old('nombre', $insumo->nombre)" required autofocus />
    </div>
    <div class="my-2 px-6">

            <x-jet-label for="tipo">Selecciona la unidad de medida</x-jet-label>
            <select name="unidad" id="unidad">
                <option value="Mg">Mg</option>
                <option value="Gr">Gr</option>
                <option value="Kg">Kg</option>
                <option value="Ml">Ml</option>
                <option value="Lt">Lt</option>
                <option value="Und">Und</option>
            </select>

    </div>
    <div class="my-2 px-6">
        <x-jet-label for="cantidad" value="{{ __('Cantidad') }}" />
        <x-jet-input id="cantidad" class="w-full" type="double" name="cantidad" :value="old('cantidad', $insumo->cantidad)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="precio" value="{{ __('precio') }}" />
        <x-jet-input id="precio" class="w-full" type="text" name="precio" :value="old('precio', $insumo->precio)" required autofocus />
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="tipo">Estado</x-jet-label>
        <select name="tipo" id="tipo">
            <option value="Fungicidas">Fungicidas</option>
            <option value="Insecticidas">Insecticidas</option>
            <option value="Herbicidas">Herbicidas</option>
            <option value="Fertilizantes">Fertilizantes</option>
        </select>
    </div>
    <div class="my-2 px-6">
        <x-jet-label for="fecha_vencimiento" value="{{ __('Fecha_vencimiento') }}" />
        <x-jet-input id="fecha_vencimiento" class="w-full" type="date" name="fecha_vencimiento" :value="old('fecha_vencimiento', $insumo->fecha_vencimiento)" required autofocus />


        <div class="flex justify-center">
            <div class="p-2">
                <div class="flex justify-end">
                    <a href="{{ route('insumos.create') }}">
                        <x-jet-button type="submit">
                            Guardar
                        </x-jet-button>
                </div>
            </div>
        </div>

    </div>
        </div>
    </div>
</div>


