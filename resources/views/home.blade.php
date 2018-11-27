@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name }} <span class="caret"></span>
                    You are logged in as <strong>USER</strong>
                    <p><a href="{{ url('/index') }}">Start</a> </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
