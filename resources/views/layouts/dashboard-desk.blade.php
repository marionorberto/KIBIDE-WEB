<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"
    content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords"
    content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">
  <link rel="icon" href="{{ asset('./favicon.ico') }}" type="image/x-icon">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    id="main-font-link">
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  @include('partials.desk.menu')
  @include('partials.desk.header')
  <div class="pc-container">
    <div class="pc-content">
      @yield('content')
    </div>
  </div>
  </div>
  @include('partials.desk.footer')
  <script src="{{ asset('assets/js/plugins/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/simplebar.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/fonts/custom-font.js')}}"></script>
  <script src="{{ asset('assets/js/pcoded.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
  <script>
    // [ Zero Configuration ] start
    $('#myTable').DataTable({
      "ordering": true,
      "paging": true,
      "searching": true,
      "oLanguage": {
        "sEmptyTable": "Nenhum registro encontrado na tabela",
        "sInfo": "Mostrar _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
        "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "Mostrar _MENU_ registros por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
        },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
        }
      }
    });

    // [ Default Ordering ] start
    $('#order-table').DataTable({
      order: [[3, 'desc']]
    });

    // [ Multi-Column Ordering ]
    $('#multi-colum-dt').DataTable({
      columnDefs: [
        {
          targets: [0],
          orderData: [0, 1]
        },
        {
          targets: [1],
          orderData: [1, 0]
        },
        {
          targets: [4],
          orderData: [4, 0]
        }
      ]
    });

    // [ Complex Headers ]
    $('#complex-dt').DataTable();

    // [ DOM Positioning ]
    $('#DOM-dt').DataTable({
      dom: '<"top"i>rt<"bottom"flp><"clear">'
    });

    // [ Alternative Pagination ]
    $('#alt-pg-dt').DataTable({
      pagingType: 'full_numbers'
    });

    // [ Scroll - Vertical ]
    $('#scr-vrt-dt').DataTable({
      scrollY: '200px',
      scrollCollapse: true,
      paging: false
    });

    // [ Scroll - Vertical, Dynamic Height ]
    $('#scr-vtr-dynamic').DataTable({
      scrollY: '50vh',
      scrollCollapse: true,
      paging: false
    });

    // [ Language - Comma Decimal Place ]
    $('#lang-dt').DataTable({
      language: {
        decimal: ',',
        thousands: '.'
      }
    });
  </script>

  <div class="offcanvas pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
    <div class="offcanvas-header bg-primary">
      <h5 class="offcanvas-title text-white">KIBIDE</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="pct-body" style="height: calc(100% - 60px)">
      <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse1">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-xs bg-light-primary">
                    <i class="ti ti-layout-sidebar f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1">Tema de Layout</h6>
                  <span>Escolha o seu layout</span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse show" id="pctcustcollapse1">
              <div class="pct-content">
                <div class="pc-rtl">
                  <p class="mb-1">Direção</p>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="layoutmodertl">
                    <label class="form-check-label" for="layoutmodertl">RTL</label>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse2">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-xs bg-light-primary">
                    <i class="ti ti-brush f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1">Modo do Tema</h6>
                  <span>Escolha modo Escuro/claro </span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse show" id="pctcustcollapse2">
              <div class="pct-content">
                <div class="theme-color themepreset-color theme-layout">
                  <a href="#!" class="active" onclick="layout_change('light')" data-value="false"><span><img
                        src="{{ asset('assets/images/customization/default.svg') }}"
                        alt="img"></span><span>Light</span></a>
                  <a href="#!" class="" onclick="layout_change('dark')" data-value="true"><span><img
                        src="{{ asset('assets/images/customization/dark.svg') }}" alt="img"></span><span>Dark</span></a>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse3">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-xs bg-light-primary">
                    <i class="ti ti-color-swatch f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1">Escolher Tema</h6>
                  <span>Escolha a cor do teu tema principal!</span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse show" id="pctcustcollapse3">
              <div class="pct-content">
                <div class="theme-color preset-color">
                  <a href="#!" class="active" data-value="preset-1"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      1</span></a>
                  <a href="#!" class="" data-value="preset-2"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      2</span></a>
                  <a href="#!" class="" data-value="preset-3"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      3</span></a>
                  <a href="#!" class="" data-value="preset-4"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      4</span></a>
                  <a href="#!" class="" data-value="preset-5"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      5</span></a>
                  <a href="#!" class="" data-value="preset-6"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      6</span></a>
                  <a href="#!" class="" data-value="preset-7"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      7</span></a>
                  <a href="#!" class="" data-value="preset-8"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      8</span></a>
                  <a href="#!" class="" data-value="preset-9"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      9</span></a>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item pc-boxcontainer">
            <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse4">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-xs bg-light-primary">
                    <i class="ti ti-border-inner f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1">Layout Width</h6>
                  <span>Choose fluid or container layout</span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse show" id="pctcustcollapse4">
              <div class="pct-content">
                <div class="theme-color themepreset-color boxwidthpreset theme-container">
                  <a href="#!" class="active" onclick="change_box_container('false')" data-value="false"><span><img
                        src="{{ asset('assets/images/customization/default.svg') }}"
                        alt="img"></span><span>Fluid</span></a>
                  <a href="#!" class="" onclick="change_box_container('true')" data-value="true"><span><img
                        src="{{ asset('assets/images/customization/container.svg') }}"
                        alt="img"></span><span>Container</span></a>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse5">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-xs bg-light-primary">
                    <i class="ti ti-typography f-18"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1">Font Family</h6>
                  <span>Choose your font family.</span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse show" id="pctcustcollapse5">
              <div class="pct-content">
                <div class="theme-color fontpreset-color">
                  <a href="#!" class="active" onclick="font_change('Public-Sans')"
                    data-value="Public-Sans"><span>Aa</span><span>Public Sans</span></a>
                  <a href="#!" class="" onclick="font_change('Roboto')"
                    data-value="Roboto"><span>Aa</span><span>Roboto</span></a>
                  <a href="#!" class="" onclick="font_change('Poppins')"
                    data-value="Poppins"><span>Aa</span><span>Poppins</span></a>
                  <a href="#!" class="" onclick="font_change('Inter')"
                    data-value="Inter"><span>Aa</span><span>Inter</span></a>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="collapse show">
              <div class="pct-content">
                <div class="d-grid">
                  <button class="btn btn-light-danger" id="layoutreset">Resetar Layout</button>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  @vite('resources/js/app.js')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      let id_operation_association = document.getElementById('id_operation_association');
      let occupied = false;
      const warning = document.getElementById('counter-warning');
      const ticketWarning = document.getElementById('ticket-warning');
      const userId = document.getElementById('user_id');
      const buttonOccupied = document.getElementById('button_occupied');
      const ticketList = document.getElementById('ticket-list');
      const callTicketBtn = document.getElementById('call-ticket');
      const displayCounterName = document.getElementById('display-counter-name');
      const displayServiceName = document.getElementById('display-service-name');
      const pendingTicketMenuDesk = document.getElementById('pending-ticket-menu-desk');
      const currentTicketCard = document.getElementById('current-ticket');

      fetch(`/api/user/${userId.value}/selected-counter`)
        .then(response => {
          if (!response.ok) throw new Error('Erro na requisição para pegar o último balcão selecionado pelo usuário desk!');
          return response.json();
        })
        .then(data => {

          if (data?.data?.tickets?.length > 0) {
            const queueTicketsCounter = document.getElementById('queueTicketsCounter');
            const pendingTicketMenuDesk = document.getElementById('pending-ticket-menu-desk');


            const ticketsCounter = data.data.tickets.length;
            pendingTicketMenuDesk.style.display = 'block';
            queueTicketsCounter.innerHTML = ticketsCounter;

            occupied = true;
            id_operation_association.disabled = occupied;
            updateButtonUI();

            const newOption = document.createElement('option');

            newOption.value = data.data.tickets[0].operation_association.id_operation_association;
            newOption.textContent = `${data.data.tickets[0].operation_association.counter.counter_name} - ${data.data.tickets[0].operation_association.service.description} `;
            newOption.setAttribute('data-counter-id', data.data.tickets[0].operation_association.id_operation_association);
            newOption.selected = true;

            // Adiciona a nova opção ao select
            id_operation_association.appendChild(newOption);

            // Opcional: desmarca outras opções (caso o select não seja múltiplo)
            Array.from(id_operation_association.options).forEach(option => {
              if (option !== newOption) {
                option.selected = false;
              }
            });

            ticketList.innerHTML = '';
            data.data.tickets.forEach(ticket => {
              const li = document.createElement('li');
              li.className = 'pc-item';
              li.innerHTML = `
              <a a href = "#" class="pc-link" >
                    <span class="pc-micon"><i class="ti ti-ticket"></i></span>
                    <span class="pc-mtext">
                      ${ticket.operation_association.service.prefix_code}0${ticket.ticket_number}
                      <button type="button" class="btn btn-light-warning p-1 ms-2">${ticket.status == 'pending' ? 'Pendente' : ''}</button>
                    </span>
                  </a > `;
              ticketList.appendChild(li);
            });
          } else if (occupied && data?.data?.tickets?.length <= 0) {
            const pendingTicketMenuDesk = document.getElementById('pending-ticket-menu-desk');
            pendingTicketMenuDesk.style.display = 'none';
            const div = document.createElement('div');
            div.innerHTML = ` <div div class="alert alert-warning  mx-2" >
              Sem tickets disponíveis para esse balção.
      </div > `;
            ticketList.innerHTML = '';
            ticketList.appendChild(div);
          }
        })
        .catch(error => {
          console.log("Nenhum balcão selecionado ainda. ", error);
        });

      if (id_operation_association) {
        id_operation_association.disabled = false;
      }

      if (buttonOccupied) {
        buttonOccupied.addEventListener('click', chooseCounterOperation);
      }

      if (callTicketBtn) {
        callTicketBtn.addEventListener('click', () => {
          if (!occupied) {
            if (!id_operation_association.value) {
              warning.style.display = 'block';
              ticketWarning.innerHTML = 'Por favor selecione um balcão desocupado para chamar próximo ticket!';
              ticketWarning.style.display = 'block';
              currentTicketCard.style.display = 'none';
              return;
            } else {
              warning.style.display = 'none';
              ticketWarning.style.display = 'none';
              currentTicketCard.style.display = 'flex';
            }
          }

          fetch("{{ route('tickets.call.next') }}")
            .then(response => {
              if (!response.ok) throw new Error('Erro na requisição para pegar o último ticket emitido pelo usuário desk!');
              return response.json();
            })
            .then(data => {
              if (data.error) {
                return;
              }
              const ticket = data.ticket;
              if (ticket) {
                document.getElementById('ticket-data').innerText = ticket.operation_association.service.prefix_code + '0' + ticket.ticket_number;
                document.getElementById('ticket-service').innerText = ticket.operation_association.service.description;
                falarTexto(ticket.operation_association.service.prefix_code + '0' + ticket.ticket_number, ticket.operation_association.counter.counter_name);
              } else {
                document.getElementById('ticket-data').innerText = "Nenhum ticket disponível";
                document.getElementById('ticket-service').innerText = "";
                const div = document.createElement('div');
                div.innerHTML = ` <div div class="alert alert-warning  mx-2" >
              Sem tickets disponíveis para esse balção.
      </div > `;
                ticketList.innerHTML = '';
                ticketList.appendChild(div);
              }
            })
            .catch(error => {

            });
        });
      }

      function falarTexto(ticket, counter) {
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();

        // --- PIMMM ---
        const osc1 = audioCtx.createOscillator();
        const gain1 = audioCtx.createGain();
        osc1.type = 'sine';
        osc1.frequency.setValueAtTime(1800, audioCtx.currentTime); // Agudo
        gain1.gain.setValueAtTime(0.3, audioCtx.currentTime); // Volume moderado

        osc1.connect(gain1);
        gain1.connect(audioCtx.destination);
        osc1.start();
        osc1.stop(audioCtx.currentTime + 0.15); // 150 ms

        // --- BOMMM ---
        const osc2 = audioCtx.createOscillator();
        const gain2 = audioCtx.createGain();
        osc2.type = 'sine';
        osc2.frequency.setValueAtTime(400, audioCtx.currentTime + 0.2); // Grave
        gain2.gain.setValueAtTime(0.4, audioCtx.currentTime + 0.2);

        osc2.connect(gain2);
        gain2.connect(audioCtx.destination);
        osc2.start(audioCtx.currentTime + 0.2);
        osc2.stop(audioCtx.currentTime + 0.6); // 400ms de som

        // Após o som, iniciar a fala
        osc2.onended = () => {
          window.speechSynthesis.cancel();
          const texto = `SENHA ${ticket} DIRIJA-SE AO ${counter} `;
          const sintese = new SpeechSynthesisUtterance(texto);
          sintese.lang = "pt-PT";
          window.speechSynthesis.speak(sintese);

        };
      }

      function chooseCounterOperation() {
        const selectedId = id_operation_association.value;

        if (!selectedId) {
          warning.style.display = 'block';
          return;
        } else {
          warning.style.display = 'none';
        }

        fetch(`/api/operations/counter/choose/${selectedId}/${userId.value}`)
          .then(response => {
            if (!response.ok) throw new Error('Erro na requisição');
            return response.json();
          })
          .then(data => {
            occupied = !occupied;
            id_operation_association.disabled = occupied;
            updateButtonUI();

            if (occupied && data?.data?.tickets?.length > 0) {
              const queueTicketsCounter = document.getElementById('queueTicketsCounter');

              const ticketsCounter = data.data.tickets.length;
              queueTicketsCounter.innerHTML = ticketsCounter;
              ticketList.innerHTML = '';
              data.data.tickets.forEach(ticket => {
                const li = document.createElement('li');
                li.className = 'pc-item';
                li.innerHTML = `
                  <a href="#" class="pc-link">
                    <span class="pc-micon"><i class="ti ti-ticket"></i></span>
                    <span class="pc-mtext">
                      ${ticket.operation_association.service.prefix_code}0${ticket.ticket_number}
                      <button type="button" class="btn btn-light-warning p-1 ms-2">${ticket.status == 'pending' ? 'Pendente' : ''}</button>
                    </span>
                  </a>`;
                ticketList.appendChild(li);
              });
            } else if (occupied && data?.data?.tickets?.length <= 0) {
              const div = document.createElement('div');
              div.innerHTML = ` <div class="alert alert-warning  mx-2">
      Sem tickets disponíveis para esse balção.
      </div > `
              ticketList.innerHTML = '';
              ticketList.appendChild(div);

            }
          })
          .catch(error => console.log(error));
      }



      function updateButtonUI() {
        if (occupied) {
          buttonOccupied.classList.remove('btn-primary');
          buttonOccupied.classList.add('btn-dark');
          buttonOccupied.textContent = 'Desocupar Balcão';
        } else {
          buttonOccupied.classList.remove('btn-dark');
          buttonOccupied.classList.add('btn-primary');
          buttonOccupied.textContent = 'Ocupar Balcão';
        }
      }

      let operationAssociationSelected;

      id_operation_association.onchange = () => {
        operationAssociationSelected = id_operation_association.value;
      }

      let echoChannel = null;

      id_operation_association.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const operationAssociationId = selectedOption.getAttribute('data-counter-id');

        if (!operationAssociationId) {
          console.warn('Nenhum balcão selecionado!');
          return;
        }

        // Desconecta canal anterior, se existir
        if (echoChannel) {
          window.Echo.leave(`counter.${echoChannel}`);
        }

        echoChannel = operationAssociationId;

        // Conecta ao novo canal
        window.Echo.channel(`counter.${operationAssociationId}`)
          .listen('LoadCounterPendingTicket', (data) => {
            try {
              ticketList.innerHTML = '';
              const queueTicketsCounter = document.getElementById('queueTicketsCounter');

              const ticketsCounter = data.data.length;
              queueTicketsCounter.innerHTML = ticketsCounter;

              occupied && data.data.forEach(ticket => {
                const li = document.createElement('li');
                li.className = 'pc-item';
                li.innerHTML = `
        <a href="#" class="pc-link">
          <span class="pc-micon"><i class="ti ti-ticket"></i></span>
          <span class="pc-mtext">
            ${ticket.prefix_code}0${ticket.ticket_number}
            <button type="button" class="btn btn-light-warning p-1 ms-2">${ticket.status == 'pending' ? 'Pendente' : ''}</button>
          </span>
        </a>`;
                ticketList.appendChild(li);
              });

            } catch (error) {
              console.log(error);
            }
          });

        window.Echo.channel(`counter-choosed-channel.${operationAssociationId}`)
          .listen('CounterChoosedEvent', (data) => {
            try {
              pendingTicketMenuDesk.style.display = 'block';
              displayCounterName.innerHTML = data.data.counterName + ' - ';
              displayServiceName.innerHTML = data.data.serviceDescription;
            } catch (error) {
              console.log('error trying listening to the channel - counter-choosed-channel', error);
            }
          });
      });
    });

  </script>




</body>

</html>