@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')


  <div class="col-xl-8">
    <div class="card table-card">
    <div class="card-header">
      <h5>Cart Item <span class="ms-2 f-14 px-2 badge bg-light-secondary rounded-pill">1</span></h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class="table" id="pc-dt-simple">
        <thead>
        <tr>
          <th>Product</th>
          <th class="text-end">Price</th>
          <th class="text-center">Quantity</th>
          <th class="text-end">Total</th>
          <th class="text-end"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
          <div class="media align-items-center">
            <img src="../assets/images/application/prod-img-1.png" alt="image" class="bg-light wid-50 rounded">
            <div class="media-body ms-3">
            <h5 class="mb-1">Apple MacBook Pro</h5>
            <p class="text-sm text-muted mb-0">Dark Red</p>
            </div>
          </div>
          </td>
          <td class="text-end">
          <h5 class="mb-0">$100.00</h5>
          <span class="text-sm text-muted text-decoration-line-through">$129.99</span>
          </td>
          <td class="text-center">
          <div class="btn-group btn-group-sm mb-2 border" role="group">
            <button type="button" id="decrease" onclick="decreaseValue('number')" class="btn btn-link-dark"><i
              class="ti ti-minus"></i></button>
            <input class="wid-35 text-center border-0 m-0 form-control rounded-0 shadow-none" type="text"
            id="number" value="0">
            <button type="button" id="increase" onclick="increaseValue('number')" class="btn btn-link-dark"><i
              class="ti ti-plus"></i></button>
          </div>
          </td>
          <td class="text-end">
          <h5 class="mb-0">$100.00</h5>
          </td>
          <td class="text-end">
          <a href="#" class="avtar avtar-s btn-link-danger">
            <i class="ti ti-trash f-18"></i>
          </a>
          </td>
        </tr>
        </tbody>
      </table>
      </div>
    </div>
    </div>
    <div class="text-end">
    <a href="../application/ecom_product.html" class="btn btn-link-secondary d-inline-flex align-items-center"><i
      class="ti ti-chevron-left me-2"></i> Back to Shopping</a>
    </div>
  </div>


@endsection