@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xl-12">
                                <form action="{{ route('process.checkin.from.user') }}" method="post">
                                    @csrf
                                    <select name="duration" id="duration" class="align-content-lg-center col-xl-12">
                                        <option value="3">3 Hours</option>
                                        <option value="6">6 Hours</option>
                                        <option value="12">12 Hours</option>
                                    </select>
                                    <br>
                                    <br>
                                    <br>
                                    <br>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Home Safe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(count($friends) > 0)
                        <div class="row">
                            <div class="col-xl-12">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Last Checkin</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($friends as $friend)
                                        <tr>
                                            <td>{{ $friend->name }}</td>
                                            <td>{{ $friend->email }}</td>
                                            <td>{{ $friend->lastCheckin }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
