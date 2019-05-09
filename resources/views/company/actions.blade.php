@extends('layouts.app')

@section('content')

<div class="card-header">@lang('general.company') @lang("actions.title_$type")</div>
<div class="card-body">

    <form action="{{ $type == 'store' ? route('companies.store') : route('companies.update', $company->id) }}" role="form" method="post" enctype="multipart/form-data">
        @csrf
        @if ($type == 'update')
        @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">@lang('attributes.name')</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Name" value="{{ $company ? old('name', $company->name) : '' }}" {{ $type == "show" ? 'disabled' : ''}}>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">@lang('attributes.website')</label>
            <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="" placeholder="Website" value="{{ $company ? old('website', $company->website) : '' }}" {{ $type== "show" ? 'disabled' : ''}}>
            @error('website')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        @if (isset($company->logo))
        <div>
            <img src="{{ $company->logo ? "$company->LogoUrl" : '' }}" alt="Company Logo" class="img-fluid img">
        </div>

        @endif
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
        <a href="{{ route('companies.index') }}" class="btn btn-outline-dark">@lang('general.back')</a>

    <button type="submit" class="btn btn-outline-primary" {{ $type== "show" ? 'disabled hidden' : ''}}>@lang("actions.button_$type")</button>
    </form>
</div>

@endsection
