@props(['game'])
<div>
    <div class="game flex">
        <a href="#">
            <img src="{{ $game['coverImage'] }}" alt="game"
                class="w-16 hover:opacity-75 trasition ease-in-out duration-150">
        </a>
        <div class="ml-4">
            <a href="#" class="hover:text-gray-300">{{$game['name']}}</a>
            @if ( $game['first_release_date'] )
            <div class="text-gray-400 text-sm mt-1">
                {{ $game['first_release_date'] }}
            </div>
            @endif
        </div>
    </div>
</div>