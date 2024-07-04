<x-app-layout>

    <style>

        .heading-primary-bottom {
            
            display: block;
            font-size: 18px;
            letter-spacing: 5px;
            font-weight: 700;
        }

       
      
        button#hov{
             color: white;
             background-color: rgb(85, 85, 85);
        }

        button#hov:hover{
             
             background-color: rgba(128, 128, 128, 0.774);
        }

        
    </style>
   


   

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <br>
            <div class="overflow-hidden  shadow-xl sm:rounded-lg">
                <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <span class="heading-primary-bottom">
                            {{ __('Ver Cultivo') }}
                        </span>
                    </div>
                </nav>
            </div>
    
        


   
        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button id="hov" class="accordion-button focus:border-gray-900 focus:ring focus:ring-gray-300 " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Información General
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="my-1">
                                        <x-jet-label for="nombre" value="{{ __('Nombre')}}" />
                                        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $cultivo->nombre)" readonly />
                                    </div>

                                    <div class="my-1">
                                        <x-jet-label for="fecha_inicio" value="{{ __('Fecha Inicio')}}" />
                                        <x-jet-input id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio" :value="old('fecha_inicio', $cultivo->fecha_inicio)" readonly />
                                    </div>

                                    <div class="my-1">
                                        <x-jet-label for="fecha_cosecha" value="{{ __('Fecha Cosecha')}}" />
                                        <x-jet-input id="fecha_cosecha" class="block mt-1 w-full" type="date" name="fecha_cosecha" :value="old('fecha_cosecha', $cultivo->fecha_cosecha)" readonly />
                                    </div>

                                    <div class="my-1">
                                        <x-jet-label for="area_terreno" value="{{ __('Area Terreno')}}" />
                                        <x-jet-input id="area_terreno" class="block mt-1 w-full" type="number" name="area_terreno" :value="old('area_terreno', $cultivo->area_terreno)" readonly />
                                    </div>

                                    <div class="my-1">
                                        <x-jet-label for="plantas_area" value="{{ __('Plantas area')}}" />
                                        <x-jet-input id="plantas_area" class="block mt-1 w-full" type="number" name="area_terreno" :value="old('plantas_area', $cultivo->plantas_area)" readonly />
                                    </div>

                                    <div class="my-1">
                                        <x-jet-label for="densidad" value="{{ __('Densidad')}}" />
                                        <x-jet-input id="densidad" class="block mt-1 w-full" type="number" name="densidad" :value="old('densidad', $cultivo->densidad)" readonly />
                                    </div>

                                    <div class="my-1">
                                        <x-jet-label for="tipo" value="{{ __('Tipo Cultivo')}}" />
                                        <x-jet-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo', $cultivo->tipo)" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" >
                            <h2  class="accordion-header" id="headingTwo">
                                <button id="hov" class="accordion-button collapsed  focus:border-gray-900 focus:ring focus:ring-gray-300" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >
                                    Fases
                                </button>
                            </h2>

                            <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                            <!--    {{$fasesCultivo}} -->

                                    <table  class="table">
                                        <thead >

                                            <tr>
                                                <th>Nombre fase</th>

                                                <th>Fecha asignación fase</th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                            @foreach ($fasesCultivo as $faseCultivo)

                                                <tr>
                                                    <td>
                                                        {{$faseCultivo->nombre_fase}}
                                                    </td>
                                                    <td>
                                                        {{$faseCultivo->created_at}}
                                                    </td>
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="my-1 flex justify-center">

                        <a style="color" href="{{route('cultivos.index')}}">
                            <x-jet-button >Volver</x-jet-button>
                        </a>
                        
                    </div>

             
            </div>
            

       

        </div>
    </div>
</div> 

</x-app-layout>
