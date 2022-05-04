<!-- This example requires Tailwind CSS v2.0+ -->
<nav x-data="{ open : false, search : false }">
    <div class="mx-auto px-2 sm:px-6 lg:px-14">
      <div class="relative flex items-center justify-between h-14 sm:h-auto sm:pt-4">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

            <!-- Mobile menu button-->
          <button type="button" x-on:click="open=true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-cyan-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Abrir menu</span>
            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center sm:hidden">

          <!-- Mobile menu button-->
        <button type="button" x-on:click="search=true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-cyan-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-search" aria-expanded="false">
          <span class="sr-only">Abrir menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <x-akar-search class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" />


        </button>
      </div>
        {{-- redes --}}
        <div class="absolute hidden sm:flex space-x-0.5 right-6 top-4">
          <a href="https://twitter.com/Agenda_Malvinas" target="_blank"><x-forkawesome-twitter-square class="w-6 text-gray-500"/></a>
          <a href="https://www.facebook.com/AgendaMalvinas" target="_blank"><x-forkawesome-facebook-square class="w-6 text-gray-500"/></a>
          <a href="https://www.instagram.com/agendamalvinas/" target="_blank"><x-forkawesome-instagram class="w-6 text-gray-500"/></a>
          <a href="https://www.youtube.com/channel/UCMAAu193aa8b_V31Cz8ETgw" target="_blank"><x-forkawesome-youtube-square class="w-6 text-gray-500"/></a>
        </div>
        {{-- header --}}
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-between">
            <div class="hidden sm:flex space-x-7 items-center sm:ml-6 w-3/12">

                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <form action="{{ route('posts.search') }}" method="GET">
                    <label class="relative block">
                      <span class="sr-only">Buscar</span>
                      <button type="submit" class="absolute inset-y-0 left-0 flex items-center pl-2">
                          <x-akar-search class="h-4 w-4 text-gray-600" viewBox="0 0 20 20" />
                      </button>
                      <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-cyan-500 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm" placeholder="Buscar..." type="text" name="texto"/>
                    </label>
                  </form>
                  
                  <a href="{{ route('contacto') }}" class="text-gray-600 hover:bg-cyan-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium border border-cyan-500">CONTACTO</a>
            </div>

            {{-- logo --}}

            <div class="flex-shrink-0 flex flex-1 flex-col items-center justify-center pt-1 sm:pt-4">
                <a href="{{ route('posts.index') }}">
                    <img class="block lg:hidden h-8 w-auto" src="{{asset('images/logo.svg')}}" alt="Agenda malvinas">
                    <img class="hidden lg:block h-16 w-auto" src="{{asset('images/logo.svg')}}" alt="Agenda malvinas">
                </a>
                {{-- widget --}}
                <div class="hidden sm:block mx-auto mt-2 pl-3 text-base text-gray-500">
                  <div class="inline-block capitalize">
                    <x-akar-calendar class="w-3 inline pb-1" />
                    @php
                        use Illuminate\Support\Carbon;
                        $date = Carbon::now();
                    @endphp
                    {{$date->translatedFormat('l j \d\e F');}}
                    |
                  </div>
                    @livewire('weather-component')
                </div>
            </div>

          <div class="hidden sm:flex w-3/12 space-x-7 items-center justify-end sm:mr-6">

              <div class="flex space-x-7">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ route('donar') }}" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">DONACIÓN</a>
              </div>

                {{-- perfil menu --}}

              @auth
              <div class="flex items-center justify-center pr-2">

                  <!-- Profile dropdown -->
                  <div class="ml-3 relative" x-data="{ open:false }">
                    <div>
                        <button x-on:click="open=true" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-3 focus:ring-offset-3 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Abrir menu de usuario</span>
                        <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="foto de perfil">
                        </button>
                    </div>

                    <div x-show="open" x-on:click.away="open=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-cyan-500 ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        @can('admin.home')
                          <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Panel</a>
                        @endcan
                        
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Mi perfil</a>

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">Cerrar sesión</a>
                        </form>

                    </div>
                  </div>
              </div>

              @else

              <div class="hidden sm:flex items-center">
                <a href="{{ route('login') }}" class="hidden sm:block text-gray-600 hover:bg-cyan-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium border border-cyan-500">INGRESAR</a>    
              </div>

              @endauth
          </div>
        </div>

     

      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden bg-cyan-500 uppercase divide-y divide-cyan-300 shadow" id="mobile-menu" x-show="open" x-on:click.away="open=false">
      <div class="px-2 pt-3 pb-3 space-y-1">
        {{-- <a href="#" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a> --}}

        <a href="{{ route('contacto') }}" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-1 rounded-md text-base font-medium">Contacto</a>
        
        <a href="{{ route('donar') }}" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-1 rounded-md text-base font-medium">Donación</a>
        
        @auth
          @can('admin.home')
            <a href="{{ route('admin.home') }}" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-1 rounded-md text-base font-medium">Panel</a>
          @endcan
            <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <a href="{{ route('logout') }}" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-1 rounded-md text-base font-medium">Salir</a>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-1 rounded-md text-base font-medium">Ingresar</a>
        @endauth
      </div>
      <div class="px-2 pt-3 pb-3 space-y-1">
        
      @foreach ($categories as $category)
        @if (!$loop->first)
        <a href="{{ route('category.show', $category) }}" class="text-white hover:bg-gray-700 hover:text-white block px-3 py-1 rounded-md text-base font-medium">{{$category->name}}</a>
        @endif
      @endforeach

      </div>
    </div>

    <!-- Search Modal -->
    <div id="mobile-search" x-show="search" x-on:click.away="search=false" class="fixed top-12 left-0 right-0 z-50 sm:hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
      <div class="relative w-full h-full">
          <!-- Modal content -->
          <div class="relative bg-cyan-500 shadow p-2 py-4">
            <form action="{{ route('posts.search') }}" method="GET">
              <label class="relative block">
                <span class="sr-only">Buscar</span>
                <button type="submit" class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <x-akar-search class="h-4 w-4 text-gray-600" viewBox="0 0 20 20" />
                </button>
                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-cyan-500 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm" placeholder="Buscar..." type="text" name="texto"/>
              </label>
            </form>
          </div>
      </div>
    </div>

    {{-- Category menu --}}
    <div class="hidden sm:flex justify-around px-6 w-full bg-cyan-500 border-t border-cyan-600">
      @foreach ($categories as $category)
        @if (!$loop->first)
        <a href="{{ route('category.show', $category) }}" class="inline-block text-white py-3 uppercase text-sm tracking-wide lg:px-3 hover:bg-cyan-400/20">{{$category->name}}</a>
        @endif
      @endforeach
    </div>

</nav>
