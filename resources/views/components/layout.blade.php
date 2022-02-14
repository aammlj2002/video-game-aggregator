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
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row items-center">
                <a class="mt-3 lg:mt-0" href="/">
                    <h3 class="font-bold">Video Game Aggregator</h3>
                </a>
                <ul class="flex ml-0 lg:ml-16 space-x-4 mt-3 lg:mt-0">
                    <li><a href="#" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-3 lg:mt-0">
                <div class="relative">
                    <input type="text"
                        class="bg-gray-800 text-sm w-56 md:w-64 focus:outline-none focus:shadow-outline rounded-full pl-8 px-3 py-1"
                        placeholder="Search...">
                    <div class="absolute top-0 flex item-center h-full ml-2">
                        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24">
                            <path class="heroicon-ui"
                                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
                        </svg>
                    </div>
                </div>
                <div class="ml-6">
                    <a href="/"><img src="{{asset('img/marco.jpg')}}" alt="avatar" class="rounded-full w-8 h-8"></a>
                </div>
            </div>
        </nav>
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