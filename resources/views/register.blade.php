@extends('layouts.layout-home')
@section('title', 'Cadastrar')
@section('links-css')
    <link rel="stylesheet" href="./css/register.css">
@endsection

@section('content')
<main>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <img src="./img/user.png" alt="Usuario">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="errors">{{ $error }}</p>
            @endforeach
        @endif
            <div class="inputs">
                <label for="name">
                    Nome:
                    <input type="text" value="{{ old("name") }}" required placeholder="Ex: João Aquino" id="name" name="name">
                </label>
                <label for="email">
                    Email:
                    <input type="email" value="{{ old("email") }}" required placeholder="Ex: exemplo@exemplo.com" id="email" name="email">
                </label>
                <label for="password">
                    Senha:
                    <input type="password" value="{{ old("password") }}" required placeholder="Senha de pelo menos 8 caracteres" id="password" name="password">
                </label>
                <label for="password_confirmation">
                    Confirmar Senha:
                    <input type="password" value="{{ old("password_confirmation") }}" required placeholder="Senha de pelo menos 8 caracteres" id="password_confirmation" name="password_confirmation">
                </label>
            </div>
            
            
            <input type="submit" value="Cadastrar">
        </form>
    </main>

@endsection