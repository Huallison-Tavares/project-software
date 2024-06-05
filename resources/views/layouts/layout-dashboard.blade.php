<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route("home") }}">Home</a></li>
                <li><a href="">Cadastrar Livros</a></li>
                <li><a href="">Meus Livros</a></li>
                <li><a href="{{ route("logout") }}">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
        
</body>
</html>