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

            <div class="container align-items-center">


            </div>
            <div class="container  bg-light sidebar shadow-sm mt-2">

                        <h2 class="text-center">Members </h2>
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



        </main>
    </div>
</div>
@endsection


