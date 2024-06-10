@extends("layouts.layout-dashboard")
@section('title', "Biblioteca")
@section('links-css')
    <link rel="stylesheet" href="/css/library.css">
@endsection


@section('content')
    <h1>Sua Bibliotaca</h1>
    <hr>

    @if ($books->all())
        <div class="content">
            @foreach ($books->all() as $book)
                <div class=book>
                    <img src="/img/books/{{ $book->book_cover }}" alt="Capa do livro">
                    <h1>{{ $book->title }}</h1>
                    <p>{{ $book->author }}</p>
                </div>
            @endforeach
        </div>
        
        {{ $books->links() }}
    @else
        <p>Nada Aqui</p>
    @endif
@endsection