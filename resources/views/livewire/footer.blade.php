<div class="bg-cyan-500 mt-8 custom-container pt-10 pb-4">
    {{-- main footer --}}
    <div class="grid grid-cols-1 md:grid-cols-7 md:gap-10 py-8">
        <div class="md:col-span-3 pr-4">
            <a href="/">
                <img class="w-auto" src="{{asset('images/logo-white.svg')}}" alt="Agenda malvinas">
            </a>
        </div>
        <div class="md:col-span-2 tracking-wider pl-4 pt-8 md:pt-0">
            <ul class="h-full flex flex-col">
                <li class="pb-1.5">
                    <a href="{{ route('porque-agenda') }}" class="text-xl font-bold text-white uppercase">Porque agenda malvinas</a>
                </li>
                <li class="pb-1.5">
                    <a href="{{ route('mapa') }}" class="text-xl font-bold text-white uppercase">Mapa del sitio</a>
                </li>
            </ul>
        </div>
        <div class="tracking-wider pl-4 md:pl-0">
            <ul class="h-full flex flex-col">
                <li class="pb-1.5">
                    <a href="{{ route('staff') }}" class="text-xl font-bold text-white uppercase">Staff</a>
                </li>
                <li class="pb-1.5">
                    <a href="{{ route('contacto') }}" class="text-xl font-bold text-white uppercase">Contacto</a>
                </li>
            </ul>
        </div>
        <div class="tracking-wider md:text-right pl-4 md:pl-0">
            <ul class="h-full flex flex-col">
                <li class="pb-1.5 pr-1">
                    <a href="{{ route('donar') }}" class="text-xl font-bold text-white uppercase">Donar</a>
                </li>
                <li class="pb-1.5">
                    <div class="flex space-x-0.5 md:justify-end">
                        <a href="https://twitter.com/Agenda_Malvinas" target="_blank"><x-forkawesome-twitter-square class="w-6 text-white"/></a>
                        <a href="https://www.facebook.com/AgendaMalvinas" target="_blank"><x-forkawesome-facebook-square class="w-6 text-white"/></a>
                        <a href="https://www.instagram.com/agendamalvinas/" target="_blank"><x-forkawesome-instagram class="w-6 text-white"/></a>
                        <a href="https://www.youtube.com/channel/UCMAAu193aa8b_V31Cz8ETgw" target="_blank"><x-forkawesome-youtube-square class="w-6 text-white"/></a>
                      </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- Category menu --}}
    <div class="hidden sm:flex justify-around w-full">
        @foreach ($categories as $category)
            @if (!$loop->first)
            <a href="{{ route('category.show', $category) }}" class="inline-block text-white py-3 uppercase text-sm tracking-wide">{{$category->name}}</a>
            @endif
        @endforeach
    </div>

</div>
