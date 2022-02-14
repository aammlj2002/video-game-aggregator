<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $popularGamesUnformatted = Cache::remember('popular-game', 100, function () use($before, $after){
            return Http::withHeaders(config("services.igdb"))
            ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
                    where platforms.id = (48, 49, 103, 6) &
                    (
                        first_release_date >= {$before}
                        & first_release_date < {$after}
                        & total_rating_count > 1
                    );
                    sort total_rating_count desc;
                    limit 12;
                ",
                "text/plain"
            )->post("https://api.igdb.com/v4/games")->json();
        });
        $this->popularGames = $this->formatForView($popularGamesUnformatted);
        // dd($this->popularGames);
    }
    
    public function formatForView($games)
    {
        return collect($games)->map(function($game){
            return collect($game)->merge([
                "coverImage"=>Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ),
                "rating"=>isset($game['rating']) ? round($game["rating"]) : null,
                "platforms"=>isset($game['platforms']) ? collect($game['platforms'])->implode('abbreviation', ', ') : null
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
