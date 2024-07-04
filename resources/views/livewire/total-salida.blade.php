<div>
    <form wire:submit.prevent='guardarMovimiento' method="post">
        <div class="block">
            <x-jet-label for="insumo" value="{{ __('Insumo') }}" />
            <select
                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus😮utline-none"
                wire:model="insumoSeleccionado">
                <option selected>Selecciona un insumo</option>
                @foreach ($insumos as $insumo)
                    <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                @endforeach
            </select>
            <x-jet-label for="tipomovimiento" value="{{ __('Tipo de Movimiento') }}" />
            <select
                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus😮utline-none"
                wire:model="tipo">
                <option selected>Selecciona un Movimiento</option>
                <option value="Salida">Salida</option>
                <option value="Entrada">Entrada</option>
            </select>
            <x-jet-label for="cantidad" value="{{ __('Cantidad') }}" />
            <x-jet-input id="cantidad" class="block mt-1 w-full" type="number" wire:model="cantidad" required
                wire:change='calculate' />


            <x-jet-label for="valor" value="{{ __('Valor Total') }}" />
            <x-jet-input class="block mt-1 w-full" type="number" wire:model="valor_total" required autofocus />

            <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
            <x-jet-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" required
                autofocus />
        </div>
        <div class="flex justify-center">
            <div class="p-2">
                <div class="flex justify-end">
                    <x-jet-button type="submit">
                        Guardar
                    </x-jet-button>
                </div>
            </div>
        </div>
    </form>
</div>
