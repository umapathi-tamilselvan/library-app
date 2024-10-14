@extends('layouts.app')

@section('content')

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
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
                        <a class="nav-link {{ request()->is('member/borrowed-books') ? 'active' : '' }}" href="/home/borrow">
                            <i class="fas fa-book-reader"></i> Borrow Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/borrowing-history') ? 'active' : '' }}" href="/member/borrowing-history">
                            <i class="fas fa-history"></i> Borrowing History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/profile') ? 'active' : '' }}" href="/home/books">
                            <i class="fas fa-user"></i> Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/profile') ? 'active' : '' }}" href="/member/profile">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Top navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/member/dashboard">Member Dashboard</a>
                </div>
            </nav>

            <!-- Cards for Member Actions -->
            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-book-reader fa-3x mb-3"></i>
                            <h4 class="card-title"> Borrow Books</h4>
                            <a href="/home/borrow" class="btn btn-primary">View Borrowed Books</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-history fa-3x mb-3"></i>
                            <h4 class="card-title">Borrowing History</h4>
                            <a href="/member/borrowing-history" class="btn btn-primary">View Borrowing History</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-history fa-3x mb-3"></i>
                            <h4 class="card-title"> Books</h4>
                            <a href="/home/books" class="btn btn-primary">View Books</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-user fa-3x mb-3"></i>
                            <h4 class="card-title">Profile</h4>
                            <a href="/member/profile" class="btn btn-primary">Go to Profile</a>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

@endsection
