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
        <livewire:search-dropdown />
        <div class="ml-6">
            <a href="/"><img src="{{asset('img/marco.jpg')}}" alt="avatar" class="rounded-full w-8 h-8"></a>
        </div>
    </div>
</nav>