@extends('layouts.app')
@section('title', 'Home')
@section('content')

  <header id="home">
    <!-- [ Nav ] start -->
    <nav class="navbar navbar-expand-md navbar-dark top-nav-collapse default">
    <div class="container">
      <a class="navbar-brand" href="#">
      <i class="fa fa-graduation-cap text-white"></i>

      BUKABEM
      <!-- <img src="../assets/images/logo-white.svg" alt="logo"> -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item pe-1">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item pe-1">
        <a class="nav-link" href="{{ route('home') }}">Solicitar Mentoria</a>
        </li>
        <li class="nav-item pe-1">
        <a class="nav-link" href="{{ route('auth.register-mentor') }}">Ser Mentor</a>
        </li>
        <li class="nav-item pe-1">
        <a class="nav-link" href="#us">Biblioteca Grátis</a>
        </li>
        <li class="nav-item pe-1">
        <a class="nav-link" href="#contacts">Quem Sómos</a>
        </li>
        <li class="nav-item pe-1">
        <a class="nav-link me-2" href="#contacts" target="_blank">Contactos</a>
        </li>
        <li class="nav-item me-2">
        <a class="btn btn-primary" target="_blank" href="{{ route('auth.register-student') }}">Registar</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-outline-primary" target="_blank" href="{{ route('auth.login') }}">Login</a>
        </li>
      </ul>
      </div>
    </div>
    </nav>
    <!-- [ Nav ] start -->
    <img src="../assets/images/landing/bg-mockup-theme-1.png" alt="img" class="img-fluid img-home-mokeup img-landing"
    data-img="../assets/images/landing/bg-mockup-theme-" data-img-type=".png">
    <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-md-6 col-xl-4">
      <h1 class="mt-sm-3 text-white mb-4 f-w-600 wow fadeInUp" data-wow-delay="0.2s">Carefully Crafted for your
        <span class="text-primary">Caring React</span> Project
      </h1>
      <h5 class="mb-4 text-white opacity-75 wow fadeInUp" data-wow-delay="0.4s"> Mantis React is a blazing-fast
        dashboard template built using the MUI React library.</h5>
      <div class="my-5 wow fadeInUp" data-wow-delay="0.6s">
        <a href="../elements/bc_alert.html" class="btn btn-outline-primary me-2" target="_blank">Explore
        Components</a>
        <a href="../dashboard/index.html" class="btn btn-primary d-inline-flex align-items-center" target="_blank">
        <i class="ti ti-eye me-1"></i> Live Preview</a>
      </div>
      <img src="../assets/images/landing/img-headertech.svg" alt="img" class="img-fluid wow fadeInUp"
        data-wow-delay="0.8s">
      </div>
      <div class="col-lg-7">
      </div>
    </div>
    </div>
  </header>

  <section class="pt-5 ">
    <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-10 col-xl-6">
      <h5 class="text-primary mb-0">Nossos Serviços</h5>
      <h2 class="my-3">Oque nós oferecemos</h2>
      <p class="mb-5">Nós existimos para tornar a vida de um estudante carneiro fácil, <br> confira e explore os
        serviços
        no bukabem.</p>


      </div>
    </div>
    </div>
    <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-sm-6 col-lg-4">
      <div class="card wow fadeInUp" data-wow-delay="0.4s">
        <div class="card-body">
        <h3 class="mb-3">Intermediação de Mentoria</h3>
        <p class="mb-4 text-muted">Conectamos estudantes a mentores experientes, promovendo diálogos construtivos e
          apoio personalizado. A intermediação
          garante que cada aluno encontre orientação alinhada aos seus objetivos acadêmicos e profissionais.</p>
        <button class="btn btn-outline-primary">Ser um estudante?</button>
        </div>
        <div class="card-body pb-0 pe-0">
        <img src="../assets/images/landing/img-demo1.jpg" alt="img" class="img-fluid w-100">
        </div>
      </div>
      </div>
      <div class="col-sm-6 col-lg-4">
      <div class="card wow fadeInUp" data-wow-delay="0.6s">
        <div class="card-body bg-light-primary">
        <h3 class="mb-3">Recursos Acadêmicos</h3>
        <p class="mb-4 text-muted">Disponibilizamos materiais, ferramentas e conteúdos exclusivos para fortalecer o
          aprendizado e impulsionar o desempenho
          escolar. Com acesso facilitado, o estudante tem suporte completo na sua jornada educacional.</p>
        <button class="btn btn-primary">Explorar recursos</button>
        </div>
        <div class="card-body bg-light-primary pb-0 pe-0">
        <img src="../assets/images/landing/img-demo2.jpg" alt="img" class="img-fluid w-100">
        </div>
      </div>
      </div>
      <div class="col-sm-6 col-lg-4">
      <div class="card wow fadeInUp" data-wow-delay="0.8s">
        <div class="card-body">
        <h3 class="mb-3">Acompanhamento e Instrução Vocacional</h3>
        <p class="mb-4 text-muted">Ajudamos o estudante a identificar seus interesses, talentos e caminhos
          profissionais, por meio de acompanhamento
          contínuo e instrução vocacional prática. Nosso objetivo é guiá-lo com clareza rumo a escolhas conscientes
          para o futuro.</p>
        <button class="btn btn-outline-primary">Ser um mentor</button>
        </div>
        <div class="card-body pb-0 pe-0">
        <img src="../assets/images/landing/img-demo3.jpg" alt="img" class="img-fluid w-100">
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>
  <!-- [ Complete Combo ] End -->
  <!-- [ CTA ] start -->
  <section class="bg-dark cta-block">
    <img src="../assets/images/landing/img-bg-screen.svg" alt="img" class="img-cta">
    <div class="container">
    <div class="row">
      <div class="col-md-7 text-center text-md-start">
      <h2 class="text-white mb-4">Torne-se um estudante no <span class="text-primary"> BUKABEM</span> </h2>
      <button class="btn btn-primary"> Quero uma mentoria</button>
      </div>
    </div>
    </div>
  </section>

  <section class="bg-white cta-block">
    <img src="../assets/images/landing/img-bg-screen.svg" alt="img" class="img-cta">
    <div class="container">
    <div class="row">
      <div class="col-md-7 text-center text-md-start">
      <h2 class="text-black mb-4">Torne-se um mentor no <span class="text-primary"> BUKABEM </span> </h2>
      <button class="btn btn-dark">Quero ser mentor</button>
      </div>
    </div>
    </div>
  </section>
  <section class="bg-white">
    <div class="container">
    <div class="row">
      <div class="col-sm-6 col-lg-4">
      <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s">
        <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
          <h2 class="m-0">128+</h2>
          </div>
          <div class="flex-grow-1 ms-3">
          <h4 class="mb-2">Mentorias Feitas</h4>
          <p class="mb-0">Adira aos nosso serviços e solicite uma mentoria hoje mesmo.</p>
          </div>
        </div>
        </div>
      </div>
      </div>
      <div class="col-sm-6 col-lg-4">
      <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s">
        <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
          <h2 class="m-0">200+</h2>
          </div>
          <div class="flex-grow-1 ms-3">
          <h4 class="mb-2">Mentores Associados</h4>
          <p class="mb-0">O BUKABEM tem os melhores mentores do mercado angola para servir voçê.</p>
          </div>
        </div>
        </div>
      </div>
      </div>
      <div class="col-sm-6 col-lg-4">
      <div class="card border-0 wow fadeInUp" data-wow-delay="0.6s">
        <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
          <h2 class="m-0">5+</h2>
          </div>
          <div class="flex-grow-1 ms-3">
          <h4 class="mb-2">Parceiros Fiês</h4>
          <p class="mb-0">Temos parceiros estratégicos do sector educacional para nos ajudar a ajudar você.</p>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>
  <!-- [ number ] End -->
  <!-- [ light/dark ] start -->
  <section class="position-relative p-0">
    <h2 class="sr-only"><span>temp</span></h2>
    <div class="img-comp-container">
    <div class="img-comp-img">
      <img src="../assets/images/landing/img-theme-light-1.jpg" alt="img" data-img-type=".jpg" class="img-landing"
      data-img="../assets/images/landing/img-theme-light-">
    </div>
    <div class="img-comp-img img-comp-overlay">
      <img src="../assets/images/landing/img-theme-dark-1.jpg" alt="img" data-img-type=".jpg" class="img-landing"
      data-img="../assets/images/landing/img-theme-dark-">
    </div>
    </div>
  </section>
  <!-- [ light/dark ] End -->
  <!-- [ webapp ] start -->
  <section class="webapp-block">
    <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-10 col-xl-6">
      <h2 class="mb-3">Com BUKABEM a solicitação de mentoria <span class="text-primary"> online</span> nunca foi tão
        fácil
      </h2>
      <p class="mb-4">com apenas um formulário simples podes agendar a tua mentoria em instantes e no conforto da tua
        casa, nossa plataforma foi desenhada facilitar ao máximo o apoio dos estudantes com uma navegação extramamente
        intuitiva e fácil uso!
      </p>
      </div>
    </div>
    </div>
    <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-9 position-relative img-webapp-block">
      <img src="../assets/images/landing/img-element-main-theme-1.png" alt="img" data-img-type=".png"
        class="img-landing img-fluid" data-img="../assets/images/landing/img-element-main-theme-">
      <img src="../assets/images/landing/img-element-msg.png" alt="img" class="img-fluid img-msg">
      <img src="../assets/images/landing/img-element-widget.png" alt="img" class="img-fluid img-widget">
      </div>
      <div class="col-lg-9 position-relative img-webapp-block">
      <div class="row mt-5">
        <div class="col-md-4">
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">Auth Methods : JWT, Auth0, Firebase</span>
        </div>
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">Code Splitting</span>
        </div>
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">RTL Support</span>
        </div>
        </div>
        <div class="col-md-4">
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">Internationalization Support</span>
        </div>
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">React Hooks</span>
        </div>
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">Light/Dark, Semi Dark Support</span>
        </div>
        </div>
        <div class="col-md-4">
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">Mock API</span>
        </div>
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">Google Fonts</span>
        </div>
        <div class="d-flex align-items-center my-3">
          <i class="ti ti-circle-check f-24 text-primary"></i>
          <span class="ms-2 text-white opacity-75 lh-1">Prettier Code Style</span>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>
  <!-- [ webapp ] End -->
  <!-- [ Why Mantis ] start -->
  <section class="client-block">
    <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-10 col-xl-6">
      <h5 class="text-primary mb-0">Nossos Parceiros</h5>
      <h2 class="my-3">Parceiros Estratégicos</h2>
      <br class="mb-0">Algumas entidades que nos ajudam a impactar a vida dos </br> variados estudantes.</p>
      </div>
    </div>
    </div>
    <div class="container">
    <div class="row align-items-center justify-content-center mb-4 mb-md-5">
      <div class="col-auto my-2">
      <img src="../assets/images/landing/client-01.png" alt="img" class="img-fluid wow fadeInUp"
        data-wow-delay="0.2s">
      </div>
      <div class="col-auto my-2">
      <img src="../assets/images/landing/client-02.png" alt="img" class="img-fluid wow fadeInUp"
        data-wow-delay="0.4s">
      </div>
      <div class="col-auto my-2">
      <img src="../assets/images/landing/client-03.png" alt="img" class="img-fluid wow fadeInUp"
        data-wow-delay="0.6s">
      </div>
      <div class="col-auto my-2">
      <img src="../assets/images/landing/client-04.png" alt="img" class="img-fluid wow fadeInUp"
        data-wow-delay="0.8s">
      </div>
    </div>
    </div>

  </section>
  <section class="pt-0">
    <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-10 col-xl-6">
      <h5 class="text-primary mb-0">Testemunhas</h5>
      <h2 class="my-3">Mentorias que Transformam </h2>
      <p class="mb-3">Depoimentos de estudantes que encontraram direção, inspiração e apoio em suas jornadas
        acadêmicas.</p>
      </div>
    </div>
    </div>
    <div class="container-fluid">
    <div class="row cust-slider">
      <div class="col-md-6 col-lg-4">
      <div class="card wow fadeInRight" data-wow-delay="0.2s">
        <div class="card-body">
        <div class="d-flex">
          <div class="flex-shrink-0">
          <img src="../assets/images/landing/img-user1.svg" alt="img" class="img-fluid wid-40">
          </div>
          <div class="flex-grow-1 ms-3">
          <h5 class="mb-1">ENGENHEIRO INFORMÁTICO</h5>
          <div class="star f-12 mb-3">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star-half-alt text-warning"></i>
            <i class="far fa-star text-muted"></i>
          </div>
          <p class="mb-2 text-muted">Depoimentos de estudantes que encontraram direção, inspiração e apoio em suas
            jornadas acadêmicas.</p>
          <h6 class="mb-0">Mário Norberto.</h6>
          </div>
        </div>
        </div>
      </div>
      </div>
      <div class="col-md-6 col-lg-4">
      <div class="card wow fadeInRight" data-wow-delay="0.4s">
        <div class="card-body">
        <div class="d-flex">
          <div class="flex-shrink-0">
          <img src="../assets/images/landing/img-user1.svg" alt="img" class="img-fluid wid-40">
          </div>
          <div class="flex-grow-1 ms-3">
          <h5 class="mb-1">ESTUNdANTE INFORMÁTICA</h5>
          <div class="star f-12 mb-3">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star-half-alt text-warning"></i>
            <i class="far fa-star text-muted"></i>
          </div>
          <p class="mb-2 text-muted">Graças à mentoria, descobri minha paixão pela ciência da computação. Ter
            alguém para me orientar fez toda a diferença.</p>
          <h6 class="mb-0">Beto M.</h6>
          </div>
        </div>
        </div>
      </div>
      </div>
      <div class="col-md-6 col-lg-4">
      <div class="card wow fadeInRight" data-wow-delay="0.6s">
        <div class="card-body">
        <div class="d-flex">
          <div class="flex-shrink-0">
          <img src="../assets/images/landing/img-user1.svg" alt="img" class="img-fluid wid-40">
          </div>
          <div class="flex-grow-1 ms-3">
          <h5 class="mb-1">UX/UI</h5>
          <div class="star f-12 mb-3">
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star-half-alt text-warning"></i>
            <i class="far fa-star text-muted"></i>
          </div>
          <p class="mb-2 text-muted">Receber conselhos personalizados e apoio contínuo me deu confiança para
            seguir meu sonho de cursar medicina.</p>
          <h6 class="mb-0">Rodrigo J.</h6>
          </div>
        </div>
        </div>
      </div>
      </div>

    </div>
    </div>
  </section>
  <footer class="footer bg-dark text-white">
    <div class="top-footer footer-moke pb-0">
    <div class="container">
      <div class="row">
      <div class="col-md-5 text-center text-md-start">
        <h2 class="my-3 text-white">Plataforma de Mentoria</h2>
        <p class="mb-3 text-white">Explore a nossa plataforma agora!</p>
        <button class="btn btn-primary">Registar <i class="ti ti-brand-telegram"></i></button>
      </div>
      </div>
    </div>
    </div>
    <div class="top-footer">
    <div class="container">
      <div class="row">
      <div class="col-md-4">
        <fi>Uma plataforma criada para atender as dificuldades dos estudantes em solicitar mentoria e encontrar os
        melhores
        profissionar.</fi>
      </div>
      <div class="col-md-8">
        <div class="row">
        <div class="col-sm-4">
          <h5 class="text-white mb-4">Explore</h5>
          <ul class="list-unstyled footer-link">
          <li><a href="#">Solicitar Mentoria</a></li>
          <li><a href="#">Ser Mentor</a></li>
          <li><a href="#">Biblioteca</a></li>
          <li><a href="#">Teste simulados</a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <h5 class="text-white mb-4">Contactos</h5>
          <ul class="list-unstyled footer-link">
          <li><a href="#">whatsapp</a></li>
          <li><a href="#">Enviar Email</a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <h5 class="text-white mb-4">Legal</h5>
          <ul class="list-unstyled footer-link">
          <li><a href="#">Políticas de privacidade </a></li>
          <li><a href="#">Termos</a></li>
          </ul>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
    <div class="bottom-footer">
    <div class="container">
      <div class="row align-items-center">
      <div class="col my-1">
        <p class="text-white mb-0">copyright©BUKABEM</p>
      </div>
      <div class="col-auto my-1">

      </div>
      </div>
    </div>
    </div>
  </footer>

  <!-- [Page Specific JS] start -->

  <!-- [Page Specific JS] end -->
  <!-- <div class="offcanvas pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
    <div class="offcanvas-header bg-primary">
    <h5 class="offcanvas-title text-white">Mantis Customizer</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="pct-body" style="height: calc(100% - 60px)">
    <div class="offcanvas-body">
    <ul class="list-group list-group-flush">
    <li class="list-group-item">
    <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse1">
    <div class="d-flex align-items-center">
    <div class="flex-shrink-0">
    <div class="avtar avtar-xs bg-light-primary">
    <i class="ti ti-layout-sidebar f-18"></i>
    </div>
    </div>
    <div class="flex-grow-1 ms-3">
    <h6 class="mb-1">Theme Layout</h6>
    <span>Choose your layout</span>
    </div>
    <i class="ti ti-chevron-down"></i>
    </div>
    </a>
    <div class="collapse show" id="pctcustcollapse1">
    <div class="pct-content">
    <div class="pc-rtl">
    <p class="mb-1">Direction</p>
    <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="layoutmodertl">
    <label class="form-check-label" for="layoutmodertl">RTL</label>
    </div>
    </div>
    </div>
    </div>
    </li>
    <li class="list-group-item">
    <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse2">
    <div class="d-flex align-items-center">
    <div class="flex-shrink-0">
    <div class="avtar avtar-xs bg-light-primary">
    <i class="ti ti-brush f-18"></i>
    </div>
    </div>
    <div class="flex-grow-1 ms-3">
    <h6 class="mb-1">Theme Mode</h6>
    <span>Choose light or dark mode</span>
    </div>
    <i class="ti ti-chevron-down"></i>
    </div>
    </a>
    <div class="collapse show" id="pctcustcollapse2">
    <div class="pct-content">
    <div class="theme-color themepreset-color theme-layout">
    <a href="#!" class="active" onclick="layout_change('light')" data-value="false"><span><img
    src="../assets/images/customization/default.svg" alt="img"></span><span>Light</span></a>
    <a href="#!" class="" onclick="layout_change('dark')" data-value="true"><span><img
    src="../assets/images/customization/dark.svg" alt="img"></span><span>Dark</span></a>
    </div>
    </div>
    </div>
    </li>
    <li class="list-group-item">
    <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse3">
    <div class="d-flex align-items-center">
    <div class="flex-shrink-0">
    <div class="avtar avtar-xs bg-light-primary">
    <i class="ti ti-color-swatch f-18"></i>
    </div>
    </div>
    <div class="flex-grow-1 ms-3">
    <h6 class="mb-1">Color Scheme</h6>
    <span>Choose your primary theme color</span>
    </div>
    <i class="ti ti-chevron-down"></i>
    </div>
    </a>
    <div class="collapse show" id="pctcustcollapse3">
    <div class="pct-content">
    <div class="theme-color preset-color">
    <a href="#!" class="active" data-value="preset-1"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 1</span></a>
    <a href="#!" class="" data-value="preset-2"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 2</span></a>
    <a href="#!" class="" data-value="preset-3"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 3</span></a>
    <a href="#!" class="" data-value="preset-4"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 4</span></a>
    <a href="#!" class="" data-value="preset-5"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 5</span></a>
    <a href="#!" class="" data-value="preset-6"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 6</span></a>
    <a href="#!" class="" data-value="preset-7"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 7</span></a>
    <a href="#!" class="" data-value="preset-8"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 8</span></a>
    <a href="#!" class="" data-value="preset-9"><span><img
    src="../assets/images/customization/theme-color.svg" alt="img"></span><span>Theme 9</span></a>
    </div>
    </div>
    </div>
    </li>
    <li class="list-group-item pc-boxcontainer">
    <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse4">
    <div class="d-flex align-items-center">
    <div class="flex-shrink-0">
    <div class="avtar avtar-xs bg-light-primary">
    <i class="ti ti-border-inner f-18"></i>
    </div>
    </div>
    <div class="flex-grow-1 ms-3">
    <h6 class="mb-1">Layout Width</h6>
    <span>Choose fluid or container layout</span>
    </div>
    <i class="ti ti-chevron-down"></i>
    </div>
    </a>
    <div class="collapse show" id="pctcustcollapse4">
    <div class="pct-content">
    <div class="theme-color themepreset-color boxwidthpreset theme-container">
    <a href="#!" class="active" onclick="change_box_container('false')" data-value="false"><span><img
    src="../assets/images/customization/default.svg" alt="img"></span><span>Fluid</span></a>
    <a href="#!" class="" onclick="change_box_container('true')" data-value="true"><span><img
    src="../assets/images/customization/container.svg" alt="img"></span><span>Container</span></a>
    </div>
    </div>
    </div>
    </li>
    <li class="list-group-item">
    <a class="btn border-0 text-start w-100" data-bs-toggle="collapse" href="#pctcustcollapse5">
    <div class="d-flex align-items-center">
    <div class="flex-shrink-0">
    <div class="avtar avtar-xs bg-light-primary">
    <i class="ti ti-typography f-18"></i>
    </div>
    </div>
    <div class="flex-grow-1 ms-3">
    <h6 class="mb-1">Font Family</h6>
    <span>Choose your font family.</span>
    </div>
    <i class="ti ti-chevron-down"></i>
    </div>
    </a>
    <div class="collapse show" id="pctcustcollapse5">
    <div class="pct-content">
    <div class="theme-color fontpreset-color">
    <a href="#!" class="active" onclick="font_change('Public-Sans')"
    data-value="Public-Sans"><span>Aa</span><span>Public Sans</span></a>
    <a href="#!" class="" onclick="font_change('Roboto')"
    data-value="Roboto"><span>Aa</span><span>Roboto</span></a>
    <a href="#!" class="" onclick="font_change('Poppins')"
    data-value="Poppins"><span>Aa</span><span>Poppins</span></a>
    <a href="#!" class="" onclick="font_change('Inter')"
    data-value="Inter"><span>Aa</span><span>Inter</span></a>
    </div>
    </div>
    </div>
    </li>
    <li class="list-group-item">
    <div class="collapse show">
    <div class="pct-content">
    <div class="d-grid">
    <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
    </div>
    </div>
    </div>
    </li>
    </ul>
    </div>
    </div>
    </div> -->



@endsection