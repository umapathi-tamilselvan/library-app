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


            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm" style="background: linear-gradient(120deg, #26a0a8, #3b4858);">
                        <div class="card-body text-white">
                            <i class="bi bi-person-plus-fill display-5"></i>
                            <h5 class="card-title mt-3">Consumers</h5>
                            <p class="card-text">Manage all users and consumers.</p>
                            <a href="/admin/consumer" class="btn btn-outline-light">View Consumers</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm" style="background: linear-gradient(120deg, #af50b9, #dd5769);">
                        <div class="card-body text-white">
                            <i class="bi bi-book-fill display-5"></i>
                            <h5 class="card-title mt-3">Manage Books</h5>
                            <p class="card-text">View and manage all books in the system.</p>
                            <a href="/admin/book" class="btn btn-outline-light">Manage Books</a>
                        </div>
                    </div>
                </div>

               
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm" style="background: linear-gradient(120deg, #0f853a, #679bb4);">
                        <div class="card-body text-white">
                            <i class="bi bi-person-fill display-5"></i>
                            <h5 class="card-title mt-3">Manage Users</h5>
                            <p class="card-text">Add, edit, and manage users.</p>
                            <a href="/admin/view" class="btn btn-outline-light">Manage Users</a>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection


