@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

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
                        <a class="nav-link {{ request()->is('admin/librarian') ? 'active' : '' }}" href="/borrowhistory">
                            <i class="bi bi-person"></i> Borrow History
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

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

                <div class="container d-md-block bg-light sidebar shadow-sm">
                    <h2 class="text-center">Borrow History</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Borrow history table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>S.NO</th>
                                    <th>User</th>
                                    <th>Book</th>
                                    <th>Borrowed At</th>
                                    <th>Due Date</th>
                                    <th>Returned At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowHistorys as $user)
                                    @foreach ($user->borrowedBooks as $book)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->pivot->borrowed_at ? \Carbon\Carbon::parse($book->pivot->borrowed_at)->format('d-m-Y') : 'Not Borrowed' }}</td>
                                            <td>{{ $book->pivot->due_date ? \Carbon\Carbon::parse($book->pivot->due_date)->format('d-m-Y') : 'Not Set' }}</td>
                                            <td>{{ $book->pivot->returned_at ? \Carbon\Carbon::parse($book->pivot->returned_at)->format('d-m-Y') : 'Not Returned' }}</td>

                                            <!-- Book return form -->
                                            <td>
                                                @if(!$book->pivot->returned_at)
                                                    <form action="{{ route('return.book') }}" method="POST">
                                                        @csrf
                                                        <input type="date" name="returned_at" required>
                                                        <button type="submit" class="btn btn-success">Return Book</button>
                                                    </form>
                                                @else
                                                    <span class="badge bg-dark text-white">Returned</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
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
