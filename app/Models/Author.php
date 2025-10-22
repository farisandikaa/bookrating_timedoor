<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

  
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function averageRating()
    {
        return $this->books()
            ->join('ratings', 'ratings.book_id', '=', 'books.id')
            ->avg('ratings.rating');
    }


    public function totalVotes()
    {
        return $this->books()
            ->join('ratings', 'ratings.book_id', '=', 'books.id')
            ->count('ratings.id');
    }
}
