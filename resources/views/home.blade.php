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
        <nav id="sidebar" class="card col-md-3 col-lg-2 d-md-block bg-light sidebar shadow-sm">
            <div class="position-sticky pt-3">
                <h5 class="sidebar-heading px-3 mb-3 text-muted font-weight-bold">Member Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link {{ request()->is('/home') ? 'active' : '' }}" href="/home">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link {{ request()->is('member/borrowed-books') ? 'active' : '' }}" href="/borrow">
                            <i class="fas fa-book-reader mr-2"></i> Borrow Books
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link {{ request()->is('member/borrowing-history') ? 'active' : '' }}" href="/borrowhistory">
                            <i class="fas fa-history mr-2"></i> Borrowing History
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link {{ request()->is('member/profile') ? 'active' : '' }}" href="/books">
                            <i class="fas fa-book mr-2"></i> Books
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

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg hover-shadow">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-book-reader fa-3x mb-3 text-primary"></i>
                            <h4 class="card-title mb-3">Borrow Books</h4>
                            <a href="/borrow" class="btn btn-primary btn-block">View Borrowed Books</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg hover-shadow">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-history fa-3x mb-3 text-success"></i>
                            <h4 class="card-title mb-3">Borrowing History</h4>
                            <a href="/borrowhistory" class="btn btn-success btn-block">View Borrowing History</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg hover-shadow">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-book fa-3x mb-3 text-info"></i>
                            <h4 class="card-title mb-3">Books</h4>
                            <a href="/books" class="btn btn-info btn-block">View Books</a>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>

@endsection
