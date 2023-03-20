<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $table = "books";

    protected $fillable = [
        'books_name, author_id',
        'category_id'
    ];
    public $timestamps = false;
    protected $primaryKey = 'books_id';
}