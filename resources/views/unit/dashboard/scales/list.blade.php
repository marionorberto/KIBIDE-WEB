@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')


  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
      <div class="page-header-title">
        <h3 class="mb-0">Listagem de Escalas Atribuídas</h3>
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
        <h5>Visualização dos dados das escalas atribuída</h5>
        <small>Configure, edite, visualize e apague os dados das escalas atribuídas. </small>
      </div>
      <a class="btn btn-primary" href="{{ route('unit.assign.operation') }}">Atribuir Escalas</a>

      </div>
      <div class="card-body">
      <div class="dt-responsive table-responsive overflow-hidden">
        <table id="myTable" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>DATA REALIZAÇÃO</th>
          <th>REPETIÇÃO PERIÓDICA</th>
          <th>INICIA EM</th>
          <th>TERMINA EM</th>
          <th>STATUS</th>
          <th>AÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <div id="" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Operação Diária</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="card-body">
              <div class="form-group">
                <label class="form-label">NOME</label>
                <input type="text" class="form-control form-control" value="" disabled>
              </div>
              <div class="form-group">
                <label class="form-label">DATA REALIZAÇÃO</label>
                <input type="text" class="form-control form-control" value="" disabled>
              </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div id="" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Operação Diária</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="card-body">

              <div class="form-group">
                <label class="form-label">NOME</label>
                <input type="text" class="form-control form-control" value="" disabled>
              </div>
              <div class="form-group">
                <label class="form-label">DATA REALIZAÇÃO</label>
                <input type="text" class="form-control form-control" value="" disabled>
              </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Editar</button>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div id="" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" action="/confirm-password-before-delete">
            @csrf
            <div class="modal-content">
              <input type="hidden" name="id_day_operation" value="">
              <div class="modal-header">
              <h5 class="modal-title" id="confirmPasswordTitle">Confirme sua senha</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
              </div>
              <div class="modal-body">
              <p>Por segurança, confirme sua senha para prosseguir com a exclusão do registro.</p>
              <div class="mb-3">
                <label for="confirm_password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="confirm_password" name="password" required
                placeholder="Digite sua senha">
              </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Confirmar e Apagar</button>
              </div>
            </div>
            </form>
          </div>
          </div>
          <tr></tr>
        </tbody>

        <tfoot>
          <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>DATA REALIZAÇÃO</th>
          <th>REPETIÇÃO PERIÓDICA</th>
          <th>INICIA EM</th>
          <th>TERMINA EM</th>
          <th>STATUS</th>
          <th>AÇÕES</th>
          </tr>
        </tfoot>
        </table>
      </div>
      </div>
    </div>
    </div>


  </div>

@endsection