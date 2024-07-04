
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
    <div class="overflow-hidden  shadow-xl sm:rounded-lg">
        <nav class="navbar bg-white">
            <div class="container-fluid">
                <span class="heading-primary-bottom">Lista de usuarios</span>
                
                    <form class="d-flex" >
                        <input wire:model="search" class="form-control me-2" type="search" placeholder="Buscar usuario" aria-label="Search" style="FontAwesome">
                    </form>
                    
            </div>
        </nav>
    </div>



   
        
    
    <div class="py-12">

        @if($users->count())
    
            <table class="min-w-full overflow-scroll  bg-white sm:rounded-lg">

                <thead class="border-b">
                    <tr>

                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Id</th>

                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nombre</th>
                            
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Email</th>
                
                        <th scope="col"class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Acciones</th>
                
                    </tr>
                </thead>
                

                <tbody>
        
                    @foreach($users as $user)
 
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->id}} </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->name}}</td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->email}}</td>
                        
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                
                                <a href="{{ route('users.edit', $user) }}">
                                    <x-jet-button type="button"  class="bt">Rol <i class="fa-sharp fa-solid fa-user-pen"></i></x-jet-button>
                                </a> 

                                    <form action="{{route('users.destroy', $user)}}" method="POST">
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

    
            {{$users->links()}}

            @else

            <div class="alert alert-danger" role="alert">
                ¡¡No existen registros con esas caracterizticas!! ☹️.
                        
            </div>

        @endif

    </div>
      

</div>



