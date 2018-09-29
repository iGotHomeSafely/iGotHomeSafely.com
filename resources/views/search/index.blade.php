@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enter a friend's email below</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 align-content-center">
                                <form action="{{ route('search.doSearch') }}" method="post">
                                    @csrf
                                    <label for="email">Email</label>
                                    <div class="row form-group">
                                        <input type="text" id="email" name="email" class="form-control">
                                    </div>
                                    <input type="submit" value="Search" id="search" class="btn btn-primary form-control">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection