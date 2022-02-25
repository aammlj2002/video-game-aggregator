<div class="relative" x-data="{ isVisible : true }" @click.away="isVisible = false">
    <input wire:model="search" type="text"
        class="w-56 px-8 py-1 text-sm bg-gray-800 rounded-full md:w-64 focus:outline-none focus:shadow-outline"
        placeholder="Search..." @focus="isVisible=true" @keydown.window.escape="isVisible=false"
        @keydown="isVisible=true" @keydown.shift.tab="isVisible=false">
    <div class="absolute top-0 flex h-full ml-2 item-center">
        <svg class="w-4 text-gray-400 fill-current" viewBox="0 0 24 24">
            <path class="heroicon-ui"
                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
        </svg>
    </div>
    <div wire:loading class="top-0 right-0 mt-3 mr-4 spinner" style="position: absolute"></div>
    @if(strlen($search) > 1)
    <div class="absolute z-50 w-64 mt-2 text-xs bg-gray-800 rounded" x-show="isVisible"
        x-transition.opacity.duration.200>
        @if (count($searchResults) > 0)
        <ul>
            @foreach ($searchResults as $game)
            <li class="border-b border-gray-700">
                <a href="/games/{{$game['slug']}}" @if ($loop->last) @keydown.tab="isVisible=false" @endif
                    class="flex items-center block p-3 transition duration-150 ease-in-out hover:gray-700">
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