<nav class="pc-sidebar">
  <div class="navbar-wrapper">
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
        <li class="pc-item">
          <a href="{{ route('desk.user.profile') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-camera"></i></span>
            <span class="pc-mtext">Perfil Atendente</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Tickets Pendentes</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-warning p-1 ms-2">Pendente</button></span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-warning p-1 ms-2">Pendente</button></span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-warning p-1 ms-2">Pendente</button></span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-warning p-1 ms-2">Pendente</button></span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-warning p-1 ms-2">Pendente</button></span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-warning p-1 ms-2">Pendente</button></span>
          </a>
        </li>


        <li class="pc-item pc-caption">
          <label>Tickets Chamados</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-success p-1 ms-2">Chamado</button></span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-success p-1 ms-2">Chamado</button></span>
          </a>
        </li>

        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-success p-1 ms-2">Chamado</button></span>
          </a>
        </li>

        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-success p-1 ms-2">Chamado</button></span>
          </a>
        </li>

        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-success p-1 ms-2">Chamado</button></span>
          </a>
        </li>

        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">A034 <button type="button"
                class="btn btn-light-success p-1 ms-2">Chamado</button></span>
          </a>
        </li>






      </ul>
      <div class="card text-center">
        <div class="card-body">
          <h5>Atenção</h5>
          <p>Salve alterações pendentes antes de sair!</p>
          <a href="{{ route('auth.logout') }}" class="btn btn-dark">sair</a>
        </div>
      </div>
    </div>
  </div>
</nav>