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

        <nav id="sidebar" class="card  col-md-3 col-lg-2 d-md-block bg-light sidebar shadow-sm">
            <div class="position-sticky pt-3">
                <h5 class="sidebar-heading px-3 mb-1 text-muted">Member Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/home') ? 'active' : '' }}" href="/home">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/borrowed-books') ? 'active' : '' }}" href="/borrow">
                            <i class="fas fa-book-reader"></i> Borrow Books
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/borrowing-history') ? 'active' : '' }}" href="/borrowhistory">
                            <i class="fas fa-history"></i> Borrowing History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('member/profile') ? 'active' : '' }}" href="/books">
                            <i class="fas fa-user"></i> Books
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

            <div class="container d-md-block bg-light sidebar shadow-sm">
                <h2 class="text-center">Borrow History</h2>
                <div class="table-responsive">
                    @if($borrowHistorys->isNotEmpty())
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Book Name</th>
                                        <th>Borrowed Date</th>
                                        <th>Due Date</th>
                                        <th>Returned Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($borrowHistorys as $borrow)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $borrow->book->book_name }}</td>
                                            <td>{{ $borrow->borrowed_at ? \Carbon\Carbon::parse($borrow->borrowed_at)->format('d-m-Y') : 'Not Borrowed' }}</td>
                                            <td>{{ $borrow->due_date ? \Carbon\Carbon::parse($borrow->due_date)->format('d-m-Y') : 'Not Set' }}</td>
                                            <td>{{ $borrow->returned_at ? \Carbon\Carbon::parse($borrow->returned_at)->format('d-m-Y') : 'Not Returned' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No borrowing history found.</p>
                        @endif
                    </table>
                </div>

        </main>
    </div>
</div>

@endsection


