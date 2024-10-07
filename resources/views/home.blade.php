@extends('layouts.app')

@section('content')

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Dashboard Title -->
        <div class="col-md-12 mb-4">
            <h1 class="text-center display-4">Dashboard</h1>
        </div>

        <!-- Cards for Actions -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-user-plus fa-3x mb-3"></i>
                    <h4 class="card-title">Borrower</h4>
                    <a href="/home/consumer" class="btn btn-primary">Go to Borrower</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x mb-3"></i>
                    <h4 class="card-title">Manage Books</h4>
                    <a href="/home/books/manage" class="btn btn-primary">Go to Manage Books</a>
                </div>
            </div>
        </div>

        <!-- Consumers Table -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
