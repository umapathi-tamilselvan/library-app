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

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm w-100">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home/admin">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-pills me-auto mb-2 mb-lg-0">
                        <li class="nav-item primary">
                            <a class="nav-link {{ request()->is('home/admin') ? 'active' : '' }}" href="/home/admin">
                                <i class="bi bi-house-door "></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/member') ? 'active' : '' }}" href="/user">
                                <i class="bi bi-house-door"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/book') ? 'active' : '' }}" href="/book">
                                <i class="bi bi-house-door"></i> Manage Books
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/librarian') ? 'active' : '' }}" href="/borrowedhistory">
                                <i class="bi bi-house-door"></i> Borrow History
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class=" card container d-md-block bg-light sidebar shadow-sm mt-4">
                    <h2 class="text-center mt-2">Borrow History</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


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
                                @foreach ($borrowHistorys as $borrow)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $borrow->user->name }}</td>
                                        <td>{{ $borrow->book->book_name }}</td>
                                        <td>{{ $borrow->borrowed_at ? \Carbon\Carbon::parse($borrow->borrowed_at)->format('d-m-Y') : 'Not Borrowed' }}</td>
                                        <td>{{ $borrow->due_date ? \Carbon\Carbon::parse($borrow->due_date)->format('d-m-Y') : 'Not Set' }}</td>
                                        <td>{{ $borrow->returned_at ? \Carbon\Carbon::parse($borrow->returned_at)->format('d-m-Y') : 'Not Returned' }}</td>

                                        <td>
                                            @if(!$borrow->returned_at)
                                                <form action="{{ route('return.book') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="borrow_id" value="{{ $borrow->id }}">
                                                    <input type="date" name="returned_at" required>
                                                    <button type="submit" class="btn btn-success">Return Book</button>
                                                </form>
                                            @else
                                                <span class="badge bg-dark text-white">Returned</span>
                                            @endif
                                        </td>

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
