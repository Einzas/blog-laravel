
<div class="bg-gray-900"><nav class="bg-gray-800" x-data="{open: false}">
  {{-- Menu principal --}}
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <!-- Mobile menu button-->
        
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            
                <button x-on:click="open =true"type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only"></span>
                    
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
        </div>
        {{--logo--}}
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <a href="/" class="flex-shrink-0 flex items-center">
                <img class="block lg:hidden h-8 w-auto" src="{{asset('img/logo.png')}}" alt="Workflow">
                <img class="hidden lg:block h-8 w-auto" src="{{asset('img/logo.png')}}" alt="Workflow">
           
            </a>
            {{--items del menu--}}
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                    <a href="/" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Inicio</a>

                    @foreach ($categories as $category )
                        <a href="{{route('posts.category', $category)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{$category->name}}</a>    
                    @endforeach
                    

                </div>
              </div>
            </div>
            @auth
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    {{--Notificacion--}}
                    <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only"></span>
                        
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Menu de Perfil Desplegable -->
                    <div class="ml-3 relative" x-data="{ open: false}">
                        <div>
                            <button x-on:click="open = true" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only"></span>
                                <img class="h-8 w-8 rounded-full" src="{{auth()->user()->profile_photo_url}}" alt="">
                            </button>
                        </div>
                        {{-- Items del menu desplegable del perfil --}}
                        <div x-show="open" x-on:click.away="open= false"class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            
                            <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="/admin" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Administrator</a>
                            {{-- Sistema de logout --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf    
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                  {{ __('Log Out') }}
                                </a>
                            </form>
                       </div>
                    </div>
                </div>
                @else
                    <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log In</a>
                    <a href="{{route('register')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>

            @endauth
        
        </div>
    </div>
  
    <!-- Menu Responsive - Telefono, Tables, Pantalla reducida -->
    <div class="sm:hidden" x-show="open" x-on:click.away="open=false" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            {{-- Enlaces responsive --}}
            <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Inicio</a>
      
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Categorias</a>
      
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Estrenos</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Subir</a>
        </div>
    </div>
</nav>
</div>