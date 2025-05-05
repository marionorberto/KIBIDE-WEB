@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0)">DataTable</a></li>
        <li class="breadcrumb-item" aria-current="page">Basic Int.</li>
      </ul>
      </div>
      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mb-0">Basic Int.</h2>
      </div>
      </div>
    </div>
    </div>
  </div>
  <!-- [ breadcrumb ] end -->

  <!-- [ Main Content ] start -->
  <div class="row">
    <!-- Zero config table start -->
    <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
      <h5>Zero Configuration</h5>
      <small>DataTables has most features enabled by default, so all you need to do to use it with your own tables is
        to call the
        construction function.</small>
      </div>
      <div class="card-body">
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
          <th>Name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Age</th>
          <th>Start date</th>
          <th>Salary</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td>Quinn Flynn</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
          <td>61</td>
          <td><span class="badge bg-light-success  f-12">In Stock</span> </td>
          <td class="text-center">
            <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
              <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal"
              data-bs-target="#cust-modal">
              <i class="ti ti-eye f-18"></i>
              </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
              <a href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
              <i class="ti ti-edit-circle f-18"></i>
              </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
              <a href="#" class="avtar avtar-xs btn-link-danger">
              <i class="ti ti-trash f-18"></i>
              </a>
            </li>
            </ul>
          </td>
          </tr>
          <tr>
          <td>Quinn Flynn</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
          <td>61</td>
          <td><span class="badge bg-light-success  f-12">In Stock</span> </td>
          <td class="text-center">
            <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
              <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal"
              data-bs-target="#cust-modal">
              <i class="ti ti-eye f-18"></i>
              </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
              <a href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
              <i class="ti ti-edit-circle f-18"></i>
              </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
              <a href="#" class="avtar avtar-xs btn-link-danger">
              <i class="ti ti-trash f-18"></i>
              </a>
            </li>
            </ul>
          </td>
          </tr>
          <tr>
          <td>Quinn Flynn</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
          <td>61</td>
          <td><span class="badge bg-light-success  f-12">In Stock</span> </td>
          <td class="text-center">
            <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
              <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal"
              data-bs-target="#cust-modal">
              <i class="ti ti-eye f-18"></i>
              </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
              <a href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
              <i class="ti ti-edit-circle f-18"></i>
              </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
              <a href="#" class="avtar avtar-xs btn-link-danger">
              <i class="ti ti-trash f-18"></i>
              </a>
            </li>
            </ul>
          </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
          <th>Name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Age</th>
          <th>Start date</th>
          <th>Salary</th>
          </tr>
        </tfoot>
        </table>
      </div>
      </div>
    </div>
    </div>


  </div>

@endsection