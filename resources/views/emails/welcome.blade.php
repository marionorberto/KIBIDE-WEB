@extends('layouts.app')
@section('title', 'faq')
@section('content')

  <!DOCTYPE html>
  <html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao KIBIDE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body style="background-color: #f8f9fa; padding: 2rem;">
    <div class="container">
    <div class="card shadow-lg">
      <div class="card-body text-center">
      <div class="mx-auto">

        <img src="{{ asset('assets/images/LOGO.png') }}" alt="" srcset="">
      </div>
      <h1 class="card-title text-primary">{{ $username }}, Bem-vindo ao <strong>KIBIDE QUEUE MANAGEMENT
        SYSTEM</strong></h1>
      <p class="card-text mt-3">
        Olá! É um prazer ter você conosco.<br>
        O <strong>KIBIDE</strong> é um sistema de gerenciamento de filas que ajuda a organizar atendimentos de forma
        eficiente e prática.
      </p>

      <a href="{{ url('/') }}" class="btn btn-primary mt-4">Acessar o Sistema</a>
      </div>
    </div>

    <p class="text-center text-muted mt-4" style="font-size: 0.9rem;">
      &copy; {{ date('Y') }} KIBIDE. Todos os direitos reservados.
    </p>
    </div>
  </body>

  </html>



@endsection