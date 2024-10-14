@extends('layouts.app')

@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid mt-5">
    <div class="row">

        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar shadow-sm">
            <div class="position-sticky pt-3">
                <h5 class="sidebar-heading px-3 mb-1 text-muted">Member Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/home') ? 'active' : '' }}" href="/home">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/borrowed-books') ? 'active' : '' }}" href="/borrow">
                            <i class="fas fa-book-reader"></i> Borrow Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/borrowing-history') ? 'active' : '' }}" href="/borrowhistory">
                            <i class="fas fa-history"></i> Borrowing History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/profile') ? 'active' : '' }}" href="/books">
                            <i class="fas fa-user"></i> Books
                        </a>
                    </li>


                </ul>
            </div>
        </nav>


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/home">User Dashboard</a>
                </div>
            </nav>
            <div class="card-body">
                <form action="{{ route('borrow.store') }}"  method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="book_id" class="form-label">Book</label>
                        <select name="book_id" class="form-select">
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user_name">User</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                    <div class="form-group">
                        <label for="borrowed_at">Borrow Date</label>
                        <input type="date" class="form-control @error('borrowed_at') is-invalid @enderror" id="borrowed_at" name="borrowed_at" required>
                        @error('borrowed_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                    </div>


                    <div class="form-group">
                        <label for="returned_at">Returned Date</label>
                        <input type="date" class="form-control" id="returned_at" name="returned_at">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </main>
    </div>
</div>

@endsection


