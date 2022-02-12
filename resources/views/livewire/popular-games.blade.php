<div wire:init="loadPopularGames">
    {{-- popular game section --}}
    <h2 class="text-blue-500 tracking-wide uppercase font-semibold ">Popular Games</h2>
    <div
        class="popular-game text-sm grid grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
        @forelse ($popularGames as $game)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="{{ Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ) }}"
                        alt="game" class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
                </a>

                @if (isset($game['rating']))
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{round($game['rating'])}}%
                    </div>
                </div>
                @endif
            </div>
            <a href=""
                class="block text-base font-semibold leading-light hover:text-gray-400 mt-8">{{$game['name']}}</a>
            <div class="text-gray-400 mt-1">
                @foreach ($game['platforms'] as $platform)
                @if (array_key_exists("abbreviation", $platform))
                {{$platform['abbreviation']}},
                @endif
                @endforeach
            </div>
        </div>
        @empty

        @foreach (range(1,12) as $item)
        <div class="game mt-8">
            <div class="inline-block">
                <div class="bg-gray-800 w-44 h-56"></div>
            </div>
            <div class="inline-block text-transparent bg-gray-800 mb-1">Name goes here</div>
            <div class="inline-block text-transparent bg-gray-800">PC, Android</div>
        </div>
        @endforeach

        @endforelse
    </div>{{-- end popular game section --}}
</div>