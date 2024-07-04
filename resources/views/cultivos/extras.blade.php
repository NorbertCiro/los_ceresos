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
                            {{ __('Editar') }} {{ $cultivo->nombre }}
                        </span>
                    </div>
                </nav>
            </div>
        </div>
 


        <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2">
                <div class="flex justify-end">
                <a href="{{ route('cultivos.reporte', $cultivo) }}" target="_blank">
                    <button id="ex">Generar Reporte</button>
                </a>
                </div>
            </div>
        </div>
      

            
           
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">


           
            <div class="my-6">
                <form action="{{ route('cultivos.update', $cultivo) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="my-1">
                        <x-jet-label for="fase">Selecciona una fase</x-jet-label>
                        <select name="fase" id="fase">
                            @foreach ($fases as $fase)
                                <option value="{{ $fase->id }}">{{ $fase->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-jet-button>Agregar</x-jet-button>
                </form>
            </div>

            @if (count($cultivo_fases))
                <div class="my-6">

                    <div class="mt-5 mb-3">
                        <h3 class="h3">
                            Fases
                        </h3>
                    </div>

                    @foreach ($cultivo_fases as $cultivo_fase)
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="justify-between d-flex align-items-center">
                                    <h4 class="h4 mb-0">
                                        {{ $cultivo_fase->nombre }}
                                        <!-- {{ $cultivo_fase->cultivo_fase_id }} -->
                                    </h4>
                                    <!-- {{ $cultivo_fase->cultivo_id }} -->
                                    <form action="{{ route('destroyCultivoFase') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="cultivo_fase_id"
                                            value="{{ $cultivo_fase->cultivo_fase_id }}">
                                        <input type="hidden" name="cultivo_id"
                                            value="{{ $cultivo_fase->cultivo_id }}">
                                        {{-- <input type="hidden" name="cultivo_costo_id"
                                            value="{{ $cultivo_fase->cultivo_costo_id }}"> --}}
                                        <x-jet-danger-button>
                                            Eliminar
                                        </x-jet-danger-button>

                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="justify-end d-flex align-center">
                                        <livewire:agregar-insumo-modal :cultivo_fase_id="$cultivo_fase->cultivo_fase_id" />
                                        <livewire:agregar-actividad-modal :cultivo_fase_id="$cultivo_fase->cultivo_fase_id" />
                                        <livewire:agregar-costos-modal :cultivo_fase_id="$cultivo_fase->cultivo_fase_id" />
                                        <livewire:ver-cultivo-fase-modal :cultivo_fase_id="$cultivo_fase->cultivo_fase_id" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

            </div>
        </div>
    </div>

     
</x-app-layout>




{{-- {{$actividad}} --}}
{{-- {{$insumo}} --}}




{{-- {{$actividad}} --}}
{{-- {{$insumo}} --}}
