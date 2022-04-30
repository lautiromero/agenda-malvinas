<x-app-layout>
    {{-- banner horizontal --}}
    <div class="custom-container publi-background">
        <a href="www.google.com">
            <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
        </a>
    </div>

    {{-- breadcrumb & title container --}}
    <div class="custom-container pt-8 pb-5">
        {{-- breadcrum --}}
        <div class="text-sm py-2">
            <a href="{{ route('posts.index') }}" class="text-cyan-600 uppercase">Agenda Malvinas</a>
            <span class="text-gray-300 px-1 text-base"> > </span>
            <a href="#" class="text-cyan-600">{{ $post->category->name }}</a> 
        </div>

        {{-- titulo --}}
        <div class="pt-4">
            <h2 class="font-heading text-2xl md:text-6xl font font-bold">{{ $post->name }}</h2>
        </div>
    </div>

    {{-- content / sidebar container --}}
    <div class="flex custom-container gap-x-20 pb-8">

        {{-- content --}}
        <div class="w-full sm:w-4/5">
            <h4 class="text-xl font-normal">{{ $post->extract }}</h4>
            <x-post-date :post="$post"/>

            {{-- imagen - desc --}}
            <div>
                <div class="h-[28rem] md:h-[32rem] bg-cover bg-center hover:brightness-110" style="background-image:url({{Storage::url($post->image->url)}})"></div>
                <div class="pt-3 pb-1 border-b border-gray-300">
                    <h4 class="text-md mb-3">{{ $post->img_desc }}</h4>
                </div>
            </div>

            {{-- share - body --}}
            <div class="flex flex-col md:flex-row py-8">
                <div class="w-full md:w-1/12 pt-1">
                   <x-post-share :post="$post"/>
                </div>
                {{-- post body --}}
                <div class="w-full md:w-11/12 pt-6 md:pt-0">

                    <p class="subhead">
                    {!! $post->body !!}
                    </p>

                    <h4 class="text-lg py-6">Por <strong>{{$post->user->name}}</strong></h4>

                    <div class="py-3 border-b border-gray-300">
                        <h2 class="text-3xl font-extrabold font-heading">Tags</h2>
                    </div>
                    <div class="flex gap-x-4 py-3">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tag.show', $tag) }}" class="inline-block text-gray-600 hover:bg-cyan-500 hover:text-white px-3 py-1 text-sm font-medium border border-cyan-500 uppercase">{{$tag->name}}</a>
                        @endforeach
                    </div>

                    {{-- divisor --}}
                    <div class="hidden md:flex items-center space-x-3 py-8">
                        <div>
                            <a href="{{ route('donar') }}" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-4 py-1 rounded-md">DONAR</a>
                        </div>
                        <div class="md:flex whitespace-nowrap items-center text-gray-500 w-full">SI TE GUSTA LO QUE HACEMOS, AYUDANOS A SEGUIR HACIÉNDOLO</div>
                    </div>

                    <div class="py-3 border-b border-gray-300">
                        <h2 class="text-3xl font-extrabold font-heading">Otras noticias de {{ $post->category->name }}</h2>
                    </div>
                    <div class="pt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-10">
                        @foreach ($otras_cat as $otra)

                        <x-post-minimal :post="$otra" />
        
                        @endforeach
                    </div>

                    {{-- banner horizontal --}}
                    <div class="py-8">
                        <a href="www.google.com">
                            <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="py-3 border-b border-gray-300">
                <h2 class="text-3xl font-extrabold font-heading">Te puede interesar</h2>
            </div>

            <div class="pt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-8 gap-x-12">
                @foreach ($vieweds as $item)

                <x-post-minimal :post="$item" />

                @endforeach
            </div>

            {{-- banner horizontal --}}
            <div class="py-8">
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-home.jpg')}}" alt="">
                </a>
            </div>

            <div class="pt-3 border-b border-gray-300">
                <h2 class="text-lg border-b-4 border-cyan-600 inline">COMENTARIOS</h2>
            </div>

            <div id="comentarios">

                @if (count($comments) > 0)

                @foreach ($comments as $comment)
                    <x-comment-card :comment="$comment" />
                @endforeach 

                @else

                <div class="mt-2 p-5 bg-gray-100">
                    <h4 class="text-gray-700">Aún no hay comentarios</h4>
                </div>

                @endif

            </div>
            
            @auth
            <div class="mt-4">
                <form method="POST" action="{{ route('comment.add') }}" class="w-full p-4">
                @csrf
                    <label class="block mb-2">
                        <span class="text-gray-600">Deja tu comentario</span>
                        <textarea class="block w-full mt-1" rows="3" name="comment_body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </label>
                    <button class="px-3 py-2 text-sm text-white bg-cyan-600 rounded" type="submit">Comentar</button>
                </form>
            </div>
            @endauth
        </div>

        {{-- sidebar --}}
        <div class="hidden sm:block w-1/5">
            {{-- publi --}}
            <div class="publi-background py-5">
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-sidebar.jpg')}}" alt="">
                </a>
            </div>

            {{-- most viewed cat --}}
            <div class="py-2">
                <h4 class="text-2xl font-extrabold font-heading
                 pb-3 border-b boder-gray-300">Mas leídas de {{ $post->category->name }}</h4>

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
                <a href="www.google.com">
                    <img class="block w-full h-auto" src="{{asset('images/banner-sidebar.jpg')}}" alt="">
                </a>
            </div>
        </div>

    </div>

</x-app-layout>