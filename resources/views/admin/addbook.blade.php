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

            <div class="container bg-light sidebar shadow-sm">
                        <h2 class="text-center">Add book</h2>
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



        </main>
    </div>
</div>
@endsection


