<style>
    .hour::before{
    content: "•";
    margin: 0 0.3125rem;
    height: fit-content;
    }
</style>
<div class="py-4">
    <span class="text-gray-600">{{\Carbon\Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y')}}</span>
    <span class="text-gray-600 hour">{{\Carbon\Carbon::parse($post->created_at)->translatedFormat('13:30')}}</span>
</div>