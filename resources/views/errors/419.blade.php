@extends('layouts.auth')

@section('title', 'Login')

@section('content')
  <div class="maintenance-block">
    <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <div class="card soon-card">
        <div class="card-body">
        <div class="soon-image-block">
          <div class="row justify-content-center">
          <div class="col-10">
            <img class="img-fluid" src=" {{ asset('assets/images/pages/coming-soon.png') }}" alt="img">
          </div>
          </div>
        </div>
        <h2 class="mt-4 text-center f-46"><b>Coming Soon</b></h2>
        <p class="mt-3 mb-4 text-center text-muted f-16">Something new is on it's way</p>
        <div class="row timer-block mt-4 justify-content-center" id="timer-block">
          <div class="col-auto">
          <span class="avtar avtar-xl">10<span>day</span></span>
          </div>
          <div class="col-auto">
          <span class="avtar avtar-xl">10<span>hour</span></span>
          </div>
          <div class="col-auto">
          <span class="avtar avtar-xl">10<span>min</span></span>
          </div>
          <div class="col-auto">
          <span class="avtar avtar-xl">10<span>sec</span></span>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
          <p class="mt-4 mb-3">Be the first to be notified when Mantis launches.</p>
          <div class="row d-flex">
            <div class="col">
            <input type="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="col-auto">
            <div class="d-grid">
              <button class="btn btn-primary"><i class="ti ti-bell-ringing me-2"></i>Notify Me</button>
            </div>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>


@endsection