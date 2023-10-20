<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title',
    'author',
    'isbn',
    'editor',
    'published_in',
    'pages_num',
    'lent',
    'lending_start',
    'lending_end',
    'cover',
    'quantity',
    'status'];
}
