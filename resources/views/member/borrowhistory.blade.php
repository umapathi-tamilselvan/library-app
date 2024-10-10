@extends('layouts.app')

@section('content')

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
                        <a class="nav-link {{ request()->is('member/borrowed-books') ? 'active' : '' }}" href="/home/borrow/books">
                            <i class="fas fa-book-reader"></i> Borrow Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/borrowing-history') ? 'active' : '' }}" href="/home/borrowhistory">
                            <i class="fas fa-history"></i> Borrowing History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/profile') ? 'active' : '' }}" href="/home/books">
                            <i class="fas fa-book-reader"></i> Books
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
                    <a class="navbar-brand" href="/home">Member Dashboard</a>
                </div>
            </nav>


            <div class="container d-md-block bg-light sidebar shadow-sm">
                <h2 class="text-center">Borrow History</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Librarian</th>
                                <th>Book</th>
                                <th>Borrowed At</th>
                                <th>Due Date</th>
                                <th>Returned At</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowedRecords as $borrowedRecord)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $borrowedRecord->librarian_id }}</td>
                                    <td>{{ $borrowedRecord->book_id }}</td>
                                    <td>{{ $borrowedRecord->borrowed_at }}</td>
                                    <td>{{ $borrowedRecord->due_date }}</td>
                                    <td>{{ $borrowedRecord->returned_at }}</td>
                                    <td> {{ \Carbon\Carbon::now() >  $borrowedRecord->due_date  && empty($borrowedRecord->returned_at)  ? 'Not Returned' : 'Returned'}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

        </main>
    </div>
</div>

@endsection


