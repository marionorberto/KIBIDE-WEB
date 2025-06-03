@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')

  @php
    use App\Models\DayOperation;
    use App\Models\OperationAssociation;
    use App\Models\ProfileCompany;
    use Carbon\Carbon;

    $companyProfileData = ProfileCompany::where('company_id', Auth::user()->company_id)->first();


  @endphp

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">

      </div>
      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mb-0">Perfil Da Unidade</h2>
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
          <i class="ti ti-file-text me-2"></i>Perfil da Unidade
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
          aria-selected="true">
          <i class="ti ti-user me-2"></i>Minha conta
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
            <div class="position-absolute end-0 top-0 p-3">
              <span class="badge bg-primary">Pro</span>
            </div>
            <div class="text-center mt-3">
              <div class="chat-avtar d-inline-flex mx-auto">


              <!-- {!! Avatar::create(Auth::user()->username)
    ->setDimension(65, 65) // Define tamanho
    ->setFontSize(25) // Define tamanho da fonte
    ->setBackground('#000') // Cor de fundo
    ->toSvg()
      !!} -->

              @if ($companyProfileData->photo)
          <img src="{{ asset('storage/' . $companyProfileData->photo)  }}"
          style="height: 120px; width: 120px;">

        @endif
              </div>
              <h5 class="mb-0">{{ $companyProfileData->company_name }}</h5>
              <p class="text-muted text-sm">{{ $unitData->unit_name ?? '----' }}</p>
              <hr class="my-3">
              <div class="row g-3">
              <div class="col-4">
                <h5 class="mb-0">{{ $unitUserCount }}</h5>
                <small class="text-muted">Atendentes</small>
              </div>
              <div class="col-4 border border-top-0 border-bottom-0">
                <h5 class="mb-0">{{ $countersCount }}</h5>
                <small class="text-muted">Balcões</small>
              </div>
              <div class="col-4">
                <h5 class="mb-0">{{ $ticketsCount }}</h5>
                <small class="text-muted">Tickets</small>
              </div>
              </div>
              <hr class="my-3">
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-mail"></i>
              <p class="mb-0">{{ $unitData->unit_email ?? '----' }}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-phone"></i>
              <p class="mb-0">{{ $unitData->unit_phone ?? '----'}}</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-map-pin"></i>
              <p class="mb-0">Angola</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100">
              <i class="ti ti-link"></i>
              <a href="#" class="link-primary">
                <p class="mb-0">{{ $companyProfileData->site_url }}</p>
              </a>
              </div>
            </div>
            </div>
          </div>

          </div>
          <div class="col-lg-8 col-xxl-9">

          <div class="card">
            <div class="card-header">
            <h5>Dados da Unidade</h5>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0 pt-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Nome da Unidade</p>
                <p class="mb-0">{{ $unitData->unit_name }}</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Correio Electrónico</p>
                <p class="mb-0">{{ $unitData->unit_email ?? '----'}}</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Telefone</p>
                <p class="mb-0">{{ $unitData->unit_phone }}</p>
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
                <p class="mb-0">{{ $unitData->unit_address }}</p>
                </div>
              </div>
              </li>
            </ul>
            <div class="col-12 text-end btn-page">
              <div class="btn btn-primary">Editar Dados</div>
            </div>
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

                <label for="uplfile" class="img-avtar-upload">
                <i class="ti ti-camera f-24 mb-1"></i>
                <span>Trocar Fotografia</span>
                </label>
                <input type="file" name="photo" id="uplfile" class="d-none" accept=".jpeg,.png">
                <button type="submit" class="btn btn-primary">submeter</button>
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
          <div class="btn btn-primary">Editar Dados</div>
          </div>
        </div>


        <div id="modalEditUserManagerData" class="modal fade" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <form method="post" action="{{ route('users.update', Auth::user()->id_user) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Editar Dados do Usuário</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card-body">
              <div class="form-group">
                <label class="form-label">USERNAME</label>
                <input type="text" name="description" class="form-control form-control"
                value="{{ Auth::user()->username }}">
              </div>
              <div class="form-group">
                <label class="form-label">EMAIL</label>
                <input type="text" name="description" class="form-control form-control"
                value="{{ Auth::user()->email }}">
              </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </div>
            </div>
          </form>
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
          href="{{ route('auth.logout') }}">Sair
          do sistema</a> </div>
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

      </div>
      </div>
    </div>
    </div>
  </div>


@endsection