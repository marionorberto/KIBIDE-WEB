@extends('layouts.app')
@section('title', 'faq')
@section('content')

  <!DOCTYPE html>
  <html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <title>Nova Notificação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body style="background-color: #f8f9fa; padding: 2rem;">
    <div class="container">
    <div class="card shadow-lg">
      <div class="card-body text-center">
      <div class="mx-auto mb-3">
        <img src="{{ asset('assets/images/LOGO.png') }}" alt="Logo KIBIDE" height="80">
      </div>

      <h2 class="card-title text-primary">Olá, {{ $username }}!</h2>

      <p class="card-text mt-3">
        Você recebeu uma <strong>nova notificação</strong> de <strong>{{ $sender }}</strong> no sistema <strong>KIBIDE
        QUEUE MANAGEMENT SYSTEM</strong>.
      </p>

      <p class="card-text mt-2 text-muted" style="font-style: italic;">
        "{{ $userMessage }}"
      </p>

      <a href="{{ url('/') }}" class="btn btn-primary mt-4">Ver Notificações</a>
      </div>
    </div>

    <p class="text-center text-muted mt-4" style="font-size: 0.9rem;">
      &copy; {{ date('Y') }} KIBIDE. Todos os direitos reservados.
    </p>
    </div>
  </body>

  </html>




@endsection