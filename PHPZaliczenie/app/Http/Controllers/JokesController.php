<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JokesController extends Controller
{
    public function saveJoke()
    {
        $response = Http::get('https://dad-jokes.p.rapidapi.com/random/joke');
        
        $jokeContent = $response->json();

        $user = auth()->user();
    
        $joke = $user->jokesSaved()->create([
            'type' => $jokeContent['type'],
            'setup' => $jokeContent['setup'],
            'punchline' => $jokeContent['punchline'],
        ]);
    
        return response()->json(['joke' => $joke]);
    }

    public function getSavedJokes()
    {
        $user = auth()->user();

        $savedJokes = $user->jokesSaved;

        return response()->json(['savedJokes' => $savedJokes]);
    }
}