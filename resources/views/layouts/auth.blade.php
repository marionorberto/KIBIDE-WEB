<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content=" ">
  <meta name="keywords" content="">
  <meta name="author" content="CodedThemes">
  <link rel="icon" href="{{ asset('./favicon.ico') }}" type="image/x-icon">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    id="main-font-link">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/dropzone.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css')}}">
</head>

<body>
  <!-- [ Pre-loader ] start -->
  <!-- Loader de página -->
  <div id="page-loader"
    class="position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white"
    style="z-index: 1050;">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Carregando...</span>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->
  <!-- [ Sidebar Menu ] start -->

  @yield('content')
  <script>
    window.addEventListener('load', () => {
      const loader = document.getElementById('page-loader');
      loader.classList.remove('d-none');

      setTimeout(() => {
        loader.classList.add('d-none');
      }, 100); // esconde após 2 segundos
      // if (loader) loader.style.display = 'none';
    });
  </script>
  <script src="{{ asset('assets/js/plugins/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/simplebar.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/fonts/custom-font.js')}}"></script>
  <script src="{{ asset('assets/js/pcoded.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js')}}"></script>
  <script>layout_change('light');</script>
  <script>change_box_container('false');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
  <script>font_change("Public-Sans");</script>
</body>

</html>