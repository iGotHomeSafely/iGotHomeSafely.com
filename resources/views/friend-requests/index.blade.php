@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Friend Request(s)</div>

                    <div class="card-body">
                        @if(count($pending_friends) > 0)
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pending_friends as $pending_friend)
                                            <tr>
                                                <td>{{ $pending_friend->name }}</td>
                                                <td>{{ $pending_friend->email }}</td>
                                                <td>
                                                    <form id="approve-friend" action="{{ route('friends.approveFriendRequest') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" id="user_id" name="user_id" value="{{ $pending_friend->id }}">
                                                        <button type="submit" class="btn btn btn-success ">Approve</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            Get a life loser. Have you tried smiling more?
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
