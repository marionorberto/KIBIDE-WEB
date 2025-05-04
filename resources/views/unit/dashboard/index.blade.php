@extends('layouts.dashboard-student')

@section('title', 'dashboard')

@section('content')

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">

      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mt-4">Dashboard Administrador</h2>
      </div>
      </div>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
      <div class="row align-items-center">
        <div class="col-8">
        <h3 class="mb-1">$30200</h3>
        <p class="text-muted mb-0">All Earnings</p>
        </div>
        <div class="col-4 text-end">
        <i class="ti ti-chart-bar text-secondary f-36"></i>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
      <div class="row align-items-center">
        <div class="col-8">
        <h3 class="mb-1">145</h3>
        <p class="text-muted mb-0">Task</p>
        </div>
        <div class="col-4 text-end">
        <i class="ti ti-calendar-event text-danger f-36"></i>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
      <div class="row align-items-center">
        <div class="col-8">
        <h3 class="mb-1">290+</h3>
        <p class="text-muted mb-0">Page Views</p>
        </div>
        <div class="col-4 text-end">
        <i class="ti ti-file-text text-success f-36"></i>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
      <div class="row align-items-center">
        <div class="col-8">
        <h3 class="mb-1">500</h3>
        <p class="text-muted mb-0">Downloads</p>
        </div>
        <div class="col-4 text-end">
        <i class="ti ti-download text-primary f-36"></i>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="col-md-12 col-xl-8">
    <h5 class="mb-3">Income Overview</h5>
    <div class="card">
      <div class="card-body">
      <div class="row mb-3 align-items-center">
        <div class="col">
        <p class="mb-1 text-danger">$1,12,900 (45.67%)</p>
        <p class="mb-1 text-muted">Compare to : 01 Dec 2021-08 Jan 2022</p>
        </div>
        <div class="col-auto">
        <ul class="nav nav-pills justify-content-end mb-0" id="income-tab-tab" role="tablist">
          <li class="nav-item" role="presentation">
          <button class="nav-link active" id="income-tab-profile-tab" data-bs-toggle="pill"
            data-bs-target="#income-tab-profile" type="button" role="tab" aria-controls="income-tab-profile"
            aria-selected="false">Week</button>
          </li>
          <li class="nav-item" role="presentation">
          <button class="nav-link" id="income-tab-home-tab" data-bs-toggle="pill"
            data-bs-target="#income-tab-home" type="button" role="tab" aria-controls="income-tab-home"
            aria-selected="true">Month</button>
          </li>
        </ul>
        </div>
        <div class="col-auto">
        <select class="form-select">
          <option>By Volume</option>
          <option>By Margin</option>
          <option>By Sales</option>
        </select>
        </div>
        <div class="col-auto">
        <a href="#" class="avtar avtar-s btn btn-outline-secondary">
          <i class="ti ti-download f-18"></i>
        </a>
        </div>
      </div>
      <div class="tab-content" id="income-tab-tabContent">
        <div class="tab-pane show active" id="income-tab-profile" role="tabpanel"
        aria-labelledby="income-tab-profile-tab" tabindex="0">
        <div id="income-overview-tab-chart"></div>
        </div>
        <div class="tab-pane" id="income-tab-home" role="tabpanel" aria-labelledby="income-tab-home-tab" tabindex="0">
        <div id="income-overview-tab-chart-1"></div>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="col-md-12 col-xl-4">
    <h5 class="mb-3">Page Views by Page Title</h5>
    <div class="card">
      <div class="list-group list-group-flush">
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-grow-1 me-2">
          <h6 class="mb-1">Admin Home</h6>
          <p class="mb-0 text-muted">/demo/admin/index.html</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h5 class="mb-1 text-primary">7755</h5>
          <p class="mb-0 text-muted">31.74%</P>
        </div>
        </div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-grow-1 me-2">
          <h6 class="mb-1">Form Elements</h6>
          <p class="mb-0 text-muted">/demo/admin/forms.html</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h5 class="mb-1 text-primary">5215</h5>
          <p class="mb-0 text-muted">28.53%</P>
        </div>
        </div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-grow-1 me-2">
          <h6 class="mb-1">Utilities</h6>
          <p class="mb-0 text-muted">/demo/admin/util.html</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h5 class="mb-1 text-primary">4848</h5>
          <p class="mb-0 text-muted">25.35%</P>
        </div>
        </div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-grow-1 me-2">
          <h6 class="mb-1">Form Validation</h6>
          <p class="mb-0 text-muted">/demo/admin/validation.html</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h5 class="mb-1 text-primary">3275</h5>
          <p class="mb-0 text-muted">23.17%</P>
        </div>
        </div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-grow-1 me-2">
          <h6 class="mb-1">Modals</h6>
          <p class="mb-0 text-muted">/demo/admin/modals.html</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h5 class="mb-1 text-primary">3003</h5>
          <p class="mb-0 text-muted">22.21%</P>
        </div>
        </div>
      </a>
      </div>
    </div>
    </div>

    <div class="col-md-12 col-xl-8">
    <h5 class="mb-3">Recent Orders</h5>
    <div class="card tbl-card">
      <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-borderless mb-0">
        <thead>
          <tr>
          <th>TRACKING NO.</th>
          <th>PRODUCT NAME</th>
          <th class="text-end">TOTAL ORDER</th>
          <th>STATUS</th>
          <th class="text-end">TOTAL AMOUNT</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Camera Lens</td>
          <td class="text-end">40</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
          </td>
          <td class="text-end">$40,570</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Laptop</td>
          <td class="text-end">300</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
          </td>
          <td class="text-end">$180,139</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Mobile</td>
          <td class="text-end">355</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
          </td>
          <td class="text-end">$180,139</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Camera Lens</td>
          <td class="text-end">40</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
          </td>
          <td class="text-end">$40,570</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Laptop</td>
          <td class="text-end">300</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
          </td>
          <td class="text-end">$180,139</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Mobile</td>
          <td class="text-end">355</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
          </td>
          <td class="text-end">$180,139</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Camera Lens</td>
          <td class="text-end">40</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
          </td>
          <td class="text-end">$40,570</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Laptop</td>
          <td class="text-end">300</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
          </td>
          <td class="text-end">$180,139</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Mobile</td>
          <td class="text-end">355</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
          </td>
          <td class="text-end">$180,139</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Mobile</td>
          <td class="text-end">355</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
          </td>
          <td class="text-end">$180,139</td>
          </tr>
        </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    <div class="col-md-12 col-xl-4">
    <h5 class="mb-3">Analytics Report</h5>
    <div class="card">
      <div class="list-group list-group-flush">
      <a href="#"
        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Company
        Finance Growth<span class="h5 mb-0">+45.14%</span></a>
      <a href="#"
        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Company
        Expenses Ratio<span class="h5 mb-0">0.58%</span></a>
      <a href="#"
        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Business
        Risk Cases<span class="h5 mb-0">Low</span></a>
      </div>
      <div class="card-body px-2">
      <div id="analytics-report-chart"></div>
      </div>
    </div>
    </div>

    <div class="col-md-12 col-xl-8">
    <h5 class="mb-3">Sales Report</h5>
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">This Week Statistics</h6>
      <h3 class="mb-0">$7,650</h3>
      <div id="sales-report-chart"></div>
      </div>
    </div>
    </div>
    <div class="col-md-12 col-xl-4">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center justify-content-between">
        <div>
        <h6 class="mb-2">Acquisition Channels</h6>
        <p class="mb-0 text-muted">Marketing</P>
        </div>
        <h4 class="text-primary">-128</h4>
      </div>
      <div id="acquisition-chart"></div>
      </div>
      <div class="list-group list-group-flush">
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-shrink-0">
          <div class="avtar avtar-s rounded-circle text-secondary bg-light-secondary">
          <i class="ti ti-device-analytics f-18"></i>
          </div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Top Channels</h6>
          <p class="mb-0 text-muted">Today, 2:00 AM</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h6 class="mb-1">+ $1,430</h6>
          <p class="mb-0 text-muted">35%</P>
        </div>
        </div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-shrink-0">
          <div class="avtar avtar-s rounded-circle text-primary bg-light-primary">
          <i class="ti ti-file-text f-18"></i>
          </div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Top Pages</h6>
          <p class="mb-0 text-muted">Today 6:00 AM</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h6 class="mb-1">- $1430</h6>
          <p class="mb-0 text-muted">35%</P>
        </div>
        </div>
      </a>
      </div>
    </div>
    </div>
  </div>

@endsection