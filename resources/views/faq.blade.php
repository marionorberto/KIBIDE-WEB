@extends('layouts.app')
@section('title', 'faq')
@section('content')

  @include('partials.app.navbar')
  <section id="faq" class="pt-5 pb-5">
    <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-10 col-xl-8">
      <h5 class="text-primary mb-0">Dúvidas Frequentes</h5>
      <h2 class="my-3">Perguntas e Respostas</h2>
      <p class="mb-5">Encontre abaixo respostas para as perguntas mais comuns sobre o funcionamento da nossa
        plataforma.</p>
      </div>
    </div>

    <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.4s">
      <div class="col-md-10 col-xl-8">
      <div class="accordion" id="accordionFAQ">

        <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          1. Como posso me cadastrar como estudante ou mentor?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne"
          data-bs-parent="#accordionFAQ">
          <div class="accordion-body text-muted">
          Você pode se cadastrar acessando a página principal e clicando em "Ser um estudante" ou "Ser um mentor".
          O processo é simples e rápido.
          </div>
        </div>
        </div>

        <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          2. O serviço é gratuito?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo"
          data-bs-parent="#accordionFAQ">
          <div class="accordion-body text-muted">
          Sim, a maior parte dos recursos são gratuitos. No entanto, alguns serviços personalizados podem envolver
          custos, que serão sempre informados com antecedência.
          </div>
        </div>
        </div>

        <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          3. Como encontro um mentor ideal para mim?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree"
          data-bs-parent="#accordionFAQ">
          <div class="accordion-body text-muted">
          Nossa plataforma faz a intermediação com base nos seus interesses e objetivos. Assim que você se
          cadastra, sugerimos mentores com perfis alinhados ao seu.
          </div>
        </div>
        </div>

        <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          4. Quais áreas de estudo são atendidas?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour"
          data-bs-parent="#accordionFAQ">
          <div class="accordion-body text-muted">
          Oferecemos apoio em diversas áreas, como matemática, ciências, línguas, tecnologia, e orientação
          vocacional. A lista completa está disponível na área do usuário.
          </div>
        </div>
        </div>

        <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="faqFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          5. Meus dados estão seguros?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="faqFive"
          data-bs-parent="#accordionFAQ">
          <div class="accordion-body text-muted">
          Sim. Seguimos as boas práticas de segurança digital e respeitamos sua privacidade, conforme descrito na
          nossa Política de Privacidade.
          </div>
        </div>
        </div>

      </div>
      </div>
    </div>
    </div>
  </section>

  @include('partials.app.footer')

@endsection