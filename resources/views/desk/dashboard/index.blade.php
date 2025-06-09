@extends('layouts.dashboard-desk')
@section('title', 'Página Inicial - Atendente')
@section('content')
  <div class="page-header ">
    <div class="page-block">
    <div class="row align-items-center">

      <div class="col-md-12">
      <div class="page-header-title" style="display: flex; justify-content:  start; align-items: center; gap: 25px;">
        <h4 class=""><i class="ti ti-user"></i> <strong>Atendente</strong> <br> <span class="text-secondary">
          {{ $username }}</span> </h4>
        <div class="flex-row justify-content-start gap-4 align-items-center">
        <span id="display-counter-name" class="h1"></span>
        <span id="display-service-name" class="h2 text-muted"></span>
        </div>
      </div>
      <hr>
      </div>
    </div>
    </div>

  </div>
  <div class="d-flex flex-column justify-content-center align-items-center mt-5">

    <div id="current-ticket" class="card trafic-card mt-5" style="border-style: dashed; width: 18rem; height: 16rem;">

    <div class="card-header border-secondary" style="border-style: dashed">
      <h5 class="text-center fs-3 text-secondary">Ticket Actual</h5>
    </div>
    <div class="card-body border-secondary" style="border-style: dashed">

      <h1 class="card-text text-center d-flex flex-column justify-content-center align-items-center gap-1">
      <span id="ticket-data" class="ti ti-ticket text-center fs-1 "></span><span class="fs-1"></span>
      <h2 id="ticket-service" class="mt-3  text-center"></h2>
      </h1>
    </div>
    </div>
    <div id="ticket-warning" class="alert alert-warning mt-5 mb-4" style="display: none;">
    Por favor, selecione um balcão antes de continuar.
    </div>
    <button id="call-ticket" type="button" class="btn btn-warning btn-md fs-5 shadow-lg">Próximo Ticket</button>
  </div>
  </div>
  </div>


@endsection