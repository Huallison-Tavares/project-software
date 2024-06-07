<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.library");
    }

    public function registerBook()
    {
        return view("dashboard.book-register");
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'author' => ['required', 'min:3', 'string'],
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'edition' => ['required', 'string'],
            'book_publisher' => ['required', 'string'],
            'year_publication' => ['required'],
            'book_cover' => [],
        ])->validate();

        
        $idUser =  ["user_id" => Auth::user()->id];
        $book = array_merge($idUser, $request->except('_token'));

        Book::create($book);
        return redirect()->action([BibliotecaController::class, 'index']);
    }

    public function showBooks()
    {
        // $books = Book::where("user_id", Auth::user()->id)->get();
        $books = Book::paginate(1);
        // return view("dashboard.book-show", ['books' => $books]);
        return view("dashboard.book-show", compact('books'));
    }

    public function editBook(string $id)
    {
        $book = Book::where("id", $id)->first();
        if($book){
            return view("dashboard.book-edit", ['book' => $book]);
        }
        return redirect()->action($this->showBooks());
    }

    public function update(Request $request, string $id)
    {
        // $idUser =  ["user_id" => Auth::user()->id];
        Book::where("id", $id)->update($request->except('_token'));
        return redirect("/dashboard/livros");
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect("/dashboard/livros");
    }
}
