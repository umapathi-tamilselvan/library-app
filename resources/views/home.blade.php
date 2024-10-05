@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <a href="/home/consumer/create" class="btn btn-primary">Create Counsumer</a>
                    </div>
                    <div class="container">
                        <a href="#" class="btn btn-primary mt-2">Add Book</a>
                        <div class="container mt-5">
                            <h2 class="text-center">Consumers</h2>
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                  <tr>
                                    <th>S.No</th>
                                    <th>Consumer Name</th>
                                    <th>Membership ID</th>

                                  </tr>
                                </thead>
                               @foreach ($consumers as $consumer )

                                <tbody>
                                  <tr >
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="#">{{$consumer->name}}</a></td>
                                    <td>{{$consumer->membership_id}}</td>
                                  </tr>

                                </tbody>

                               @endforeach
                              </table>
                            </div>
                          </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
