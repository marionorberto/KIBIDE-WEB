@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

  <h3 class="mb-2">Mensagens Enviadas</h3>

  <div class="col-xl-8">
    <div class="card table-card">
    <div class="card-header">
      <h5>Mensagens Enviadas <span class="ms-2 f-14 px-2 badge bg-light-secondary rounded-pill">0</span></h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class="table" id="pc-dt-simple">
        <thead>
        <tr>
          <th>Nº</th>
          <th class="text-end">REMETENTE</th>
          <th class="text-center">ASSUNTO</th>
          <th class="text-end">MENSAGEM</th>
          <th class="text-end">ACÕES</th>
        </tr>
        </thead>
        <div class="alert alert-warning text-center w-full" role="alert"> Sem mensagem recebidas até ao momento!
        </div>
        <!-- <tbody>

      <tr>
      <td>


      </td>

      </tr>
      <tr>
      <td>
      <div class="media align-items-center">
      <img src="../assets/images/application/prod-img-1.png" alt="image" class="bg-light wid-50 rounded">
      <div class="media-body ms-3">
      <h5 class="mb-1">Apple MacBook Pro</h5>
      <p class="text-sm text-muted mb-0">Dark Red</p>
      </div>
      </div>
      </td>
      <td class="text-end">
      <h5 class="mb-0">$100.00</h5>
      <span class="text-sm text-muted text-decoration-line-through">$129.99</span>
      </td>
      <td class="text-center">
      <div class="btn-group btn-group-sm mb-2 border" role="group">
      <button type="button" id="decrease" onclick="decreaseValue('number')" class="btn btn-link-dark"><i
      class="ti ti-minus"></i></button>
      <input class="wid-35 text-center border-0 m-0 form-control rounded-0 shadow-none" type="text"
      id="number" value="0">
      <button type="button" id="increase" onclick="increaseValue('number')" class="btn btn-link-dark"><i
      class="ti ti-plus"></i></button>
      </div>
      </td>
      <td class="text-end">
      <h5 class="mb-0">$100.00</h5>
      </td>
      <td class="text-end">
      <a href="#" class="avtar avtar-s btn-link-danger">
      <i class="ti ti-trash f-18"></i>
      </a>
      </td>
      </tr>

      </tbody> -->
      </table>
      </div>
    </div>
    </div>

  </div>

@endsection