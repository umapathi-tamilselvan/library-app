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
                        <h2 class="text-center">Welcome to the Admin Dashboard</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                <tr>
                                  <th>S.No</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Book ID</th>

                                </tr>
                              </thead>
                             @foreach ($consumers as $consumer )

                              <tbody>
                                <tr >
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{$consumer->name}}</td>
                                  <td>{{$consumer->email}}</td>
                                  <td>{{$consumer->book_id}}</td>
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

