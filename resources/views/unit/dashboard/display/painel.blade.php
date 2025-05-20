<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <title>Painel de Atendimento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #052f4a;
      color: white;
    }

    .side-panel {
      height: 100vh;
      padding: 15px;
      border-right: 2px solid #004080;
    }

    .servico-ativo,
    .ticket-espera {
      background-color: #003f7f;
      border: 1px solid #005fa3;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 8px;
      text-align: center;
      font-size: 1rem;
      font-weight: bold;
    }

    .servico-ativo {
      background-color: transparent;
      border: 1px solid #024a70;
    }

    .ticket-espera {
      background-color: #0d6efd;
      font-size: 2rem;
      color: #ffc107;
      font-weight: bold;
    }

    .balcao-box {
      background-color: oklch(44.3% 0.11 240.79);
      border-radius: 10px;
      padding: 25px;
      padding-top: 30px;
      margin: 15px;
      margin-top: 10px;
      text-align: center;
      width: 20rem;
      height: 9rem;
      font-size: 2rem;
      font-weight: bold;
      color: white;
    }

    .balcao-destaque {
      font-size: 2.5rem;
      margin-top: 30px;
      font-weight: bold;
    }

    .ticket-destaque {
      font-size: 4rem;
      color: #ffc107;
      font-weight: bold;
    }

    .letreiro-container {
      width: 100%;
      overflow: hidden;
      background-color: transparent;
      padding: 3px 0;
    }

    .letreiro-texto {
      display: inline-block;
      white-space: nowrap;
      color: #ffc107;
      font-weight: bold;
      font-size: 3.4rem;
      animation: mover 8s linear infinite alternate;
    }

    @keyframes mover {
      from {
        transform: translateX(100%);
      }

      to {
        transform: translateX(-100%);
      }
    }
  </style>

  <div class="container-fluid">
    <!-- Topo com Agência e Hora -->
    <div class="row py-3 px-4" style="background-color: #024a70;">
      <div class="col text-start">
        <h5>{{ $unitData->unit_name }} - {{ $unitData->unit_address }}</h5>
      </div>
      <div class="col text-end">
        <span class="fs-4" id="current-time"></span>

        <!-- <h5>{{ now()->format('d/m/Y H:i:s') }}</h5> -->
      </div>
    </div>

    <div class="row">
      <!-- Lado Esquerdo: Fila de Espera -->
      <div class="col-md-3 side-panel" style="overflow-y: scroll;">
        <h6 class="mb-3" style="margin-top: 10px; font-size: 25px;">Linhas de atendimento</h6>
        <!-- Serviços Ativos -->
        @foreach ($operations as $item)

      <div class="servico-ativo">{{ $item->counter->counter_name }} - {{ $item->service->description }}</div>
    @endforeach


        <!-- Tickets em Espera -->
        <h6 class="mt-4" style="margin-top: 10px; font-size: 25px;">Fila de espera</h6>
        <div class="ticket-espera " style="background-color: oklch(44.3% 0.11 240.79);">A034</div>
        <div class="ticket-espera " style="background-color: oklch(44.3% 0.11 240.79);">B023</div>
        <div class="ticket-espera " style="background-color: oklch(44.3% 0.11 240.79);">B120</div>
        <div class="ticket-espera " style="background-color: oklch(44.3% 0.11 240.79);">C012</div>
        <div class="ticket-espera " style="background-color: oklch(44.3% 0.11 240.79);">B12</div>
        <div class="ticket-espera " style="background-color: oklch(44.3% 0.11 240.79);">C121</div>
        <div class="ticket-espera " style="background-color: oklch(44.3% 0.11 240.79);">B093</div>
      </div>

      <!-- Lado Direito: Painel de Chamadas -->
      <div class="col-md-9 text-center d-flex flex-column align-items-center justify-content-evenly py-4">
        <div class="letreiro-container">
          <div class="letreiro-texto">
            Fica atento à chamada do seu ticket
          </div>
        </div>
        <div class="" style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); ">
          @foreach ($counters as $item)

        <div class="col-md-3 balcao-box">{{ $item->counter_name }}<br><small style="color: #ffc107">B034</small></div>
      @endforeach
        </div>

        <div class="" style="background-color: #005fa3; padding: 20px; border-radius: 10px;">
          <div class="balcao-destaque">BALCÃO 1</div>
          <div class="ticket-destaque">A045</div>
          <p class="lead">Dirija-se ao balcão indicado</p>
        </div>
      </div>
    </div>
  </div>
  </body>
  <script>
    function updateTime() {
      const now = new Date();
      const formatted = now.toLocaleString('pt-BR'); // "12/05/2025 06:47:25"
      document.getElementById('current-time').textContent = formatted;
    }

    // Atualiza imediatamente ao carregar
    updateTime();

    // Atualiza a cada segundo
    setInterval(updateTime, 1000);
  </script>

</html>