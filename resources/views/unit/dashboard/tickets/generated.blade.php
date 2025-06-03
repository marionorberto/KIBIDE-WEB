@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')


  <div id="modalViewUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalCenterTitle">Ticket Gerados</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
        egestas eget quam. Morbi leo
        risus, porta ac consectetur ac, vestibulum at eros.</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
    </div>
  </div>


  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
      <div class="page-header-title">
        <h3 class="mb-0">Tickets Gerados</h3>
      </div>
      </div>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between items-align-center">
      <div>
        <h5>Visualização dos dados dos tickets gerados</h5>
        <small>Visualize todos os tickets gerados pela sua unidade até agora.</small>
      </div>
      <a class="btn btn-primary" href="{{ route('unit.tickets.settings') }}">Configurações de tickets</a>

      </div>
      <div class="card-body">
      <div class="dt-responsive table-responsive overflow-hidden">
        <table id="myTable" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
          <th>ID</th>
          <th>UNIDADE</th>
          <th>CÓDIGO</th>
          <th>PRÉFIXO</th>
          <th>SERVIÇO</th>
          <th>LINHA</th>
          <th>STATUS</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $ticket)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $unitData->unit_name }}</td>
        <td>0{{ $ticket->ticket_number }}</td>
        <td>{{ $ticket->operationAssociation->service->prefix_code }}</td>
        <td>{{ $ticket->operationAssociation->service->description }}</td>
        <td>{{ $ticket->operationAssociation->counter->counter_name }}</td>
        @if ($ticket->status == 'pending')
        <td>Pendente</td>
      @elseif($ticket->status == 'called')
        <td>Atendido</td>
      @endif
        </tr>
      @endforeach
        </tbody>
        <tfoot>
          <tr>
          <th>ID</th>
          <th>UNIDADE</th>
          <th>CÓDIGO</th>
          <th>PRÉFIXO</th>
          <th>SERVIÇO</th>
          <th>LINHA</th>
          <th>STATUS</th>
          </tr>
        </tfoot>
        </table>
      </div>
      </div>
    </div>
    </div>
  </div>

@endsection