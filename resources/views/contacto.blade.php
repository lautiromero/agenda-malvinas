<x-app-layout>
    <div class="custom-container pb-8 md:w-3/4 mx-auto" id="contacto">
        <h2 class="text-3xl md:text-5xl font-heading font-medium text-slate-600 text-center pt-6 pb-4">CONTACTO</h2>
        <h5 class="text-center text-gray-500 py-6">Envianos tu consulta</h5>
        <form action="{{route('contacto.store')}}" method="POST" class="border-t border-cyan-400 pt-7">
            @csrf
            <label for="name" class="text-slate-600 select-none font-bold">Nombre y apellido *</label>
            <input
                id="name"
                type="text"
                name="name"
                class="block bg-white w-full border border-cyan-500 rounded-md py-2 px-2 mt-1 mb-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm"
            />
            @error('name')
                <p class="text-red-600"><strong>{{$message}}</strong></p>
            @enderror
            <label for="email" class="text-slate-600 select-none font-bold">E-mail *</label>
            <input
                id="email"
                type="text"
                name="email"
                class="block bg-white w-full border border-cyan-500 rounded-md py-2 px-2 mt-1 mb-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm"
            />
            @error('email')
                <p class="text-red-600"><strong>{{$message}}</strong></p>
            @enderror
            <label for="comment" class="text-slate-600 select-none font-bold">Comentario o mensaje</label>
            <textarea
                id="comment"
                rows="8"
                name="comment"
                class="block bg-white w-full border border-cyan-500 rounded-md py-2 px-2 mt-1 mb-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm"
            ></textarea>
            @error('comment')
                <p class="text-red-600"><strong>{{$message}}</strong></p>
            @enderror
            <button type="submit" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-3 py-1 mt-2 rounded-md text-sm font-medium">Enviar</button>
        </form>
    </div>
</x-app-layout>
