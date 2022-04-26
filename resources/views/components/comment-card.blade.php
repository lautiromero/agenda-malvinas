<style>
    .hour::before{
    content: "•";
    margin: 0 0.3125rem;
    height: fit-content;
    }
</style>

<div class="flex py-2 pt-4 border-b border-gray-200">
    <div class="w-2/12 md:w-1/12 py-3 flex justify-center">
        <img class="h-10 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="foto de perfil">
    </div>
    <div class="w-10/12 md:w-11/12 p-2">
        <div>
            <strong class="text-gray-600 text-sm">{{ $comment->user->name }}</strong>
            <span class="text-gray-500 text-xs hour uppercase">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
        </div>
        <div class="pt-1">
            <p>{{ $comment->body }}</p>
        </div>
    </div>
</div>