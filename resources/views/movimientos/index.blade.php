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
                    <span class="heading-primary-bottom">Movimientos</span>
                </div>
        </div>
        </nav>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2">
                <div class="flex justify-end">
                    <livewire:agregar-movimiento-insumo-modal /><br>
                    <a href="{{ route('download-pdf-movimientos') }}" target="_blank"> <button id="ex">Exportar a
                            Pdf </button> </a>
                </div>
            </div>

            <div class="max-w-7xl">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="border-b">
                                            <tr>
                                                {{-- <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Insumo Id
                                                </th> --}}
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Nombre Insumo
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Fecha
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Cantidad
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Precio Unitario Insumo
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Precio Total
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Tipo de movimiento
                                                </th>
                                                {{-- <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Observación
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($movimientos as $movimiento)
                                                <tr class="border-b">
                                                    {{-- <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $movimiento->insumo_id }}
                                                    </td> --}}
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $movimiento->insumo_nombre }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $movimiento->fecha }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $movimiento->cantidad }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $movimiento->insumo_precio }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $movimiento->precio }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        @if ($movimiento->tipo == 'entrada')
                                                            Entrada
                                                        @elseif ($movimiento->tipo == 'devolucion')
                                                            Devolucion
                                                        @else
                                                            Salida
                                                        @endif
                                                    </td>

                                                    {{-- <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $movimiento->observacion }}
                                                    </td> --}}
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <a href="{{ route('movimientos.show', $movimiento) }}">
                                                            <x-jet-button>Info. General</x-jet-button>
                                                        {{-- </a>
                                                        <a href="{{ route('movimientos.edit', $movimiento) }}">
                                                            <x-jet-button>Editar</x-jet-button>
                                                        </a> --}}

                                                        <form action="{{ route('movimientos.destroy', $movimiento) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <x-jet-danger-button type="submit"
                                                                class="display:containt">Eliminar
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
    </div>

</x-app-layout>



{{-- {{$fase}} --}}
{{-- {{$actividad}} --}}
{{-- {{$movimiento}} --}}
