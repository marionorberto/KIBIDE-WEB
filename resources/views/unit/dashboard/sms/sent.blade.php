@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')


  <h3 class="mb-2">Mensagens Enviadas</h3>
  <div class="col-xl-8">
    <div class="card table-card">

    <div class="card-header d-flex justify-content-between align-items-center">
      <h5>Mensagens Enviadas <span
        class="ms-2 f-14 px-2 badge bg-light-secondary rounded-pill">{{ $messages->count() }}</span></h5>
      <a href="{{ route('unit.create.sms') }}" class="btn btn-primary">Criar Nova Mensagem</a>

    </div>
    <!-- <div class="mx-4 mt-3 alert alert-warning text-center w-full" role="alert"> Sem mensagem enviadas até ao momento!
    </div> -->
    <div class="card-body">
      <div class="table-responsive">
      <table class="table" id="pc-dt-simple">
        <thead>
        <tr>
          <th>MENSAGEM</th>
          <th class="text-start">ASSUNTO</th>
          <th class="text-start">REMETENTE</th>
          <th class="text-start">DESTINATÁRIO</th>
          <th class="text-start">STATUS</th>
          <th class="text-start">ACÕES</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($messages as $message)
      <tr>

        <td>
        <span>{{ $message->content }}</span>
        </td>

        <td class="text-center">
        {{ $message->subject }}
        </td>

        <td>
        {{ $message->receiver->username }}
        </td>



        <td class="text-end">
        {{ $message->sender->username }}
        </td>

        <td>
        {{ $message->is_read ? 'LIDA' : 'NÃO LIDA' }}
        </td>

        <td class="text-end">
        <a href="#" class="avtar avtar-s btn-link-danger">
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