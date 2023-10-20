@extends('layouts.app')

@section('main-content')
<div class="container">
    <a href="{{ route('books.index') }}" class="btn btn-outline-success">Back to list</a>
    <div class="col">
        <div class="card {{ $book->lent ? 'border-danger' : 'border-success' }}">
            <div class="card-body">
                <ul>
                    <li>Title: {{ $book->title }}</li>
                    <li>Author: {{ $book->author }}</li>
                    <li>{{ $book->lent ? 'Not Available' : 'Available' }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection