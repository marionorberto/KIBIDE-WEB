@extends('layouts.dashboard-unit')

@section('title', 'Notificações')

@section('content')


  <h3 class="mb-2">Caixa de Entrada(Notificações)</h3>
  <div class="col-xl-8">
    <div class="card table-card">

    <div class="card-header">
      <h5>Notificações <span class="ms-2 f-14 px-2 badge bg-light-secondary rounded-pill">
        {{ $notificationCounter ?? 0}}
      </span></h5>
    </div>
    @if ($errors->any())
    <ul class="alert alert-danger mt-3 mx-4">
      @foreach ($errors->all() as $error)
      <li class="ps-1">{{ $error }}</li>
    @endforeach
    </ul>
    @endif

    @if ($successMessage = session('success'))
    <div class="alert alert-success mt-3 mx-4" role="alert"> {{ $successMessage }} </div>
    @endif

    @if ($errorMessage = session('error'))
    <div class="alert alert-danger mt-3 mx-4" role="alert"> {{ $errorMessage }}</div>
    @endif
    <div class="card-body">
      <div class="table-responsive">
      <table class="table" id="pc-dt-simple">
        <thead>
        <tr>
          <th></th>
          <th>Nº</th>
          <th class="text-start">TÍTULO</th>
          <th class="text-start">DESCRIÇÃO</th>
          <th class="text-start">ACÕES</th>
        </tr>
        </thead>
        @if (count($userNotifications) <= 0)
      <div class="alert alert-warning text-center w-full" role="alert">Sem Notificações!
      </div>
      @endif

        <tbody>
        @foreach ($userNotifications as $notification)
      @php $modalDeleteLine = 'modalDeleteLine' . $loop->iteration; @endphp

      <div id="{{ $modalDeleteLine }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="POST"
        action="{{ route('company.notification.destroy', $notification->id_notification) }}">
        @csrf
        @method('DELETE')
        <div class="modal-content">
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
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Confirmar e Apagar</button>
        </div>
        </div>
        </form>

        </div>
      </div>
      <tr>
        <td>
        <div class="form-check">
        <input type="checkbox" class="form-check-input input-primary" id="customCheckinl1">
        </div>
        </td>
        <td class="text-start">
        <span>{{ $loop->iteration }}</span>
        </td>

        <td class="text-start">
        {{ $notification->title }}
        </td>

        <td class="text-start">
        {{ $notification->description }}
        </td>

        <td class="text-start">
        <a data-bs-toggle="modal" data-bs-target="#{{ $modalDeleteLine }}" href="#"
        class="avtar avtar-s btn-link-danger">
        <i class="ti ti-trash f-18"></i>
        </a>
        </td>
      </tr>
      @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>

  </div>

@endsection