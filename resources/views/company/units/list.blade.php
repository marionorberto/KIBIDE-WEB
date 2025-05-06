@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

<div id="modalDeleteUnit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Deletar Unidade</h5>
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

<div id="modalViewUnit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Visualizar Unidade</h5>
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

<div id="modalEditUnit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Editar Unidade</h5>
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
                      <a data-bs-toggle="modal" data-bs-target="#modalViewUnit" href="#"
                        class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#cust-modal">
                        <i class="ti ti-eye f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                      <a data-bs-toggle="modal" data-bs-target="#modalEditUnit"
                        href="../application/ecom_product-add.html" class="avtar avtar-xs btn-link-primary">
                        <i class="ti ti-edit-circle f-18"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                      <a data-bs-toggle="modal" data-bs-target="#modalDeleteUnit" href="#"
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