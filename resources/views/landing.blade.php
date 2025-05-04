@extends('layouts.app')
@section('title', 'Home')
@section('content')

  <header id="home">
    @include('partials.app.navbar')


    <div class="container d-flex justify-content-center">
    <div class="row ">
      <div class="col-12">
      <h1 class="mt-sm-3 text-white mb-4 f-w-600 wow fadeInUp" data-wow-delay="0.2s">A melhor maneira de agendar <br>
        uma mentoria é com o
        <span class="text-primary"><i class="fa fa-graduation-cap text-white"></i>BUKABEM</span>
      </h1>
      <h5 class="mb-4 text-white opacity-75 wow fadeInUp" data-wow-delay="0.4s"> A melhor plataforma online para
        auxliar estudantes com dificuldades acadêmicas <br> e que precisam de uma orientação estudantil e recursor
        acadêmicos.</h5>
      <div class="my-5 wow fadeInUp" data-wow-delay="0.6s">
        <a href="{{ route('auth.register-student') }}" class="btn btn-outline-primary me-2">Quero uma
        Mentoria</a>
        <a href="{{ route('auth.choose-role') }}" class="btn btn-primary d-inline-flex align-items-center">
        Registar Agora</a>
      </div>

      </div>

    </div>
    </div>
  </header>

  <section id="services" class="pt-5 ">
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
        <h3 class="mb-3">Intermediação de <br> Mentoria</h3>
        <p class="mb-4 text-muted">Conectamos estudantes a mentores experientes, promovendo diálogos construtivos e
          apoio personalizado. A intermediação
          garante que cada aluno encontre orientação alinhada aos seus objetivos acadêmicos e profissionais.</p>
        <a href="{{ route('auth.register-student') }}" class="btn btn-outline-primary">Ser um estudante?</a>
        </div>
        <div class="card-body pb-0 pe-0">
        <img src="{{ asset('assets/images/mentoria.jpg') }}" alt="img" class="img-fluid w-100">
        </div>
      </div>
      </div>
      <div class="col-sm-6 col-lg-4">
      <div class="card wow fadeInUp" data-wow-delay="0.6s">
        <div class="card-body bg-light-primary">
        <h3 class="mb-3">Recursos <br> Acadêmicos</h3>
        <p class="mb-4 text-muted">Disponibilizamos materiais, ferramentas e conteúdos exclusivos para fortalecer o
          aprendizado e impulsionar o desempenho
          escolar. Com acesso facilitado, o estudante tem suporte completo na sua jornada educacional.</p>
        <a href="{{ route('auth.register-student') }}" class="btn btn-primary">Explorar recursos</a>
        </div>
        <div class="card-body bg-light-primary pb-0 pe-0">
        <img src="{{ asset('assets/images/recursos.jpg') }}" alt="img" class="img-fluid w-100">
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
        <a href="{{ route('auth.register-mentor') }}" class="btn btn-outline-primary">Ser um mentor</a>
        </div>
        <div class="card-body pb-0 pe-0">
        <img src="{{ asset('assets/images/assistence.jpg') }}" alt="img" class="img-fluid w-100">
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>
  <!-- [ Complete Combo ] End -->
  <!-- [ CTA ] start -->
  <section class="bg-dark cta-block">
    <img src="{{ asset('assets/images/student-became.svg') }}" alt="img" class="img-cta" height="80%">
    <div class="container">
    <div class="row">
      <div class="col-md-7 text-center text-md-start mt-5">
      <h2 class="text-white mb-4">Torne-se um estudante no <span class="text-primary"> <i
          class="fa fa-graduation-cap text-white"></i><i class="fa fa-graduation-cap text-white"></i>BUKABEM</span>
      </h2>
      <a href="{{ route('auth.register-student') }}" class="btn btn-primary"> Quero uma mentoria</a>
      </div>
    </div>
    </div>
  </section>

  <section class="bg-white cta-block">
    <img src="{{ asset('assets/images/mentor-became.svg') }}" alt="img" class="img-cta">
    <div class="container">
    <div class="row">
      <div class="col-md-7 text-center text-md-start mt-5">
      <h2 class="text-black mb-4">Torne-se um mentor no <span class="text-primary"><i
          class="fa fa-graduation-cap text-white"></i>BUKABEM </span> </h2>
      <a href="{{ route('auth.register-student') }}" class="btn btn-dark">Quero ser mentor</a>
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
    <div class="img-comp-img img-comp-overlay bg-black w-100 position-relative">
      <img src="{{ asset('assets/images/student.svg') }}" alt="img" data-img-type=".svg" class="img-landing"
      data-img="{{ asset('assets/images/student.svg') }}">
      <h1 class="position-absolute top-50" style="right: 30px;">Confie em nós para guiar o teu <br> processo estudantil
      </h1>
    </div>
    <div class="img-comp-img img-comp-overlay bg-white w-100 position-relative">
      <img src="{{ asset('assets/images/mentor.svg') }}" alt="img" data-img-type=".svg" class="img-landing"
      data-img="{{ asset('assets/images/mentor.svg') }}">
      <h1 class="position-absolute top-50" style="right: 30px;">Venha nos ajudar a ajudar o jovem brilhante <br>
      estude

      do futuro
      </h1>
    </div>

    </div>
  </section>
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
          <img src="{{ asset('assets/images/53.jpg') }}" alt="img" class="img-fluid wid-40 rounded-circle">
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
          <img src="{{ asset('assets/images/54.jpg') }}" alt="img" class="img-fluid wid-40 rounded-circle">
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
          <img src="{{ asset('assets/images/91.jpg') }}" alt="img" class="img-fluid wid-40 rounded-circle">
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

  <section id="contacts" class="contact-form">
    <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-10 col-xl-5 mb-4">
      <h5 class="text-primary mb-0">Entre Em Contacto</h5>
      <h2 class="my-3">Envie a tua mensagem</h2>
      <p class="text-muted">Sinta-se livre para nos conversar a nossa equipe do BUKABEM</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xxl-6 col-md-8 col-sm-10">
      <div class="row g-3">
        <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Nome">
        </div>

        <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Email ">
        </div>
        <div class="col-md-6">
        <input type="phone" class="form-control" placeholder="Telefone">
        </div>
      </div>

      <textarea class="form-control form-control-lg mb-3 mt-3" rows="4" placeholder="Mensagem"></textarea>

      <div class="mt-3 text-end">
        <button type="button" class="btn btn-primary">Submeter agora</button>
      </div>
      </div>
    </div>
    </div>
  </section>
  @include('partials.app.footer')
@endsection