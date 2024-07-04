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
                        {{ __('Crear cultivo') }}
                    </span>
                    </div>
                  </div>
                </nav>
          </div>
    
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <form action="{{ route('cultivos.store') }}" method="post">
                    @csrf
                    <div class="my-2 px-6">
                        <x-jet-label for="nombre">Nombre</x-jet-label>
                        <x-jet-input type="text" id="nombre" name="nombre" class="w-full" />
                    </div>
                    <div class="my-2 px-6">
                        <x-jet-label for="fecha_inicio">Fecha de inicio</x-jet-label>
                        <x-jet-input type="date" id="fecha_inicio" name="fecha_inicio" class="w-full" />
                    </div>
                    <div class="my-2 px-6">
                        <x-jet-label for="fecha_cosecha">Fecha de cosecha</x-jet-label>
                        <x-jet-input type="date" id="fecha_cosecha" name="fecha_cosecha" class="w-full" />
                    </div>
                    <div class="my-2 px-6">
                        <x-jet-label for="area_terreno">Área del terreno</x-jet-label>
                        <x-jet-input type="number" id="area_terreno" name="area_terreno" class="w-full" />
                    </div>
                    <div class="my-2 px-6">
                        <x-jet-label for="densidad">Densidad por hectarea</x-jet-label>
                        <x-jet-input type="number" id="densidad" name="densidad" class="w-full" />
                    </div>
                    <div class="my-2 px-6">
                        <x-jet-label for="plantas_area">Numero de plantas por area</x-jet-label>
                        <x-jet-input type="number" id="plantas_area" name="plantas_area" class="w-full" />
                    </div>
                    <div class="my-2 px-6">
                        <x-jet-label for="tipo">Tipo de cultivo</x-jet-label>
                        <select name="tipo" id="tipo">
                            <option value="corta duración">Corta duración</option>
                            <option value="perenne">Perenne</option>
                        </select>
                    </div>
                  
                    <div class="my-1 flex justify-center">
                    <x-jet-button>Guardar</x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
