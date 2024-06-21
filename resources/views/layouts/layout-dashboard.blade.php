<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/reset.css">
    @yield('links-css')
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route("home") }}">Home</a></li>
                <li><a href="{{ route("dashboard") }}">Biblioteca</a></li>
                <li><a href="{{ route("book-register") }}">Cadastrar Livros</a></li>
                <li><a href="{{ route("book-show") }}">Editar Livros</a></li>
                <li>
                    <form action="{{ route("logout") }}" method="post">
                        @csrf
                        <input type="submit" value="Sair">
                    </form>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>