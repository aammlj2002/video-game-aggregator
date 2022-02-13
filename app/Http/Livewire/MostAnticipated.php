<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated(){
        $before = Carbon::now()->subMonths(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $mostAnticipatedUnformatted = Cache::remember('most-anticipated', 100, function () use($before, $afterFourMonths){
           return Http::withHeaders(config("services.igdb"))
                ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, summary;
                    where platforms = (48, 49, 103, 6) &
                    (
                        first_release_date >= {$before}
                        & first_release_date < {$afterFourMonths}
                    );
                    sort total_rating_count desc;
                    limit 4;
                ",
                "text/plain"
            )->post("https://api.igdb.com/v4/games")->json();
        });
        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);
    }
    public function formatForView($game)
    {
        return collect($game)->map(function($game){
            return collect($game)->merge([
                "coverImage"=>Str::replaceFirst('thumb', 'cover_small' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ),
                "first_release_date"=>Carbon::parse($game['first_release_date'])->format("M d, Y")
            ]);
        });
    }
    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
