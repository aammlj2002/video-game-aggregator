<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
        $current = Carbon::now()->timestamp;
        $multiquery = Http::withHeaders(config('services.igdb'))
            ->withBody("
                    query games \"PopularGames\" {
                        fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
                        where platforms.id = (48, 49, 103, 6) &
                        (
                            first_release_date >= {$before}
                            & first_release_date < {$after}
                            & total_rating_count > 1
                        );
                        sort total_rating_count desc;
                        limit 12;
                    };
                    query games \"recentlyReviewed\" {
                        fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, summary;
                        where platforms = (48, 49, 103, 6) &
                        (
                            first_release_date >= {$before}
                            & first_release_date < {$current}
                            & total_rating_count > 1
                        );
                        sort total_rating_count desc;
                        limit 3;
                    };
                    query games \"MostAnticipated\" {
                        fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, summary;
                        where platforms = (48, 49, 103, 6) &
                        (
                            first_release_date >= {$before}
                            & first_release_date < {$afterFourMonths}
                        );
                        sort total_rating_count desc;
                        limit 4;
                    };
                    query games \"commingSoon\" {
                        fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, summary;
                        where platforms = (48, 49, 103, 6) &
                        (
                            first_release_date >= {$current}
                        );
                        sort first_release_date asc;
                        limit 4;
                    };
                ", "text/plain")->post('https://api.igdb.com/v4/multiquery/')->json();
                // dd($multiquery);
        return view("index", [
            "popularGames"=>$multiquery[0]["result"],
            "recentlyReviewed"=>$multiquery[1]["result"],
            "mostAnticipated"=>$multiquery[2]["result"],
            "commingSoon"=>$multiquery[3]["result"],
        ]);
    }
}
