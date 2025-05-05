@extends('layouts.dashboard')

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
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Total Usuários</h6>
      <h4 class="mb-0">0 <span class="badge bg-light-primary border border-primary"><i class="ti ti-trending-up"></i>
        70.5%</span></h4>
      </div>
      <div id="total-value-graph-1"></div>
    </div>
    </div>
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Total Agências</h6>
      <h4 class="mb-0">18,800 <span class="badge bg-light-warning border border-warning"><i
          class="ti ti-trending-down"></i> 27.4%</span></h4>
      </div>
      <div id="total-value-graph-2"></div>
    </div>
    </div>
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Operações</h6>
      <h4 class="mb-0">$35,078 <span class="badge bg-light-warning border border-warning"><i
          class="ti ti-trending-down"></i> 27.4%</span></h4>
      </div>
      <div id="total-value-graph-3"></div>
    </div>
    </div>
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Tickets Gerados </h6>
      <h4 class="mb-0">4,42,236 <span class="badge bg-light-primary border border-primary"><i
          class="ti ti-trending-up"></i> 59.3%</span></h4>
      </div>
      <div id="total-value-graph-4"></div>
    </div>
    </div>
    <div class="col-md-12 col-xl-12">
    <h5 class="mb-3">Listagem das Agências</h5>
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
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
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
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
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
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
          <td class="text-end">$180,139</td>
          </tr>
          <tr>
          <td><a href="#" class="text-muted">84564564</a></td>
          <td>Mobile</td>
          <td class="text-end">355</td>
          <td><span class="px-4 d-block"><i class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span></td>
          <td class="text-end">$180,139</td>
          </tr>
        </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    <!-- <div class="col-md-12 col-xl-4">
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
    </div> -->




    <div class="col-md-12 col-xl-6">
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



    <div class="col-md-12 col-xl-6">
    <h5 class="mb-3">Transaction History</h5>
    <div class="card">
      <div class="list-group list-group-flush">
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-shrink-0">
          <div class="avtar avtar-s rounded-circle text-success bg-light-success">
          <i class="ti ti-gift f-18"></i>
          </div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Order #002434</h6>
          <p class="mb-0 text-muted">Today, 2:00 AM</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h6 class="mb-1">+ $1,430</h6>
          <p class="mb-0 text-muted">78%</P>
        </div>
        </div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-shrink-0">
          <div class="avtar avtar-s rounded-circle text-primary bg-light-primary">
          <i class="ti ti-message-circle f-18"></i>
          </div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Order #984947</h6>
          <p class="mb-0 text-muted">5 August, 1:45 PM</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h6 class="mb-1">- $302</h6>
          <p class="mb-0 text-muted">8%</P>
        </div>
        </div>
      </a>
      <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex">
        <div class="flex-shrink-0">
          <div class="avtar avtar-s rounded-circle text-danger bg-light-danger">
          <i class="ti ti-settings f-18"></i>
          </div>
        </div>
        <div class="flex-grow-1 ms-3">
          <h6 class="mb-1">Order #988784</h6>
          <p class="mb-0 text-muted">7 hours ago</P>
        </div>
        <div class="flex-shrink-0 text-end">
          <h6 class="mb-1">- $682</h6>
          <p class="mb-0 text-muted">16%</P>
        </div>
        </div>
      </a>
      </div>
    </div>

    </div>


    <!-- [ sample-page ] end -->
  </div>
@endsection