<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = "category";

    protected $fillable = [
        'category'
    ];
    public $timestamps = false;
    protected $primaryKey = 'category_id';
}