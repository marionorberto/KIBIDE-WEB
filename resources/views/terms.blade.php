@extends('layouts.app')
@section('title', 'Termos')
@section('content')

  @include('partials.app.navbar')
  <section id="termos-uso" class="pt-5 pb-5">
    <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-10 col-xl-8">
      <h5 class="text-primary mb-0">Termos Legais</h5>
      <h2 class="my-3">Termos de Uso</h2>
      <p class="mb-5">Leia com atenção os termos que regem o uso da nossa plataforma. Ao utilizá-la, você concorda com
        todas as condições descritas abaixo.</p>
      </div>
    </div>

    <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.4s">
      <div class="col-md-10 col-xl-8">
      <h4 class="mb-3">1. Aceitação dos Termos</h4>
      <p class="mb-4 text-muted">Ao acessar ou utilizar a plataforma, você concorda em cumprir estes Termos de Uso,
        todas as leis e regulamentos aplicáveis, e concorda que é responsável pelo cumprimento de todas as leis locais
        aplicáveis.</p>

      <h4 class="mb-3">2. Cadastro e Conta</h4>
      <p class="mb-4 text-muted">Para utilizar alguns recursos, o usuário deverá criar uma conta, fornecendo
        informações verdadeiras e atualizadas. O usuário é responsável por manter a confidencialidade de suas
        credenciais.</p>

      <h4 class="mb-3">3. Uso Permitido</h4>
      <p class="mb-4 text-muted">A plataforma deve ser utilizada exclusivamente para fins educacionais e de
        orientação, respeitando os direitos de outros usuários e da equipe envolvida.</p>

      <h4 class="mb-3">4. Restrições</h4>
      <p class="mb-4 text-muted">É proibido utilizar a plataforma para fins ilegais, distribuir conteúdo ofensivo, ou
        prejudicar a segurança da aplicação e seus usuários.</p>

      <h4 class="mb-3">5. Alterações nos Termos</h4>
      <p class="mb-4 text-muted">Reservamo-nos o direito de alterar estes termos a qualquer momento. As mudanças serão
        publicadas nesta página e é de responsabilidade do usuário revisá-las regularmente.</p>
      </div>
    </div>
    </div>
  </section>

  @include('partials.app.footer')

@endsection