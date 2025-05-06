@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

  <div class="col-xl-4">
    <div class="card">
    <div class="card-body">
      <button type="button" class="btn btn-sm btn-link-secondary" data-bs-toggle="modal" data-bs-target="#couponModal">
      Enviar SMS
      </button>
      <div class="input-group my-2">
      <input type="text" class="form-control" placeholder="Pesquise os gerentes para enviar a sms">
      <button class="btn btn-outline-secondary" type="button">Pesquisar</button>
      </div>
    </div>
    </div>
    <div class="card">
    <div class="card-body py-2">
      <ul class="list-group list-group-flush">
      <li class="list-group-item px-0">
        <h5 class="mb-0">Assunto</h5>
      </li>
      <li class="list-group-item px-0">
        <div class="form-group mb-0">
        <label class="form-label" for="exampleTextarea">Textarea</label>
        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
        </div>
      </li>

      </ul>
    </div>
    </div>
    <div class="card">
    <div class="card-body py-2">
      <ul class="list-group list-group-flush">
      <li class="list-group-item px-0">
        <div class="float-end">
        <h5 class="mb-0">$300.00</h5>
        </div>
        <h5 class="mb-0 d-inline-block">Total</h5>
      </li>
      </ul>
    </div>
    </div>
    <div class="d-grid mb-3">
    <button class="btn btn-primary">Enviar Mensagem</button>
    </div>
  </div>

@endsection