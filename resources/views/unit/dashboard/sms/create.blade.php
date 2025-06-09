@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')

  <div class="col-xl-6">
    <h4 class="mb-3">Nova Mensagem</h4>
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
    <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após enviar a mensagem pode visualizar todas as mensagem que já enviaste.</div>
    </div>
    </div>
    @endif

    @if ($errors->any())
    <ul class="alert alert-danger ">
    @foreach ($errors->all() as $error)
    <li class="ps-1">{{ $error }}</li>
    @endforeach
    </ul>
    @endif
    @if ($successMessage = session('success'))
    <div class="alert alert-success" role="alert"> {{ $successMessage }} <strong><a
      href="{{ route('unit.list.desks') }}">Ver lista para editar!</a></strong></div>
    @endif

    <div class="card">
    <form method="post" action="{{ route('unit.sms.store') }}" class="card-body">
      @csrf
      <button type="button" class="btn btn-sm btn-link-secondary" data-bs-toggle="modal" data-bs-target="#couponModal">
      Escolha para quem você deseja enviar a sua mensagem!
      </button>
      <div class="input-group my-2">
      <input type="hidden" name="sender_id" value="{{ Auth::user()->id_user }}">
      <input type="hidden" name="is_read" value="0">
      <input type="hidden" name="unit_id" value="{{ Auth::user()->unit_id }}" id="sms-unit-id">
      <select class="form-select" id="type-user">
        <option value="">Selecione o tipo de usuário</option>
        <option value="desk">Usuário Atendente</option>
        <option value="admin">Enviar para o Admnistrador</option>
      </select>
      <select name="receiver_id" class="form-select" id="exampleSelect1">
        <option value="">Selecionar o usuário</option>
      </select>
      <button class="btn btn-primary" type="button"><i class="ti ti-plus"></i>Selecionar</button>
      </div>
      </f>
    </div>
    <div class="card">
    <div class="card-body py-2">
      <ul class="list-group list-group-flush">
      <li class="list-group-item px-0">
        <h5 class="mb-0">O Assunto da mensagem:</h5>
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
        <label class="form-label" for="exampleTextarea">Escreva a sua mensagem abaixo!</label>
        <textarea class="form-control" name="content" id="exampleTextarea" placeholder="Escreva aqui a mensagem!"
          rows="3"></textarea>
        </div>
      </li>
      </ul>
    </div>
    </div>
    <div class="d-grid mb-3">
    <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
    </div>
  </div>

  <script>
    const unitId = document.getElementById('sms-unit-id');
    const typeUser = document.getElementById('type-user').value;

    typeUser.addEventListener('change', () => {

    console.log(typeUser.value);

    if (typeUser == 'desk') {
      // get all desk byThe company

      fetch('/api/')
      .then((res) => {
        if (res.ok) {
        return res.json();
        }

        throw new Error('erro trying to get the all desks by users');
      })
      .then((data) => {
        console.log('all desks', data);
      })
      .catch((err) => {
        console.log('errro - ', err);
      })
    }
    });




  </script>

@endsection