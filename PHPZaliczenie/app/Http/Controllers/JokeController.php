<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JokeController extends Controller
{
    public function getRandomJoke()
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'dad-jokes.p.rapidapi.com',
            'X-RapidAPI-Key' => 'da397b2d5cmsh40ec915acc20899p101adejsnb18d6953b187', 
        ])->get('https://dad-jokes.p.rapidapi.com/random/joke');

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch joke'], $response->status());
        }

        return $response->json();
    }
}
