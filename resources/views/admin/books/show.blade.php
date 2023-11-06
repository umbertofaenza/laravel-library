@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-light">{{ $book->title }} - <span class="text-primary"> {{ $book->id }}</span></h1>
        <hr>
        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-success">Back to list</a>
        <hr>
        <div>

            <div class="row">
                <div class="col-6 my-2">
                    <strong>
                        Title:
                    </strong>
                    {{ $book->title }}

                </div>
                <div class="col-6 my-2">
                    <strong>
                        Author:
                    </strong>
                    {{ $book->author }}

                </div>
                <div class="col-6 my-2">
                    <strong>
                        Genre:
                    </strong>
                    <div class="badge" style="background-color:{{ $book->genre->color }}">
                        {{ $book->genre ? $book->genre->label : 'Nessun Genere' }}
                    </div>

                </div>
                <div class="col-6 my-2">
                    <strong>
                        Type:
                    </strong>
                    @foreach ($book->types as $type)
                        <div class="badge" style="background-color:{{ $type->color }}">
                            {{ $type ? $type->label : 'Nessun Genere' }}
                        </div>
                    @endforeach
                </div>
                <div class="col-6 my-2">
                    <strong>
                        Avaible?
                    </strong>
                    {{ $book->lent ? 'Not Available' : 'Available' }}

                </div>
                <div class="col-6 my-2">
                    <strong>
                        ISBN
                    </strong>
                    {{ $book->isbn }}
                </div>
                <div class="col-6 my-2">
                    <strong>
                        Editor
                    </strong>
                    {{ $book->editor }}
                </div>
                <div class="col-6 my-2">
                    <strong>
                        Published In
                    </strong>
                    {{ $book->published_in }}
                </div>
                <div class="col-6 my-2">
                    <strong>
                        Pages
                    </strong>
                    {{ $book->pages_num }}
                </div>
                <div class="col-6 my-2">
                    <strong>
                        Lending start
                    </strong>
                    {{ $book->lending_start }}
                </div>
                <div class="col-6 my-2">
                    <strong>
                        Lending end
                    </strong>
                    {{ $book->lending_end }}
                </div>
                <div class="col-6 my-2">
                    <strong>
                        Cover
                    </strong>
                    <img src="{{ $book->cover }}" alt="{{ $book->cover }}">

                </div>
                <div class="col-6 my-2">
                    <strong>
                        Quantity:
                    </strong>
                    {{ $book->quantity }}
                </div>
                <div class="col-6 my-2">
                    <strong>
                        status
                    </strong>
                    {{ $book->status }}
                </div>
                {{-- <div class="col-6 my-2">
                    <strong>
                        
                    </strong>
                    {{$book->}}
                </div> --}}

            </div>




        </div>
    </div>
@endsection
