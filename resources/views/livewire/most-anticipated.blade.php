<div wire:init="loadMostAnticipated">
    {{-- most-anticipated section --}}
    <div class="text-blue-500 uppercase tracking-wide font-semibold">
        Most Anticipated
    </div>
    <div class="most-anticipated-container space-y-10 mt-5">

        {{-- most-anticipated game card --}}
        @forelse ($mostAnticipated as $game)
        <x-game-card-small :game="$game" />
        @empty

        {{-- skeleton loader --}}
        @foreach (range(4,1) as $item)
        <x-skeleton-loader-card-small />
        @endforeach
        @endforelse
        {{-- end most-anticipated game card --}}
    </div>
    {{-- end most-anticipated section --}}
</div>