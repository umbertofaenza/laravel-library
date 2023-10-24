@extends('layouts.app')


@section('content')
    <section class="container mt-5">
        <h1 class="text-light">{{ $title }}</h1>
        <a href="{{ route('admin.books.create') }}" class="btn btn-outline-success my-4">Add new book</a>
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
                                    <a href="{{ route('admin.books.show', $book) }}" class="btn btn-outline-success">More details</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-outline-warning">Edit</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $book->id }}" class="btn btn-outline-danger">
                                        Delete
                                    </a>
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
    @foreach($books as $book)
              <div class="modal fade" id="delete-modal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
