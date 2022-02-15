<div wire:init="loadPopularGames">
    {{-- popular game section --}}
    <h2 class="text-blue-500 tracking-wide uppercase font-semibold ">Popular Games</h2>
    <div
        class="popular-game text-sm grid grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
        @forelse ($popularGames as $game)
        <x-game-card :game="$game" bladeComponent="yes" />
        @empty

        {{-- skeleton --}}
        @foreach (range(1,12) as $item)
        <x-skeleton-loader-card />
        @endforeach

        @endforelse
    </div>{{-- end popular game section --}}

    {{-- for rating progress animation --}}
    @push('scripts')
    <x-rating-progress event="popularGameRating" />
    @endpush
</div>