@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('search.doSearch') }}" method="post">
                @csrf
                <label>Email</label>
                <input type="text" id="email" name="email"/>
                <br>
                <br>
                <br>
                <br>
                <button type="submit" class="btn btn-primary ">Search</button>
            </form>
        </div>
    </div>
@endsection