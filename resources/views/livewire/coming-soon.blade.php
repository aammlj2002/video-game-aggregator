<div wire:init="loadComingSoon">
    {{-- coming section --}}
    <div class="text-blue-500 uppercase tracking-wide font-semibold mt-10">
        Coming Soon
    </div>
    <div class="most-anticipated-container space-y-10 mt-5">


        @forelse ($comingSoon as $game)
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
        @empty

        {{-- skeleton loader --}}
        @foreach (range(4,1) as $item)
        <div class="game flex">
            <div class="bg-gray-800 w-16 h-20"></div>
            <div class="ml-4">
                <div class="text-transparent bg-gray-800 rounded mb-2 text-sm">Lorem, ipsum.</div>
                <div class="text-transparent bg-gray-800 rounded text-sm">Lorem.</div>
            </div>
        </div>
        @endforeach

        @endforelse

    </div>{{-- end coming section --}}
</div>