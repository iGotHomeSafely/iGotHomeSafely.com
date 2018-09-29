@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Friend Request from {{ $user->name }} ({{ $user->email }})</div>

                    <div class="card-body">
                        To approve the friend request <a href="{{ route('new.friend.request.view', $user->id) }}">click here</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
