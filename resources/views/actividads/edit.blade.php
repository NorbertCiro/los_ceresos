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
                        {{ __('Editar Actividad') }}
                    </span>
                </div>
            </nav>
        </div>
    </div>

    
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="block">
                    <form action="{{route('actividads.update', $actividad )}}"  method="post">
                        @method('PUT')
                        @include('actividads.formulario')
                    </form>
                </div>
            </div>
        </div>    
    </div>


</x-app-layout>