<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KS Recycle Resource - Your RoRo Bin Service Solution</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,700" rel="stylesheet" />
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    <body class="font-poppins">
        <div class="fixed bottom-4 right-4 z-10">
            <a href="https://wa.me/60105443576" target="_blank" rel="noopener noreferrer"
               class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-full flex items-center">
               <x-bi-whatsapp class="mr-2" />


              Chat on WhatsApp
            </a>
          </div>
    
        @include('layout.navbar')
        @include('layout.cart')

        @yield('main')

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>


        @livewireScripts
        @yield('js')

    </body>

</html>
