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
        <script>
            $( document ).ready(function() {
                var quill = new Quill('#editor', {
                    theme: 'snow'
                });

                var quill_2 = new Quill('#editor2', {
                    theme: 'snow'
                });

                // set variable to get the editor value 
                var form = document.getElementById("submitFaq"); // get form by ID
                form.onsubmit = function() { // onsubmit do this first
                    var editor = document.querySelector('input[name=editor]'); // set name input var
                    editor.value = quill.root.innerHTML; // populate name input with quill data

                    var editor2 = document.querySelector('input[name=editor2]'); // set name input var
                    editor2.value = quill_2.root.innerHTML; // populate name input with quill data
                    // console.log(quill.root.innerHTML);
                    return true; // submit form
                }

                // var selectedOption = $('#parent_id').find(":selected").val();
                
                $('#switch').hide();

                $('#parent_id').change(function () {
                    var item = $(this).find(":selected").text();
                    var itemVal = $(this).find(":selected").val();

                    if(itemVal == null || itemVal == "" || itemVal == undefined){
                        $('#switch').hide();
                        $('#answer_section').hide();
                        $('#flexSwitchCheckChecked').prop('checked', false);
                        // $('#editor2_val').val("");
                    }else{
                        $('#switch').show();

                    }

                });

                $('#answer_section').hide();

                // set toggle event for switch 
                $('#flexSwitchCheckChecked').change(function() {
                    // this will contain a reference to the checkbox   
                    if (this.checked) {
                        $('#answer_section').show();
                    } else {
                        $('#answer_section').hide();
                    }
                });
            });
        </script>
    </body>
</html>
