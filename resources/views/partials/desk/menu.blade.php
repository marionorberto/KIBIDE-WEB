@php
  use App\Models\DayOperation;
  use App\Models\OperationAssociation;
  use App\Models\ProfileCompany;
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

  $companyData = ProfileCompany::where('company_id', Auth::user()->company_id)->first();
@endphp

<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header d-flex justify-content-center py-3">
      <a href="#">
        <img
          src="{{ isset($companyData->photo) ? asset('storage/' . $companyData->photo) : asset('assets/images/LOGO.png') }}"
          alt="" style="height: 80px; width: 80px;">
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

        <li class="pc-item">
          <a href="{{ route('desk.user.profile') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-camera"></i></span>
            <span class="pc-mtext">Perfil Atendente</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('desk.tickets.histories') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-report"></i></span>
            <span class="pc-mtext">Históricos de Tickets</span>
          </a>
        </li>
        <hr>
        <div class="form-group col-md-12 px-4">
          <label class="form-label" for="exampleSelect1">Balcões Disponíveis</label>
          <div id="counter-warning" class="text-warning mt-1 mb-1" style="display: none;">
            Por favor, selecione um <strong>balcão desocupado</strong> antes de continuar.
          </div>
          <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id_user }}">

          <select name="id_operation_association" class="form-select service-data" id="id_operation_association">
            <option value="">selecione balcão livre</option>
            @foreach ($operations as $operation)
        <option data-counter-id="{{ $operation->id_operation_association }}"
          value="{{ $operation->id_operation_association }}">
          {{ $operation->counter->counter_name }} - {{ $operation->service->description }}
        </option>
      @endforeach
          </select>
          <button onclick="chooseCounterOperation()" id="button_occupied" class="btn btn-primary fs-6 shadow-lg mt-2">
            Ocupar Balcão
          </button>

          <button onclick="releaseCounter()" id="button_unoccupied" class="btn btn-dark fs-6 shadow-lg mt-2 d-none">
            Desocupar Balcão
          </button>
        </div>
        </form>
        <hr>
        <li class="pc-item pc-caption">
          <label id="pending-ticket-menu-desk" style="display: none;">Tickets Pendentes(
            <a id="queueTicketsCounter">0</a> )</label>

          <i class="ti ti-brand-chrome"></i>
        </li>
        <!-- <div id="ticket-warning"></div> -->
        <div class="overflow-y-auto" style="padding-left: 10px">
          <ul id="ticket-list" class="pc-navbar"></ul>
        </div>

    </div>
    </ul>
  </div>
</nav>