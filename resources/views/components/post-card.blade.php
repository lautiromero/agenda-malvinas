@props(['post'])
<article {{ $attributes->merge(['class' => 'w-full']) }}>
    <a href="#" class="block h-48 w-full bg-cover bg-center"
    style="background-image:url({{Storage::url($post->image->url)}})">
    </a>
    <p class="text-xs pt-2" class="w-full">
        <a href="#" class="uppercase">{{$post->category->name}}</a>
        <span class="text-gray-600"> - {{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
    </p> 
    <a href="#" class="w-full">
        <h2 class="text-2xl font-extrabold font-heading">{{$post->name}}</h2>
    </a>
</article>