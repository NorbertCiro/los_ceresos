@csrf
<div class="block">
    <div class="my-4">
        <x-jet-label for="cultivo_id" value="{{ __('Cultivo Id')}}" />
        <x-jet-input id="cultivo_id" class="block mt-1 w-full" type="integer" name="cultivo_id" :value="old('cultivo_id', $cosecha->cultivo_id)" required autofocus />
    </div>
    <div class="my-4">
        <x-jet-label for="fecha" value="{{ __('Fecha')}}" />
        <x-jet-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha', $cosecha->fecha)" required autofocus />
    </div>
    <div class="my-4">
        <x-jet-label for="cantidad" value="{{ __('cantidad')}}" />
        <x-jet-input id="cantidad" class="block mt-1 w-full" type="integer" name="cantidad" :value="old('cantidad', $cosecha->cantidad)" required autofocus />
    </div>
    <div class="my-4">
        <x-jet-label for="user_id" value="{{ __('Usuario Id')}}" />
        <x-jet-input id="user_id" class="block mt-1 w-full" type="integer" name="user_id" :value="old('user_id', $cosecha->user_id)" required autofocus />
    </div>
    <div class="flex justify-center">
        <div class="p-2">
            <div class="flex justify-end">
                <a href="{{('cosechas.create')}}">
                    <x-jet-button type="submit">
                        Guardar
                    </x-jet-button>
            </div>
        </div>
    </div>
</div>