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
        <h5>Visualização dos dados dos usuários</h5>
        <small>Configure, edite, visualize e apague os dados dos usuários da sua empresa. </small>
      </div>
      <a class="btn btn-primary" href="{{ route('company.create.users') }}">Criar Usuário</a>

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
          <td>{ $item->role }}</td>
          <td><span class="badge bg-light-dander  f-12">inactivo</span> </td>
          <td class="text-center">
            <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
              <a data-bs-toggle="modal" data-bs-target="#modalViewUser" href="#"
              class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#cust-modal">
              <i class="ti ti-eye f-18"></i>
              </a>
            </li>
            </ul>
          </td>
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