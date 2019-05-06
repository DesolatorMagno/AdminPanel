@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans('general.employees') }} {{ trans('general.list') }}</div>
                <div class="card-body">
                    <a href="{{ route('employee.create') }}" class="btn btn-outline-primary btn-add">
                            {{ trans('general.new', ['model' => trans('general.employee')]) }}
                    </a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('attributes.first_name')</th>
                                <th>@lang('attributes.last_name')</th>
                                <th>@lang('attributes.company')</th>
                                <th>@lang('general.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <th>{{ $employee->first_name }}</th>
                                    <th>{{ $employee->last_name }}</th>
                                    <th>{{ $employee->company->name }}</th>
                                    <th>
                                        <div class="btn-toolbar" role="toolbar" aria-label="">
                                            <div class="btn-group" role="group" aria-label="">
                                                <a href="{{ route('employee.show', ['id'=>$employee->id]) }}" class="btn btn-sm btn-info">@lang('general.details')</a>
                                                <a href="{{ route('employee.edit', ['id'=>$employee->id]) }}" class="btn btn-sm btn-success">@lang('general.edit')</a>
                                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger">@lang('general.delete')</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                    <a href="{{ route('welcome') }}" class="btn btn-outline-dark">@lang('general.back')</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
