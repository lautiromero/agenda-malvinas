<div class="flex md:inline-flex flex-row md:flex-col justify-between md:sticky top-10">
    <div class="grid grid-cols-3 md:grid-cols-1 gap-5 md:pb-5 md:border-b">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><x-akar-facebook-fill class="h-6 w-6 text-slate-700"/></a>
        <a href="https://twitter.com/intent/tweet?text={{urlencode($post->name)}}+{{url()->current()}}" target="_blank"><x-akar-twitter-fill class="h-6 w-6 text-slate-700"/></a>
        <a href="https://wa.me/?text={{url()->current()}}" target="_blank"><x-akar-whatsapp-fill class="h-6 w-6 text-slate-700"/></a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-1 gap-5 md:pt-5">
        <a href="mailto:?subject={{rawurlencode($post->name)}}&body={{urlencode(url()->current())}}"><x-akar-envelope class="h-6 w-6 text-slate-700"/></a>
        <a href="#"><x-akar-chat-dots class="h-6 w-6 text-slate-700"/></a>
    </div>
</div>