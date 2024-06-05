<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ])->validate();

        User::create($request->only(['name', 'password', 'email']));

        return redirect("/");
    }
}
