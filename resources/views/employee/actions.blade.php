@extends('layouts.app')

@section('content')

<div class="card-header">@lang('general.employee') @lang("actions.title_$type")</div>
<div class="card-body">

    <form action="{{ $type == 'store' ? route('employee.store') : route('employee.update', $employee->id) }}" role="form" method="post" enctype="multipart/form-data">
        @csrf
        @if ($type == 'update')
        @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">@lang('attributes.first_name')</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="" placeholder="@lang('attributes.first_name')" value="{{ $employee ? old('first_name', $employee->first_name) : '' }}" {{ $type == "show" ? 'disabled' : '' }}>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_name">@lang('attributes.last_name')</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="" placeholder="@lang('attributes.last_name')" value="{{ $employee ? old('last_name', $employee->last_name) : '' }}" {{ $type == "show" ? 'disabled' : ''}}>
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="company_id"></label>
            <select class="form-control" name="company_id" id="">
            @if ($type != 'show')
                @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ $employee ? old('company_id', $employee->company_id) == $company->id ? 'selected' : '' : '' }}>{{ $company->name }}</option>
                @endforeach
            @else
                <option value="{{ $employee->company_id }}">{{ $employee->company->name }}</option>
            @endif

            </select>
        </div>

        @if ($type != 'show')
        <div class="form-group">
        <label for="logo">@lang('attributes.logo')</label>
        <input type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" id="" placeholder="" accept="jpg"  value="{{ Request::old('logo', '') }}">
        @error('logo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        @endif
        <hr>
        <a href="{{ route('employee.index') }}" class="btn btn-outline-dark">@lang('general.back')</a>

    <button type="submit" class="btn btn-outline-primary" {{ $type== "show" ? 'disabled hidden' : ''}}>@lang("actions.button_$type")</button>
    </form>
</div>
@endsection
