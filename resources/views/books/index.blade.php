@extends('layouts.app')


@section('main-content')
    <section class="container mt-5">
        <h1 class="text-light">{{ $title }}</h1>
        <a href="{{ route('books.create') }}" class="btn btn-outline-success my-4">Add new book</a>
        <div class="row row-cols-2 g-3">

            @forelse($books as $book)
                <div class="col">
                    <div class="card {{ $book->lent ? 'border-danger' : 'border-success' }}">
                        <div class="card-body">
                            <ul>
                                <li>Title: {{ $book->title }}</li>
                                <li>Author: {{ $book->author }}</li>
                                <li>{{ $book->lent ? 'Not Available' : 'Available' }}</li>
                                <li>
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-outline-success">More details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                No books found.
            @endforelse
        </div>
    </section>
@endsection
