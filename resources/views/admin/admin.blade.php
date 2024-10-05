@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <h5 class="sidebar-heading px-3 mt-4 mb-1 text-muted">Admin Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home/admin">
                            <i class="bi bi-house-door"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/consumer">
                            <i class="bi bi-person-plus"></i>
                            Consumer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/book">
                            <i class="bi bi-book"></i>
                            Manage Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/view">
                            <i class="bi bi-person"></i>
                            Manage Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-gear"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3
        ">
            <!-- Top navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Admin Dashboard</a>
                    <form class="d-flex ms-auto">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </nav>

            <!-- Main Card -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-primary text-white">{{ __('Welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <h2 class="mb-4">Welcome to the Admin Dashboard</h2>
                        <p class="text-muted mb-4">Here you can manage consumers, books, and settings.</p>
                        <hr>
                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <a href="/home/consumer" class="btn btn-primary btn-lg px-4">Consumer</a>
                            <a href="/home/book" class="btn btn-secondary btn-lg px-4">Manage Books</a>
                            <a href="/user/view" class="btn btn-warning btn-lg px-4">Manage Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Add Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection
