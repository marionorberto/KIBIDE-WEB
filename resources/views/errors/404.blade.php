@extends('layouts.auth')

@section('title', 'Login')

@section('content')
  <div class="maintenance-block">
    <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <div class="card error-card">
        <div class="card-body">
        <div class="error-image-block">
          <img class="img-fluid" src="{{ asset('assets/images/pages/Error404.png') }}" alt="img">
          <img class="img-fluid img-twocone" src="{{ asset('assets/images/pages/TwoCone.png') }}" alt="img">
        </div>
        <div class="text-center">
          <h1 class="mt-5"><b>Página Não Encontrada</b></h1>
          <p class="mt-2 mb-4 text-muted">A página que procuras parece que foi removida, movida,<br> ,renomeada
          ou nunca existiu!</p>
          <a href="/" type="button" class="btn btn-primary mb-3">Voltar Para Home</a>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>


@endsection