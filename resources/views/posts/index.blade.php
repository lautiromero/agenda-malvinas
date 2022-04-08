<x-app-layout>
    <div class="flex custom-container space-x-8">

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
                <div class="divider flex items-center mx-auto w-4/6 py-4 text-xl font-bold text-gray-500">IMPORTANTE</div>
                <a href="#">
                    <h2 class="text-5xl	font-extrabold font-heading md:px-4 text-cyan-500">{{$importants[0]->name}}</h2>
                </a>
                <div class="divider divider-bottom flex items-center mx-auto w-4/6 py-6"></div>
            </div>

            {{-- title actualidad --}}
            <div class="flex items-center space-x-3">
                <div class="text-cyan-600 text-2xl px-4 py-1 mr-2 rounded-lg border border-cyan-500 font-extrabold font-heading">ACTUALIDAD</div>
                <div>
                    <a href="#" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-4 py-1 rounded-md">DONAR</a>
                </div>
                <div class="divider-right flex whitespace-nowrap items-center text-gray-500 w-full">SI TE GUSTA LO QUE HACEMOS, AYUDANOS A SEGUIR HACIÉNDOLO</div>
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

                <article class="bg-zinc-500 flex flex-col items-center justify-around text-center rounded-md md:row-span-3 py-6 px-2">
                    <div>
                        <p class="text-xs text-white mb-6">
                            <a href="#" class="uppercase">{{$post->category->name}}</a>
                            <span class="text-white"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                        </p> 
                        <a href="#">
                            <h2 class="text-4xl text-white font-extrabold font-heading mb-1">{{$post->name}}</h2>
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
                        <h2 class="text-xl text-white font-bold font-heading mb-1 leading-none">{{$post->name}}</h2>
                    </a>
                    <div class="flex justify-around items-center">
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
                        <h2 class="text-xl text-zinc-500 font-bold font-heading mb-1 leading-none">{{$post->name}}</h2>
                    </a>
                    <div class="flex justify-around items-center">
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
                <div class="divider flex items-center mx-auto w-4/6 py-4 text-xl font-bold text-gray-500">IMPORTANTE</div>
                <a href="#">
                    <h2 class="text-5xl	font-extrabold font-heading md:px-4 text-cyan-500">{{$importants[1]->name}}</h2>
                </a>
                <div class="divider divider-bottom flex items-center mx-auto w-4/6 py-6"></div>
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
                <div class="divider-right flex whitespace-nowrap items-center text-gray-500 w-full">SI TE GUSTA LO QUE HACEMOS, AYUDANOS A SEGUIR HACIÉNDOLO</div>
            </div>

            <div class="py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-8">
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
                <img class="block w-full h-auto" src="{{asset('images/banner-sidebar.jpg')}}" alt="">
            </a>

        </div>
        
    </div>
</x-app-layout>
