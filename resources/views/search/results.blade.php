@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Send a Friend Request</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 align-content-center">
                                <form action="{{ route('friends.addUnverifiedFriend') }}" method="post">
                                    @csrf
                                    <label for="email">Email</label>
                                    <div class="row form-group">
                                        <input type="text" id="email" name="email" value="{{ $match->email }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn btn-success form-control">Add {{ $match->name }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection