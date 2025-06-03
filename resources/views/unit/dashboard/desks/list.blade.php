@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')

<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h3 class="mb-0">Listagem de Atendentes</h3>
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
            <h5>Visualização dos dados dos Atendentes</h5>
            <small>Configure, edite, visualize e apague os dados dos Atendentes da sua empresa. </small>
          </div>
          <a class="btn btn-primary" href="{{ route('unit.create.desks') }}">Criar Atendente</a>

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
              @foreach ($desks as $item)
              @php $modalViewDesk = 'modalViewDesk' . $loop->iteration; @endphp
              @php $modalDeleteDesk = 'modalDeleteDesk' . $loop->iteration; @endphp

              <div id="{{ $modalViewDesk }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Dados do Atendente</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body">

                        <div class="form-group">
                          <label class="form-label">UNIDADE</label>
                          <input type="text" class="form-control form-control" value="{{ $item->unit->unit_name }}"
                            disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">USERNAME</label>
                          <input type="text" class="form-control form-control" value="{{ $item->username }}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">EMAIL</label>
                          <input type="text" class="form-control form-control" value="{{   $item->email }}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">CRIADO EM</label>
                          <input type="text" class="form-control form-control" value="{{  $item->created_at }}"
                            disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">PAPEL</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->role == 'desk' ? 'Atendente' : 'Desconhecido' }}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">ESTADO</label>
                          <input type="text" class="form-control form-control"
                            value="{{ $item->active ? 'Activado' : 'Desactivado' }}" disabled>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="{{ $modalDeleteDesk }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form method="POST" action="{{ route('desk.destroy', $item->id_user) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="confirmPasswordTitle">Confirme sua senha para <strong>desactivar o
                            atendente</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body">
                        <p>Por segurança, confirme sua senha para prosseguir com a exclusão do registro.</p>
                        <div class="mb-3">
                          <label for="password" class="form-label">Senha</label>
                          <input type="password" class="form-control" id="password" name="password" required
                            placeholder="Digite sua senha">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar e Apagar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->unit->unit_name }}</td>
                <td>{{ $item->username }}</td>
                <td>{{   $item->email }}</td>
                <td>{{  $item->created_at }}</td>
                <td>{{   $item->role == 'desk' ? 'Atendente' : 'Desconhecido' }}</td>
                @if($item->active)
          <td><span class="badge bg-light-success  f-12">activo</span> </td>
        @else
                <td><span class="badge bg-light-danger  f-12">inactivo</span> </td>
                @endIf
                <td class="text-center">
                  <ul class="list-inline me-auto mb-0">
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalViewDesk }}" href="#"
                        class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#cust-modal">
                        <i class="ti ti-eye f-18"></i>
                      </a>
                    </li>

                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalDeleteDesk }}" href="#"
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
                <th>UNIDADE</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>CRIADO EM</th>
                <th>PAPEL</th>
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