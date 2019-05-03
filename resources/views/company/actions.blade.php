@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">Company @lang("actions.title_$type")</div>
                <div class="card-body">

                    <form action="{{ $type == 'store' ? route('company.store') : route('company.update', $company->id) }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($type == 'update')
                        @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Name" value="{{ $company ? $company->name : Request::old('name', '') }}" {{ $type == "show" ? 'disabled' : ''}}>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="" placeholder="Website" value="{{ $company ? $company->website : Request::old('website', '') }}" {{ $type== "show" ? 'disabled' : ''}}>
                            @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if ($company)
                        <div>
                            <img src="{{ $company->logo ? "$company->LogoUrl" : '' }}" alt="Company Logo" class="img-fluid img">
                        </div>

                        @endif
                        @if ($type != 'show')
                        <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" id="" placeholder="" accept="jpg"  value="{{ Request::old('logo', '') }}">
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        @endif
                        <hr>
                        <a href="{{ route('company.index') }}" class="btn btn-outline-dark">Back</a>

                    <button type="submit" class="btn btn-outline-primary" {{ $type== "show" ? 'disabled hidden' : ''}}>@lang("actions.button_$type")</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
