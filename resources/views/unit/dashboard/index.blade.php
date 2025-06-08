@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">

      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mt-4">Dashboard Unidade</h2>
      </div>
      </div>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Total Atendentes</h6>
      <h4 class="mb-3">{{ $deskCount }} <span class="badge bg-light-primary border border-primary"><i
          class="ti ti-trending-up"></i>
        59.3%</span></h4>
      <p class="mb-0 text-muted text-sm">Dados relativos ao mês corrente<span class="text-danger">-
        {{ $actualMonth }}</span>

      </p>
      </div>
    </div>
    </div>
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Total de Balcões</h6>
      <h4 class="mb-3">{{ $counterCount }} <span class="badge bg-light-success border border-success"><i
          class="ti ti-trending-up"></i>
        70.5%</span></h4>
      <p class="mb-0 text-muted text-sm">Dados relativos ao mês corrente<span class="text-danger">-
        {{ $actualMonth }}</span>
      </div>
    </div>
    </div>
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Total de Serviços</h6>
      <h4 class="mb-3">{{ $serviceCount }} <span class="badge bg-light-warning border border-warning"><i
          class="ti ti-trending-down"></i> 27.4%</span></h4>
      <p class="mb-0 text-muted text-sm">Dados relativos ao mês corrente<span class="text-danger">-
        {{ $actualMonth }}</span>
      </div>
    </div>
    </div>
    <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
      <h6 class="mb-2 f-w-400 text-muted">Total de Tickets Gerados</h6>
      <h4 class="mb-3">{{ $ticketCount }} <span class="badge bg-light-danger border border-danger"><i
          class="ti ti-trending-down"></i>
        27.4%</span></h4>
      <p class="mb-0 text-muted text-sm">Dados relativos ao mês corrente<span class="text-danger"> -
        {{ $actualMonth }}</span>
      </p>
      </div>
    </div>
    </div>



    <div class="col-md-12 col-xl-8">
    <h5 class="mb-3">Tickect Gerados - Semanalmente</h5>
    <div class="card">
      <div class="list-group list-group-flush">
      <a href="#"
        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Total
        Gerados<span class="h5 mb-0">{{ $ticketCount }}</span></a>
      <a href="#"
        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Tickets
        Atendidos<span class="h5 mb-0">0</span></a>
      <a href="#"
        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Tickets
        Cancelados<span class="h5 mb-0">0</span></a>
      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
        Serviço Mais Solicitado<span class="h5 mb-0 text-warning">Depósitos</span></a>
      </div>
      <div class="card-body px-2">
      <div id="analytics-report-chart"></div>
      </div>
    </div>
    </div>
    <div class="col-md-12 col-xl-4">
    <h5 class="mb-3">Atendentes Ativos</h5>
    <div class="card">
      <div class="list-group list-group-flush">

      @foreach ($desks as $desk)
      <a href="#" class="list-group-item list-group-item-action">
      <div class="d-flex">
      <div class="flex-shrink-0">
        @if ($desk->photo)
      <img class="rounded-circle" src="{{ asset('storage/' . $desk->photo) }}" alt="" srcset=""
      style="width: 35px; height: 35px;">
      @else
      <div class="avtar avtar-s rounded-circle text-primary bg-light-primary">
      <i class="ti ti-user f-18"></i>
      </div>
      @endif
      </div>
      <div class="flex-grow-1 ms-3">
        <h6 class="mb-1">{{ $desk->username }}</h6>
        <p class="mb-0 text-muted">Entrada - 8:00 AM</P>
      </div>
      </div>
      </a>
    @endforeach
      </div>
    </div>
    </div>
  </div>
@endsection