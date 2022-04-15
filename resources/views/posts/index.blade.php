<x-app-layout>
    <div class="flex custom-container space-x-8 pb-8">

        {{-- section --}}

        <div class="w-full sm:w-5/6">
            {{-- banner home --}}
            <div class="w-full">
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
                </a>
            </div>

            {{-- content --}}
            <div class="py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-8">
                @foreach ($main as $post)
                    @if ($loop->first)

                    <article class="hidden md:block md:col-span-2 md:row-span-2">
                        <p class="text-xs">
                            <a href="#" class="uppercase">{{$post->category->name}}</a>
                            <span class="text-gray-600"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                        </p> 
                        <a href="#">
                            <h2 class="text-4xl font-extrabold font-heading mb-1">{{$post->name}}</h2>
                        </a>
                        <a href="#">
                            <h4 class="text-xl">{{$post->extract}}</h4>
                        </a>
                        <a href="#" class="block h-96 w-full mt-5 bg-cover bg-center"
                         style="background-image:url({{Storage::url($post->image->url)}})"></a>
                    </article>

                    <x-post-card :post="$post" class="md:hidden"/>  

                    @else

                    <x-post-card :post="$post"/>
                        
                    @endif
                @endforeach
            </div>

            {{-- banner home --}}
            <div class="w-full">
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
                </a>
            </div>

            {{-- divider importante --}}

            <div class="py-10 text-center justify-center">
                <div class="divider flex items-center mx-auto w-5/6 md:w-4/6 py-4 text-xl font-bold text-gray-500">IMPORTANTE</div>
                <a href="#">
                    <h2 class="text-4xl md:text-5xl	font-extrabold font-heading md:px-4 text-cyan-500">{{$importants[0]->name}}</h2>
                </a>
                <div class="divider divider-bottom flex items-center mx-auto w-5/6 md:w-4/6 py-6"></div>
            </div>

            {{-- title actualidad --}}
            <div class="flex items-center space-x-3">
                <div class="text-cyan-600 text-2xl px-4 py-1 mr-2 rounded-lg border border-cyan-500 font-extrabold font-heading">ACTUALIDAD</div>
                <div>
                    <a href="#" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-4 py-1 rounded-md">DONAR</a>
                </div>
                <div class="hidden divider-right md:flex whitespace-nowrap items-center text-gray-500 w-full">SI TE GUSTA LO QUE HACEMOS, AYUDANOS A SEGUIR HACIÉNDOLO</div>
            </div>

            <div class="py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-8">
                @foreach ($actual as $post)

                <x-post-card :post="$post" />

                @endforeach

                <div class="w-full h-80 bg-sky-500"></div>
                <div class="w-full h-80 bg-sky-500"></div>
                <div class="w-full h-80 bg-sky-500"></div>
            </div>

            {{-- title opinion --}}
            <div class="flex items-center space-x-3 mt-6">
                <div class="text-cyan-600 text-3xl px-5 py-1 mr-4 rounded-lg border border-cyan-500 font-extrabold font-heading">OPINIÓN</div>

                <div class="divider divider-bottom flex items-center w-full"></div>
                <div class="ml-10">
                    <a href="#" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-4 py-1 rounded-md">DONAR</a>
                </div>
            </div>

            <div class="py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-y-6 gap-x-8">
                
            @foreach ($opinions as $post)
                @if ($loop->first)

                <article class="md:col-span-2 md:row-span-3">
                    <a href="#" class="block h-80 w-full bg-cover bg-center"
                    style="background-image:url({{Storage::url($post->image->url)}})"></a>
                    <p class="text-medium mt-5">
                        <a href="#" class="uppercase">{{$post->category->name}}</a>
                        <span class="text-gray-600"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                    </p> 
                    <a href="#">
                        <h2 class="text-5xl font-extrabold font-heading mb-1">{{$post->name}}</h2>
                    </a>
                    <p class="text-medium font-bold uppercase">
                        Por {{$post->user->name}}
                    </p>
                </article>

                @elseif ($loop->index == 1)

                <article class="bg-zinc-500 flex flex-col items-center justify-around text-center rounded-md md:row-span-3 py-5 px-3">
                    <div>
                        <p class="text-xs text-white mb-6">
                            <a href="#" class="uppercase">{{$post->category->name}}</a>
                            <span class="text-white"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                        </p> 
                        <a href="#">
                            <h2 class="text-3xl text-white font-extrabold font-heading mb-1">{{$post->name}}</h2>
                        </a>
                    </div>
                    <div>
                        <img class="h-28 w-28 rounded-full mx-auto mb-6" src="{{ $post->user->profile_photo_url }}" alt="foto de perfil">
                        <p class="text-medium font-bold text-white uppercase">
                            Por {{$post->user->name}}
                        </p>
                    </div>
                </article>

                @elseif ($loop->odd)

                <article class="bg-cyan-500 flex flex-col items-center justify-around text-center rounded-md space-y-3 py-4 px-2">
                  
                    <p class="text-xs text-white">
                        <a href="#" class="uppercase">{{$post->category->name}}</a>
                        <span class="text-white inline-block"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                    </p> 
                    <a href="#">
                        <h2 class="text-xl text-white font-bold font-heading leading-none">{{$post->name}}</h2>
                    </a>
                    <div class="flex w-full px-4 items-center justify-center md:justify-start">
                        <img class="h-12 w-12 rounded-full" src="{{ $post->user->profile_photo_url }}" alt="foto de perfil">
                        <p class="text-xs font-bold text-white pl-3 uppercase">
                            Por {{$post->user->name}}
                        </p>
                    </div>
                </article>

                @else

                <article class="border-2 border-zinc-400 flex flex-col items-center justify-around text-center rounded-md space-y-3 py-4 px-2">
                  
                    <p class="text-xs text-zinc-500">
                        <a href="#" class="uppercase">{{$post->category->name}}</a>
                        <span class="text-zinc-500 inline-block"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                    </p> 
                    <a href="#">
                        <h2 class="text-xl text-zinc-500 font-bold font-heading leading-none">{{$post->name}}</h2>
                    </a>
                    <div class="flex w-full px-4 items-center justify-center md:justify-start">
                        <img class="border border-zinc-400 h-12 w-12 rounded-full" src="{{ $post->user->profile_photo_url }}" alt="foto de perfil">
                        <p class="text-xs font-bold text-zinc-500 pl-3 uppercase">
                            Por {{$post->user->name}}
                        </p>
                    </div>
                </article>
                    
                @endif
            @endforeach
            </div>

            {{-- banner home --}}
            <div class="w-full py-5">
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
                </a>
            </div>

            {{-- divider importante --}}

            <div class="py-10 text-center justify-center">
                <div class="divider flex items-center mx-auto w-5/6 md:w-4/6 py-4 text-xl font-bold text-gray-500">IMPORTANTE</div>
                <a href="#">
                    <h2 class="text-4xl md:text-5xl	font-extrabold font-heading md:px-4 text-cyan-500">{{$importants[1]->name}}</h2>
                </a>
                <div class="divider divider-bottom flex items-center mx-auto w-5/6 md:w-4/6 py-6"></div>
            </div>

            {{-- banner home --}}
            <div class="w-full py-5">
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
                </a>
            </div>

            {{-- title mas/more noticias --}}
            <div class="flex items-center space-x-3 pt-10">
                <div class="text-cyan-600 whitespace-nowrap text-2xl px-4 py-1 mr-2 rounded-lg border border-cyan-500 font-extrabold font-heading">MÁS NOTICIAS</div>
                <div>
                    <a href="#" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-4 py-1 rounded-md">DONAR</a>
                </div>
                <div class="hidden divider-right md:flex whitespace-nowrap items-center text-gray-500 w-full">SI TE GUSTA LO QUE HACEMOS, AYUDANOS A SEGUIR HACIÉNDOLO</div>
            </div>

            <div class="pt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-8">
                @foreach ($more as $post)

                <x-post-card :post="$post" />

                @endforeach

                <div class="w-full h-80 bg-sky-500"></div>
                <div class="w-full h-80 bg-sky-500"></div>
                <div class="w-full h-80 bg-sky-500"></div>
            </div>



        </div>



        {{-- sidebar publi --}}
        <div class="hidden sm:block w-1/6">

            <a href="www.google.com">
                <img class="block w-full h-auto sticky top-36" src="{{asset('images/banner-sidebar.jpg')}}" alt="">
            </a>

        </div>
        
    </div>

    <div class="custom-container">
    
        <div class="w-full text-center pt-8 pb-4">
            <div class="text-cyan-600 inline whitespace-nowrap text-3xl px-4 py-2 rounded-lg border border-cyan-500 font-extrabold font-heading">MÁS LEÍDAS</div>
        </div>

        <div class="py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-y-6 gap-x-8">

        @php
        // Creamos una bandera para hacer el top 4 mas vistas
        $contador = 1;    
        @endphp

        @foreach($vieweds as $post)

        <article class="w-full">
            <a href="#" class="block h-48 w-full bg-cover bg-center"
            style="background-image:url({{Storage::url($post->image->url)}})">
            </a>
            <p class="text-xs pt-2 w-full flex items-center">
                <span class="text-cyan-600 text-6xl font-extrabold font-heading pr-2 pb-1">{{$contador++}}</span>
                <a href="#" class="uppercase">{{$post->category->name}}</a>
                <span class="text-gray-600"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
            </p> 
            <a href="#" class="w-full">
                <h2 class="text-2xl font-extrabold font-heading">{{$post->name}}</h2>
            </a>
        </article>

        @endforeach
        </div>
    </div>

    <div class="flex custom-container space-x-8 py-8">
    
        <div class="w-full sm:w-4/5">
            
            {{-- title video --}}
            <div class="flex items-center space-x-3 py-6">
                <div class="text-cyan-600 whitespace-nowrap text-2xl px-4 py-1 mr-2 rounded-lg border border-cyan-500 font-extrabold font-heading">VIDEO DESTACADO</div>
                <div>
                    <a href="#" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-4 py-1 rounded-md">DONAR</a>
                </div>
                <div class="hidden divider-right md:flex whitespace-nowrap items-center text-gray-500 w-full">SI TE GUSTA LO QUE HACEMOS, AYUDANOS A SEGUIR HACIÉNDOLO</div>
            </div>

            <div class="min-h-80 sm:h-[26rem] w-full bg-cover bg-center md:bg-left px-4 sm:px-7 py-5 sm:py-8"
            style="background-image:url({{Storage::url($video->image->url)}})">
                <div class="bg-sky-500/90 h-full sm:w-2/5 p-3 sm:p-6 flex justify-center items-center flex-col text-center">
                    <p class="text-xs pt-2 flex items-center">
                        <a href="#" class="uppercase text-white">{{$video->category->name}}</a>
                        <span class="text-white"> - {{\Carbon\Carbon::parse($video->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                    </p>
                    <a href="#" class="w-full pb-6 pt-4">
                        <h2 class="text-4xl text-white font-extrabold font-heading">{{$post->name}}</h2>
                    </a>
                    {{-- <x-forkawesome-play class="text-white border-4 font-medium border-white rounded-full p-6" /> --}}
                    <a href="">
                        <img class="text-white h-20 w-auto" src="{{asset('images/go-play.svg')}}" alt="Agenda malvinas">
                    </a>
                </div>
            </div>
        </div>


        {{-- sidebar publi --}}
        <div class="hidden sm:flex items-center pt-3 w-1/5">

            <a href="www.google.com">
                <img class="block w-full h-auto" src="{{asset('images/banner-sidebar.jpg')}}" alt="">
            </a>

        </div>
    </div>

</x-app-layout>
