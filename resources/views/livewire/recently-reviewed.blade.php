<div wire:init="loadRecentlyReviewed">
    <div class="text-blue-500 uppercase tracking-wide font-semibold">
        Recent Reviewed
    </div>
    <div class="recently-reviewed-container space-y-12 mt-8">
        @forelse ($recentlyReviewed as $game)
        <x-game-card-large :game="$game" />
        @empty

        {{-- skeleton loader --}}
        @foreach (range(1,3) as $item)
        <x-skeleton-loader-card-large />
        @endforeach

        @endforelse
    </div>
</div>