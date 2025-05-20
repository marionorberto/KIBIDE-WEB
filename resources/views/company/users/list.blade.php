@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

<div id="modalDeleteUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form method="POST" action="/confirm-password-before-delete">
      @csrf
      <div class="modal-content">
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

<div id="modalViewUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
          egestas eget quam. Morbi leo
          risus, porta ac consectetur ac, vestibulum at eros.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Submeter</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Editar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
          egestas eget quam. Morbi leo
          risus, porta ac consectetur ac, vestibulum at eros.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Submeter</button>
      </div>
    </div>
  </div>
</div>

<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h3 class="mb-0">Listagem de Usuários</h3>
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
              @foreach ($companyUsers as $item)
              @php $modalViewUser = 'modalViewUser' . $loop->iteration; @endphp
              @php $modalEditUser = 'modalEditUser' . $loop->iteration; @endphp
              @php $modalDeleteUser = 'modalDeleteUser' . $loop->iteration; @endphp

              <div id="{{ $modalViewUser }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Usuário</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">
                        <div class="form-group">
                          <label class="form-label">NOME USUÁRIO</label>
                          <input type="text" class="form-control form-control" value="{{ $item->username}}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">EMAIL</label>
                          <input type="text" class="form-control form-control" value="{{   $item->email }}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">USUÁRIO CRIADO EM</label>
                          <input type="text" class="form-control form-control" value="{{   $item->created_at }}"
                            disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">PAPEL</label>
                          <input type="text" class="form-control form-control" value="{{   $item->role }}" disabled>
                        </div>

                        <div class="form-group">
                          <label class="form-label">USUÁRIO ACTIVADA/DESATIVADA</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->active ? 'activada' : 'desativada' }}" disabled>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="{{ $modalEditUser }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Editar Operação</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">
                        <div class="form-group">
                          <label class="form-label">NOME USUÁRIO</label>
                          <input type="text" class="form-control form-control" value="{{ $item->username}}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">EMAIL</label>
                          <input type="text" class="form-control form-control" value="{{   $item->email }}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">USUÁRIO CRIADO EM</label>
                          <input type="text" class="form-control form-control" value="{{   $item->created_at }}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">PAPEL</label>
                          <input type="text" class="form-control form-control" value="{{   $item->role }}">
                        </div>

                        <div class="form-group">
                          <label class="form-label">USUÁRIO ACTIVADA/DESATIVADA</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->active ? 'activada' : 'desativada' }}">
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
              <div id="{{ $modalDeleteUser }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form method="POST" action="/confirm-password-before-delete">
                    @csrf
                    <div class="modal-content">
                      <input type="hidden" name="id_user" value="{{ $item->id_user }}">
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
                <td>{{ $item->username }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->role }}</td>
                @if($item->active)
          <td><span class="badge bg-light-success  f-12">activo</span> </td>
        @else
                <td><span class="badge bg-light-danger  f-12">inactivo</span> </td>
                @endIf
                <td class="text-center">
                  <ul class="list-inline me-auto mb-0">
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalViewUser }}" href="#"
                        class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#cust-modal">
                        <i class="ti ti-eye f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalEditUser }}"
                        href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
                        <i class="ti ti-edit-circle f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalDeleteUser }}" href="#"
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