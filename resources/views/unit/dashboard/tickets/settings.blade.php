@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')


  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
      <div class="page-header-title">
        <h3 class="mb-0">Configurações de Tickets</h3>
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
        <h5>Faça a configuração do display de tickets da sua unidade.</h5>
        <small>Configure o display dos tickets. </small>
      </div>
      <a class="btn btn-primary" href="{{ route('unit.tickets.generated') }}">Ver Tickets Gerados</a>

      </div>
      <div class="card-body">
      <div class="dt-responsive table-responsive overflow-hidden">
        <table id="myTable" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
          <th>ID</th>
          <th>UNIDADE</th>
          <th>USERNAME</th>
          <th>EMAIL</th>
          <th>CRIADO EM</th>
          <th>PAPEL</th>
          <th>STATUS</th>
          <th>AÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td>{ $loop->iteration }}</td>
          <td>unidade</td>
          <td>{ $item->username }}</td>
          <td>{ $item->email }}</td>
          <td>{ $item->created_at }}</td>
          <td>{ $item->created_at }}</td>
          <td>{ $item->role }}</td>
          <td>{ $item->role }}</td>
          </tr>

        </tbody>

        <tfoot>
          <tr>
          <th>ID</th>
          <th>USERNAME</th>
          <th>EMAIL</th>
          <th>CRIADO EM</th>
          <th>PAPEL</th>
          <th>STATUS</th>
          <th>AÇÕES - obs apenas para ver o card</th>
          </tr>
        </tfoot>
        </table>
      </div>
      </div>
    </div>
    </div>


  </div>

@endsection