@extends('layouts/master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">
                            <h2>@lang('general.company') @lang("actions.title_$type")</h2>
                        </h4>
                    </div>
                </div>
                <form action="{{ $type == 'store' ? route('companies.store') : route('companies.update', $company->id) }}" role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
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
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('companies.index') }}" class="btn btn-outline-dark">@lang('general.back')</a>
                        <button type="submit" class="btn btn-outline-primary" {{ $type== "show" ? 'disabled hidden' : ''}}>@lang("actions.button_$type")</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<style>
    :disabled {
        color: #6c757d!important;
    }
</style>
@endpush
@push('scrypt')
<script>
@if ($type == 'store')
    activateMenu('companies','li-add');
@else
    activateMenu('companies','');
@endif
</script>
@endpush
