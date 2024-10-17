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


        <div class="d-flex justify-content-center align-items-center w-100 mt-3">
            <div class="card container bg-light shadow-sm">
                <h2 class="text-center">Members</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


