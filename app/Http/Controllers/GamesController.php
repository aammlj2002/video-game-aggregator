<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public function index()
    {
        return view("index");
    }
    public function show($slug)
    {   
        $game = Http::withHeaders(config("services.igdb"))
        ->withBody(
            "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug, similar_games.name;
                where slug = \"{$slug}\";
            ",
            "text/plain"
        )->post("https://api.igdb.com/v4/games")->json();
        // dump($game);
        return view("show", [
            "game"=>$game[0]
        ]);
    }
}
