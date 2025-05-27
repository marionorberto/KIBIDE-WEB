@php
  use App\Models\TicketGenerated;
  use App\Models\DayOperation;
  use App\Models\OperationAssociation;
  use Carbon\Carbon;


  $dayOperation = DayOperation::where('unit_id', Auth::user()->unit_id)->where('realization_date', Carbon::today())->first();

  $operations = OperationAssociation::query()
    ->with(['service', 'counter', 'dayOperation']) // Carrega os relacionados
    ->where('unit_id', Auth::user()->unit_id)
    ->whereHas('dayOperation', function ($query) {
    $query->whereDate('realization_date', Carbon::today());
    })
    ->whereHas('counter', function ($query) {
    $query->where('status', 'unoccupied');
    })
    ->get();

@endphp



<nav class="pc-sidebar" style="width: 350px;">
  <div class="navbar-wrapper" style="width: 350px;">
    <div class="m-header d-flex justify-content-center py-3">
      <a href="/">
        <img src="{{ asset('assets/images/LOGO.png') }}" alt="" style="height: 80px; width: 80px;">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="{{ route('desk.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Balcão</span>
          </a>
        </li>
        <div class="overflow-y-auto" style="padding-left: 10px">

          <li class="pc-item">
            <a href="{{ route('desk.user.profile') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-camera"></i></span>
              <span class="pc-mtext">Perfil Atendente</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="{{ route('desk.user.profile') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-report"></i></span>
              <span class="pc-mtext">Históricos de Tickets</span>
            </a>
          </li>

          <hr>

          <div class="form-group col-md-12 px-4">
            <label class="form-label" for="exampleSelect1">Balcões Disponíveis</label>

            <select name="id_operation_association" class="form-select service-data" id="id_operation_association">
              <option value="">selecione um balcão livre</option>
              @foreach ($operations as $operation)
          <option value="{{ $operation->id_operation_association }}">
          {{ $operation->counter->counter_name }} - {{ $operation->service->description }}
          </option>
        @endforeach
            </select>

            <!-- Mensagem de aviso (inicialmente escondida) -->
            <div id="counter-warning" class="text-danger mt-2" style="display: none;">
              Por favor, selecione um balcão antes de continuar.
            </div>

            <button onclick="chooseCounterOperation()" id="button_occupied" class="btn btn-primary fs-6 shadow-lg mt-2">
              Ocupar Balcão
            </button>
          </div>
          </form>

          <hr>

          <li class="pc-item pc-caption">
            <label>Tickets Pendentes</label>
            <i class="ti ti-brand-chrome"></i>
          </li>


          <ul id="ticket-list" class="pc-navbar"></ul>
        </div>
      </ul>

    </div>
  </div>
</nav>


<script>
  let id_operation_association;
  let occupied = false;

  document.addEventListener('DOMContentLoaded', () => {
    id_operation_association = document.getElementById('id_operation_association');
    id_operation_association.disabled = false;

    updateButtonUI();
  });

  function chooseCounterOperation() {
    const selectedId = id_operation_association.value;
    const warning = document.getElementById('counter-warning');

    // Se nenhum balcão foi selecionado, exibe a mensagem e interrompe a função
    if (!selectedId) {
      warning.style.display = 'block';
      return;
    } else {
      warning.style.display = 'none';
    }

    fetch(`/api/operations/counter/choose/${selectedId}`)
      .then(response => {
        if (!response.ok) {
          throw new Error('Erro na requisição');
        }
        return response.json();
      })
      .then(data => {
        occupied = !occupied;


        id_operation_association.disabled = occupied;
        updateButtonUI();
        const list = document.getElementById('ticket-list');
        if (occupied) {
          if (data?.data?.tickets?.length > 0) {
            console.log('Tickets recebidos:', data.data.tickets);

            data.data.tickets.forEach(ticket => {

              console.log(ticket);
              const li = document.createElement('li');
              li.className = 'pc-item';
              li.innerHTML = `
        <a href="#" class="pc-link">
          <span class="pc-micon"><i class="ti ti-ticket"></i></span>
          <span class="pc-mtext">
            ${ticket.operation_association.service.prefix_code}0${ticket.ticket_number}
            <button type="button" class="btn btn-light-warning p-1 ms-2">${ticket.status}</button>
          </span>
        </a>
      `;
              list.appendChild(li);


            });
          } else {
            console.log('Nenhum ticket encontrado.');
          }
        } else {

          while (list.firstChild) {
            list.removeChild(list.firstChild);
          }
        }

      })
      .catch((error) => {
        console.log(error);
      });
  }

  function updateButtonUI() {
    const button = document.getElementById('button_occupied');
    if (occupied) {
      button.classList.remove('btn-primary');
      button.classList.add('btn-dark');
      button.textContent = 'Desocupar Balcão';
    } else {
      button.classList.remove('btn-dark');
      button.classList.add('btn-primary');
      button.textContent = 'Ocupar Balcão';
    }
  }
</script>