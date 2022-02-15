<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class SearchDropdown extends Component
{
    public $search = "";
    public $searchResults = [];
    public function formatForView($games)
    {
        return collect($games)->map(function($game){
            return collect($game)->merge([
                "coverImage"=>Str::replaceFirst('thumb', 'cover_small' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ),
            ]);
        })->toArray();
    }
    public function render()
    {
        $gamesUnformatted = Http::withHeaders(config("services.igdb"))
            ->withBody(
                "
                    search \"{$this->search}\";
                    fields name, cover.url, slug;
                    limit 5;
                ",
                "text/plain"
            )->post("https://api.igdb.com/v4/games")->json();
            $this->searchResults=$this->formatForView($gamesUnformatted);
        return view('livewire.search-dropdown');
    }
}
