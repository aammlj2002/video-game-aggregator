<div class="similar-game-container pb-4 my-8">
    <div class="text-blue-500 uppercase tracking-wide font-semibold">Similar Game</div>
    <div class="popular-game text-sm grid grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        @foreach ($similarGames as $game)
        <x-game-card :game="$game" bladeComponent="true" />
        @endforeach
    </div>
</div>