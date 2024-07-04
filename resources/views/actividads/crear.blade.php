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
                        {{ __('Crear Actividad') }}
                    </span>
                </div>
            </nav>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">

                <form action="{{ route('actividads.store') }}" method="post">
                    @csrf

                    <div class="my-2 px-6">
                        <x-jet-label for="nombre">Nombre</x-jet-label>
                        <x-jet-input type="text" id="nombre" name="nombre" class="w-full" />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="estado">Estado</x-jet-label>
                        <select name="estado" id="estado">
                            <option value="finalizado">Finalizado</option>
                            <option value="en proceso">En proceso</option>
                            <option value="pendiente">Pendiente</option>
                        </select>
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="fecha_realizacion">Fecha Realizacion</x-jet-label>
                        <x-jet-input type="date" id="fecha_realizacion" name="fecha_realizacion" class="w-full" />
                    </div>

                    <div class="my-2 px-6">
                        <x-jet-label for="nombre">Valor por hora</x-jet-label>
                        <x-jet-input type="text" id="valor" name="valor" class="w-full" />
                    </div>
                    
                    

                    <div class="my-2 px-6">
                        <x-jet-label for="observacion">Observacion</x-jet-label>
                        <x-jet-input type="text" id="observacion" name="observacion" class="w-full" />
                    </div>

                    <div   class="my-1 flex justify-center">
                        <x-jet-button>Guardar</x-jet-button>
                    </div>

                </form>

            </div>
        </div>
    </div>


</x-app-layout>
