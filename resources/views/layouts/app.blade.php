<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        
        @livewireStyles
        
        
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            window.addEventListener('swal:confirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true
                })
                .then((willDelete) => {
                    if(willDelete) {
                        window.livewire.emit('deleteBook', event.detail.id);
                    }
                });
            });
            window.addEventListener('swal:success', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: "success",
                });
            });
    
        </script>

        @if(session()->has('book_create_success'))
        <script>
            window.onload = function() {
                swal({
                    title: 'Livro adicionado!',
                    text: 'Um novo livro foi criado.',
                    icon: "success",
                });
            }
        </script>
        @endif

        <script>

            window.addEventListener('swal:update_success', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: "success",
                });
            });
        </script>

    </body>
</html>
