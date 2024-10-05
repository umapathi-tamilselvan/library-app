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

        <main class="col-md-9 ms-sm-auto col-lg-10 px-8">
            <div class="card mt-0">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <h2 class="text-center">Add book</h2>
                        <form action="/home/book" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="book_name" class="form-label">Book Name</label>
                                <input type="text" class="form-control" id="book_name" name="book_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <input type="text" class="form-control" id="content" name="content" required>
                            </div>
                            <div class="mb-3">
                                <label for="total_copies" class="form-label">Total Copies</label>
                                <input type="text" class="form-control" id="total_copies" name="total_copies" required>
                            </div>
                            <div class="mb-3">
                                <label for="available_copies" class="form-label">Available Copies</label>
                                <input type="text" class="form-control" id="available_copies" name="available_copies" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </form>

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

