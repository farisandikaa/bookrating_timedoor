<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // List with search & per_page (10..100 step 10). First load default shows top 10 by avg rating
    public function index(Request $request)
    {
        $perPage = (int) $request->get('per_page', 10);
        $perPage = in_array($perPage, [10,20,30,40,50,60,70,80,90,100]) ? $perPage : 10;
        $q = $request->get('q', null);

        // subquery aggregate avg & count per book
        $ratingsAgg = DB::table('ratings')
            ->select('book_id', DB::raw('AVG(rating) as avg_rating'), DB::raw('COUNT(*) as voter_count'))
            ->groupBy('book_id');

        $query = DB::table('books')
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->leftJoinSub($ratingsAgg, 'ragg', function($join){
                $join->on('books.id', '=', 'ragg.book_id');
            })
            ->select(
                'books.id',
                'books.name as book_name',
                'authors.name as author_name',
                DB::raw('COALESCE(ragg.avg_rating, 0) as avg_rating'),
                DB::raw('COALESCE(ragg.voter_count, 0) as voter_count')
            );

        if ($q) {
            $query->where(function($w) use ($q){
                $w->where('books.name','like','%'.$q.'%')
                  ->orWhere('authors.name','like','%'.$q.'%');
            });
        }


        $query->orderByDesc('avg_rating');


        $books = $query->paginate($perPage)->withQueryString();


        $perPageOptions = [10,20,30,40,50,60,70,80,90,100];

        return view('books.index', compact('books','perPage','perPageOptions','q'));
    }
}
