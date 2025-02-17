<style>
    .text{
        color:black;
        text-align: center;
        margin-left: 1rem;
        display: block;
        font-size: 10px;
        letter-spacing: 2px;
        font-weight: 200;
    }
</style>


<nav  x-data="{ open: false }" class="navbar navbar-default navbar-fixed-top bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />

                    </a>
                    <h1 class='text'>Finca AgroSENA 4.0</h1>

                </div>




                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">



                    @can('cultivos index')
                    <x-jet-nav-link href="{{ route('cultivos.index') }}" :active="request()->routeIs('cultivos*')">
                    @endcan
                        {{ __('Cultivos') }}
                    </x-jet-nav-link>

                    @can('Inicio actividades')
                    <x-jet-nav-link href="{{ route('actividads.index') }}" :active="request()->routeIs('actividads*')">
                    @endcan
                        {{ __('Actividades') }}
                    </x-jet-nav-link>

                    @can('Inicio insumos')
                    <x-jet-nav-link href="{{ route('insumos.index') }}" :active="request()->routeIs('insumos*')">
                    @endcan
                        {{ __('Insumos') }}
                    </x-jet-nav-link>

                    @can('Inicio fases')
                    <x-jet-nav-link href="{{ route('fases.index') }}" :active="request()->routeIs('fases*')">
                    @endcan
                        {{ __('Fases') }}
                    </x-jet-nav-link>
                    {{-- <x-jet-nav-link href="{{ route('costos.index') }}" :active="request()->routeIs('costos*')">
                        {{ __('Costos') }}
                    </x-jet-nav-link> --}}
                    @can('Inicio movimientos')
                    <x-jet-nav-link href="{{ route('movimientos.index') }}" :active="request()->routeIs('movimientos*')">
                    @endcan
                        {{ __('Movimientos') }}
                    </x-jet-nav-link>

                    @can('users.index')
                    <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users*')">
                    @endcan
                        {{ __('Usuarios') }}
                    </x-jet-nav-link>




                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    @auth
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    @else

                    <x-jet-nav-link   href="{{ route('login') }}" :active="request()->routeIs('login')">

                            {{ __('Iniciar Sesion') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">

                            {{ __('Registrarse') }}
                        </x-jet-nav-link>



                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">



            @can('cultivos index')
            <x-jet-responsive-nav-link href="{{ route('cultivos.index') }}" :active="request()->routeIs('cultivos*')">
            @endcan
                {{ __('Cultivos') }}
            </x-jet-responsive-nav-link>
            @can('Inicio actividades')
            <x-jet-responsive-nav-link href="{{ route('actividads.index') }}" :active="request()->routeIs('actividads*')">
            @endcan
                {{ __('Actividades') }}
            </x-jet-responsive-nav-link>
            @can('Inicio insumos')
            <x-jet-responsive-nav-link href="{{ route('insumos.index') }}" :active="request()->routeIs('insumos*')">
            @endcan
                {{ __('Insumos') }}
            </x-jet-responsive-nav-link>

            @can('Inicio fases')
            <x-jet-responsive-nav-link href="{{ route('fases.index') }}" :active="request()->routeIs('fases*')">
            @endcan
                {{ __('Fases') }}
            </x-jet-responsive-nav-link>
            {{-- <x-jet-responsive-nav-link href="{{ route('costos.index') }}" :active="request()->routeIs('costos*')">
                {{ __('Costos') }}
            </x-jet-responsive-nav-link> --}}
            @can('Inicio movimientos')
            <x-jet-responsive-nav-link href="{{ route('movimientos.index') }}" :active="request()->routeIs('movimientos*')">
            @endcan
                {{ __('Movimientos') }}
            </x-jet-responsive-nav-link>
            @can('users.index')
            <x-jet-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users*')">
            @endcan
                {{ __('Usuarios') }}
            </x-jet-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif

            </div>
    </div>
    @else
    <div class="py-1 border-t border-gray-200">
        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            {{ __('Iniciar Sesion') }}
        </x-jet-responsive-nav-link>

        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">

            {{ __('Registrarse') }}
        </x-jet-responsive-nav-link>
    </div>
@endauth
</div>
</nav>
