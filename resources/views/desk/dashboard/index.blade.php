@extends('layouts.dashboard-desk')

@section('title', 'Desk Index')

@section('content')

  <div class="page-header ">
    <div class="page-block">
    <div class="row align-items-center">

      <div class="col-md-12">
      <div class="page-header-title">
        <h4 class=""><i class="ti ti-user"></i> <strong>Atendente</strong> <br> <span class="text-secondary">
          {{ $username }}</span></h4>
      </div>

      <hr>
      </div>
    </div>
    </div>

  </div>
  <div class="d-flex flex-column justify-content-center align-items-center ">

    <div class="card trafic-card pt-10" style="border-style: dashed">

    <div class="card-header border-black" style="border-style: dashed">
      <h5 class="text-center fs-3">Ticket Actual</h5>
    </div>
    <div class="card-body border-black" style="border-style: dashed">

      <h1 class="card-text text-center d-flex flex-column justify-content-center align-items-center gap-1">
      <span id="ticket-data" class="ti ti-ticket text-center fs-1"></span><span class="fs-1"></span>
      <h3 id="ticket-service" class="mt-3 text-secondary text-center"></h3>
      </h1>
    </div>
    </div>
    <div id="ticket-warning" class="alert alert-warning mt-2" style="display: none;">
    Por favor, selecione e ocupe um balcão primeiro.
    </div>
    <button id="call-ticket" type="button" class="btn btn-warning btn-md fs-5 shadow-lg">Próximo Ticket</button>
    </d>
  </div>
  </div>

  <!-- <script>
    document.getElementById('call-ticket').addEventListener('click', function () {
    // alert('sd');
    fetch("{{ route('tickets.call.next') }}")
      .then(response => response.json())
      .then(data => {
      if (data.error) {
      console.log(data.error);
      return;
      }

      const ticket = data.ticket;
      console.log(ticket);
      if (ticket) {
      document.getElementById('ticket-data').innerText = ticket.operation_association.service.prefix_code + '0' + ticket.ticket_number;
      document.getElementById('ticket-service').innerText = ticket.operation_association.service.description;
      } else {
      document.getElementById('ticket-id').innerText = "Nenhum ticket disponível";
      document.getElementById('ticket-service').innerText = "";
      }
      })
      .catch(error => {
      console.error('Erro ao buscar ticket:', error);
      });
    });
    </script> -->
@endsection