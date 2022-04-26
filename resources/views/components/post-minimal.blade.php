@props(['post'])
<article {{ $attributes->merge(['class' => 'w-full']) }}>
    <a href="{{ route('posts.show', $post) }}" class="block h-48 w-full bg-cover bg-center hover:brightness-110"
    style="background-image:url({{Storage::url($post->image->url)}})">
    </a>
    <a href="{{ route('posts.show', $post) }}" class="w-full">
        <h2 class="text-xl font-bold font-heading pt-2">{{$post->name}}</h2>
    </a>
</article>