@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
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
                        <a class="nav-link {{ request()->is('admin/consumer') ? 'active' : '' }}" href="/admin/consumer">
                            <i class="bi bi-people"></i> Consumers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/book') ? 'active' : '' }}" href="/admin/book">
                            <i class="bi bi-book"></i> Manage Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/view') ? 'active' : '' }}" href="/admin/view">
                            <i class="bi bi-person"></i> Manage Users
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
                    <a class="navbar-brand" href="/home/admin">Admin Dashboard</a>

                </div>
            </nav>

            <div class="card mt-0">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container d-md-block bg-light sidebar shadow-sm">
                        <h2 class="text-center">Books</h2>
                        <a href="/admin/book/create" class="btn btn-primary btn-lg">Add Book</a>
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


