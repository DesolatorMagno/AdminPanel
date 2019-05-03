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
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <th>{{ $company->name }}</th>
                                    <th><a href="{{ $company->website }}">{{ $company->website }}</a></th>
                                    <th>
                                        <div class="btn-toolbar" role="toolbar" aria-label="">
                                            <div class="btn-group" role="group" aria-label="">
                                                <a href="{{ route('company.show', ['id'=>$company->id]) }}" class="btn btn-sm btn-info">Details</a>
                                                <a href="{{ route('company.edit', ['id'=>$company->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                                <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                    <a href="{{ route('welcome') }}" class="btn btn-outline-dark">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
