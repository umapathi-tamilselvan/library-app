@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Books</h1>

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <h4>{{ __('Book List') }}</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Book name</th>
                        <th>Content</th>
                        <th>Total Copies</th>
                        <th>Available Copies</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <tr >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$book->book_name}}</td>
                                <td>{{$book->content}}</td>
                                <td>{{$book->total_copies}}</td>
                                <td>{{$book->available_copies}}</td>
                              </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
