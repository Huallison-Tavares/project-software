@extends('layouts.layout-home')
@section('title', 'Cadastrar')

@section('content')
    <main>

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>    
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">
                Nome:
                <input type="text" required placeholder="Ex: João Aquino" id="name" name="name">
            </label>
            <label for="email">
                Email:
                <input type="email" required placeholder="Ex: exemplo@exemplo.com" id="email" name="email">
            </label>
            <label for="password">
                Senha:
                <input type="password" required placeholder="Senha..." id="password" name="password">
            </label>
            <label for="password_confirmation">
                Confirmar Senha:
                <input type="password" required placeholder="Senha..." id="password_confirmation" name="password_confirmation">
            </label>

            <input type="submit" value="Cadastrar">
        </form>
    </main>

@endsection