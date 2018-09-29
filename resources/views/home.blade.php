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

                </div>
            </div>
        </div>
    </div>
@endsection
