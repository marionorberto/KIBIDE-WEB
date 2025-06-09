@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')


  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
      <div class="page-header-title">
        <h3 class="mb-0">Configurações de Tickets</h3>
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
        <h5>Faça a configuração do display de tickets da sua unidade.</h5>
        <small>Configure o display dos tickets. </small>
      </div>
      </div>
      <div class="card-body">

      <div class="col-sm-8
      ">
        <h4>Adicionar Imagens para o painel</h4>
        <div class="card">
        <div class="card-body py-2">
          <!-- [ Main Content ] start -->

          <!-- [ breadcrumb ] start -->
          <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">

            <div class="col-md-12">
              <div class="page-header-title d-flex justify-content-between align-items-center">
              <h5 class="mb-0 text-secondary">Upload uma nova imagem para passar no painel da sua unidade</h5>
              <a href="" class="btn btn-primary">Ver Lista de imagens cadastradas!</a>
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
              <h5 class="text-secondary">OBS:(Para melhor visualização do seu painel a imagem precisa ser
              legível e redimensionável!)
              </h5>
            </div>
            <div class="card-body">
              <form action="../assets/json/file-upload.php" class="dropzone">
              <div class="fallback">
                <input name="file" type="file" multiple>
              </div>
              </form>
              <div class="mt-4 ms-auto">
              <button class="btn btn-primary">Enviar Cadastrar Imagem</button>
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

@endsection