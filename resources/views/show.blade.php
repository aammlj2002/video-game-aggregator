<x-layout>
    <x-game-detail-section :game="$game" />

    @if ($game['screenshots'])
    <x-screenshots-section :screenshots="$game['screenshots']" />
    @endif

    @if ($game['similar_games'])
    <x-similar-games-section :similarGames="$game['similar_games']" />
    @endif
</x-layout>