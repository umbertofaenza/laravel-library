@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-light">Edit book</h1>

        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-success">Back to list</a>
        @if($errors->any())
        <div class="alert alert-danger">
            <h3>Correggi i seguenti errori:</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('admin.books.update', $book) }}" method="POST" class="row g-4">
        @csrf
        @method('PUT')
        <div class="col-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="col-3">
            <label for="author" class="form-label">author</label>
            <input type="text" name="author" id="author" class="form-control">
        </div>
        <div class="col-3">
            <label for="isbn" class="form-label">isbn</label>
            <input type="text" name="isbn" id="isbn" class="form-control">
        </div>
        <div class="col-3">
            <label for="editor" class="form-label">editor</label>
            <input type="text" name="editor" id="editor" class="form-control">
        </div>
        <div class="col-3">
            <label for="published_in" class="form-label">Published year</label>
            <input type="number" name="published_in" id="published_in" min="1900" max="2099" step="1"  class="form-control">
        </div>
        <div class="col-3">
            <label for="pages_num" class="form-label">Total pages</label>
            <input type="number" name="pages_num" id="pages_num" min="1" step="1"  class="form-control">
        </div>
        <div class="col-3">
            <label for="lent" class="form-label" >Lent</label>
            <select name="lent" id="lent" class="form-select">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="col-3">
            <label for="lending_start" class="form-label">Lending start</label>
            <input type="date" name="lending_start" id="lending_start"  class="form-control">
        </div>
        <div class="col-3">
            <label for="lending_end" class="form-label">Lending end</label>
            <input type="date" name="lending_end" id="lending_end"  class="form-control">
        </div>
        <div class="col-3">
            <label for="cover" class="form-label">Cover</label>
            <input type="url" name="cover" id="cover"  class="form-control">
        </div>
        <div class="col-3">
            <label for="quantity" class="form-label">quantity</label>
            <input type="number" name="quantity" id="quantity" min="1" step="1"  class="form-control">
        </div>
        <div class="col-3">
            <label for="status" class="form-label">status (1=bad 5=good)</label>
            <select name="status" id="status" class="form-select">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="col-3">
            <button class="btn btn-outline-success">Save</button>
        </div>

        


        </form>
    </div>
@endsection
