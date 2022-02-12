<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->popularGames = Http::withHeaders(config("services.igdb"))
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
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}