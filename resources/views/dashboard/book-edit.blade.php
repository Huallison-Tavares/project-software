@extends("layouts.layout-dashboard")
@section('title', "Biblioteca")
@section('links-css')
    <link rel="stylesheet" href="/css/book-form.css">
    <link rel="stylesheet" href="/css/header.css">
@endsection

@section('content')
    <form action="/dashboard/editar/{{ $book->id }}" method="post" enctype="multipart/form-data">
        @csrf

        <img src="/img/logo-blue.png" alt="logo">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="errors">{{ $error }}</p>
            @endforeach  
        @endif

        <div class="inputs">
            <label for="author">
                Autor:
                <input value="{{ $book->author }}" type="text" required placeholder="Ex: João Aquino" id="author" name="author">
            </label>
            <label for="title">
                Título:
                <input value="{{ $book->title }}" type="text" required placeholder="Ex: title" id="title" name="title">
            </label>
            <label for="subtitle">
                Subtítulo:
                <input value="{{ $book->subtitle }}" type="text" required placeholder="Ex: Livro massa" id="subtitle" name="subtitle">
            </label>
            <label for="edition">
                Edição:
                <input value="{{ $book->edition }}" type="text" required placeholder="Ex: 1° Edição" id="edition" name="edition">
            </label>
            <label for="book_publisher">
                Editora:
                <input value="{{ $book->book_publisher }}" type="text" required placeholder="Ex: Editora" id="book_publisher" name="book_publisher">
            </label>
            <label for="year_publication">
                Ano de Publicação:
                <input value="{{ $book->year_publication }}" type="number" min="1900" max="{{ date("Y") }}" required placeholder="Ex: 2024" id="year_publication" name="year_publication">
            </label>
            <label for="book_cover">
                Capa do Livro:
                <input type="file" id="book_cover" name="book_cover">
            </label>
        </div>

        <input type="submit" value="Editar">
    </form>
@endsection