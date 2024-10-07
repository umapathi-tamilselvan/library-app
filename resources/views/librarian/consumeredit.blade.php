@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <main class="col-md-10 col-lg-8">
            <div class="card mt-3 shadow-lg rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Consumer Details') }}</h4>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
        <div class="form-group mt-3">
            <label for="borrowed_at">Borrow Date</label>
            <input type="date" class="form-control" id="borrowed_at" name="borrowed_at"  required>
        </div>
        <div class="form-group mt-3">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <div class="form-group mt-3">
            <label for="returned_at">Returned Date</label>
            <input type="date" class="form-control" id="returned_at" name="returned_at" >
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

            </div>
        </main>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Add Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Add some custom JS for search functionality -->

@endsection
