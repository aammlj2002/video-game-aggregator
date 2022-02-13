<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $recentlyReviewedUnformatted = Cache::remember('rentently-reviewed', 100, function () use($before, $current){ 
            return Http::withHeaders(config("services.igdb"))
                ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, summary;
                    where platforms = (48, 49, 103, 6) &
                    (
                        first_release_date >= {$before}
                        & first_release_date < {$current}
                        & total_rating_count > 1
                    );
                    sort total_rating_count desc;
                    limit 3;
                ",
                "text/plain"
            )->post("https://api.igdb.com/v4/games")->json();
        });
        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);
    }
    public function formatForView($game)
    {
        return collect($game)->map(function($game){
            return collect($game)->merge([
                "coverImage"=>Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ),
                "rating"=>isset($game['rating']) ? round($game['rating']).'%' : null, 
                "platforms"=>isset($game["platforms"]) ? collect($game['platforms'])->implode("abbreviation", ", ") : null,
                "summary"=>isset($game['summary']) ? $game['summary'] : null
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
