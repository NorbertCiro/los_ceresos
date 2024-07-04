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
                        {{ __('Ver Fases') }}
                    </span>
                </div>
            </nav>
        </div>
    </div>
 
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                    <div class="my-4 px-6">
                        <x-jet-label for="nombre" value="{{ __('Nombre')}}" />
                        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $fase->nombre)" autofocus />
                    </div>

                    <div class="my-1 flex justify-center">
                        <a href="{{route('fases.index')}}">
                                <x-jet-button> Volver</x-jet-button>
                        </a>
                    </div>
                        
            </div>
        </div>
    </div>


</x-app-layout>