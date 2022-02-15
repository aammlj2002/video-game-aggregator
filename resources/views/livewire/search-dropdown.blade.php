<div class="relative">
    <input wire:model.debounce.300ms="search" type="text"
        class="bg-gray-800 text-sm w-56 md:w-64 focus:outline-none focus:shadow-outline rounded-full pl-8 px-3 py-1"
        placeholder="Search...">
    <div class="absolute top-0 flex item-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24">
            <path class="heroicon-ui"
                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
        </svg>
    </div>
    <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
        <ul>
            @foreach ($searchResults as $game)
            <li class="border-b border-gray-700">
                <a href="/games/{{$game['slug']}}"
                    class="block hover:gray-700 flex items-center transition ease-in-out duration-150 p-3">
                    <img src="{{$game['coverImage']}}" alt="game" class="w-10">
                    <span class="ml-4">{{$game['name']}}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>