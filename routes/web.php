<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get("/", [GamesController::class, "index"]);
Route::get("/games/{slug}", [GamesController::class, "show"]);