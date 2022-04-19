<div class="custom-container pb-4 md:py-6 md:w-3/4 mx-auto">
    <h2 class="text-2xl md:text-3xl font-heading font-bold text-slate-600 text-center pb-12">MAPA DEL SITIO</h2>
    <div class="grid md:grid-cols-3 gap-x-8">
        <ul class="font-bold text-cyan-600">
            <li class="pb-3">
                <a href="{{ route('posts.index') }}" class="uppercase">Agenda Malvinas</a>
            </li>
            <li class="pb-3">
                <a href="{{ route('donar') }}" class="">Donar</a>
            </li>
            <li class="pb-3">
                <a href="{{ route('staff') }}" class="">Staff</a>
            </li>
            <li class="pb-3">
                <a href="{{ route('porque-agenda') }}" class="">Porque Agenda Malvinas</a>
            </li>
            <li class="pb-3">
                <a href="{{ route('contacto') }}" class="">Contacto</a>
            </li>
        </ul>
        <ul class="text-cyan-600">
            <li class="pb-3">
                <h4 class="font-bold text-gray-600">Categorías</h4>
            </li>
            @foreach ($categories as $category)
            <li class="pb-3">
                <a href="#" class="">{{$category->name}}</a>
            </li>
            @endforeach 
        </ul>
        <ul class="text-cyan-600">
            <li class="pb-3">
                <h4 class="font-bold text-gray-600">Redes Sociales</h4>
            </li>
            <li class="pb-3">
                <a href="https://twitter.com/Agenda_Malvinas" target="_blank">Twitter</a>
            </li>
            <li class="pb-3">
                <a href="https://www.facebook.com/AgendaMalvinas" target="_blank">Facebook</a>
            </li>
            <li class="pb-3">
                <a href="https://www.instagram.com/agendamalvinas/" target="_blank">Instagram</a>
            </li>
            <li class="pb-3">
                <a href="https://www.youtube.com/channel/UCMAAu193aa8b_V31Cz8ETgw" target="_blank">Youtube</a>
            </li>
        </ul>
    </div>
</div>