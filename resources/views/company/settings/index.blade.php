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
        <h2 class="mb-0">Configurações Gerais</h2>
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
          <i class="ti ti-user me-2"></i>Configurações do sistema
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
          aria-selected="true">
          <i class="ti ti-file-text me-2"></i>Configurações do Display
        </a>
        </li>
      </ul>
      </div>
      <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
        <div class="row">

          <div class="col-lg-12 col-xxl-12">
          <div class="card">
            <div class="card-header">
            <h5>About me</h5>
            </div>
            <div class="card-body">
            <p class="mb-0">Hello, I’m Anshan Handgun Creative Graphic Designer & User Experience Designer
              based in Website, I create digital Products a more Beautiful and usable place. Morbid
              accusant ipsum. Nam nec tellus at.</p>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
            <h5>Personal Details</h5>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0 pt-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Full Name</p>
                <p class="mb-0">Anshan Handgun</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Father Name</p>
                <p class="mb-0">Mr. Deepen Handgun</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Phone</p>
                <p class="mb-0">(+1-876) 8654 239 581</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Country</p>
                <p class="mb-0">New York</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Email</p>
                <p class="mb-0">anshan.dh81@gmail.com</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Zip Code</p>
                <p class="mb-0">956 754</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0 pb-0">
              <p class="mb-1 text-muted">Address</p>
              <p class="mb-0">Street 110-B Kalians Bag, Dewan, M.P. New York</p>
              </li>
            </ul>
            </div>
          </div>

          </div>
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
            <div class="btn btn-outline-secondary">Cancelar</div>
            <div class="btn btn-primary">Atualizar Configurações</div>
          </div>
          </div>
        </div>
        </div>
        <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
        <div class="row">
          <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
            <h5>Personal Information</h5>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-sm-12 text-center mb-3">
              <div class="user-upload wid-75">
                <img src="../assets/images/user/avatar-4.jpg" alt="img" class="img-fluid">
                <label for="uplfile" class="img-avtar-upload">
                <i class="ti ti-camera f-24 mb-1"></i>
                <span>Upload</span>
                </label>
                <input type="file" id="uplfile" class="d-none">
              </div>
              </div>

              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" value="{{ Auth::user()->username }}">
              </div>
              </div>
              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}">
              </div>
              </div>

              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Status Conta</label>
                <select class="form-control" disabled>
                <option>Activa</option>
                </select>
              </div>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
            <h5>Social Network</h5>
            </div>
            <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <div class="flex-grow-1 me-3">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                <div class="avtar avtar-xs btn-light-twitter">
                  <i class="fab fa-twitter f-16"></i>
                </div>
                </div>
                <div class="flex-grow-1 ms-3">
                <h6 class="mb-0">Twitter</h6>
                </div>
              </div>
              </div>
              <div class="flex-shrink-0">
              <button class="btn btn-link-danger">Connect</button>
              </div>
            </div>
            <div class="d-flex align-items-center mb-2">
              <div class="flex-grow-1 me-3">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                <div class="avtar avtar-xs btn-light-facebook">
                  <i class="fab fa-facebook-f f-16"></i>
                </div>
                </div>
                <div class="flex-grow-1 ms-3">
                <h6 class="mb-0">Facebook</h6>
                </div>
              </div>
              </div>
              <div class="flex-shrink-0">
              <div class="text-facebook">Anshan Handgun</div>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="flex-grow-1 me-3">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                <div class="avtar avtar-xs btn-light-linkedin">
                  <i class="fab fa-linkedin-in f-16"></i>
                </div>
                </div>
                <div class="flex-grow-1 ms-3">
                <h6 class="mb-0">Linkedin</h6>
                </div>
              </div>
              </div>
              <div class="flex-shrink-0">
              <button class="btn btn-link-danger">Connect</button>
              </div>
            </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
            <h5>Contact Information</h5>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label">Contact Phone</label>
                <input type="text" class="form-control" value="(+99) 9999 999 999">
              </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="demo@sample.com">
              </div>
              </div>
              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Portfolio Url</label>
                <input type="text" class="form-control" value="https://demo.com">
              </div>
              </div>
              <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label">Address</label>
                <textarea class="form-control">3379  Monroe Avenue, Fort Myers, Florida(33912)</textarea>
              </div>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div class="col-12 text-end btn-page">
          <div class="btn btn-outline-secondary">Cancelar</div>
          <div class="btn btn-primary">Atualizar Configurações</div>
          </div>
        </div>
        </div>




      </div>
      </div>
    </div>
    </div>
  </div>

@endsection