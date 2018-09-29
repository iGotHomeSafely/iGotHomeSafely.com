@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('friends.addFriendUnverified') }}" method="post">
                @csrf
                <label>{{ $match->name }}</label>

                <input type="text" id="email" name="email" value="{{ $match->email }}"/>
                <br>
                <br>
                <br>
                <br>
                <button type="submit" class="btn btn-primary ">Add {{ $match->name }}</button>
            </form>
        </div>
    </div>
@endsection