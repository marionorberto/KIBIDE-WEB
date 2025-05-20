@extends('layouts.dashboard-desk')

@section('title', 'Desk Index')

@section('content')

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">

      <div class="col-md-12">
      <div class="page-header-title">
        <h4 class=""><i class="ti ti-user"></i> <strong>Atendente</strong> <br> <span class="text-secondary">
          {{ $username }}</span></h4>
      </div>
      </div>
    </div>
    </div>
  </div>
  <form method="get" action="{{ route('tickets.call.next') }}"
    class="d-flex flex-column justify-content-center align-items-center ">
    <!-- <div class="card trafic-card " style="border-style: dashed">
    <div class="card-header border-black" style="border-style: dashed">
      <h5 class="text-center fs-3">Ticket Actual</h5>
    </div>
    <div class="card-body border-black" style="border-style: dashed">

      <h1 class="card-text text-center d-flex flex-column justify-content-center align-items-center gap-1">
      <span class="ti ti-ticket text-center fs-1"></span><span class="fs-1">A040</span>
      </h1>
      <h3 class="mt-3 text-secondary text-center">Depósito Bancário</h3>
    </div>
    </div> -->

    <div class="card trafic-card " style="border-style: dashed">
    <!-- <div class="card-header border-black" style="border-style: dashed">
      <h5 class="text-center fs-3">Ticket Actual</h5>
    </div> -->
    <div class="card-body border-black" style="border-style: dashed">

      <!-- <h1 class="card-text text-center d-flex flex-column justify-content-center align-items-center gap-1"> -->
      <!-- <span class="ti ti-ticket text-center fs-1"></span><span class="fs-1">A040</span> -->
      <!-- </h1> -->
      <h3 class="mt-3 text-danger text-center">Sem Tickets Disponíveis</h3>
    </div>
    </div>

    <button type="submit" class="btn btn-primary btn-md fs-5 shadow-lg">Próximo Ticket</button>
  </form>
  </div>
  </div>


@endsection