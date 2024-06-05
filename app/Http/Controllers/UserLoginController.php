<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){        
        $user = User::where('email', $request->input('email'))->first();
        dd($user);

    }
}
