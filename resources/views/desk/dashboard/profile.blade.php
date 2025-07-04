@extends('layouts.dashboard-desk')
@section('title', 'perfil atendente')
@section('content')

  @php
    use \App\Models\ProfileCompany;
    $profileCompany = ProfileCompany::where('company_id', Auth::user()->company_id)->first();
  @endphp

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">

      </div>
      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mb-0">Perfil Atendente</h2>
        @if ($errors->any())
        <ul class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
      <li class="ps-1">{{ $error }}</li>
      @endforeach
        </ul>
      @endif
        @if ($successMessage = session('success'))
      <div class="alert alert-success mt-3" role="alert"> {{ $successMessage }} </div>
      @endif
        @if ($errorMessage = session('error'))
      <div class="alert alert-danger mt-3" role="alert"> {{ $errorMessage }}</div>
      @endif
      </div>
      </div>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    <div class="card">
      <div class="card-header pb-0">
      <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1" role="tab"
          aria-selected="true">
          <i class="ti ti-user me-2"></i>Minha Conta
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4" role="tab"
          aria-selected="true">
          <i class="ti ti-lock me-2"></i>Mudar Password
        </a>
        </li>
      </ul>
      </div>
      <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
        <div class="row">
          <div class="col-lg-4 col-xxl-3">
          <div class="card">
            <div class="card-body position-relative">

            <div class="text-center mt-3">
              <div class="chat-avtar d-inline-flex mx-auto">
              <form method="post" action="{{ route('user.upload.photo', Auth::user()->id_user) }}"
                class="user-upload wid-75" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if (Auth::user()->photo)
          <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User photo"
          style="width: 65px; height: 65px;" class="rounded-circle">
          @else
                {!! Avatar::create(Auth::user()->username)
          ->setDimension(65, 65) // Define tamanho
          ->setFontSize(25) // Define tamanho da fonte
          ->setBackground('#3490dc') // Cor de fundo
          ->toSvg()
            !!}
          @endif
                <label for="uplfile" class="img-avtar-upload">
                <i class="ti ti-camera f-24 mb-1"></i>
                <span>Trocar Fotografia</span>
                </label>
                <input type="file" name="photo" id="uplfile" class="d-none" accept=".jpeg,.png">
                <button type="submit" class="btn btn-primary btn-sm">submeter</button>
              </form>
              </div>
              <h5 class="mb-0 mt-2">{{ $user->username }}</h5>
              <p class="text-muted text-sm">Atendente</p>
              <hr class="my-3">
              <div class="row g-3">
              <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <h5 class="mb-0">0</h5>
                <small class="text-muted">Tickects Atendidos</small>
              </div>

              </div>
              <hr class="my-3">
              <h5 class="mb-3 text-start">Informações da Unidade</h5>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-credit-card"></i>
              <p class="mb-0">{{ $unitData->unit_name ?? '----'}}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-mail"></i>
              <p class="mb-0">{{ $unitData->unit_email ?? '----'}}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-phone"></i>
              <p class="mb-0">{{ $unitData->unit_phone ?? '----' }}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-map-pin"></i>
              <p class="mb-0">{{$unitData->unit_address ?? '----' }}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100">
              <i class="ti ti-link"></i>
              <a href="#" class="link-primary">
                <p class="mb-0">{{ $profileCompany->site_url ?? '------' }}</p>
              </a>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div class="col-lg-8 col-xxl-9">
          <div class="card">
            <div class="card-header">
            <h5>Dados Pessoais</h5>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0 pt-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Username</p>
                <p class="mb-0">{{ $user->username }}</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">email</p>
                <p class="mb-0">{{ $user->email }}</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Conta Activada/desativada</p>
                <p class="mb-0">Activada</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">País</p>
                <p class="mb-0">Angola</p>
                </div>
              </div>
              </li>
            </ul>
            <div class="col-12 text-end btn-page">
              <button class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#modalEditProfileUser">Editar Dados</button>
            </div>
            </div>
          </div>
          </div>
        </div>
        </div>


        <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
        <form action="{{ route('auth.password.change') }}" method="post" class="card">
          @csrf

          <div class="card-header">
          <h5>Mudar Password</h5>
          </div>
          <div class="card-body">
          <div class="row">
            @if ($successMessage = session('success'))
        <div class="alert alert-success" role="alert"> {{ $successMessage }} <a
          href="{{ route('auth.logout') }}">Sair do sistema</a> </div>
        @endif
            @if ($errors->any())
          <ul class="alert alert-danger ">
          @foreach ($errors->all() as $error)
        <li class="ps-1">{{ $error }}</li>
        @endforeach
          </ul>
        @endif
            <div class="col-sm-6">
            <div class="form-group">
              <label class="form-label">Actual Password</label>
              <input name="actual_password" type="password" class="form-control" required
              placeholder="Password Actual">
            </div>
            <div class="form-group">
              <label class="form-label">Nova Password</label>
              <input name="password" type="password" class="form-control" required placeholder="Nova Password">
            </div>
            <div class="form-group">
              <label class="form-label">Confirmar Password</label>
              <input name="password_confirmation" require type="password" class="form-control"
              placeholder="Confirmar Password">
            </div>
            </div>
            <div class="col-sm-6">
            <h5>Nova password deve conter:</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="ti ti-minus me-2"></i> No mínimo 8 caracteres</li>
              <li class="list-group-item"><i class="ti ti-minus me-2"></i> No mínimo1 letra minúscula (a-z)
              </li>
              <li class="list-group-item"><i class="ti ti-minus me-2"></i> No mínimo 1 letra maiúscula
              (A-Z)</li>
              <li class="list-group-item"><i class="ti ti-minus me-2"></i> No mínimo 1 numero (0-9)</li>
              <li class="list-group-item"><i class="ti ti-minus me-2"></i> No mínimo 1 caracterer especial
              </li>
            </ul>
            </div>
          </div>
          </div>
          <div class="card-footer text-end btn-page">
          <button type="reset" class="btn btn-outline-secondary">Limpar campos</button>
          <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
          </div>
        </form>
        </div>

        <div class="tab-pane" id="profile-6" role="tabpanel" aria-labelledby="profile-tab-6">
        <div class="row">
          <div class="col-md-6">
          <div class="card">
            <div class="card-header">
            <h5>Email Settings</h5>
            </div>
            <div class="card-body">
            <h6 class="mb-4">Setup Email Notification</h6>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Email Notification</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch"
                checked="">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Send Copy To Personal Email</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
              </div>
            </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
            <h5>Updates from System Notification</h5>
            </div>
            <div class="card-body">
            <h6 class="mb-4">Email you with?</h6>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">News about PCT-themes products and feature updates</p>
              </div>
              <div class="form-check p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch"
                checked="">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Tips on getting more out of PCT-themes</p>
              </div>
              <div class="form-check p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch"
                checked="">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Things you missed since you last logged into PCT-themes</p>
              </div>
              <div class="form-check  p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">News about products and other services</p>
              </div>
              <div class="form-check p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Tips and Document business products</p>
              </div>
              <div class="form-check p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
              </div>
            </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="card-header">
            <h5>Activity Related Emails</h5>
            </div>
            <div class="card-body">
            <h6 class="mb-4">When to email?</h6>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Have new notifications</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch"
                checked="">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">You're sent a direct message</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Someone adds you as a connection</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch"
                checked="">
              </div>
            </div>
            <hr class="my-4">
            <h6 class="mb-4">When to escalate emails?</h6>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Upon new order</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch"
                checked="">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">New membership approval</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-1">
              <div>
              <p class="text-muted mb-0">Member registration</p>
              </div>
              <div class="form-check form-switch p-0">
              <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch"
                checked="">
              </div>
            </div>
            </div>
          </div>
          </div>

          <div class="col-12 text-end btn-page">
          <div class="btn btn-outline-secondary">Cancel</div>
          <div class="btn btn-primary">Update Profile</div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- Adicione isto no final do arquivo, antes de fechar a section -->
  <!-- Add this at the end of the file, before closing the section -->
  <div id="modalEditProfileUser" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modalEditProfileUserTitle" aria-hidden="true">
    <div class="modal-dialog role=" document">
    <form id="editProfileForm" method="POST" action="{{ route('users.update', Auth::user()->id_user) }}">
      @csrf
      @method('PUT')
      <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="modalEditProfileUserTitle">Editar Perfil</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        <div class="form-group mb-3">
          <label for="usernameInput" class="form-label">Username</label>
          <input type="text" id="usernameInput" name="username"
          class="form-control @error('username') is-invalid @enderror"
          value="{{ old('username', $user->username) }}">
          @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group mb-3">
          <label for="emailInput" class="form-label">Email</label>
          <input type="email" id="emailInput" name="email" class="form-control @error('email') is-invalid @enderror"
          value="{{ old('email', $user->email) }}" required>
          @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
      </div>
    </form>
    @if($errors->any())
    <script>
      document.addEventListener('DOMContentLoaded', function () {
      const modal = new bootstrap.Modal(document.getElementById('modalEditProfileUser'));
      modal.show();
      });
    </script>
    @endif
    </div>
  </div>



@endsection