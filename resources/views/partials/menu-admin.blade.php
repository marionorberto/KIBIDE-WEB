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

          <a href="{{ route('admin.dashboard.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>

        </li>
        <li class="pc-item">
          <a href="{{ route('admin.dashboard.profile.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-camera"></i></span>
            <span class="pc-mtext">Perfil</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Usuários</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('admin.dashboard.students.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user text-secondary"></i></span>
            <span class="pc-mtext">Estudantes</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('admin.dashboard.mentors.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user text-black"></i></span>
            <span class="pc-mtext">Mentores</span>
          </a>
        </li>


        <li class="pc-item pc-caption">
          <label>Recursos</label>
          <i class="ti ti-news"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
              class="pc-mtext">Mentorias</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Gerir Grupos</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Feedback</a></li>

          </ul>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Biblioteca</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Testes Simulados</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Outros</label>
          <i class="ti ti-brand-chrome"></i>
        </li>

        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Notificações</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">settings</span>
          </a>
        </li>
      </ul>
      <div class="card text-center">
        <div class="card-body">
          <h5>Atenção</h5>
          <p>Salve alterações pendentes antes de sair!</p>
          <a href="{{ route('auth.logout') }}" class="btn btn-primary">sair</a>
        </div>
      </div>
    </div>
  </div>
</nav>