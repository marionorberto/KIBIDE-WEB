<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <title>Painel de Atendimento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #001f3f;
      color: white;
    }

    .side-panel {
      background-color: #002b5c;
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

    .ticket-espera {
      background-color: #0d6efd;
      font-size: 1.2rem;
    }

    .balcao-box {
      background-color: #004d99;
      border-radius: 10px;
      padding: 25px;
      margin: 15px;
      text-align: center;
      font-size: 1.5rem;
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
  </style>

  <div class="container-fluid">
    <!-- Topo com Agência e Hora -->
    <div class="row py-3 px-4" style="background-color: #003366;">
      <div class="col text-start">
        <h5>Agência Central</h5>
      </div>
      <div class="col text-end">
        <span class="fs-4" id="current-time"></span>

        <!-- <h5>{{ now()->format('d/m/Y H:i:s') }}</h5> -->
      </div>
    </div>

    <div class="row">
      <!-- Lado Esquerdo: Fila de Espera -->
      <div class="col-md-3 side-panel">
        <h6 class="mb-3">FILA DE ESPERA</h6>
        <!-- Serviços Ativos -->
        <div class="servico-ativo">BALCÃO 1 - Depósito</div>
        <div class="servico-ativo">BALCÃO 1 - Leven</div>
        <div class="servico-ativo">BALCÃO 1 - Outro</div>

        <!-- Tickets em Espera -->
        <h6 class="mt-4">Tickets em Espera</h6>
        <div class="ticket-espera">A034</div>
        <div class="ticket-espera">B023</div>
        <div class="ticket-espera">B120</div>
        <div class="ticket-espera">C012</div>
        <div class="ticket-espera">B12</div>
        <div class="ticket-espera">C121</div>
        <div class="ticket-espera">B093</div>
      </div>

      <!-- Lado Direito: Painel de Chamadas -->
      <div class="col-md-9 text-center d-flex flex-column align-items-center justify-content-evenly py-4">
        <!-- Balcões Ativos -->
        <div class="row w-100 justify-content-center">
          <div class="col-md-3 balcao-box">BALCÃO 1<br><small>A045</small></div>
          <div class="col-md-3 balcao-box">BALCÃO 2<br><small>B103</small></div>
          <div class="col-md-3 balcao-box">BALCÃO 3<br><small>C201</small></div>
          <div class="col-md-3 balcao-box">BALCÃO 4<br><small>D004</small></div>
        </div>

        <!-- Destaque Chamado -->
        <div class="text-center">
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