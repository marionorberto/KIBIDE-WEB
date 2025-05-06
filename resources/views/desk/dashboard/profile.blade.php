@extends('layouts.dashboard-desk')

@section('title', 'perfil atendente')

@section('content')

  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">

      </div>
      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mb-0">Perfil Atendente</h2>
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
              <img class="rounded-circle img-fluid wid-70" src="../assets/images/user/avatar-5.jpg"
                alt="User image">
              </div>
              <h5 class="mb-0">Anshan H.</h5>
              <p class="text-muted text-sm">Project Manager</p>
              <hr class="my-3">
              <div class="row g-3">
              <div class="col-4">
                <h5 class="mb-0">86</h5>
                <small class="text-muted">Post</small>
              </div>
              <div class="col-4 border border-top-0 border-bottom-0">
                <h5 class="mb-0">40</h5>
                <small class="text-muted">Project</small>
              </div>
              <div class="col-4">
                <h5 class="mb-0">4.5K</h5>
                <small class="text-muted">Members</small>
              </div>
              </div>
              <hr class="my-3">
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-mail"></i>
              <p class="mb-0">anshan@gmail.com</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-phone"></i>
              <p class="mb-0">(+1-876) 8654 239 581</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100 mb-3">
              <i class="ti ti-map-pin"></i>
              <p class="mb-0">New York</p>
              </div>
              <div class="d-inline-flex align-items-center justify-content-between w-100">
              <i class="ti ti-link"></i>
              <a href="#" class="link-primary">
                <p class="mb-0">https://anshan.dh.url</p>
              </a>
              </div>
            </div>
            </div>
          </div>

          </div>
          <div class="col-lg-8 col-xxl-9">
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
          <div class="card">
            <div class="card-header">
            <h5>Education</h5>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0 pt-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Master Degree (Year)</p>
                <p class="mb-0">2014-2017</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Institute</p>
                <p class="mb-0">-</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Bachelor (Year)</p>
                <p class="mb-0">2011-2013</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Institute</p>
                <p class="mb-0">Imperial College London</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0 pb-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">School (Year)</p>
                <p class="mb-0">2009-2011</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Institute</p>
                <p class="mb-0">School of London, England</p>
                </div>
              </div>
              </li>
            </ul>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
            <h5>Employment</h5>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0 pt-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Senior</p>
                <p class="mb-0">Senior UI/UX designer (Year)</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Job Responsibility</p>
                <p class="mb-0">Perform task related to project manager with the 100+ team under my
                  observation. Team management is key role in this company.</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">Trainee cum Project Manager (Year)</p>
                <p class="mb-0">2017-2019</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Job Responsibility</p>
                <p class="mb-0">Team management is key role in this company.</p>
                </div>
              </div>
              </li>
              <li class="list-group-item px-0 pb-0">
              <div class="row">
                <div class="col-md-6">
                <p class="mb-1 text-muted">School (Year)</p>
                <p class="mb-0">2009-2011</p>
                </div>
                <div class="col-md-6">
                <p class="mb-1 text-muted">Institute</p>
                <p class="mb-0">School of London, England</p>
                </div>
              </div>
              </li>
            </ul>
            </div>
          </div>
          </div>
        </div>
        </div>


        <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
        <div class="card">
          <div class="card-header">
          <h5>Mudar Password</h5>
          </div>
          <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label class="form-label">Antiga Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group">
              <label class="form-label">Nova Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group">
              <label class="form-label">Confirmar Password</label>
              <input type="password" class="form-control">
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
        </div>
        </div>
        <div class="tab-pane" id="profile-5" role="tabpanel" aria-labelledby="profile-tab-5">
        <div class="card">
          <div class="card-header">
          <h5>Invite Team Members</h5>
          </div>
          <div class="card-body">
          <h4>5/10 <small>members available in your plan.</small></h4>
          <hr class="my-3">
          <div class="row">
            <div class="col-md-8">
            <div class="form-group">
              <label class="form-label">Email Address</label>
              <div class="row">
              <div class="col">
                <input type="email" class="form-control">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">Send</button>
              </div>
              </div>
            </div>
            </div>
          </div>
          </div>
          <div class="card-body table-card">
          <div class="table-responsive">
            <table class="table mb-0">
            <thead>
              <tr>
              <th>MEMBER</th>
              <th>ROLE</th>
              <th class="text-end">STATUS</th>
              <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Addie Bass</h5>
                  <p class="text-muted f-12 mb-0">mareva@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-primary">Owner</span></td>
              <td class="text-end"><span class="badge bg-success">Joined</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-4.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Agnes McGee</h5>
                  <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-light-info">Manager</span></td>
              <td class="text-end"><a href="#" class="btn btn-link-danger">Resend</a> <span
                class="badge bg-light-success">Invited</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-5.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Agnes McGee</h5>
                  <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-light-warning">Staff</span></td>
              <td class="text-end"><span class="badge bg-success">Joined</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Addie Bass</h5>
                  <p class="text-muted f-12 mb-0">mareva@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-primary">Owner</span></td>
              <td class="text-end"><span class="badge bg-success">Joined</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-4.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Agnes McGee</h5>
                  <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-light-info">Manager</span></td>
              <td class="text-end"><a href="#" class="btn btn-link-danger">Resend</a> <span
                class="badge bg-light-success">Invited</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-5.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Agnes McGee</h5>
                  <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-light-warning">Staff</span></td>
              <td class="text-end"><span class="badge bg-success">Joined</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Addie Bass</h5>
                  <p class="text-muted f-12 mb-0">mareva@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-primary">Owner</span></td>
              <td class="text-end"><span class="badge bg-success">Joined</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-4.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Agnes McGee</h5>
                  <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-light-info">Manager</span></td>
              <td class="text-end"><a href="#" class="btn btn-link-danger">Resend</a> <span
                class="badge bg-light-success">Invited</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
              <tr>
              <td>
                <div class="row">
                <div class="col-auto pe-0">
                  <img src="../assets/images/user/avatar-5.jpg" alt="user-image"
                  class="wid-40 rounded-circle">
                </div>
                <div class="col">
                  <h5 class="mb-0">Agnes McGee</h5>
                  <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                </div>
                </div>
              </td>
              <td><span class="badge bg-light-warning">Staff</span></td>
              <td class="text-end"><span class="badge bg-success">Joined</span></td>
              <td class="text-end"><a href="#" class="avtar avtar-s btn-link-secondary"><i
                  class="ti ti-dots f-18"></i></a></td>
              </tr>
            </tbody>
            </table>
          </div>
          </div>
          <div class="card-footer text-end btn-page">
          <div class="btn btn-link-danger">Cancel</div>
          <div class="btn btn-primary">Update Profile</div>
          </div>
        </div>
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

@endsection