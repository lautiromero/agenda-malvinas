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

                    <div class="md:hidden">
                        <x-post-card :post="$post"/>  
                    </div>

                    @else

                    <x-post-card :post="$post" />
                        
                    @endif
                @endforeach
            </div>

            {{-- banner home --}}
            <div class="w-full">
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
                </a>
            </div>

            {{-- divider --}}

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

            <div class="py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-10">
                @foreach ($actual as $post)

                <x-post-card :post="$post" />

                @endforeach

                <div class="w-full h-80 bg-sky-500"></div>
                <div class="w-full h-80 bg-sky-500"></div>
                <div class="w-full h-80 bg-sky-500"></div>
            </div>

            {{-- title actualidad --}}
            <div class="flex items-center space-x-3">
                <div class="text-cyan-600 text-2xl px-4 py-1 mr-4 rounded-lg border border-cyan-500 font-extrabold font-heading">OPINIÓN</div>

                <div class="divider divider-bottom flex items-center w-full"></div>
                <div class="ml-10">
                    <a href="#" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-4 py-1 rounded-md">DONAR</a>
                </div>
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
