@extends('layouts.layout-dashboard')
@section('title', 'Cadastrar Livros')
@section('links-css')
    <link rel="stylesheet" href="/css/book-form.css">
    <link rel="stylesheet" href="/css/header.css">
@endsection

@section('content')

<form action="{{ route("book-register") }}" method="post" enctype="multipart/form-data">
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
            <input value="{{ old("author") }}" type="text" required placeholder="Ex: João Aquino" id="author" name="author">
        </label>
        <label for="title">
            Título:
            <input value="{{ old("title") }}" type="text" required placeholder="Ex: title" id="title" name="title">
        </label>
        <label for="subtitle">
            Subtítulo:
            <input value="{{ old("subtitle") }}" type="text" required placeholder="Ex: Livro massa" id="subtitle" name="subtitle">
        </label>
        <label for="edition">
            Edição:
            <input value="{{ old("edition") }}" type="text" required placeholder="Ex: 1° Edição" id="edition" name="edition">
        </label>
        <label for="book_publisher">
            Editora:
            <input value="{{ old("book_publisher") }}" type="text" required placeholder="Ex: Editora" id="book_publisher" name="book_publisher">
        </label>
        <label for="year_publication">
            Ano de Publicação:
            <input value="{{ old("year_publication") }}" type="number" min="1900" max="{{ date("Y") }}" required placeholder="Ex: 2024" id="year_publication" name="year_publication">
        </label>
        <label for="book_cover">
            Capa do Livro:
            <input type="file" id="book_cover" name="book_cover">
        </label>
    </div>
        
    <input type="submit" value="Cadastrar">
</form>

@endsection