<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    public function index()
    {
        return view("index");
    }
    protected function formatForView($game)
    {
        return collect($game)->merge([
            "coverImage"=>Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ),
            "platforms"=>isset($game['platforms']) ? collect($game['platforms'])->implode('abbreviation', ', ') : null,
            "genres"=>isset($game['genres']) ? collect($game['genres'])->implode('name', ', ') : null,
            "companies"=>isset($game['involved_companies']) ? collect($game['involved_companies'])->implode('company.name', ", ") : null,
            "rating"=>isset($game['rating']) ? round($game['rating']) : null,
            "aggregated_rating"=>isset($game['aggregated_rating']) ? round($game['aggregated_rating']) : null,
            "video"=>isset($game['videos']) ? $game["videos"][0]["video_id"] : null,
            "screenshots"=>isset($game['screenshots'])? collect($game["screenshots"])->pluck("url")->map(function($screenshot){
                return collect($screenshot)->merge([
                    "big"=>Str::replaceFirst('thumb', 'screenshot_big', $screenshot ),
                    "huge"=>Str::replaceFirst('thumb', 'screenshot_huge', $screenshot ),
                ])->toArray();
            }) : null,
            "similar_games"=>isset($game['similar_games']) ? collect($game['similar_games'])->map(function($game){
                return collect($game)->merge([
                    "coverImage"=>isset($game["cover"]) ? Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ) : null,
                    "platforms"=>isset($game['platforms']) ? collect($game['platforms'])->implode("abbreviation", ", ") : null,
                    "rating"=>isset($game['rating']) ? round($game['rating']) : null,
                ]);
            }) : null
        ])->toArray();
    }
    public function show($slug)
    {   
        $gameUnformatted = Http::withHeaders(config("services.igdb"))
        ->withBody(
            "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug, similar_games.name;
                where slug = \"{$slug}\";
            ",
            "text/plain"
        )->post("https://api.igdb.com/v4/games")->json();
        $game = $this->formatForView($gameUnformatted[0]);
        return view("show", [
            "game"=>$game
        ]);
    }
}
