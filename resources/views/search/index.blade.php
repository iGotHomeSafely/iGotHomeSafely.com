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
                {{--<button type="submit" class="btn btn-primary " name="search" id="search">Search</button>--}}
                <input type="submit" value="Search" id="search" class="btn btn-primary ">
            </form>
        </div>
    </div>
@endsection