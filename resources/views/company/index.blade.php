@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans('general.company') }} {{ trans('general.list') }}</div>
                <div class="card-body">
                    <a href="{{ route('company.create') }}" class="btn btn-outline-primary btn-add">
                            {{ trans('general.new', ['model' => trans('general.company')]) }}
                    </a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('attributes.name')</th>
                                <th>@lang('attributes.website')</th>
                                <th>@lang('general.actions')</th>
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
                                                <a href="{{ route('company.show', ['id'=>$company->id]) }}" class="btn btn-sm btn-info">@lang('general.details')</a>
                                                <a href="{{ route('company.edit', ['id'=>$company->id]) }}" class="btn btn-sm btn-success">@lang('general.edit')</a>
                                                <form action="{{ route('company.destroy', $company->id) }}" method="POST">
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
                    {{ $companies->links() }}
                    <a href="{{ route('welcome') }}" class="btn btn-outline-dark">@lang('general.back')</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
