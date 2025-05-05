@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
    <h5>Basic Inputs</h5>
    </div>
    <div class="card-body">
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3"> Basic HTML form components with custom style. </div>
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Email address</label>
      <input type="email" class="form-control form-control" placeholder="email@company.com">
    </div>
    <div class="form-group">
      <label class="form-label" for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      <small>Your password must be between 8 and 30 characters.</small>
    </div>
    <div class="form-group">
      <label class="form-label" for="exampleSelect1">Select</label>
      <select class="form-select" id="exampleSelect1">
      <option>Option 1</option>
      <option>Option 2</option>
      <option>Option 3</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-label" for="exampleSelect2">Multiple select</label>
      <select multiple="" class="form-select" id="exampleSelect2">
      <option>Option 1</option>
      <option>Option 2</option>
      <option>Option 3</option>
      </select>
      <small>Hold shift or press ctrl for multi select.</small>
    </div>
    <div class="form-group mb-0">
      <label class="form-label" for="exampleTextarea">Textarea</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    </div>
    <div class="card-footer">
    <button class="btn btn-primary me-2">Submit</button>
    <button type="reset" class="btn btn-light">Reset</button>
    </div>
  </div>
@endsection