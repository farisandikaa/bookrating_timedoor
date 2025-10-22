<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function top()
    {
        $authors = DB::table('authors')
            ->join('books','books.author_id','=','authors.id')
            ->join('ratings','ratings.book_id','=','books.id')
            ->where('ratings.rating','>',5)
            ->select('authors.id','authors.name', DB::raw('COUNT(ratings.id) as voter'))
            ->groupBy('authors.id','authors.name')
            ->orderByDesc('voter')
            ->limit(10)
            ->get();

        return view('authors.top', compact('authors'));
    }
}
