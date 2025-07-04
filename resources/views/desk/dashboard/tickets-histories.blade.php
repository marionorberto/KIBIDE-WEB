@extends('layouts.dashboard-desk')

@section('title', 'Históricos de Tickets')

@section('content')
  <input hidden id="input-id-user-desk" type="text" value="{{ Auth::user()->id_user }}">
  <input hidden id="input-id-unit-desk" type="text" value="{{ Auth::user()->unit_id }}">
  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
      <div class="page-header-title">
        <h3 class="mb-0">Históricos de Tickets</h3>
      </div>
      </div>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
      <div class="d-flex justify-content-between items-align-center">
        <div>
        <h5>Visualização dos Tickets gerados</h5>
        <small>Visualize todos os tickets gerados por você até ao momento. </small>
        </div>
        <a class="btn btn-primary" href="{{ route('desk.index') }}">Ir para balcão</a>
      </div>
      @if ($errors->any())
      <ul class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
      <li class="ps-1">{{ $error }}</li>
      @endforeach
      </ul>
    @endif

      @if ($successMessage = session('success'))
      <div class="alert alert-success mt-3" role="alert"> {{ $successMessage }} </div>
    @endif

      @if ($errorMessage = session('error'))
      <div class="alert alert-danger mt-3" role="alert"> {{ $errorMessage }}</div>
    @endif
      </div>

      <div class="card-body">
      <div class="col-md-6">
        <div class="form-group">
        <label class="form-label" for="exampleSelect1">Buscar Por Data</label>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="input-group date">
          <input id="get-by-date" name="realization_date" type="date" class="form-control realization_date"
            placeholder="Select date" id="pc-datepicker-2" value="{{ now()->format('Y-m-d') }}">
          <span class="input-group-text">
            <i class="feather icon-calendar"></i>
          </span>
          </div>
        </div>

        </div>
      </div>
      <div class="alert alert-warning text-center mt-5 fw-medium" id="alert-without-ticket-with-this-date">Sem
        históricos de
        Tickets para
        essa data, Pesquise por uma outra data!</div>
      <div class="dt-responsive table-responsive overflow-hidden myTableHistoriesTicket">
        <table id="myTable" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
          <th>Nº</th>
          <th>ATENDENTE</th>
          <th>TICKET</th>
          <th>SERVIÇO</th>
          <th>LINHA</th>
          <th>PRIORIDADE</th>
          <th>STATUS</th>
          <th>DATA</th>
          </tr>
        </thead>
        <tbody id="tbody-ticket-histories">

        </tbody>
        <tfoot>
          <tr>
          <th>Nº</th>
          <th>ATENDENTE</th>
          <th>TICKET</th>
          <th>SERVIÇO</th>
          <th>LINHA</th>
          <th>PRIORIDADE</th>
          <th>STATUS</th>
          <th>DATA</th>
          </tr>
        </tfoot>
        </table>
      </div>
      </div>
    </div>
    </div>
  </div>
  <script>

    const inputIdUserDesk = document.getElementById('input-id-user-desk');
    const inputIdUnitDesk = document.getElementById('input-id-unit-desk');
    const tbodyTicketHistories = document.getElementById('tbody-ticket-histories');
    const alertWithoutTicketWithThisDate = document.getElementById('alert-without-ticket-with-this-date');
    const myTableHistoriesTicket = document.querySelector('.myTableHistoriesTicket');
    const date = document.getElementById('get-by-date');

    alertWithoutTicketWithThisDate.style.display = 'none';


    date.addEventListener('change', () => getAllDeskTicketsByDate(date.value));

    getAllDeskTickets();

    // fetch all tickets generated by desk
    function getAllDeskTickets() {
    const idUser = inputIdUserDesk.value;
    const idUnit = inputIdUnitDesk.value;

    fetch(`/api/user/${idUnit}/${idUser}/all-tickets-generated`)
      .then((res) => {
      if (res.ok) {
        return res.json();
      }
      throw new Erro('Occured some error, trying fetching this method - getAllDeskTickets()')
      })
      .then(({ tickets: data }) => {

      tbodyTicketHistories.innerHTML = ""; // limpa
      myTableHistoriesTicket.style.display = 'block';

      if (data.length > 0) {
        data.forEach((element, index) => {
        let statusTd = '';
        if (element.ticket.status == 'pending') {
          statusTd = `<td><span class="badge bg-light-warning">Pendente</span></td>`;
        } else if (element.ticket.status == 'called') {
          statusTd = `<td><span class="badge bg-light-success">Atendido</span></td>`;
        } else if (element.ticket.status == 'cancelled') {
          statusTd = `<td><span class="badge bg-light-danger">Cancelado</span></td>`;
        }

        const row = `
    <tr>
    <td>${index + 1}</td>
     <td>${element.user.username}</td>
    <td>0${element.ticket.ticket_number}</td>
    <td>${element.ticket.operation_association.service.description}</td>
    <td>${element.ticket.operation_association.counter.counter_name}</td>
    <td>${element.ticket.operation_association.service.priority_level}</td>
    ${statusTd}
    <td>${element.created_at.split('T')[0]}</td>
    </tr>
    `;
        tbodyTicketHistories.innerHTML += row;
        });
      } else {
        alertWithoutTicketWithThisDate.style.display = 'block';
        myTableHistoriesTicket.style.display = 'none';
      }
      })
      .catch((err) => {
      console.log('occured some error applying this method - ', erro);
      });
    }

    function getAllDeskTicketsByDate(date) {
    const idUser = inputIdUserDesk.value;
    const idUnit = inputIdUnitDesk.value;
    fetch(`/api/user/${idUnit}/${idUser}/${date}/all-tickets-generated-by-date`)
      .then((res) => {
      if (res.ok) {
        return res.json();
      }
      throw new Erro('Occured some error, trying fetching this method - getAllDeskTickets()')
      })
      .then(({ tickets: data }) => {
      alertWithoutTicketWithThisDate.style.display = 'none';

      console.log(data);
      tbodyTicketHistories.innerHTML = ""; // limpa
      if (data.length > 0) {
        myTableHistoriesTicket.style.display = 'block';

        data.forEach((element, index) => {
        let statusTd = '';
        if (element.ticket.status == 'pending') {
          statusTd = `<td><span class="badge bg-light-warning">Pendente</span></td>`;
        } else if (element.ticket.status == 'called') {
          statusTd = `<td><span class="badge bg-light-success">Atendido</span></td>`;
        } else if (element.ticket.status == 'cancelled') {
          statusTd = `<td><span class="badge bg-light-danger">Cancelado</span></td>`;
        }
        const row = `
    <tr>
    <td>${index + 1}</td>
     <td>${element.user.username}</td>
    <td>0${element.ticket.ticket_number}</td>
    <td>${element.ticket.operation_association.service.description}</td>
    <td>${element.ticket.operation_association.counter.counter_name}</td>
    <td>${element.ticket.operation_association.service.priority_level}</td>
    ${statusTd}
    <td>${element.created_at.split('T')[0]}</td>
    </tr>
    `;
        tbodyTicketHistories.innerHTML += row;
        // console.log(' # ', element.ticket.operation_association.counter.counter_name);
        });
      } else {
        alertWithoutTicketWithThisDate.style.display = 'block';
        myTableHistoriesTicket.style.display = 'none';
      }
      })
      .catch((err) => {
      console.log('occured some error applying this method - ', erro);
      });
    }
  </script>
@endsection