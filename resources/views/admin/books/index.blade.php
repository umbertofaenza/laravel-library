@extends('layouts.app')


@section('content')
    <section class="container mt-5">
        <h1 class="text-light">{{ $title }}</h1>
        <hr>
        <a href="{{ route('admin.books.create') }}" class="btn btn-outline-success my-1">Add new book</a>
        <hr>
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
                                    <span class="badge"
                                        style="background-color:{{ $book->genre?->color }}">{{ $book->genre?->label }}
                                    </span>
                                </li>

                                <li>
                                    @foreach ($book->types as $type)
                                        <span class="badge"
                                            style="background-color:{{ $type?->color }}">{{ $type?->label }}
                                        </span>
                                    @endforeach
                                </li>
                            </ul>

                            <a href="{{ route('admin.books.show', $book) }}"
                                class="p-0 my-2 px-1 btn btn-outline-success">More details</a>

                            <a href="{{ route('admin.books.edit', $book) }}"
                                class="p-0 my-2 px-1 btn btn-outline-warning">Edit</a>

                            <a data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $book->id }}"
                                class="p-0 my-2 px-1 btn btn-outline-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @empty
                No books found.
            @endforelse
        </div>
    </section>
    @foreach ($books as $book)
        <div class="modal fade" id="delete-modal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina elemento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sei scuro di voler eliminare definitivamente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
