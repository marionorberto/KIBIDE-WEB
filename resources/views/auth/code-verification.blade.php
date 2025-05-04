@extends('layouts.auth')

@section('title', 'co')

@section('content')

<div class="auth-main">
  <div class="auth-wrapper v3">
    <div class="auth-form">
      <div class="auth-header">
        <a href="#"><img src="../assets/images/logo-dark.svg" alt="img"></a>
      </div>
      <div class="card my-5">
        <div class="card-body">
          <div class="mb-4">
            <h3 class="mb-2"><b>Enter Verification Code</b></h3>
            <p class="text-muted mb-4">We send you on mail.</p>
            <p class="">We`ve send you code on jone. ****@company.com</p>
          </div>
          <div class="row text-center">
            <div class="col">
              <input type="text" class="form-control">
            </div>
            <div class="col">
              <input type="text" class="form-control">
            </div>
            <div class="col">
              <input type="text" class="form-control">
            </div>
            <div class="col">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="d-grid mt-4">
            <button type="button" class="btn btn-primary">Continue</button>
          </div>
          <div class="d-flex justify-content-between align-items-end mt-3">
            <p class="mb-0">Did not receive the email? Check your spam filter, or</p>
            <a href="#" class="link-primary">Resend code</a>
          </div>
        </div>
      </div>
      <div class="auth-footer row">
        <!-- <div class=""> -->
        <div class="col my-1">
          <p class="m-0">Copyright © <a href="#">Codedthemes</a></p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="#">Contact us</a></li>
          </ul>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
</div>