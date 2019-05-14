@extends('layouts/master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">
                            <h2>{{ trans('general.company') }} {{ trans('general.list') }}</h2>
                        </h4>
                        <a href="{{ route('companies.create') }}" class="btn btn-primary btn-round ml-auto btn-add">
                            <i class="fa fa-plus"></i>
                            {{ trans('general.new', ['model' => trans('general.company')]) }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover" id="company-table">
                            <thead>
                                <tr>
                                    <th>@lang('attributes.name')</th>
                                    <th>@lang('attributes.website')</th>
                                    <th>@lang('general.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="">
                                            <div class="btn-group" role="group" aria-label="">
                                                <a href="{{ route('companies.show', ['id'=>$company->id]) }}" class="btn btn-sm btn-info">@lang('general.details')</a>
                                                <a href="{{ route('companies.edit', ['id'=>$company->id]) }}" class="btn btn-sm btn-success">@lang('general.edit')</a>
                                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger crud-delete" type="button" onclick="deleteCompany(this)">@lang('general.delete')</button>
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
                @include('partials.datable', ['tableName' => 'company-table'])
            </div>
        </div>
    </div>
</div>
@endsection
@push('scrypt')
<script>
activateMenu('companies','li-list');
</script>
@endpush
