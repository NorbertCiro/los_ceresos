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
                    {{ __('Crear Fase') }}
                  </span>
              </div>
          </nav>
      </div>
    </div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">

                <form action="{{ route('fases.store') }}" method="post">

                    @csrf

                    <div class="my-2 px-6">
                        <x-jet-label for="nombre">Nombre</x-jet-label>
                        <x-jet-input type="text" id="nombre" name="nombre" class="w-full" />
                    </div>

                    <div class="my-1 flex justify-center">
                    <x-jet-button>Guardar</x-jet-button>
                    </div>

                </form>

            </div>
        </div>
    </div>


</x-app-layout>
