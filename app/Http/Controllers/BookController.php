<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $title = "Books";
        $books = Book::all();

        return view('books', compact('title', 'books'));
    }
}