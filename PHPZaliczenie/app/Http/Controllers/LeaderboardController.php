<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class LeaderboardController extends Controller
{
    public function getLeaderboardData(): JsonResponse
    {
        $users = User::orderBy('jokesCount', 'desc')->take(3)->get();
        return response()->json(['leaderboard' => $users]);
    }
}