@extends('layouts.app')
@section('title', 'Politicas')
@section('content')

  @include('partials.app.navbar')
  <section id="politica-privacidade" class="pt-5 pb-5">
    <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-10 col-xl-8">
      <h5 class="text-primary mb-0">Privacidade</h5>
      <h2 class="my-3">Política de Privacidade</h2>
      <p class="mb-5">Saiba como coletamos, usamos e protegemos suas informações ao usar nossa plataforma.</p>
      </div>
    </div>

    <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.4s">
      <div class="col-md-10 col-xl-8">
      <h4 class="mb-3">1. Coleta de Informações</h4>
      <p class="mb-4 text-muted">Coletamos informações fornecidas pelo usuário no momento do cadastro, como nome,
        e-mail e outros dados necessários para personalizar a experiência na plataforma.</p>

      <h4 class="mb-3">2. Uso das Informações</h4>
      <p class="mb-4 text-muted">Utilizamos os dados coletados para oferecer suporte, personalizar conteúdos e
        melhorar continuamente nossos serviços.</p>

      <h4 class="mb-3">3. Compartilhamento de Dados</h4>
      <p class="mb-4 text-muted">Não compartilhamos suas informações com terceiros sem seu consentimento, exceto
        quando exigido por lei.</p>

      <h4 class="mb-3">4. Segurança</h4>
      <p class="mb-4 text-muted">Adotamos práticas de segurança modernas para proteger seus dados contra acessos não
        autorizados, vazamentos ou alterações indevidas.</p>

      <h4 class="mb-3">5. Seus Direitos</h4>
      <p class="mb-4 text-muted">Você tem o direito de acessar, corrigir ou excluir suas informações pessoais
        armazenadas conosco. Basta entrar em contato conosco pelo canal de suporte.</p>
      </div>
    </div>
    </div>
  </section>

  @include('partials.app.footer')

@endsection