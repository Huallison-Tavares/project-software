<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    
    public function index()
    {
        $books = Book::where("user_id", Auth::id())->paginate(20);
        return view("dashboard.library", compact('books'));
    }

    public function registerBook()
    {
        return view("dashboard.book-register");
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'author' => ['required', 'string'],
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'edition' => ['required', 'string'],
            'book_publisher' => ['required', 'string'],
            'year_publication' => ['required'],
            'book_cover' => ['image', 'mimes:jpg,jpeg,png'],
        ])->validate();

        if ($request->book_cover){
            $requestImage = $request->book_cover;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()) . strtotime("now") . "." . $extension;
            $request->book_cover->move(public_path('img/books'), $imageName);
        }else{
            $imageName = "no-image.png";
        }

        $addData =  ["user_id" => Auth::id(), 'book_cover' => $imageName];
        $book = array_merge($addData, $request->except('_token', 'book_cover'));

        Book::create($book);
        return redirect()->route("dashboard");
    }

    public function showBooks()
    {
        $books = Book::where("user_id", Auth::id())->paginate(40);
        return view("dashboard.book-show", compact('books'));
    }

    public function editBook(string $id)
    {
        $book = Book::find($id)->first();
        if($book){
            return view("dashboard.book-edit", ['book' => $book]);
        }
        return redirect()->route("book-show");
    }

    public function update(Request $request, string $id)
    {
        Validator::make($request->except('_token'), [
            'author' => ['required', 'min:3', 'string'],
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'edition' => ['required', 'string'],
            'book_publisher' => ['required', 'string'],
            'year_publication' => ['required'],
            'book_cover' => ['image', 'mimes:jpg,jpeg,png'],
        ])->validate();

        if ($request->book_cover){
            $requestImage = $request->book_cover;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()) . strtotime("now") . "." . $extension;
            $request->book_cover->move(public_path('img/books'), $imageName);

            // Adicionar a capa do livro no banco
            $book = array_merge(['book_cover' => $imageName], $request->except('_token', 'book_cover'));
        }else{
            // Não mudar a capa do livro no banco
            $book = $request->except('_token', 'book_cover');
        }

        Book::find($id)->update($book);
        return redirect()->route("book-show");
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route("book-show");
    }
}
