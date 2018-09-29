@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->email }} Checkins</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($checkins as $checkin)
                                        <tr>
                                            <td>{{ $checkin->duration }}</td>
                                            <td>{{ $checkin->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
