<div>
    <div class="game bg-gray-800 rounded-lg shadow-md flex p-6">
        <div class="relative flex-none">
            <a href="#">
                <img src="{{ $game['coverImage'] }}" alt="game"
                    class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
            </a>
            @if ( $game['rating'] )
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right:-20px; bottom:-20px">
                <div class="font-semibold text-xs flex justify-center items-center h-full">

                    {{ $game['rating'] }}
                </div>
            </div>
            @endif
        </div>
        <div class="ml-12">
            <a href="" class="block text-base font-semibold leading-light hover:text-gray-400">
                {{$game['name']}}
            </a>
            @if ($game["platforms"])
            <div class="text-gray-400 mt-1">
                {{$game["platforms"]}}
            </div>
            @endif
            @if ($game["summary"])
            <div class="mt-6 text-gray-400">
                {{$game["summary"]}}
            </div>
            @endif
        </div>
    </div>
</div>