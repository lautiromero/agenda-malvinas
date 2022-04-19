<x-app-layout>
    {{-- alert --}}
    @if (session('info'))
    <x-alert-info>
        {{session('info')}}
    </x-alert-info>    
    @endif
    <div class="custom-container pb-4 md:py-12 md:w-3/4 mx-auto">
        <div class="grid md:grid-cols-2 gap-x-8">
            <div>
                <h3 class="text-3xl md:text-4xl font-extrabold font-heading tracking-wide text-cyan-600">Ser parte de</h3>
                <h1 class="text-5xl md:text-6xl font-extrabold font-heading text-cyan-600">Agenda Malvinas</h1>     
                <p class="text-lg md:text-xl pt-9">
                    Los contenidos de Agenda Malvinas están
                    disponibles para que todos puedan acceder a ellos,
                    pero necesitamos de ustedes para seguir
                    haciéndolos. ¿Querés aportar a Agenda Malvinas?
                </p>
                <p class="text-lg md:text-xl">
                    Tenemos distintos tipos de donaciones.
                    Prometemos darte contenido de calidad, ayudanos
                    a seguir haciéndolo.    
                </p>                
                <p class="text-lg md:text-xl pt-9">
                    Para modificar tu aporte o solicitar la baja escribinos <a class="font-extrabold" href="#">acá</a>.
                </p>
            </div>
            <div class="mt-6 md:mt-0 pr-5 md:pr-0">
                <img src="{{asset('images/islas.png')}}" alt="Islas malvinas" class="w-full"> 
            </div>
            <div></div>
        </div>
        <div class="grid md:grid-cols-4 gap-x-12 px-12 md:px-0 pt-5 md:pt-16">
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/300.png')}}" alt="donar 300" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/500.png')}}" alt="donar 500" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/700.png')}}" alt="donar 700" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/900.png')}}" alt="donar 900" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
        </div>

        <div class="grid md:grid-cols-4 gap-x-12 px-12 md:px-0 pt-12">
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/300-SUS.png')}}" alt="donar 300" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/400-SUS.png')}}" alt="donar 500" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/500-SUS.png')}}" alt="donar 700" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
            <div class="pt-6 md:pt-0">
                <img src="{{asset('/images/donar/600-SUS.png')}}" alt="donar 900" class="w-full">
                <div class="text-center py-3"><a href="#" class="text-cyan-600 hover:bg-cyan-500 hover:text-white px-6 py-1 rounded-md text-2xl font-extrabold font-heading border-2 border-cyan-500">SER PARTE</a></div> 
            </div>
        </div>
        <div class="md:w-3/5 mx-auto py-14">
            <h4 class="text-3xl md:text-5xl font-extrabold text-slate-600 text-center py-9">¿Tenés alguna consulta?</h4>
            <form action="{{route('contacto.store')}}" method="POST">
                @csrf
                <label for="name" class="text-slate-600 select-none font-bold">Nombre y apellido *</label>
                <input
                  id="name"
                  type="text"
                  name="name"
                  placeholder="Nombre y apellido..."
                  class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-cyan-500 rounded-md py-2 px-2 mt-1 mb-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm"
                />
                @error('name')
                    <p class="text-red-600"><strong>{{$message}}</strong></p>
                @enderror
                <label for="email" class="text-slate-600 select-none font-bold">E-mail *</label>
                <input
                  id="email"
                  type="text"
                  name="email"
                  placeholder="E-mail..."
                  class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-cyan-500 rounded-md py-2 px-2 mt-1 mb-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm"
                />
                @error('email')
                    <p class="text-red-600"><strong>{{$message}}</strong></p>
                @enderror
                <label for="comment" class="text-slate-600 select-none font-bold">Comentario o mensaje</label>
                <textarea
                  id="comment"
                  rows="8"
                  name="comment"
                  placeholder="Comentario..."
                  class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-cyan-500 rounded-md py-2 px-2 mt-1 mb-3 shadow-sm focus:outline-none focus:border-cyan-500 focus:ring-cyan-500 focus:ring-1 sm:text-sm"
                ></textarea>
                @error('comment')
                    <p class="text-red-600"><strong>{{$message}}</strong></p>
                @enderror
                <button type="submit" class="bg-cyan-500 text-white hover:bg-white hover:text-cyan-500 border border-cyan-500 px-3 py-1 mt-2 rounded-md text-sm font-medium">Enviar</button>
              </div>
            </form>
        </div>
    </div>
</x-app-layout>
