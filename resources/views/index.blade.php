@extends('layouts.layout-home')
@section('title', 'Inicial')
@section('links-css')
    <link rel="stylesheet" href="./css/index.css">
@endsection

@section('content')
    <header>
        <nav>
            <div class="logo">
                <img src="./img/logo.png" alt="logo">
            </div>

            <ul>
                <li>
                    @if (auth()->user())
                        <form action="{{ route("logout") }}" method="post">
                            @csrf
                            <input type="submit" value="Sair">
                        </form>
                    @else
                        <a href="{{ route('login') }}">
                            <button>Entrar</button>
                        </a>
                    @endif
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="content">
            <h1>
                CRIE SUA<br>BIBLIOTECA
            </h1>

            <p>
                Mantenha sua rotina de leitura sempre em dia! Crie e gerencie uma lista personalizada de todos os seus títulos favoritos, atualizada regularmente para garantir que você nunca perca de vista as obras que deseja explorar
            </p>

            <a href="{{ route("dashboard") }}">
                <button type="button">
                    Comece Agora
                </button>
            </a>
        </div>
        <div class="img">
            <img src="./img/books.png" alt="Livros">
        </div>
    </main>

    <div class="background"></div>
@endsection