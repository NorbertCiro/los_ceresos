<x-app-layout>

    <style>


        .heading-primary-bottom {

            display: block;
            font-size: 18px;
            letter-spacing: 5px;
            font-weight: 700;
        }

        #bg{
            background-color: rgba(74, 224, 126, 0.726);
            color: white;
        }
        

</style>



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <br>
        <div class="overflow-hidden  shadow-xl sm:rounded-lg">
            <nav class="navbar bg-white">
                <div class="container-fluid">
                    <span class="heading-primary-bottom">
                        {{ __('Asignar rol') }}
                    </span>
                </div>
            </nav>
        </div>
    </div>

  
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @if(session('info'))

                    <div id="bg" class = "alert alert-primary">
                        
                        <strong>{{session('info')}}</strong>
                        
                    </div>

                @endif
    
                <div class="card">
                    <div class="card-body">

                        <p class="h4">Nombre</p>
                        <p class="form-control"> {{$user->name}}</p>
                        <h2> Listado de roles</h2>

                        {!! Form::model($user, ['route' => ['users.update',$user], 'method'=> 'put'])!!}    
          
                        @foreach ($roles as $role)
                        
                            <div>
                                <label>
                                    {!! Form::checkbox('roles[]', $role->id, null,['class'=>'mr-1'])!!}
                                    {{$role->name}}
                                </label>
                            </div>

                        @endforeach

                        <div class="my-1 flex justify-center">
                            <x-jet-button>
                                {!! Form::submit('Asignar rol',['class' => ''])!!}
                                {!! Form::close()!!}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    
</x-app-layout>