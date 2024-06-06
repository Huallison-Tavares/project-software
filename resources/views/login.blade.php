@extends('layouts.layout-home')
@section('title', 'Login')

@section('content')
    <main>

        @if(session('loginError'))
            <p>{{ session('loginError') }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">
                Email:
                <input type="email" placeholder="Ex: exemplo@exemplo.com" id="email" name="email">
            </label>
            <label for="password">
                Senha:
                <input type="password" placeholder="Senha..." id="password" name="password">
            </label>
            <input type="submit" value="Entrar">
        </form>
    </main>
@endsection