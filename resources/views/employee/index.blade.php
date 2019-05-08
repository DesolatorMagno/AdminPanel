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
                    <table class="display" id="employee-table">
                        <thead class="">
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
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>
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
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('welcome') }}" class="btn btn-outline-dark">@lang('general.back')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.datable', ['tableName' => 'employee-table'])
@endsection
