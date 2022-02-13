<div wire:init="loadComingSoon">
    {{-- coming section --}}
    <div class="text-blue-500 uppercase tracking-wide font-semibold mt-10">
        Coming Soon
    </div>
    <div class="most-anticipated-container space-y-10 mt-5">


        @forelse ($comingSoon as $game)
        <x-game-card-small :game="$game" />
        @empty

        {{-- skeleton loader --}}
        @foreach (range(4,1) as $item)
        <x-skeleton-loader-card-small />
        @endforeach

        @endforelse

    </div>{{-- end coming section --}}
</div>