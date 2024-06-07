@extends("layouts.layout-dashboard")
@section("title", "Meus Livros")

@section("content")
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
                        <th>
                            <button><a href="editar/{{ $book->id }}">Editar</a></button>
                            <button><a href="remover/{{ $book->id }}">Excluir</a></button>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <br>
        {{ $books->links() }}
    @else
        <p>Não tem livros</p>
    @endif


@endsection