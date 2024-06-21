<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){        
        $user = User::where('email', $request->input('email'))->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::loginUsingId($user->id, true);
                return redirect()->route("dashboard");
            }
        }

        return redirect()->route("login")->with("loginError", "Email ou Senha Incorretos !!!");

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("home");
    }
}
