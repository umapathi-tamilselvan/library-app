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


            <div class=" card container bg-light sidebar shadow-sm">
                        <h2 class="text-center mt-2">Add book</h2>
                        <form action="/book" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="book_name" class="form-label">Book Name</label>
                                <input type="text" class="form-control" id="book_name" name="book_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <input type="text" class="form-control" id="content" name="content" required>
                            </div>
                            <div class="form-group">
                                <label for="library_id">Library</label>
                                <select name="library_id" id="library_id" class="form-control" required>
                                    <option value="">Select a Library</option>
                                    @foreach($libraries as $library)
                                        <option value="{{ $library->id }}" {{ old('library_id') == $library->id ? 'selected' : '' }}>
                                            {{ $library->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('library_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3" >
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



        </main>
    </div>
</div>
@endsection


