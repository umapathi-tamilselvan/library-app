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

        <!-- Sidebar Menu -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar shadow-sm">
            <div class="position-sticky pt-3">
                <h5 class="sidebar-heading px-3 mb-1 text-muted">Admin Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home/admin') ? 'active' : '' }}" href="/home/admin">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/member') ? 'active' : '' }}" href="/user">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/book') ? 'active' : '' }}" href="/book">
                            <i class="bi bi-book"></i> Manage Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/librarian') ? 'active' : '' }}" href="/borrowedhistory">
                            <i class="bi bi-person"></i> Borrow History
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/home/admin">Admin Dashboard</a>
                </div>
            </nav>

            <!-- Cards Section -->
            <div class="row g-4">

                <!-- Users Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm card-hover" style="background: linear-gradient(135deg, #2a5298, #1e3c72);">
                        <div class="card-body text-white text-center">
                            <i class="bi bi-person-plus-fill display-5 mb-3"></i>
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">Manage all users registered on the platform.</p>
                            <a href="/user" class="btn btn-outline-light">View Members</a>
                        </div>
                    </div>
                </div>

                <!-- Manage Books Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm card-hover" style="background: linear-gradient(135deg, #b24592, #f15f79);">
                        <div class="card-body text-white text-center">
                            <i class="bi bi-book-fill display-5 mb-3"></i>
                            <h5 class="card-title">Manage Books</h5>
                            <p class="card-text">Oversee the library of books available in the system.</p>
                            <a href="/book" class="btn btn-outline-light">Manage Books</a>
                        </div>
                    </div>
                </div>

                <!-- Borrow History Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm card-hover" style="background: linear-gradient(135deg, #1e3c72, #2a5298);">
                        <div class="card-body text-white text-center">
                            <i class="bi bi-clock-history display-5 mb-3"></i>
                            <h5 class="card-title">Borrow History</h5>
                            <p class="card-text">Track the borrowing history of users and books.</p>
                            <a href="/borrowedhistory" class="btn btn-outline-light">View Borrow History</a>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>


@endsection
