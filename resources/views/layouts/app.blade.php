<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Quill  -->
        <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Custom CSS  -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">
        <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">
        <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

        {{-- datatable  --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.1.0/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.3.3/select.bootstrap4.css" rel="stylesheet">

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
                <header class="bg-white shadow-tailwind">
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

        <footer class="tm-footer text-center bg-gray-100" style="padding-top: 5px; padding-bottom: 15px;">
			<span class="bg-gray-100">&copy; Copyright 2021 Line Clear. All Rights Reserved.</span>
		</footer>

        <!-- jquery  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.quilljs.com/1.1.6/quill.js"></script> <!-- Create the editor container -->

        {{-- datatable  --}}
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> 
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> 
        <script src="https://cdn.datatables.net/select/1.3.1/js/select.bootstrap4.min.js"></script> 

        <script>
            
        </script>
    </body>
</html>
