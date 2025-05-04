<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a class="navbar-brand fs-3" href="#">
        <i class="fa fa-graduation-cap text-black"></i>

        BUKABEM
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
            <span class="pc-mtext">Perfil Estudante</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Recursos</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Mentorias</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Conversas</span>
          </a>
        </li>



        <li class="pc-item pc-caption">
          <label>Meus Matérias</label>
          <i class="ti ti-news"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Livros</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Questionários</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Links(Youtube)</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Enunciados Antigos</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Provas</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Tópicos</span>
          </a>
        </li>

      </ul>
      <div class="card text-center">
        <div class="card-body">
          <h5>Atenção</h5>
          <p>Salve alterações pendentes antes de sair!</p>
          <a href="{{ route('auth.logout') }}" class="btn btn-warning">sair</a>
        </div>
      </div>
    </div>
  </div>
</nav>