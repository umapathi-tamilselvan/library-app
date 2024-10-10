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
                        <a class="nav-link {{ request()->is('admin/member') ? 'active' : '' }}" href="/admin/member">
                            <i class="bi bi-people"></i> Member
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/book') ? 'active' : '' }}" href="/admin/book">
                            <i class="bi bi-book"></i> Manage Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/librarian') ? 'active' : '' }}" href="/admin/librarian">
                            <i class="bi bi-person"></i> Manage Librarians
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


         <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="container align-items-center">
                    <a href="/admin/librarian/create" class="btn btn-primary mb-3">
                        <i class="bi bi-plus-circle"></i> Add Librarian
                    </a>
                </div>
                <div class="container d-md-block bg-light sidebar shadow-sm">
                    <h2 class="text-center">Welcome to the Admin Dashboard</h2>
                    <div class="table-responsive">
                        <div class="container d-md-block bg-light sidebar shadow-sm">
                            <h2 class="text-center">Borrow History</h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Librarian</th>
                                            <th>Member id</th>
                                            <th>Book</th>
                                            <th>Borrowed At</th>
                                            <th>Due Date</th>
                                            <th>Returned At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrowedRecords as $borrowedRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $borrowedRecord->librarian_id }}</td>
                                                <td>{{ $borrowedRecord->member_id }}</td>
                                                <td>{{ $borrowedRecord->book_id }}</td>
                                                <td>{{ $borrowedRecord->borrowed_at }}</td>
                                                <td>{{ $borrowedRecord->due_date }}</td>
                                                <td>{{ $borrowedRecord->returned_at }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
        </main>
    </div>
</div>
@endsection
