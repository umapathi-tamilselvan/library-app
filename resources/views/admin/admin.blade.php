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
                        <a class="nav-link {{ request()->is('admin/librarian') ? 'active' : '' }}" href="/borrowedhistory">
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


            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm" style="background: linear-gradient(120deg, #26a0a8, #3b4858);">
                        <div class="card-body text-white">
                            <i class="bi bi-person-plus-fill display-5"></i>
                            <h5 class="card-title mt-3">Users</h5>
                            <p class="card-text">Manage all users.</p>
                            <a href="/user" class="btn btn-outline-light">View Members</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm" style="background: linear-gradient(120deg, #af50b9, #dd5769);">
                        <div class="card-body text-white">
                            <i class="bi bi-book-fill display-5"></i>
                            <h5 class="card-title mt-3">Manage Books</h5>
                            <p class="card-text">View and manage all books in the system.</p>
                            <a href="/book" class="btn btn-outline-light">Manage Books</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm" style="background: linear-gradient(120deg, #af50b9, #dd5769);">
                        <div class="card-body text-white">
                            <i class="bi bi-book-fill display-5"></i>
                            <h5 class="card-title mt-3">Borrow History</h5>
                            <p class="card-text">View and manage all borrowers.</p>
                            <a href="/borrowedhistory" class="btn btn-outline-light">Borrow History</a>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>
@endsection


