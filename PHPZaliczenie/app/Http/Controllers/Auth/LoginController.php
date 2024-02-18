<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{

    public function __construct() 
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        
        return view('auth.login');
        
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if(!auth()->attempt($request->only('email','password')))
        {
            return back()->with('status', 'Invalid login details');
        }
        return redirect()->route('home');
    }

    public function fetchUserFromDB()
    {
        $user = User::on('mysql')->where('id', 1)->first();
    
        if ($user) {
            $username = $user->username;
            return response()->json(['username' => $username]);
        } else {
            return response()->json(['error' => 'Użytkownik o podanym ID nie istnieje.'], 404);
        }
    }
}
