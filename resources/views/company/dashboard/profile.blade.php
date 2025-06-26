@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">

      </div>
      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mb-0">Perfil Da Empresa</h2>
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
          <i class="ti ti-user me-2"></i>Perfil
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
          aria-selected="true">
          <i class="ti ti-file-text me-2"></i>Minha conta
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
      @if ($errors->any())
      <ul class="alert alert-danger mt-3 mx-4">
      @foreach ($errors->all() as $error)
      <li class="ps-1">{{ $error }}</li>
    @endforeach
      </ul>
    @endif

      @if ($successMessage = session('success'))
      <div class="alert alert-success mt-3 mx-4" role="alert"> {{ $successMessage }} </div>
    @endif

      @if ($errorMessage = session('error'))
      <div class="alert alert-danger mt-3 mx-4" role="alert"> {{ $errorMessage }}</div>
    @endif
      <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
        <div class="row">
          <div class="col-lg-4 col-xxl-3">
          <div class="card">
            <div class="card-body position-relative">
            <div class="position-absolute end-0 top-0 p-3">
              <span class="badge bg-primary">Pro</span>
            </div>
            <div class="text-center mt-3">
              <form method="post" action="{{ route('company.upload.photo', Auth::user()->company_id) }}"
              class="user-upload wid-75 mx-auto" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              @if ($profileCompanyData->photo)
          <img src="{{ asset('storage/' . $profileCompanyData->photo) }}" alt="User photo"
          style="width: 65px; height: 65px;" class="rounded-circle">
        @else
              {!! Avatar::create(Auth::user()->username)
          ->setDimension(65, 65) // Define tamanho
          ->setFontSize(25) // Define tamanho da fonte
          ->setBackground('#000') // Cor de fundo
          ->toSvg()
            !!}
        @endif

              <label for="uplfile" class="img-avtar-upload position-relative">
                <i class="ti ti-brush text-primary fs-5 mb-1 position-absolute top-0 bg-light rounded-2 p-1"
                style="right: 3px; cursor: pointer; border: 1px solid #1890ff;"></i>
              </label>
              <input type="file" name="photo" id="uplfile" class="d-none" accept=".jpeg,.png">
              <button type="submit" class="btn btn-primary mt-3">submeter</button>
              </form>
              <h5 class="mb-0">{{ $companyData->company_name }}</h5>
              <p class="text-muted text-sm">{{ $companyData->company_name }}</p>
              <hr class="my-3">
              <div class="row g-3">
              <div class="col-6">
                <h5 class="mb-0">{{ $companyUserCount }}</h5>
                <small class="text-muted">Usuários</small>
              </div>
              <div class="col-6 border border-top-0 border-bottom-0">
                <h5 class="mb-0">{{ $companyUnitCount }}</h5>
                <small class="text-muted">Agências</small>
              </div>

              </div>
              <hr class="my-3">
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-mail"></i>
              <p class="mb-0">{{ $companyData->company_email }}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-phone"></i>
              <p class="mb-0">{{ $companyData->company_phone }}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-map-pin"></i>
              <p class="mb-0">Angola</p>
              </div>

              <div class="d-inline-flex align-items-center justify-content-between w-100">
              <i class="ti ti-link"></i>
              <a href="{{ $profileCompanyData->site_url ?? '#' }}" class="link-primary">
                <p class="mb-0">{{ $profileCompanyData->site_url ?? '---'}}</p>
              </a>
              </div>
              <div class="d-inline-flex align-items-center justify-content-end w-100">
              <a href="{{ $profileCompanyData->facebook_url ?? '#' }}" class="link-primary">
                <p class="mb-0"><i class="feather icon-facebook text-primary"></i></p>
              </a>
              </div>
              <div class="d-inline-flex align-items-center justify-content-end w-100">

              <a href="{{ $profileCompanyData->linkedin_url ?? '#' }}" class="link-primary">
                <p class="mb-0"><i class="feather icon-linkedin text-primary"></i></p>
              </a>
              </div>
              <div class="d-inline-flex align-items-center justify-content-end w-100">
              <a href="{{ $profileCompanyData->instagram_url ?? '#' }}" class="link-primary">
                <p class="mb-0"><i class="feather icon-instagram text-primary"></i></p>
              </a>

              </div>
              <hr>
              <div class="d-flex justify-content-end">

              <button data-bs-toggle="modal" data-bs-target="#modalEditSocialNetworkInformation" type="submit"
                class="btn btn-primary ">Editar</button>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div class="col-lg-8 col-xxl-9">
          @if (isset($profileCompanyData->about))
        <div class="card">
        <div class="card-header">
        <h5>Sobre a Empresa</h5>
        </div>
        <div class="card-body">
        <p class="mb-0">Deve ter aqui algo sobre a tua empresa</p>
        </div>
        </div>
      @endif

          <div class="card">
            <div class="card-header">
            <h5>Dados da Empresa</h5>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0 pt-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Nome Da Empresa</p>
                <p class="mb-0">{{ $companyData->company_name }}</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">NIF</p>
                <p class="mb-0">{{ $companyData->company_nif }}</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Telefone</p>
                <p class="mb-0">{{ $companyData->company_phone }}</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">País</p>
                <p class="mb-0">Angola</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Localização</p>
                <p class="mb-0">{{ $companyData->company_address }}</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Endereço Electrónico</p>
                <p class="mb-0">{{ $companyData->company_email }}</p>
                </div>
              </div>
              </li>

            </ul>
            </div>
            <div class="card-footer text-end btn-page">
            <button data-bs-toggle="modal" data-bs-target="#modalEditCompany" type="submit"
              class="btn btn-primary">Atualizar Perfil</button>
            </div>
          </div>

          </div>
        </div>
        </div>
        <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
            <h5>Dados do Gerente</h5>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-sm-12 text-center mb-3">
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
          ->setBackground('#000') // Cor de fundo
          ->toSvg()
            !!}
          @endif

                <label for="uplfile" class="img-avtar-upload position-relative">
                <i class="ti ti-brush text-primary fs-5 mb-1 position-absolute top-0 bg-light rounded-2 p-1"
                  style="right: 3px; cursor: pointer; border: 1px solid #1890ff;"></i>
                </label>
                <input type="file" name="photo" id="uplfile" class="d-none" accept=".jpeg,.png">
                <button type="submit" class="btn btn-primary mt-3">submeter</button>
              </form>
              </div>

              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" value="{{ Auth::user()->username }}" disabled>
              </div>
              </div>
              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
              </div>
              </div>

              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Estado da Conta</label>
                <select class="form-control" disabled>
                <option>Activa</option>
                </select>
              </div>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div class="col-12 text-end btn-page">
          <button data-bs-toggle="modal" data-bs-target="#modalEditProfileUser" class="btn btn-primary">Editar
            Dados</button>
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


      </div>
      </div>
    </div>
    </div>
  </div>


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


  <!-- Add this at the end of the file, before closing the section -->
  <div id="modalEditCompany" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEditCompany"
    aria-hidden="true">
    <div class="modal-dialog role=" document">
    <form id="editCompanyForm" method="POST" action="{{ route('company.update', Auth::user()->company_id) }}">
      @csrf
      @method('PUT')
      <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="modalEditCompanyTitle">Editar Dados da Empresa</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        <div class="form-group mb-3">
          <label for="usernameInput" class="form-label">Nome da Empresa</label>
          <input type="text" id="companyNameInput" name="company_name"
          class="form-control @error('company_name') is-invalid @enderror"
          value="{{ old('company_name', $companyData->company_name) }}">
          @error('company_name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group mb-3">
          <label for="company_nif_Input" class="form-label">NIF</label>
          <input type="text" id="company_nif_Input" name="company_nif"
          class="form-control @error('company_nif') is-invalid @enderror"
          value="{{ old('company_nif', $companyData->company_nif) }}" required>
          @error('company_nif')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>

        <div class="form-group mb-3">
          <label for="company_telefone_Input" class="form-label">Telefone</label>
          <input type="text" id="company_phone_Input" name="company_phone"
          class="form-control @error('company_phone') is-invalid @enderror"
          value="{{ old('company_phone', $companyData->company_phone) }}" required>
          @error('company_phone')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>

        <div class="form-group mb-3">
          <label for="company_address_Input" class="form-label">Localização</label>
          <input type="text" id="company_address_Input" name="company_address"
          class="form-control @error('company_address') is-invalid @enderror"
          value="{{ old('company_address', $companyData->company_address) }}" required>
          @error('company_address')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>

        <div class="form-group mb-3">
          <label for="company_email_Input" class="form-label">Endereço Electrónico</label>
          <input type="text" id="company_email_Input" name="company_email"
          class="form-control @error('company_email') is-invalid @enderror"
          value="{{ old('company_email', $companyData->company_email) }}" required>
          @error('company_email')
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

    </div>
  </div>

  <!-- Add this at the end of the file, before closing the section -->
  <div id="modalEditSocialNetworkInformation" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modalEditSocialNetworkInformation" aria-hidden="true">
    <div class="modal-dialog role=" document">
    <form id="editProfileCompanyForm" method="POST"
      action="{{ route('profile.company.update', $profileCompanyData->id_profile_company) }}">
      @csrf
      @method('PUT')
      <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="modalEditSocialNetworkInformationTitle">Editar dados das redes sociais</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        <div class="form-group mb-3">
          <label for="about" class="form-label">Sobre</label>

          <textarea name="about" id="about-input" class="form-control @error('about') is-invalid @enderror"
          placeholder="Escreva aqui oque a sua empresa faz, o seu principal objectivo e qual missão ela tem...">
    {{ isset($profileCompanyData->about) ?? old('about', $profileCompanyData->about) }}
    </textarea>
          @error('about')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>

        <div class="form-group mb-3">
          <label for="company_nif_Input" class="form-label">Website</label>
          <input type="url" id="site_url_input" name="site_url"
          class="form-control @error('site_url') is-invalid @enderror"
          value="{{ old('site_url', $profileCompanyData->site_url) }}" placeholder="Ex: http://mycompany.ao">
          @error('site_url')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>


        <div class="form-group mb-3">
          <label for="company_nif_Input" class="form-label">URL Facebook</label>
          <input type="url" id="facebook_url_input" name="facebook_url"
          class="form-control @error('facebook_url') is-invalid @enderror"
          value="{{ old('facebook_url', $profileCompanyData->facebook_url) }}"
          placeholder="Ex: http://facebook.com/profile/12345678">
          @error('facebook_url')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>

        <div class="form-group mb-3">
          <label for="linkedin_url_input" class="form-label">URL Linkedin</label>
          <input type="url" id="linkedin_url_input" name="linkedin_url"
          class="form-control @error('linkedin_url') is-invalid @enderror"
          value="{{ old('linkedin_url', $profileCompanyData->linkedin_url) }}"
          placeholder="Ex: http://linkedin.com/profile/12345678">
          @error('linkedin_url')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>

        <div class="form-group mb-3">
          <label for="instagram_url_input" class="form-label">URL Instagram</label>
          <input type="url" id="instagram_url_input" name="instagram_url"
          class="form-control @error('instagram_url') is-invalid @enderror"
          value="{{ old('instagram_url', $profileCompanyData->instagram_url) }}"
          placeholder="Ex: http://instagram.com/profile/12345678">
          @error('instagram_url')
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

    </div>
  </div>



@endsection