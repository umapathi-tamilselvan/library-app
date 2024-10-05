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
        <main class="col-md-9 ms-sm-auto col-lg-10 px-5">
            <div class="card mt-0">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <h2 class="text-center">Books</h2>
                        <a href="/home/book/create" class="btn btn-primary btn-lg">Add Book</a>
                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                <tr>
                                  <th>S.No</th>
                                  <th>Book name</th>
                                  <th>Content</th>
                                  <th>Total Copies</th>
                                  <th>Available Copies</th>

                                </tr>
                              </thead>
                             @foreach ($books as $book )

                              <tbody>
                                <tr >
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{$book->book_name}}</td>
                                  <td>{{$book->content}}</td>
                                  <td>{{$book->total_copies}}</td>
                                  <td>{{$book->available_copies}}</td>
                                </tr>

                              </tbody>

                             @endforeach
                            </table>

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

