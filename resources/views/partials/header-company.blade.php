@php
  use App\Models\Notification;

  $myNotifications = Notification::where('user_id', Auth::id())->take(3)->get();
  $notificationsCount = Notification::where('user_id', Auth::id())->count();
@endphp
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <!-- ======= Menu collapse Icon ===== -->
        <li class="pc-h-item pc-sidebar-collapse">
          <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item d-inline-flex d-md-none">
          <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-search"></i>
          </a>
          <div class="dropdown-menu pc-h-dropdown drp-search">
            <form class="px-3">
              <div class="form-group mb-0 d-flex align-items-center">
                <i data-feather="search"></i>
                <input type="search" class="form-control border-0 shadow-none" placeholder="Pesquise aqui. . .">
              </div>
            </form>
          </div>
        </li>
        <li class="pc-h-item d-none d-md-inline-flex">
          <form class="header-search">
            <i data-feather="search" class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Pesquise aqui. . .">
          </form>
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
            <span class="badge bg-primary pc-h-badge">{{ $notificationsCount }}</span>
          </a>
          <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Notificações</h5>
              <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-circle-check text-primary"></i></a>
            </div>
            <div class="dropdown-divider"></div>
            <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative"
              style="max-height: calc(100vh - 215px)">
              <div class="list-group list-group-flush w-100">
                @if ($notificationsCount == 0)
          <a class="list-group-item list-group-item-action">
            <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <div class="user-avtar bg-light-primary"><i class="ti ti-message-circle"></i></div>
            </div>
            <div class="flex-grow-1 ms-1">
              <p class="text-body mb-1 text-muted">Sem notificações no momento.</p>
            </div>
            </div>
          </a>
        @endif

                @foreach ($myNotifications as $notifications)
          <a class="list-group-item list-group-item-action">
            <div class="d-flex">
            <div class="flex-shrink-0">
              <div class="user-avtar bg-light-primary"><i class="ti ti-bell"></i></div>
            </div>
            <div class="flex-grow-1 ms-1">
              <span class="float-end text-muted">7 hours ago</span>
              <p class="text-body mb-1">{{ $notifications->title }}</p>
              <span class="text-muted">{{ $notifications->description }}</span>
            </div>
            </div>
          </a>
        @endforeach
              </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="text-center py-2">
              <a href="{{ route('company.notification.inbox') }}" class="link-primary">Ver Todas</a>
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
        ->setBackground('#000') // Cor de fundo
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
          ->setBackground('#000') // Cor de fundo
          ->toSvg()
                !!}
          @endif
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1">{{ Auth::user()->username }}</h6>
                  @if (Auth::user()->role == 'manager')
            <span>Gerente</span>
          @elseif(Auth::user()->role == 'desk')
            <span>Atendente</span>
          @elseif(Auth::user()->role == 'superadmin')
            <span>Admnistrador</span>
          @endif
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
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="drp-t2" data-bs-toggle="tab" data-bs-target="#drp-tab-2" type="button"
                  role="tab" aria-controls="drp-tab-2" aria-selected="false"><i class="ti ti-settings"></i>
                  Configurações</button>
              </li>
            </ul>
            <div class="tab-content" id="mysrpTabContent">
              <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1"
                tabindex="0">
                <a href="{{ route('company.admin.profile') }}" class="dropdown-item">
                  <i class="ti ti-edit-circle"></i>
                  <span>Editar Perfil</span>
                </a>
                <a href="{{ route('company.admin.profile') }}" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>Ver Perfil</span>
                </a>


                <a href="{{ route('auth.logout') }}" class="dropdown-item">
                  <i class="ti ti-power"></i>
                  <span>Sair</span>
                </a>
              </div>
              <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-help"></i>
                  <span>Support</span>
                </a>
                <a href="{{ route('company.settings.index') }}" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>Configurações Do sistema</span>
                </a>
                <a href="{{ route('company.settings.index') }}" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>Configurações Do Display</span>
                </a>

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- [ Header ] end -->