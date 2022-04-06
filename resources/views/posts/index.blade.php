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
                            <h2 class="text-5xl font-extrabold font-heading mb-1">{{$post->name}}</h2>
                        </a>
                        <a href="#">
                            <h4 class="text-2xl">{{$post->extract}}</h4>
                        </a>
                        <a href="#" class="block h-96 w-full mt-5 bg-cover bg-center"
                         style="background-image:url({{Storage::url($post->image->url)}})"></a>
                    </article>

                    <article class="md:hidden w-full">
                        <a href="#" class="block h-48 w-full bg-cover bg-center"
                        style="background-image:url({{Storage::url($post->image->url)}})">
                        </a>
                        <p class="text-xs pt-2" class="w-full">
                            <a href="#" class="uppercase">{{$post->category->name}}</a>
                            <span class="text-gray-600"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                        </p> 
                        <a href="#" class="w-full">
                            <h2 class="text-3xl font-extrabold font-heading">{{$post->name}}</h2>
                        </a>
                    </article>
                    @else

                    <article class="w-full">
                        <a href="#" class="block h-48 w-full bg-cover bg-center"
                        style="background-image:url({{Storage::url($post->image->url)}})">
                        </a>
                        <p class="text-xs pt-2" class="w-full">
                            <a href="#" class="uppercase">{{$post->category->name}}</a>
                            <span class="text-gray-600"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
                        </p> 
                        <a href="#" class="w-full">
                            <h2 class="text-3xl font-extrabold font-heading">{{$post->name}}</h2>
                        </a>
                    </article>
                        
                    @endif
                @endforeach
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
