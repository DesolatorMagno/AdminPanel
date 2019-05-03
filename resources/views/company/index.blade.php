@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Company List</div>
                <div class="card-body">
                    <a href="{{ route('company.create') }}" class="btn btn-outline-primary btn-add">New Company</a>
                    <table class="table">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Company 1</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
