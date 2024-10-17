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

        <nav id="sidebar" class="card  col-md-3 col-lg-2 d-md-block bg-light sidebar shadow-sm">
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

            <div class="card mt-0">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center">Books</h2>

                    <div class="row">
                        @foreach ($books as $book)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->book_name }}</h5>
                                        <p class="card-text">{{ $book->content }}</p>
                                        <p class="card-text"><strong>Total Copies:</strong> {{ $book->total_copies }}</p>
                                        <p class="card-text"><strong>Available Copies:</strong> {{ $book->available_copies }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>



        </main>
    </div>
</div>

@endsection
