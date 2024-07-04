@csrf

    <div class="my-4 px-6">
    <x-jet-label for="insumo_id" value="{{ __('Id insumo')}}" />
    <x-jet-input id="insumo_id" class="block mt-1 w-full" type="text" name="insumo_id" :value="old('insumo_id', $movimiento->insumo_id)"  readonly />
    </div>



    <div class="my-4 px-6">
    <x-jet-label for="cantidad" value="{{ __('Cantidad')}}" />
    <x-jet-input id="cantidad" class="block mt-1 w-full" type="text" name="cantidad" :value="old('cantidad', $movimiento->cantidad)" required autofocus />
    </div>

    @if ($movimiento->tipo == 'entrada')
    <div class="my-4 px-6">
        <x-jet-label for="tipo_movimiento" value="{{ __('Tipo de movimiento')}}" />
        <x-jet-input id="tipo_movimiento" class="block mt-1 w-full" type="text" name="tipo_movimiento" :value="old('tipo_movimiento' , $movimiento->tipo )" required autofocus />
        </div>

    {{-- @elseif($movimiento->tipo == 'devolucion')
    <div class="my-4 px-6">
        <x-jet-label for="tipo_movimiento" value="{{ __('Tipo de movimiento')}}" />
        <x-jet-input id="tipo_movimiento" class="block mt-1 w-full" type="text" name="tipo_movimiento" :value="old('tipo_movimiento' , $movimiento->tipo )" required autofocus />
        </div> --}}
    @else
    <div class="my-4 px-6">
        <x-jet-label for="tipo_movimiento" value="{{ __('Tipo de movimiento')}}" />
        <x-jet-input id="tipo_movimiento" class="block mt-1 w-full" type="text" name="tipo_movimiento" :value="old('tipo_movimiento' , $movimiento->tipo )" required autofocus />
        </div>
    @endif

    <div class="my-4 px-6">
        <x-jet-label>Tipo de movimiento</x-jet-label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento1"
                wire:click="setTipoMovimiento('entrada')" @if ($movimiento->tipo == 'entrada') checked @endif>
            <label class="form-check-label" for="tipoMovimiento1">
                Entrada
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento2"
                wire:click="setTipoMovimiento('salida')" @if ($movimiento->tipo == 'salida') checked @endif>
            <label class="form-check-label" for="tipoMovimiento2">
                Salida
            </label>
        </div>
        {{-- <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipoMovimiento" id="tipoMovimiento3"
                wire:click="setTipoMovimiento('devolucion')" @if ($movimiento->tipo == 'devolucion') checked @endif>
            <label class="form-check-label" for="tipoMovimiento3">
                Devolucion
            </label>
        </div> --}}
    </div>


    <div class="my-4 px-6">
    <x-jet-label for="fecha" value="{{ __('Fecha')}}" />
    <x-jet-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha', $movimiento->fecha)" required autofocus />
    </div>

        <div class="my-1 flex justify-center">
            <a href="{{('movimientos.create')}}">
                <x-jet-button type="submit">
                    Guardar
                </x-jet-button>
            </a>
        </div>

