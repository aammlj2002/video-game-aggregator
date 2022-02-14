@props(['game'])
<div>
    <div class="game mt-8">
        <div class="relative inline-block">
            <a href="/games/{{$game['slug']}}">
                <img src="{{ $game['coverImage'] }}" alt="game"
                    class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
            </a>
            @if (isset($game['rating']))
            <div id="{{$game['slug']}}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                style="right:-20px; bottom:-20px">
            </div>
            @endif
        </div>
        <a href="/games/{{$game['slug']}}"
            class="block text-base font-semibold leading-light hover:text-gray-400 mt-8">{{$game["name"]}}</a>
        <div class="text-gray-400 mt-1">
            <span>{{$game["platforms"]}}</span>
        </div>
    </div>
</div>