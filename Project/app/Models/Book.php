<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['title', 'description', 'author_id'];
    
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
