<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{ route('posts.index') }}">
                <img class="block h-12 w-auto" src="{{asset('images/logo.svg')}}" alt="Agenda malvinas">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Gracias por registrarte, antes de continuar puedes confirmar tu correo ingresando al link que te hemos enviado.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nuevo link de verificación a sido enviado a tu correo.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Reenviar correo de confirmación.') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
