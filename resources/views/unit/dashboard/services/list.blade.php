@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h3 class="mb-0">Listagem de Serviços</h3>
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
          <h5>Visualização dos dados dos Serviços</h5>
          <small>Configure, edite, visualize e apague os dados dos Serviços da sua empresa. </small>
        </div>
        <a class="btn btn-primary" href="{{ route('unit.services.create') }}">Criar Serviço</a>

      </div>
      <div class="card-body">
        <div class="dt-responsive table-responsive overflow-hidden">
          <table id="myTable" class="table table-striped table-bordered nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>DESCRIÇÃO</th>
                <th>NIVEL DE PRIORIDADE</th>
                <th>PREFIXO</th>
                <th>STATUS</th>
                <th>AÇÕES</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($services as $item)
              @php $modalViewService = 'modalViewUser' . $loop->iteration; @endphp
              @php $modalEditService = 'modalEditService' . $loop->iteration; @endphp
              @php $modalDeleteService = 'modalDeleteService' . $loop->iteration; @endphp

              <div id="{{ $modalViewService }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Serviço</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">
                        <div class="form-group">
                          <label class="form-label">DESCRIÇÃO DO SERVIÇO</label>
                          <input type="text" class="form-control form-control" value="{{ $item->description }}"
                            disabled>
                        </div>
                        <div class="form-group">
                          <label class="form-label">NÍVEL DE PRIORIDADE</label>
                          <input type="text" class="form-control form-control" value="{{   $item->priority_level }}"
                            disabled>
                        </div>
                        <div class="form-group col-md-12">
                          <label class="form-label" for="exampleSelect1">CÓDIGO DO PREFIXO</label>
                          <select name="" class="form-select service-data" id="exampleSelect1" disabled>
                            <option value="A" {{ $item->prefix_code == 'A' ? 'selected' : '' }}>Prefixo - A</option>
                            <option value="B" {{ $item->prefix_code == 'B' ? 'selected' : '' }}>Prefixo - B</option>
                            <option value="A" {{ $item->prefix_code == 'C' ? 'selected' : '' }}>Prefixo - C</option>
                            <option value="D" {{ $item->prefix_code == 'D' ? 'selected' : '' }}>Prefixo - D</option>
                            <option value="E" {{ $item->prefix_code == 'E' ? 'selected' : '' }}>Prefixo - E</option>
                            <option value="F" {{ $item->prefix_code == 'F' ? 'selected' : '' }}>Prefixo - F</option>
                            <option value="G" {{ $item->prefix_code == 'G' ? 'selected' : '' }}>Prefixo - G</option>
                            <option value="H" {{ $item->prefix_code == 'H' ? 'selected' : '' }}>Prefixo - H</option>
                            <option value="I" {{ $item->prefix_code == 'I' ? 'selected' : '' }}>Prefixo - I</option>
                            <option value="J" {{ $item->prefix_code == 'J' ? 'selected' : '' }}>Prefixo - J</option>
                            <option value="K" {{ $item->prefix_code == 'K' ? 'selected' : '' }}>Prefixo - K</option>
                            <option value="L" {{ $item->prefix_code == 'L' ? 'selected' : '' }}>Prefixo - L</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="{{ $modalEditService }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Editar Serviço</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="card-body">
                        <div class="form-group">
                          <label class="form-label">DESCRIÇÃO DO SERVIÇO</label>
                          <input type="text" name="description" class="form-control form-control"
                            value="{{ $item->description }}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">NÍVEL DE PRIORIDADE</label>
                          <select name="priority_level" class="form-select service-data" id="exampleSelect1">
                            <option value="normal" {{ $item->priority_level == 'normal' ? 'selected' : '' }}>Normal
                            </option>
                            <option value="urgent" {{ $item->priority_level == 'urgent' ? 'selected' : '' }}>Urgente
                            </option>
                          </select>
                          <!-- <input type="text" class="form-control form-control" value="{{   $item->priority_level }}"> -->
                        </div>
                        <div class="form-group col-md-12">
                          <label class="form-label" for="exampleSelect1">CÓDIGO DO PREFIXO</label>
                          <select name="prefix_code" class="form-select service-data" id="exampleSelect1">
                            <option value="A" {{ $item->prefix_code == 'A' ? 'selected' : '' }}>Prefixo - A</option>
                            <option value="B" {{ $item->prefix_code == 'B' ? 'selected' : '' }}>Prefixo - B</option>
                            <option value="A" {{ $item->prefix_code == 'C' ? 'selected' : '' }}>Prefixo - C</option>
                            <option value="D" {{ $item->prefix_code == 'D' ? 'selected' : '' }}>Prefixo - D</option>
                            <option value="E" {{ $item->prefix_code == 'E' ? 'selected' : '' }}>Prefixo - E</option>
                            <option value="F" {{ $item->prefix_code == 'F' ? 'selected' : '' }}>Prefixo - F</option>
                            <option value="G" {{ $item->prefix_code == 'G' ? 'selected' : '' }}>Prefixo - G</option>
                            <option value="H" {{ $item->prefix_code == 'H' ? 'selected' : '' }}>Prefixo - H</option>
                            <option value="I" {{ $item->prefix_code == 'I' ? 'selected' : '' }}>Prefixo - I</option>
                            <option value="J" {{ $item->prefix_code == 'J' ? 'selected' : '' }}>Prefixo - J</option>
                            <option value="K" {{ $item->prefix_code == 'K' ? 'selected' : '' }}>Prefixo - K</option>
                            <option value="L" {{ $item->prefix_code == 'L' ? 'selected' : '' }}>Prefixo - L</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Editar</button>

                      </div>
                    </div>
                  </div>
                  </d>
                </div>
                <div id="{{ $modalDeleteService }}" class="modal fade" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <form method="POST" action="/confirm-password-before-delete">
                      @csrf
                      <div class="modal-content">
                        <input type="hidden" name="id_service" value="{{ $item->id_service }}">
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
                  <td>{{ $item->description }}</td>
                  <td>{{ $item->priority_level }}</td>
                  <td>{{ $item->prefix_code }}</td>

                  @if($item->active)
            <td><span class="badge bg-light-success  f-12">activo</span> </td>
          @else
                  <td><span class="badge bg-light-dander  f-12">inactivo</span> </td>
                  @endIf
                  <td class="text-center">
                    <ul class="list-inline me-auto mb-0">
                      <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                        <a data-bs-toggle="modal" data-bs-target="#{{ $modalViewService }}" href="#"
                          class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#cust-modal">
                          <i class="ti ti-eye f-18"></i>
                        </a>
                      </li>
                      <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                        <a data-bs-toggle="modal" data-bs-target="#{{  $modalEditService}}"
                          href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
                          <i class="ti ti-edit-circle f-18"></i>
                        </a>
                      </li>
                      <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                        <a data-bs-toggle="modal" data-bs-target="#{{  $modalDeleteService}}" href="#"
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