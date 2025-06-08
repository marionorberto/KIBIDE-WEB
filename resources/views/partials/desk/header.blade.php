<header class="pc-header">
  <div class="header-wrapper">
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">

        <li class="pc-h-item pc-sidebar-collapse">
          <a href="#" class="pc-head-link ms-0 me-2" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link ms-0 me-2" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>

        <i class="fa fa-clock-o fs-1"></i>

        <li class="pc-h-item pc-sidebar-collapse pt-2">
          <h3 class="mt-1" id="current-time"></h3>
        </li>
      </ul>
    </div>
    <!-- [Mobile Media Block end] -->
    <div class="ms-auto">
      <ul class="list-unstyled">
        <li class="dropdown pc-h-item">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-bell"></i>
            <span class="badge bg-success pc-h-badge">0</span>
          </a>
          <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Notificações</h5>
              <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-circle-check text-success"></i></a>
            </div>
            <div class="dropdown-divider"></div>
            <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative"
              style="max-height: calc(100vh - 215px)">
              <div class="list-group list-group-flush w-100">
                <a class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="user-avtar bg-light-warning"><i class="ti ti-message-circle"></i></div>
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <p class="text-body mb-1 text-muted">Sem notificações no momento.</p>
                    </div>
                  </div>
                </a>
                <!-- <a class="list-group-item list-group-item-action">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="user-avtar bg-light-danger"><i class="ti ti-settings"></i></div>
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <span class="float-end text-muted">2:45 PM</span>
                      <p class="text-body mb-1">Your Profile is Complete &nbsp;<b>60%</b></p>
                      <span class="text-muted">7 hours ago</span>
                    </div>
                  </div>
                </a> -->

              </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="text-center py-2">
              <a href="#!" class="link-primary">Ver Todas</a>
            </div>
          </div>
        </li>

        <li class="dropdown pc-h-item">
          <a class="pc-head-link me-0" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
            <i class="ti ti-settings"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
            <div class="me-1">

              @if (Auth::user()->photo)
          <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User photo"
          style="width: 25px; height: 25px;" class="rounded-circle">
        @else
              {!! Avatar::create(Auth::user()->username)
        ->setDimension(25, 25) // Define tamanho
        ->setFontSize(25) // Define tamanho da fonte
        ->setBackground('#3490dc') // Cor de fundo
        ->toSvg()
            !!}
        @endif
            </div>

            <span>{{ Auth::user()->username }}</span>
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header">
              <div class="d-flex mb-1">
                <div class="flex-shrink-0">
                  @if (Auth::user()->photo)
            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User photo"
            style="width: 25px; height: 25px;" class="rounded-circle">
          @else
                  {!! Avatar::create(Auth::user()->username)
          ->setDimension(25, 25) // Define tamanho
          ->setFontSize(25) // Define tamanho da fonte
          ->setBackground('#3490dc') // Cor de fundo
          ->toSvg()
                !!}
          @endif
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1">{{ Auth::user()->username }}</h6>
                  <span>{{ Auth::user()->role == 'desk' ? 'Atendente' : 'Desk'}}</span>
                </div>
                <a href="{{ route('auth.logout') }}" class="pc-head-link bg-transparent"><i
                    class="ti ti-power text-danger"></i></a>
              </div>
            </div>
            <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="drp-t1" data-bs-toggle="tab" data-bs-target="#drp-tab-1"
                  type="button" role="tab" aria-controls="drp-tab-1" aria-selected="true"><i class="ti ti-user"></i>
                  Perfil</button>
              </li>

            </ul>
            <div class="tab-content" id="mysrpTabContent">
              <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1"
                tabindex="0">
                <a href="{{ route('desk.user.profile') }}" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>Ver Perfil</span>
                </a>

                <a href="{{ route('auth.logout') }}" class="dropdown-item">
                  <i class="ti ti-power"></i>
                  <span>Sair</span>
                </a>
              </div>

            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>

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