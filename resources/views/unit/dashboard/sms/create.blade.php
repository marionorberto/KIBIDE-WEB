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
    <div class="alert alert-success" role="alert"> <i class="ti ti-check-box"></i> {{ $successMessage }} <strong><a
      href="{{ route('unit.sms.sent') }}">Ver Enviadas!</a></strong></div>
    @endif

    <div class="card">
    <form method="post" action="{{ route('unit.sms.store') }}" class="card-body">
      @csrf
      <button type="button" class="btn btn-sm btn-link-secondary" data-bs-toggle="modal" data-bs-target="#couponModal">
      Escolha para quem você deseja enviar a sua mensagem!
      </button>
      <div class="alert-error text-danger mt-1 d-block error-receiver"></div>

      <div class="input-group my-2">
      <input type="hidden" name="sender_id" value="{{ Auth::user()->id_user }}">
      <input type="hidden" name="company_id" value="{{ Auth::user()->company_id }}" id="sms-company-id">
      <input type="hidden" name="is_read" value="0">
      <input type="hidden" name="unit_id" value="{{ Auth::user()->unit_id }}" id="sms-unit-id">
      <select class="form-select" id="type-user" required>
        <option value="">Selecione o destinatário</option>
        <option value="desk">Usuário Atendente</option>
        <option value="admin">Enviar para o Admnistrador</option>
      </select>
      <select name="receiver_id" class="form-select" id="id-receivers" required>
        <option value="">Selecionar o usuário</option>
      </select>
      <!-- <button class="btn btn-primary" type="button"><i class="ti ti-plus"></i>Selecionar</button> -->
      </div>
    </div>
    <div class="card">
    <div class="alert-error text-danger mt-1"></div>
    <div class="card-body py-2">
      <ul class="list-group list-group-flush">
      <li class="list-group-item px-0">
        <h5 class="mb-0">O Assunto da mensagem:</h5>
      </li>
      <li class="list-group-item px-0">
        <div class="form-group mb-0">
        <label class="form-label" for="exampleTextarea">Escreva um assunto antes de enviar.</label>
        <input type="text" name="subject" class="form-control  {{ $errors->any('subject') ? 'is-invalid' : ''}}"
          placeholder="Assunto da Mensagem" required value="{{ old('subject') }}">
        <div class="alert-error text-danger mt-1"></div>
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
        <textarea class="form-control {{ $errors->any('content') ? 'is-invalid' : '' }}" name="content"
          id="exampleTextarea" placeholder="Escreva aqui a mensagem!" rows="3">{{ old('content') }}</textarea>
        <div class="alert-error text-danger mt-1"></div>
        </div>
      </li>
      </ul>
    </div>
    </div>
    <div class="d-grid mb-3">
    <button type="submit" onclick="prepareSend()" id="submit-sms" class="btn btn-primary">Enviar Mensagem</button>
    </div>
    </form>
  </div>
  </div>

  <script>
    const unitId = document.getElementById('sms-unit-id').value;
    const companyId = document.getElementById('sms-company-id').value;
    const typeUser = document.getElementById('type-user');
    const selectReceivers = document.getElementById('id-receivers');
    const sendSms = document.getElementById('submit-sms');

    const sender_id = document.querySelector('[name = "sender_id"]');
    const receiver_id = document.querySelector('[name = "receiver_id"]');
    const company_id = document.querySelector('[name = "company_id"]');
    const is_read = document.querySelector('[name = "is_read"]');
    const unit_id = document.querySelector('[name = "unit_id"]');
    const subject = document.querySelector('[name = "subject"]');
    const content = document.querySelector('[name = "content"]');





    typeUser.addEventListener('change', () => {
    console.log(receiver_id)

    if (typeUser.value == 'desk') {
      // selectReceivers.disabled = false;

      fetch(`/api/user/${unitId}/desks`)
      .then((res) => {
        if (res.ok) {
        return res.json();
        }

        throw new Error('erro trying to get the all desks by users');
      })
      .then((data) => {

        selectReceivers.innerHTML = '';

        data.forEach(element => {
        selectReceivers.innerHTML += `<option selected  value="${element.id_user}">${element.username}</option>`;
        });;


      })
      .catch((err) => {
        console.log('errro - ', err);
      })
    } else if (typeUser.value == 'admin') {


      fetch(`/api/user/${companyId}/admin`)
      .then((res) => {
        if (res.ok) {
        return res.json();
        }

        throw new Error('erro trying to get the all desks by users');
      })
      .then((data) => {

        selectReceivers.innerHTML = '';
        selectReceivers.innerHTML += `<option selected  value="${data.id_user}">${data.username}</option>`;
      })
      .catch((err) => {
        console.log('errro - ', err);
      })

    }
    });


    function prepareSend() {


    const form = document.querySelector('form');
    // Limpa mensagens anteriores
    document.querySelectorAll('.alert-error').forEach(el => el.textContent = '');
    let isValid = true;

    // Validação receiver_id
    const receiverError = document.querySelector('.error-receiver');
    if (!receiver_id.value) {
      if (receiverError) receiverError.textContent = 'Selecione o destinatário.';
      isValid = false;
    }

    // Validação subject
    const subjectValue = subject.value.trim();
    const subjectError = subject.nextElementSibling;
    if (!subjectValue) {
      if (subjectError) subjectError.textContent = 'O assunto é obrigatório.';
      isValid = false;
    } else if (subjectValue.length < 10) {
      if (subjectError) subjectError.textContent = 'O assunto deve ter no mínimo 10 caracteres.';
      isValid = false;
    } else if (subjectValue.length > 150) {
      if (subjectError) subjectError.textContent = 'O assunto deve ter no máximo 150 caracteres.';
      isValid = false;
    }

    // Validação content
    const contentValue = content.value.trim();
    const contentError = content.nextElementSibling;
    if (!contentValue) {
      if (contentError) contentError.textContent = 'A mensagem é obrigatória.';
      isValid = false;
    } else if (contentValue.length < 15) {
      if (contentError) contentError.textContent = 'A mensagem deve ter no mínimo 15 caracteres.';
      isValid = false;
    } else if (contentValue.length > 350) {
      if (contentError) contentError.textContent = 'A mensagem deve ter no máximo 350 caracteres.';
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault();
      return;
    }

    }
  </script>

@endsection