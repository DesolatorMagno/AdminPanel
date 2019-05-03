@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Company Creation</div>
                <div class="card-body">

                    <form action="{{ route('company.store') }}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Name">
                          <small id="helpIdName" class="form-text text-muted">The name from the new Company</small>
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" id="" aria-describedby="helpIdWebsite" placeholder="Website">
                            <small id="helpIdWebsite" class="form-text text-muted">The Website from the new Company</small>
                        </div>

                        <div class="form-group">
                          <label for="logo">Logo</label>
                          <input type="file" class="form-control-file" name="logo" id="" placeholder="" aria-describedby="fileHelpId" accept="jpg">
                          <small id="fileHelpId" class="form-text text-muted">The logo goes here.</small>
                        </div>

                        <button type="submit" class="btn btn-outline-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
