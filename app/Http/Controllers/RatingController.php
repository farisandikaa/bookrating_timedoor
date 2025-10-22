<?php
namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    public function create()
    {

        $authors = Author::orderBy('name')->get(['id','name']);

        $ratings = range(1,10);
        return view('ratings.create', compact('authors','ratings'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);


        $book = Book::where('id', $data['book_id'])
                    ->where('author_id', $data['author_id'])
                    ->first();

        if (!$book) {
            return back()->withErrors(['book_id' => 'Selected book does not belong to selected author'])->withInput();
        }


        Rating::create([
            'book_id' => $data['book_id'],
            'rating' => $data['rating'],
        ]);


        return redirect()->route('books.index')->with('success','Rating saved');
    }

    public function booksByAuthor(Author $author)
    {

        $books = Book::where('author_id', $author->id)
                     ->orderBy('name')
                     ->select('id','name')
                     ->get();

        return response()->json($books);
    }
}
