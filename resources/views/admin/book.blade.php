@extends('layouts.app')

@section('content')
@if (session('status'))
    <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show fixed-alert" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container-fluid">
    <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm w-100">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home/admin">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-pills me-auto mb-2 mb-lg-0">
                        <li class="nav-item primary">
                            <a class="nav-link {{ request()->is('home/admin') ? 'active' : '' }}" href="/home/admin">
                                <i class="bi bi-house-door "></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/member') ? 'active' : '' }}" href="/user">
                                <i class="bi bi-house-door"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/book') ? 'active' : '' }}" href="/book">
                                <i class="bi bi-house-door"></i> Manage Books
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/librarian') ? 'active' : '' }}" href="/borrowedhistory">
                                <i class="bi bi-house-door"></i> Borrow History
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

            <div class="card w-100" style="margin-top: 10px;">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center">Books</h2>
                    <a href="/book/create" class="btn btn-primary btn-lg mb-4">Add Book</a>

                    <div class="row d-flex justify-content-center">
                        @foreach ($books as $book)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->book_name }}</h5>
                                        <p class="card-text">{{ $book->content }}</p>
                                        <p class="card-text"><strong>Total Copies:</strong> {{ $book->total_copies }}</p>
                                        <p class="card-text"><strong>Available Copies:</strong> {{ $book->available_copies }}</p>
                                        <a href="#" class="btn btn-primary">View Details</a>
                                        <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
