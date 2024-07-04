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
                        {{ __('Editar Cultivo') }}
                    </span>
                    </div>
                  </div>
                </nav>
          </div>
    
 
       
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-2">
                    <div class="flex justify-end">
                <livewire:agregar-cosecha-modal  :cultivo_id="$cultivo->id" />
                <a href="{{ route('cosechas.index') }}">

                    <x-jet-button>Ver cosechas</x-jet-button>
                </a>
            </div>
                </div>
            </div>
        

        

               
                    <form action="{{ route('cultivos.updateCultivo', $cultivo) }}" method="post">
                        @method('PUT')
                        @include('cultivos.form')
                    </form>
                </div>


</x-app-layout>
