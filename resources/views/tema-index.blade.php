@extends('layouts/master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">
                            <h2>{{ trans('general.dashboard') }}</h2>
                        </h4>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span class="text">
                        You are logged in!
                    </span>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
