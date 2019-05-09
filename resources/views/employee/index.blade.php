@extends('layouts/master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">
                            <h2>{{ trans('general.employees') }} {{ trans('general.list') }}</h2>
                        </h4>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-round ml-auto btn-add">
                            <i class="fa fa-plus"></i>
                            {{ trans('general.new', ['model' => trans('general.employee')]) }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover" id="company-table">
                            <thead>
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
                                                    <a href="{{ route('employees.show', ['id'=>$employee->id]) }}" class="btn btn-sm btn-info">@lang('general.details')</a>
                                                    <a href="{{ route('employees.edit', ['id'=>$employee->id]) }}" class="btn btn-sm btn-success">@lang('general.edit')</a>
                                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger" type="button" onclick="deleteCompany(this)">@lang('general.delete')</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('welcome') }}" class="btn btn-outline-dark text-white">@lang('general.back')</a>
                </div>
                @include('partials.datable', ['tableName' => 'employee-table'])
            </div>
        </div>
    </div>
</div>
@endsection
