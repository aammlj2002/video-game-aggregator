<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    @livewireStyles
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <x-nav />
    </header>

    <main class="py-4">
        <div class="container mx-auto px-4">
            {{$slot}}
        </div>
    </main>

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            <p>Powered By <a href="#" class="underline hover:text-gray-400">IGDB API</a></p>
        </div>
    </footer>

    @livewireScripts
    <script src="{{mix('js/app.js')}}"></script>
    @stack('scripts')
</body>

</html>