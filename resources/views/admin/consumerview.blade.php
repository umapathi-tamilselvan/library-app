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
                        <a class="nav-link " href="/home/admin">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/consumer">
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
            <div class="container align-items-center">

                <a href="/home/consumer/create" class="btn btn-primary ">
                    <i class="bi bi-plus-circle"></i> Add Consumer
                </a>
            </div>
            <div class="container  bg-light sidebar shadow-sm mt-2">

                        <h2 class="text-center">Consumers </h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Book ID</th>
                                        <th>Borrowed At</th>
                                        <th>Due Date</th>
                                        <th>Returned At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($consumers as $consumer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $consumer->name }}</td>
                                            <td>{{ $consumer->email }}</td>
                                            <td>{{ $consumer->book_id }}</td>
                                            <td>{{ $consumer->borrowed_at }}</td>
                                            <td>{{ $consumer->due_date }}</td>
                                            <td>{{ $consumer->returned_at }}</td>
                                            <td>
                                                <a href="/home/consumer/{{ $consumer->id }}/edit" class="btn btn-secondary btn-sm me-1">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="/home/consumer/{{ $consumer->id }}/delete" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

            </div>



        </main>
    </div>
</div>
@endsection


