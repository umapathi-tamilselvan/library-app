@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Consumer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/home/consumer" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="librarian_id" class="form-label">Librarian</label>
            <select name="librarian_id" class="form-select">
                @foreach ($librarians as $librarian)
                    <option value="{{ $librarian->id }}">{{ $librarian->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select name="book_id" class="form-select">
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
