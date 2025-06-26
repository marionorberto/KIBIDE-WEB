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
  <div class="col-md-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total de Unidades</h6>
        <h4 class="mb-0">{{ $unitsCount }} <span class="badge bg-light-primary border border-primary"><i
              class="ti ti-trending-up"></i>
            70.5%</span></h4>
      </div>
      <div id="total-value-graph-1"></div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total Gerentes</h6>
        <h4 class="mb-0">{{ $usersCount }} <span class="badge bg-light-warning border border-warning"><i
              class="ti ti-trending-down"></i> 27.4%</span></h4>
      </div>
      <div id="total-value-graph-2"></div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total de Atendentes</h6>
        <h4 class="mb-0">{{ $deskCount }} <span class="badge bg-light-warning border border-warning"><i
              class="ti ti-trending-down"></i> 27.4%</span></h4>
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
                <th>ID</th>
                <th>EMPRESA</th>
                <th>NOME UNIDADE</th>
                <th>EMAIL</th>
                <th>STATUS</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($units as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->company_name ?? '----------'}}</td>
                <td>{{ $item->unit_name ?? '----------'}}</td>
                <td>{{ $item->unit_email ?? '----------'}}</td>
                <td>{{ $item->unit_address ?? '----------'}}</td>
                @if($item->active)
          <td><span class="badge bg-light-success  f-12">activada</span> </td>
        @else
                <td><span class="badge bg-light-danger  f-12">desativada</span> </td>
                @endIf

              </tr>
              @endforeach

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
    <h5 class="mb-3">Estatísticas Gerais</h5>
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

      </div>
    </div>
  </div>



  <div class="col-md-12 col-xl-6">
    <h5 class="mb-3">Estado da Licença</h5>
    <div class="card">
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <div class="avtar avtar-s rounded-circle text-success bg-light-primary">
                <i class="ti ti-key f-18"></i>
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
      </div>
    </div>

  </div>


  <!-- [ sample-page ] end -->
</div>
@endsection