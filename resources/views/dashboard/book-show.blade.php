@extends("layouts.layout-dashboard")
@section("title", "Meus Livros")
@section('links-css')
    <link rel="stylesheet" href="/css/show.css">
    <link rel="stylesheet" href="/css/header.css">
@endsection

@section("content")
    <h1>Editar Livros</h1>

    @if ($books->all())
        <table>
            <thead>
                <tr>
                    <th>Autor</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Edição</th>
                    <th>Editora</th>
                    <th>Ano de publicação</th>
                    <th>Funções</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->subtitle }}</td>
                        <td>{{ $book->edition }}</td>
                        <td>{{ $book->book_publisher }}</td>
                        <td>{{ $book->year_publication }}</td>
                        <td>
                            <a href="editar/{{ $book->id }}"><button><img src="/img/icons8-edit-60.png" alt="Editar"></button></a>
                            <a href="remover/{{ $book->id }}"><button><img src="/img/icons8-trash-64.png" alt="Deletar"></button></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <br>
        {{ $books->links() }}
    @else
        <p>Nenhum Livro Cadastrado</p>
    @endif


@endsection