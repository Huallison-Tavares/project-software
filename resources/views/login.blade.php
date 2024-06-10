@extends('layouts.layout-home')
@section('title', 'Login')
@section('links-css')
    <link rel="stylesheet" href="./css/form.css">
@endsection

@section('content')
    <main>        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <img src="./img/user.png" alt="Usuario">
            
            @if(session('loginError'))
                <p class="errors">{{ session('loginError') }}</p>
            @endif
            <div class="inputs">
                <label for="email">
                    Email:
                    <input type="email" placeholder="Ex: exemplo@exemplo.com" id="email" name="email">
                </label>
                <label for="password">
                    Senha:
                    <input type="password" placeholder="Senha..." id="password" name="password">
                </label>
            </div>
            

            <a href="{{ route('register') }}">Ainda não tem conta ?</a>
            <input type="submit" value="Entrar">
        </form>
    </main>
@endsection