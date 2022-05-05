<x-app-layout>
    <div class="flex custom-container gap-x-10 pb-8">

        {{-- section --}}

        <div class="w-full sm:w-5/6">
            {{-- banner horizontal --}}
            <div class="w-full">
                <livewire:ads.horizontal :orden="14">
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
                        <a href="{{ route('posts.show', $post) }}">
                            <h2 class="text-4xl font-extrabold font-heading mb-1">{{$post->name}}</h2>
                        </a>
                        <a href="{{ route('posts.show', $post) }}">
                            <h4 class="text-xl">{{$post->extract}}</h4>
                        </a>
                        <a href="{{ route('posts.show', $post) }}" class="block h-96 w-full mt-5 bg-cover bg-center hover:brightness-110"
                         style="background-image:url({{Storage::url($post->image->url)}})"></a>
                    </article>

                    <x-post-card :post="$post" class="md:hidden"/>  

                    @else

                    <x-post-card :post="$post"/>
                        
                    @endif
                @endforeach
            </div>

            {{-- banner horizontal --}}
            <div class="w-full">
                <livewire:ads.horizontal :orden="15">
            </div>
            @if ($more->count())
                {{-- title mas/more noticias --}}
                <div class="py-3 pt-5 border-b border-gray-300">
                    <h2 class="text-3xl font-extrabold font-heading">Más de <strong class="uppercase text-2xl text-cyan-500 pl-2">{{ $name }}</strong></h2>
                </div>

                <div class="pt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-8">
                    @foreach ($more as $post)

                    <x-post-minimal :post="$post" />

                    @endforeach
                </div>
            @endif
      

        </div>



        {{-- sidebar publi --}}
        <div class="hidden sm:block w-1/6">


            {{-- publi --}}
            <div class="publi-background py-5">
                <livewire:ads.vertical :orden="17">
           </div>

            {{-- most viewed cat --}}
            <div class="py-2">
                <h4 class="text-2xl font-extrabold font-heading
                 pb-3 border-b boder-gray-300">Mas leídas de {{ $name }}</h4>

                <div class="py-3">
                    @php
                    // Creamos una bandera para hacer el top 4 mas vistas
                    $contador = 1;    
                    @endphp
                    @foreach ($cat_vieweds as $item)
                        <div class="flex py-4">
                            <a class="w-5/12 h-28 bg-cover bg-center hover:brightness-110" 
                            href="{{ route('posts.show', $item) }}" style="background-image:url({{Storage::url($item->image->url)}})">
                                <span class="h-8 w-8 flex justify-center items-center bg-cyan-600 text-white">{{$contador++}}</span>
                            </a>
                            <div class="w-7/12 pl-2">
                                <a href="{{ route('posts.show', $item) }}">
                                    <h4 class="font-semibold text-md">{{ $item->name }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- publi --}}
            <div class="publi-background py-5">
                <livewire:ads.vertical :orden="18">
            </div>

        </div>
        
    </div>

</x-app-layout>
