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
                        <span class="heading-primary-bottom">Fases de los cultivos</span>
                    </div>
                </nav>
            </div>
        </div>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-2">

                    <div class="flex justify-end">
                        <a href="{{ route('fases.create') }}">
                            <x-jet-button>Crear</x-jet-button>
                        </a>

                        <a href="{{ route('download-pdf-fases') }}" target="_blank" ><button id="ex">Exportar a pdf</button> </a>
                    </div>

                </div>
            </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">

                                    <thead class="border-b">

                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Nombre
                                            </th>

                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Acciones
                                            </th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($fases as $fase)

                                            <tr class="border-b">

                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $fase->nombre }}
                                                </td>

                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    
                                                    <a href="{{ route('fases.show', $fase) }}">
                                                        <x-jet-button>Ver</x-jet-button>
                                                    </a>
                                                    <a href="{{ route('fases.edit', $fase) }}">
                                                        <x-jet-button>Editar</x-jet-button>
                                                    </a>

                                                    <form action="{{route('fases.destroy', $fase)}}" method="POST">
                                                    
                                                        @csrf

                                                        @method('DELETE')

                                                        <x-jet-danger-button>
                                                            Eliminar
                                                        </x-jet-danger-button>

                                                    </form>

                                                </td>
                                            
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>