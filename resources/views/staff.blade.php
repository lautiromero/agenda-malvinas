<x-app-layout>
    <div class="custom-container pb-4 md:py-8 md:w-3/4 mx-auto">
        <div class="grid md:grid-cols-2 gap-x-8">
            <div>
                <h3 class="text-3xl md:text-4xl font-extrabold font-heading tracking-wide text-cyan-600">Agenda Malvinas</h3>
                <h1 class="text-5xl md:text-6xl font-extrabold font-heading text-cyan-600">STAFF</h1>     
                <p class="text-lg md:text-xl pt-9">
                    Abordamos periodísticamente la compleja situación que
                    vive la Argentina con relación a la ocupación ilegal británica
                    en el Atlántico Sur, desde una perspectiva nacional y
                    especialmente fueguina.
                </p>
            </div>
            <div class="mt-6 md:mt-0 pr-5 md:pr-0 flex items-center">
                <img src="{{asset('images/islas.png')}}" alt="Islas malvinas" class="w-full"> 
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-x-20 gap-y-14 pt-14 md:pt-16">
            <div class="pt-6 md:pt-0">
                <div class="pb-3">
                    <div class="text-cyan-600 inline-block text-xl px-5 py-1 rounded-lg border-2 
                    border-cyan-500 font-extrabold font-heading uppercase">Director</div>
                </div>
                <ul class="px-1">
                    <li class="text-lg md:text-xl text-slate-700">Daniel Guzmán</li>
                </ul>
            </div>
            <div class="pt-6 md:pt-0">
                <div class="pb-3">
                    <div class="text-cyan-600 inline-block text-xl px-5 py-1 rounded-lg border-2 
                    border-cyan-500 font-extrabold font-heading uppercase">Editores</div>
                </div>
                <ul class="px-1">
                    <li class="text-lg md:text-xl text-slate-700">Mario Volpe</li>
                </ul>
                <ul class="px-1">
                    <li class="text-lg md:text-xl text-slate-700">Jerónimo Guerrero Iraola</li>
                </ul>
                <ul class="px-1">
                    <li class="text-lg md:text-xl text-slate-700">Jorge Gómez</li>
                </ul>
            </div>
            <div class="pt-6 md:pt-0">
                <div class="pb-3">
                    <div class="text-cyan-600 inline-block text-xl px-5 py-1 rounded-lg border-2 
                    border-cyan-500 font-extrabold font-heading uppercase">Relaciones Inst.</div>
                </div>
                <ul class="px-1">
                    <li class="text-lg md:text-xl text-slate-700">Lucia Gala García Valls</li>
                </ul>
            </div>
            <div class="pt-6 md:pt-0">
                <div class="pb-3">
                    <div class="text-cyan-600 inline-block text-xl px-5 py-1 rounded-lg border-2 
                    border-cyan-500 font-extrabold font-heading uppercase">Redes sociales</div>
                </div>
                <ul class="px-1">
                    <li class="text-lg md:text-xl text-slate-700">Marco Cavignac</li>
                </ul>
            </div>
            <div class="pt-6 md:pt-0">
                <div class="pb-3">
                    <div class="text-cyan-600 inline-block text-xl px-5 py-1 rounded-lg border-2 
                    border-cyan-500 font-extrabold font-heading uppercase">Diseño & desarrollo</div>
                </div>
                <ul class="px-1">
                    <li class="text-lg md:text-xl text-slate-700">Correa Marco Federico</li>
                </ul>
            </div>
        </div>

        <div class="md:w-3/5 mx-auto py-14" id="contacto">
            <h4 class="text-3xl md:text-5xl font-extrabold text-slate-600 text-center py-9">¿Tenés alguna consulta?</h4>
            <form action="{{route('contacto.store')}}" method="POST">
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
    </div>
</x-app-layout>
