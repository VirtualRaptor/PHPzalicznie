<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\ApiController;


Route::get('/leaderboard', 'LeaderboardController@getLeaderboardData')->name('getLeaderboardData');
Route::get('/random-joke', [JokeController::class, 'getRandomJoke']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-users', [ApiController::class, 'getUsers'])->name('getUsers');
Route::get('/get-users-rank', [ApiController::class, 'getUsersRank'])->name('getUsersRank');
Route::post('/set-user-joke', [ApiController::class, 'setUserJoke'])->name('setUserJoke');


Route::middleware('auth:api')->group(function () {
    Route::get('/save-joke', 'JokesController@saveJoke')->name('savedJokes');
    Route::get('/get-saved-jokes', 'JokesController@getSavedJokes')->name('getSavedJokes');
});
