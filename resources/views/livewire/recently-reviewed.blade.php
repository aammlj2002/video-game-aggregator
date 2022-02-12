<div wire:init="loadRecentlyReviewed">
    <div class="text-blue-500 uppercase tracking-wide font-semibold">
        Recent Reviewed
    </div>
    <div class="recently-reviewed-container space-y-12 mt-8">
        @forelse ($recentlyReviewed as $game)
        {{-- game review card --}}
        <div class="game bg-gray-800 rounded-lg shadow-md flex p-6">
            <div class="relative flex-none">
                <a href="#">
                    <img src="{{ Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ) }}"
                        alt="game" class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
                </a>
                @if (isset($game['rating']))
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                    style="right:-20px; bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">

                        {{round($game['rating'])}}%
                    </div>
                </div>
                @endif
            </div>
            <div class="ml-12">
                <a href="" class="block text-base font-semibold leading-light hover:text-gray-400">
                    {{$game['name']}}
                </a>
                <div class="text-gray-400 mt-1">@foreach ($game['platforms'] as $platform)
                    @if (array_key_exists("abbreviation", $platform))
                    {{$platform['abbreviation']}},
                    @endif
                    @endforeach</div>
                <div class="mt-6 text-gray-400">
                    {{$game["summary"]}}
                </div>
            </div>
        </div>
        {{-- end game review card --}}
        @empty
        <div>loading...</div>
        @endforelse
    </div>
</div>