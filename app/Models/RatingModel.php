<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    protected $table = "rating";
    protected $fillable = [
        'rating',
        'book_id'
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_rating';
}