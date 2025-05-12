@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

  <div class="row justify-content-center">
    <div class="col-12">
    <div class="card">
      <div class="card-body">
      <div class="row align-items-center mb-3 g-2">
        <div class="col-auto"><label for="price-switch">Billed Yearly</label></div>
        <div class="col-auto">
        <div class="form-check form-switch p-0">
          <input class="form-check-input position-relative m-0 h5" type="checkbox" role="switch" id="price-switch">
        </div>
        </div>
        <div class="col-auto"><label for="price-switch">Billed Monthly</label></div>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat.</p>
      </div>
    </div>
    </div>
    <!-- [ sample-page ] start -->
    <div class="col-md-6 col-lg-4">
    <div class="card price-card">
      <div class="card-body">
      <div class="price-icon">
        <img src="{{ asset('assets/images/pages/img-price-standard.svg') }}" alt="img" class="img-fluid">
        <h4 class="mb-0">Standard</h4>
      </div>
      <p class="mt-4">Create one end product for a client, transfer that end product to your client, charge them
        for your services. The license is then transferred to the client.</p>
      <div class="price-price my-4">69 <span class="text-muted"> Lifetime</span></div>
      <div class="d-grid"><a class="btn btn-outline-primary bg-light text-primary mb-4" href="#" role="button">Order
        Now</a></div>
      <ul class="list-group list-group-flush product-list">
        <li class="list-group-item enable">One End Product</li>
        <li class="list-group-item enable">No attribution required</li>
        <li class="list-group-item">TypeScript</li>
        <li class="list-group-item">Figma Design Resources</li>
        <li class="list-group-item">Create Multiple Products</li>
        <li class="list-group-item">Create a SaaS Project</li>
        <li class="list-group-item">Resale Product</li>
        <li class="list-group-item">Separate sale of our UI Elements?</li>
      </ul>
      </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-4">
    <div class="card price-card bg-primary">
      <div class="card-body bg-primary">
      <div class="price-icon">
        <!-- <img src="{{ asset('assets/images/pages/img-price-standardplus.svg') }}" alt="img" class="img-fluid"> -->
        <h4 class="mb-0 text-white">Standard Plus</h4>
      </div>
      <p class="mt-4 text-white">Create one end product for a client, transfer that end product to your client, charge
        them
        for your services. The license
        is then transferred to the client.</p>
      <div class="price-price my-4 text-white">129 <span class=" text-white"> Lifetime</span></div>
      <div class="d-grid"><a class="btn btn-primary mb-4 text-primary bg-light" href="#" role="button">Current
        plan</a></div>
      <ul class="list-group list-group-flush product-list bg-primary">
        <li class="list-group-item enable ">Complete acess to A</li>
        <li class="list-group-item enable ">Complete acess to B</li>
        <li class="list-group-item enable ">Complete acess to C</li>
        <li class="list-group-item enable ">Complete acess to E</li>
        <li class="list-group-item enable ">Complete acess to F</li>
        <li class="list-group-item enable ">Complete acess to G</li>
        <li class="list-group-item enable ">Complete acess to H</li>
        <li class="list-group-item enable ">Complete acess to I</li>
      </ul>
      </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-4">
    <div class="card price-card">
      <div class="card-body">
      <div class="price-icon">
        <img src="{{ asset('assets/images/pages/img-price-extended.svg') }} " alt="img" class="img-fluid">
        <h4 class="mb-0">Extended</h4>
      </div>
      <p class="mt-4">You are licensed to use the CONTENT to create one end product for yourself or for one
        client (a “single application”), and the end product may be sold or distributed for free.</p>
      <div class="price-price my-4">599 <span class="text-muted"> Lifetime</span></div>
      <div class="d-grid"><a class="btn btn-outline-primary bg-light text-primary mb-4" href="#" role="button">Order
        Now</a></div>
      <ul class="list-group list-group-flush product-list">
        <li class="list-group-item enable">One End Product</li>
        <li class="list-group-item enable">No attribution required</li>
        <li class="list-group-item enable">TypeScript</li>
        <li class="list-group-item enable">Figma Design Resources</li>
        <li class="list-group-item">Create Multiple Products</li>
        <li class="list-group-item enable">Create a SaaS Project</li>
        <li class="list-group-item">Resale Product</li>
        <li class="list-group-item">Separate sale of our UI Elements?</li>
      </ul>
      </div>
    </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
@endsection