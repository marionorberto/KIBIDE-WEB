@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

  <div class="col-xl-4">
    <h3 class="mb-3">Nova Mensagem</h3>
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
        <label class="form-label" for="exampleTextarea">Escreva um assunto antes de enviar.</label>
        <input type="text" name="subject" class="form-control" placeholder="Assunto da Mensagem" required>
        </div>
      </li>

      </ul>
      <ul class="list-group list-group-flush">
      <li class="list-group-item px-0">
        <h5 class="mb-0">A Mensagem</h5>
      </li>
      <li class="list-group-item px-0">
        <div class="form-group mb-0">
        <label class="form-label" for="exampleTextarea">Escreva um assunto antes de enviar.</label>
        <textarea class="form-control" name="message" id="exampleTextarea" placeholder="Escreva aqui a mensagem!"
          rows="3"></textarea>
        </div>
      </li>

      </ul>
    </div>
    </div>
    <div class="card">
    <div class="card-body py-2">
      <!-- [ Main Content ] start -->

      <!-- [ breadcrumb ] start -->
      <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">

        <div class="col-md-12">
          <div class="page-header-title">
          <h4 class="mb-0">Upload um arquivo</h4>
          </div>
        </div>
        </div>
      </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
      <!-- [ file-upload ] start -->
      <div class="col-sm-12">
        <div class="card">
        <div class="card-header">
          <h5>Envie um arquivo</h5>
        </div>
        <div class="card-body">
          <form action="../assets/json/file-upload.php" class="dropzone">
          <div class="fallback">
            <input name="file" type="file" multiple>
          </div>
          </form>

        </div>
        </div>
      </div>
      <!-- [ file-upload ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>

    </div>
    <div class="d-grid mb-3">
    <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
    </div>
  </div>

@endsection