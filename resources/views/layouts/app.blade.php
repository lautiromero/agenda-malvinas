<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @meta

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        @livewire('header')
        <!-- Page Content -->
        <main class="pt-6">
            {{$slot}}
        </main>

        @livewire('footer')

        @stack('modals')

        @livewireScripts
    </body>
</html>
