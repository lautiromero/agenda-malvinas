<x-app-layout>
    <div class="flex custom-container gap-x-10 pb-8">

        {{-- section --}}
        <div class="w-full sm:w-5/6">
            {{-- banner horizontal --}}
            <div class="w-full">
                @livewire('ads.horizontal')
            </div>


            {{-- content --}}
            <div class="py-6">

            @if ($posts->count())
                
                <h2 class="text-xl md:text-2xl font-bold py-4 border-b border-gray-200">Mostrando resultados de: "{{$texto}}"</h2>
            
                @foreach ($posts as $post)

                <article class="md:flex gap-x-4 py-3">

                    <div class="w-full md:w-4/12">
                        <a href="{{ route('posts.show', $post) }}" class="block h-48 w-full bg-cover bg-center hover:brightness-110"
                        style="background-image:url({{Storage::url($post->image->url)}})"></a>
                    </div>
                    <div class="w-full md:w-8/12">
                        <p class="pt-2 md:pt-0 text-xs">
                            <a href="{{ route('category.show', $post->category) }}" class="uppercase">{{$post->category->name}}</a>
                            <span class="text-gray-600"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                        </p> 
                        <a href="{{ route('posts.show', $post) }}">
                            <h2 class="text-2xl md:text-3xl font-extrabold font-heading">{{$post->name}}</h2>
                        </a>
                        <a href="{{ route('posts.show', $post) }}">
                            <h4 class="md:text-xl h-5 md:h-auto truncate md:whitespace-normal md:text-clip">{{$post->extract}}</h4>
                        </a>
                    </div>
                </article>
                @endforeach

            @else

                <h2 class="text-xl md:text-2xl font-bold py-8">No se encontraron resultados de: "{{$texto}}"</h2>

            @endif

              
            </div>

            {{ $posts->links() }}
        </div>

        {{-- sidebar publi --}}
        <div class="hidden sm:block w-1/6 publi-background py-2">

            @livewire('ads.vertical')

        </div>
        
    </div>

</x-app-layout>
