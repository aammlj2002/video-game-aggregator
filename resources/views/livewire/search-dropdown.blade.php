<div class="relative" x-data="{ isVisible : true }" @click.away="isVisible = false">
    <input wire:model="search" type="text"
        class="bg-gray-800 text-sm w-56 md:w-64 focus:outline-none focus:shadow-outline rounded-full px-8 py-1"
        placeholder="Search..." @focus="isVisible=true" @keydown.window.escape="isVisible=false"
        @keydown="isVisible=true" @keydown.shift.tab="isVisible=false">
    <div class="absolute top-0 flex item-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24">
            <path class="heroicon-ui"
                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
        </svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3" style="position: absolute"></div>
    @if(strlen($search) > 1)
    <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2" x-show="isVisible"
        x-transition.opacity.duration.200>
        @if (count($searchResults) > 0)
        <ul>
            @foreach ($searchResults as $game)
            <li class="border-b border-gray-700">
                <a href="/games/{{$game['slug']}}" @if ($loop->last) @keydown.tab="isVisible=false" @endif
                    class="block hover:gray-700 flex items-center transition ease-in-out duration-150 p-3">
                    <img src="{{$game['coverImage']}}" alt="game" class="w-10">
                    <span class="ml-4">{{$game['name']}}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="p-3">No search result for "{{substr($search, 0, 13).'...'}}"</div>
        @endif
    </div>
    @endif
</div>