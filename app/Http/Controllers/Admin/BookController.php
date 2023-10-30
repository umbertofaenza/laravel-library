<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function index()
    {


        $title = "Books";
        $books = Book::all();
        return view('admin.books.index', compact('title', 'books'));

    }

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('admin.books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     ** @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());
        $this->validation($data);
        $book = new Book();
        $book->fill($data);
        $book->save();
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $this->validation($request->all());
        $this->validation($data);
        $book->update($data);
        return redirect()->route('admin.books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index');
    }
    private function validation($data, $id = null){

        $validator = Validator::make(
            $data,
            [
                'title'=> 'required|string|max:70',
                'author'=> 'required|string|max:50',
                'isbn'=> 'required|string|max:15',
                'editor'=> 'required|string|max:30',
                'published_in' => 'required',
                'pages_num' => 'required|integer',
                'lent' => 'required',
                'lending_start' => 'required',
                'lending_end' => 'required',
                'cover'=> 'required|string',
                'quantity' => 'required|integer',
                'status' => 'required',

                'genre_id' => 'nullable|exists:genres,id'
            ],
            [
                'title.required'=> 'Il titolo è obbligatorio',
                'title.string'=> 'Il titolo deve essere una stringa',
                'title.max'=> 'Il titolo deve essere massimo di 70 caratteri',

                'author.required'=> 'Il campo autore è obbligatorio',
                'author.string'=> 'Il campo autore deve essere una stringa',
                'author.max'=> 'Il campo autore deve essere massimo di 50 caratteri',

                'isbn.required'=> 'Il campo isbn è obbligatorio',
                'isbn.string'=> 'Il campo isbn deve essere una stringa',
                'isbn.max'=> 'Il campo isbn deve essere massimo di 15 caratteri',

                'editor.required'=> 'Il campo editore è obbligatorio',
                'editor.string'=> 'Il campo editore deve essere una stringa',
                'editor.max'=> 'Il campo editore deve essere massimo di 30 caratteri',

                'published_in.required'=> 'Il campo pubblicazione è obbligatorio',

                'pages_num.required'=> 'Il Numero di pagine è obbligatorio',
                'pages_num.integer'=> 'Il Numero di pagine deve essere un intero',

                'lent.required'=> 'Il campo prestato è obbligatorio',

                'lending_start.required'=> 'Il campo inizio prestito è obbligatorio',

                'lending_end.required'=> 'Il campo fine prestito è obbligatorio',

                'cover.required'=> 'La cover è obbligatoria',
                'cover.string'=> 'La cover deve essere una stringa',

                'quantity.required'=> 'La quantità è obbligatoria',
                'quantity.integer'=> 'La quantità deve essere un intero',

                'status.required'=> 'Il campo status è obbligatorio',

                'genre_id.exists' => 'La categoria inserita non è valida'
            ]
        )->validate();
        return $validator;
    }
}
