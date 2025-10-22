<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'category_id',
        'name',
        'description',
    ];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }


    public function voterCount()
    {
        return $this->ratings()->count();
    }
}
