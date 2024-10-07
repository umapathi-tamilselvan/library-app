@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <main class="col-md-10 col-lg-8">
            <div class="card mt-3 shadow-lg rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('E-Book') }}</h4>
                    <a href="/home/consumer/create" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle"></i> Add Consumer
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h2 class="text-center mb-4">Consumers</h2>

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
            </div>
        </main>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Add Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Add some custom JS for search functionality -->

@endsection
