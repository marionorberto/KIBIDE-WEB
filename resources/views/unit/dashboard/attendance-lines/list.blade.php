@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')




<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h3 class="mb-0">Listagem de Linhas Atendimentos</h3>
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
          <h5>Visualização dos dados dos Linhas Atenimentos</h5>
          <small>Configure, edite, visualize e apague os dados dos Linhas Atenimentos da sua empresa. </small>
        </div>
        <a class="btn btn-primary" href="{{ route('unit.services.create') }}">Criar Serviço</a>

      </div>
      <div class="card-body">
        <div class="dt-responsive table-responsive overflow-hidden">
          <table id="myTable" class="table table-striped table-bordered nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>UNIDADE</th>
                <th>NOME</th>
                <th>STATUS</th>
                <th>AÇÕES</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($counters as $item)
              @php $modalViewLine = 'modalViewLine' . $loop->iteration; @endphp
              @php $modalEditLine = 'modalEditLine' . $loop->iteration; @endphp
              @php $modalDeleteLine = 'modalDeleteLine' . $loop->iteration; @endphp
              <div id="{{ $modalViewLine }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Linha de Atendimento</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">

                        <div class="form-group">
                          <label class="form-label">NOME</label>
                          <input type="text" class="form-control form-control" value="{{   $item->counter_name }}"
                            disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">STATUS</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->active ? 'activado' : 'desativado'}}" disabled>
                        </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="{{ $modalEditLine }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Editar Linha de Atendimento</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">

                        <div class="form-group">
                          <label class="form-label">NOME</label>
                          <input type="text" class="form-control form-control" value="{{   $item->counter_name }}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">STATUS</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->active ? 'activado' : 'desativado'}}">
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
              <div id="{{ $modalDeleteLine }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form method="POST" action="/confirm-password-before-delete">
                    @csrf
                    <div class="modal-content">
                      <input type="hidden" name="id_counter" value="{{ $item->id_counter }}">
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
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>unidade</td>
                <td>{{ $item->counter_name }}</td>
                @if($item->active)
          <td><span class="badge bg-light-success  f-12">activo</span> </td>
        @else
                <td><span class="badge bg-light-dander  f-12">inactivo</span> </td>
                @endIf
                <td class="text-center">
                  <ul class="list-inline me-auto mb-0">
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalViewLine }}" href="#"
                        class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#cust-modal">
                        <i class="ti ti-eye f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalEditLine }}"
                        href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
                        <i class="ti ti-edit-circle f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalDeleteLine }}" href="#"
                        class="avtar avtar-xs btn-link-danger">
                        <i class="ti ti-trash f-18"></i>
                      </a>
                    </li>


                  </ul>
                </td>
              </tr>
              @endforeach

            </tbody>

            <tfoot>
              <tr>
                <th>ID</th>
                <th>DESCRIÇÃO</th>
                <th>NIVEL DE PRIORIDADE</th>
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