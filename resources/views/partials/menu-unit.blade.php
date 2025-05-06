<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="/">
        <img src="{{ asset('assets/images/LOGO.png') }}" alt="" style="height: 70px; width: 70px;">
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
            <span class="pc-mtext">Perfil Mentor</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Recursos</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Meus Mentorados</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Conversas</span>
          </a>
        </li>




      </ul>
      <div class="card text-center">
        <div class="card-body">
          <h5>Atenção</h5>
          <p>Salve alterações pendentes antes de sair!</p>
          <a href="{{ route('auth.logout') }}" class="btn btn-success">sair</a>
        </div>
      </div>
    </div>
  </div>
</nav>