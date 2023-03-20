<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
    protected $table = "authors";

    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
    protected $primaryKey = 'author_id';
}