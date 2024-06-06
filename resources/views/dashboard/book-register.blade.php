@extends('layouts.layout-dashboard')
@section('title', 'Cadastrar Livros')

@section('content')
    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>    
    @endif

    <form action="{{ route("book-register") }}" method="post">
        @csrf

        <label for="author">
            Autor:
            <input type="text" required placeholder="Ex: João Aquino" id="author" name="author">
        </label>
        <label for="title">
            Título:
            <input type="text" required placeholder="Ex: title" id="title" name="title">
        </label>
        <label for="subtitle">
            Subtítulo:
            <input type="text" required placeholder="Ex: Livro massa" id="subtitle" name="subtitle">
        </label>
        <label for="edition">
            Edição:
            <input type="text" required placeholder="Ex: 1° Edição" id="edition" name="edition">
        </label>
        <label for="book-publisher">
            Editora:
            <input type="text" required placeholder="Ex: Editora" id="book-publisher" name="book-publisher">
        </label>
        <label for="year-publication">
            Ano de Publicação:
            <input type="number" min="1900" max="{{ date("Y") }}" required placeholder="Ex: 2024" id="year-publication" name="year-publication">
        </label>
        <label for="book-cover">
            Capa do Livro:
            <input type="file" id="book-cover" name="book-cover">
        </label>

        <input type="submit" value="Cadastrar">
    </form>

@endsection