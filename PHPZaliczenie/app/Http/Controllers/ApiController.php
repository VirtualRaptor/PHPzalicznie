<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Joke;


class ApiController extends Controller
{
    public function getUsers(Request $request)
    {
        $users =  User::all();
        return response()->json($users);
    }


    public function getUsersRank(Request $request){
        $result = [];

        $users = User::all();
        $usersIDS = [];
        $jokesCount = 0;
        foreach ($users as $user) {
            $usersIDS[] = $user->id;
            $count = $user->jokesSaved()->count();
            $key = "{$count}-{$user->username}";
            $result[$key] = (object)[
                'id' => $user->id,
                'name'=>$user->username,
                'count'=>$count,
                'rank' =>0
            ];
        }

        krsort($result);
        $rank = 0;
        foreach($result as $key=>$row){
            $rank ++;
            $result[$key]->rank = $rank;
        }
        
        return array_values($result);
    }


    public function setUserJoke(Request $request){
        $result = [];
        $user_id = $request->input('user_id');
        $result['status']  = 'error';

        $joke = Joke::create([
            'type' => 1,
            'setup' => 1,
            'punchline'=> 1,
            'user_id' => $user_id
        ]);

        if($joke){
            $result['status'] = 'success';
            $result['joke'] = $joke;
        }
        return $result;
    }
}
