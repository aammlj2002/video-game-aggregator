<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon(){
        $current = Carbon::now()->timestamp;

        $this->comingSoon = Http::withHeaders(config("services.igdb"))
        ->withBody(
            "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, summary;
                where platforms = (48, 49, 103, 6) &
                (
                    first_release_date >= {$current}
                );
                sort first_release_date asc;
                limit 4;
            ",
            "text/plain"
        )->post("https://api.igdb.com/v4/games")->json();
    }
    public function render()
    {
        return view('livewire.coming-soon');
    }
}