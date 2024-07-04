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
                            {{ __('Editar Fase') }}
                        </span>
                    </div>
                </nav>
            </div>
        </div>
 
           
                    <form action="{{route('fases.update', $fase)}}" method="post">
                        @method('PUT')
                        @include('fases.formulario')
                    </form>
   
    
</x-app-layout>