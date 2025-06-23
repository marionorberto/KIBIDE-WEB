@extends('layouts.auth')
@section('title', 'Display Unidade')
@section('content')
  <style>
    .sign-container {
    width: 100%;
    overflow: hidden;
    background-color: transparent;
    padding: 0;
    }

    .sign-text {
    display: inline-block;
    white-space: nowrap;
    color: #1890ff;
    font-weight: bold;
    font-size: 3rem;
    animation: move 8s linear infinite alternate;
    }

    @keyframes move {
    from {
      transform: translateX(100%);
    }

    to {
      transform: translateX(-100%);
    }
    }
  </style>
  <header class="p-2  px-5 d-flex justify-content-between align-items-center">
    <div>
    <input type="hidden" id="display-unit-id" value="{{ Auth::user()->unit_id }}">
    <span class="h4">{{ $unitData->unit_name ?? '---' }}</span> |
    <span class="text-muted"><i class="ti ti-pin"></i>{{ $unitData->unit_address ?? '---' }}</sp>
    </div>
    <div>
    <span class="fs-3 text-muted fw-bold" id="current-time"></span>
    </div>
  </header>
  <div class="auth-main" style="width: 100%; display: flex; flex-direction: row;">
    <section class="bg-white px-4 py-4" style="width: 50%; height: 100vh;">
    <div class="w-100 bg-secondary d-flex justify-content-center align-items-center" style="height: 380px;">
      <div class="col-12">
      <div class="card-body pc-component">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"> </li>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
          <img class="img-fluid d-block w-100" src="{{ asset('assets/images/slider/img-slide-2.jpg') }}"
            alt="First slide">
          </div>
          <div class="carousel-item">
          <img class="img-fluid d-block w-100" src="{{ asset('assets/images/slider/img-slide-3.jpg') }}"
            alt="Second slide">
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    <div id="display-container-attending-tickets" class="flex-col mt-5 gap-1">
      <h4>Tickets a serem atendidos</h4>
      <div id="container-attending-tickets">
      </div>
    </div>
    </section>
    <section class="bg-light p-4 flex-col justify-content-center align-items-between" style="width: 60%; height: 100vh;">
    <div>
      <a class="d-flex justify-content-center align-items-center">
      @if ($companyProfileData->photo)
      <img src="{{ asset('storage/' . $companyProfileData->photo)  }}" style="height: 120px; width: 150px;">
    @else
      <h4 class="text-secondary text-center">LOGO</h4>
    @endif
      </a>
      <div class="sign-container">
      <div class="sign-text">
        Atenção!! Fica atento à chamada do seu ticket
      </div>
      </div>
    </div>
    <div class="flex-col mt-2 gap-1">
      <h3>Tickets na fila de espera</h3>
      <div id="queue-tickets">
      </div>
    </div>
  </div>
  </section>
  </div>


  @vite('resources/js/app.js')

  <script>
    const attendingTickets = [];
    const queueTickets = document.getElementById('queue-tickets');
    const unitId = document.getElementById('display-unit-id').value;
    const containerAttendingTickets = document.getElementById('container-attending-tickets');

    setTimeout(() => {
    window.Echo.channel('counter-assigned-for-display-channel')
      .listen('CounterAssingnedForDisplayEvent', (data) => {

      fetch(`/api/listServicesForDisplay/${unitId}`)
        .then((res) => {
        if (res.ok) {
          return res.json();
        }
        throw new Error('errorrrrr');
        })
        .then((data) => {
        containerAttendingTickets.innerHTML = '';
        if (data.data.length > 0) {
          data.data.forEach(element => {
          const div = document.createElement('div');
          // div.setAttribute('id', `service-listed.${element.counter.id_counter}`);
          div.innerHTML = `<div div class="flex-row" >
    <div class="rounded-2 bg-white p-2">
    <button class="btn btn-outline-info bg-gradient fs-5" style="width: 5rem; height: 2.5rem;"></button>
    <button class="btn btn-light bg-gradient text-secondary fs-4"
    style="width: 10rem; height: 2.5rem; background-color: #d3d4d5;">${element.service.description}</button>
    <button class="btn btn-info bg-gradient fs-4" style="width: 15rem; height: 2.5rem;">${element.counter.counter_name}</button>
    </div>
    </div >` ;
          containerAttendingTickets.appendChild(div);

          });
        } else {
          containerAttendingTickets.innerHTML = '';
        }
        })
        .catch((err) => {
        console.log('error', error);
        })
      });
    }, 1000);

    // when the page open must load the tickets
    loadAttendingQueue();
    loadTicketsInQueue();
    updateTime();



    // ---------------


    // Suponha que você tenha uma função que lida com o evento de ticket chamado
    function handleTicketChamado(ticket) {
    const { balcaoId, servico } = ticket;

    // Atualiza o balcão no display
    atualizarBalcaoNoDisplay(balcaoId, servico);
    }

    function atualizarBalcaoNoDisplay(balcaoId, servico) {
    // Encontra o elemento do balcão no DOM
    const balcaoElement = document.querySelector(`[data-balcao-id="${balcaoId}"]`);

    if (balcaoElement) {
      // Atualiza o conteúdo do balcão com o serviço
      balcaoElement.textContent = `Balcão ${balcaoId} - ${servico}`;
      // Adiciona uma classe para indicar que está ocupado (opcional)
      balcaoElement.classList.add('ocupado');
    }
    }

    // ---------------

    function loadTicketsInQueue() {
    fetch(`/api/loadTicketsInQueue/${unitId}`)
      .then((res) => {
      if (res.ok) {
        return res.json();
      }
      throw new Error('Erro na response: /api/loadTicketsInQueue/${unitId}');
      }).then((data) => {

      if (data.data.length > 0) {
        queueTickets.innerHTML = '';
        data.data.forEach((ticket, index) => {

        const div = document.createElement('div');

        div.innerHTML = `<div class="flex-row">
    <div class="rounded-2 bg-white p-2">
    <button id="service-listed-counter.${ticket.counter_id}" class="btn btn-outline-primary bg-gradient fs-3" style="width: 14rem; height: 3rem;">${ticket.prefix_code} 0${ticket.ticket_number} 
    </button>
    <button class="btn btn-light bg-gradient text-secondary fs-3"
    style="width: 15rem; height: 3rem; background-color: #d3d4d5;">${ticket.service}
    </button>
    <button class="btn btn-primary bg-gradient fs-4" style="width: 15rem; height: 3rem;">${ticket.counter}</button>
    </div>
    </div>`;

        // let counter = document.getElementById('service-listed-counter-show' + '.' + ticket.counter_id);

        // if (ticket.counter_id == counter.getAttribute('id').split('.')[1]) {
        //   if (!counter.textContent)
        //   counter.textContent = ticket.ticket_number;
        // }
        queueTickets.appendChild(div);
        });
      } else {
        queueTickets.innerHTML = '';
        queueTickets.innerHTML = `<button class="alert mt-5 alert-warning bg-gradient fs-4 w-full" style="height: 4rem;">Sem Tickets Disponível</button>`
      }
      })
      .catch(err => console.log('Ocurred some error trying to loadTicketsInQueue', err))
    }


    function loadAttendingQueue() {
    fetch(`/api/listServicesForDisplay/${unitId}`)
      .then((res) => {
      if (res.ok) {
        return res.json();
      }
      throw new Error('errorrrrr');
      })
      .then((data) => {
      containerAttendingTickets.innerHTML = '';
      if (data.data.length > 0) {
        data.data.forEach(element => {
        const div = document.createElement('div');
        div.innerHTML = `<div class="flex-row" >
    <div class="rounded-2 bg-white p-2">
    <button id="service-listed-counter-show.${element.counter.id_counter}" class="btn btn-outline-info bg-gradient fs-5" style="width: 5rem; height: 2.5rem;"></button>
    <button class="btn btn-light bg-gradient text-secondary fs-4"
    style="width: 10rem; height: 2.5rem; background-color: #d3d4d5;">${element.service.description}</button>
    <button class="btn btn-info bg-gradient fs-4" style="width: 15rem; height: 2.5rem;">${element.counter.counter_name}</button>
    </div>
    </div >`;
        containerAttendingTickets.appendChild(div);
        });
      } else {
        console.log('sem balcoes');
      }
      })
      .catch((err) => {
      console.log('error', error);
      })
    }

    setInterval(updateTime, 1000);
    function updateTime() {
    const now = new Date();
    const formatted = now.toLocaleString('pt-BR');
    document.getElementById('current-time').textContent = formatted;
    }

    //Listenning to the lastTicketCalled:
    setTimeout(() => {
    window.Echo.channel('queue-display-tickets-channel')
      .listen('QueueDisplayTicketsEvent', (data) => {
      try {

        if (data.data.length > 0) {
        queueTickets.innerHTML = '';
        data.data.forEach((ticket, index) => {

          const div = document.createElement('div');


          // let counter = document.getElementById('service-listed-counter-show' + '.' + ticket.counter_id);

          // if (ticket.counter_id == counter.getAttribute('id').split('.')[1]) {
          // index == 0 ? counter.textContent = ticket.ticket_number : '';
          // }
          div.innerHTML = `<div class="flex-row">
    <div class="rounded-2 bg-white p-2">
    <button class="btn btn-outline-primary bg-gradient fs-3" style="width: 14rem; height: 3rem;">${ticket.prefix_code} 0${ticket.ticket_number}
    </button>
    <button class="btn btn-light bg-gradient text-secondary fs-3"
    style="width: 15rem; height: 3rem; background-color: #d3d4d5;">${ticket.service}
    </button>
    <button class="btn btn-primary bg-gradient fs-4" style="width: 15rem; height: 3rem;">${ticket.counter}</button>
    </div>
    </div>`;
          queueTickets.appendChild(div);
        });
        } else {
        queueTickets.innerHTML = '';
        queueTickets.innerHTML = `<div class="alert alert-warning mt-4">Sem Tickets Disponíveis</div>`
        }
      } catch (error) {
        console.log('Error trying to get data from event, event name: queue-display-tickets-channel  | error -> ', error);
      }
      });
    }, 1000);

    setTimeout(() => {

    window.Echo.channel(`active-ticket-${unitId}`)
      .listen('ActiveTicketEvent', ({ data }) => {
      try {
        data.forEach((item) => {

        let counter = document.getElementById(`service-listed-counter-show.${item.counter_id}`)
        if (counter) {
          counter.textContent = item.ticket.ticket_number;
        }
        });

      } catch (err) {
        console.log(err);
      }
      })
    }, 1000);


  </script>
@endsection