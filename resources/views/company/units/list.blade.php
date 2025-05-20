@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')
<!-- <th>EMPRESA</th>
<th>NOME UNIDADE</th>
<th>EMAIL</th>
<th>ADDRESS</th>
<th>TELEFONE</th>
<th>GERENTE</th>
<th>TOTAL USUARIO</th>
<th>STATUS</th>
<th>AÇÕES</th> -->

<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h3 class="mb-0">Listagem das Unidades</h3>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h5>Visualização dos dados das unidades</h5>
          <small>Configure, edite, visualize e apague os dados das unidades da sua empresa. </small>
        </div>
        <a class="btn btn-primary" href="{{ route('company.create.units') }}">Criar Unidade</a>

      </div>
      <div class="card-body">
        <div class="dt-responsive table-responsive overflow-hidden">
          <table id="myTable" class="table table-striped table-bordered nowrap ">
            <thead>

              <tr>
                <th>ID</th>
                <th>EMPRESA</th>
                <th>NOME UNIDADE</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>TELEFONE</th>
                <th>GERENTE</th>
                <th>TOTAL USUARIO</th>
                <th>STATUS</th>
                <th>AÇÕES</th>
              </tr>

            </thead>
            <tbody>
              @foreach ($units as $item)
              @php $modalViewUnit = 'modalViewUnit' . $loop->iteration; @endphp
              @php $modalEditUnit = 'modalEditUnit' . $loop->iteration; @endphp
              @php $modalDeleteUnit = 'modalDeleteUnit' . $loop->iteration; @endphp
              <div id="{{ $modalViewUnit }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Unidade</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">
                        <div class="form-group">
                          <label class="form-label">NOME DA EMPRESA</label>
                          <input type="text" class="form-control form-control"
                            value="{{ $item->company_name ?? '-----'}}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">EMAIL DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->company_email ?? '-----'}}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">ENDEREÇO DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->company_address ?? '-----'}}" disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">TELEFONE DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->company_phone ?? '-----'}}" disabled>
                        </div>

                        <div class="form-group">
                          <label class="form-label">GERENTE DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->manager_name ?? '-----'}}" disabled>
                        </div>

                        <div class="form-group">
                          <label class="form-label">TOTAL USUARIO</label>
                          <input type="text" class="form-control form-control"
                            value="{{ $item->users_count ?? '-----'}}" disabled>
                        </div>

                        <div class="form-group">
                          <label class="form-label">USUÁRIO ACTIVADO/DESATIVADO</label>
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

              <div id="{{ $modalEditUnit }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Editar Unidade</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">
                        <div class="form-group">
                          <label class="form-label">NOME DA EMPRESA</label>
                          <input type="text" class="form-control form-control"
                            value="{{ $item->company_name ?? '-----'}}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">EMAIL DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->company_email ?? '-----'}}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">ENDEREÇO DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->company_address ?? '-----'}}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">TELEFONE DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->company_phone ?? '-----'}}">
                        </div>

                        <div class="form-group">
                          <label class="form-label">GERENTE DA UNIDADE</label>
                          <input type="text" class="form-control form-control"
                            value="{{   $item->manager_name ?? '-----'}}">
                        </div>

                        <div class="form-group">
                          <label class="form-label">TOTAL USUARIO</label>
                          <input type="text" class="form-control form-control"
                            value="{{ $item->users_count ?? '-----'}}">
                        </div>

                        <div class="form-group">
                          <label class="form-label">USUÁRIO ACTIVADO/DESATIVADO</label>
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
              <div id="{{ $modalDeleteUnit }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form method="POST" action="/confirm-password-before-delete">
                    @csrf
                    <div class="modal-content">
                      <input type="hidden" name="id_unit" value="{{ $item->id_unit }}">
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
                <td>{{ $item->company_name ?? '------'}}</td>
                <td>{{ $item->unit_name ?? '-------'}}</td>
                <td>{{ $item->unit_email ?? '--------'}}</td>
                <td>{{ $item->unit_address ?? '-------'}}</td>

                <td>{{ $item->unit_phone ?? '------'}}</td>
                <td>{{ $item->manager_name ?? '-------'}}</td>
                <td>{{ $item->users_count }}</td>
                @if($item->active)
          <td><span class="badge bg-light-success  f-12">activada</span> </td>
        @else
                <td><span class="badge bg-light-danger  f-12">desactivada</span> </td>
                @endIf
                <td class="text-center">
                  <ul class="list-inline me-auto mb-0">
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalViewUnit }}" href="#"
                        class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#cust-modal">
                        <i class="ti ti-eye f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                      <a data-bs-toggle="modal" data-bs-target="#{{ $modalEditUnit }}"
                        href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
                        <i class="ti ti-edit-circle f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                      <a data-bs-toggle="modal" data-bs-target="#{$modalDeleteUnit}" href="#"
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
                <th>EMPRESA</th>
                <th>NOME UNIDADE</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>TELEFONE</th>
                <th>GERENTE</th>
                <th>TOTAL USUARIO</th>
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