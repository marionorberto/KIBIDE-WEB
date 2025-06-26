<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"
    content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords"
    content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">
  <link rel="icon" href="{{ asset('./favicon.ico') }}" type="image/x-icon">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    id="main-font-link">
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- Loader de página -->
  <div id="page-loader"
    class="position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white"
    style="z-index: 1050;">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Carregando...</span>
    </div>
  </div>
  @include('partials.menu-unit')
  @include('partials.header')
  <div class="pc-container">
    <div class="pc-content">
      @yield('content')
    </div>
  </div>
  </div>

  @include('partials.desk.footer')

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

  <div class="offcanvas pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
    <div class="offcanvas-header bg-primary">
      <h5 class="offcanvas-title text-white">KIBIDE</h5>
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
                  <h6 class="mb-1">Tema de Layout</h6>
                  <span>Escolha o seu layout</span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse " id="pctcustcollapse1">
              <div class="pct-content">
                <div class="pc-rtl">
                  <p class="mb-1">Direção</p>
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
                  <h6 class="mb-1">Modo do Tema</h6>
                  <span>Escolha modo Escuro/claro </span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse " id="pctcustcollapse2">
              <div class="pct-content">
                <div class="theme-color themepreset-color theme-layout">
                  <a href="#!" class="active" onclick="layout_change('light')" data-value="false"><span><img
                        src="{{ asset('assets/images/customization/default.svg') }}"
                        alt="img"></span><span>Light</span></a>
                  <a href="#!" class="" onclick="layout_change('dark')" data-value="true"><span><img
                        src="{{ asset('assets/images/customization/dark.svg') }}" alt="img"></span><span>Dark</span></a>
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
                  <h6 class="mb-1">Escolher Tema</h6>
                  <span>Escolha a cor do teu tema principal!</span>
                </div>
                <i class="ti ti-chevron-down"></i>
              </div>
            </a>
            <div class="collapse " id="pctcustcollapse3">
              <div class="pct-content">
                <div class="theme-color preset-color">
                  <a href="#!" class="active" data-value="preset-1"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      1</span></a>
                  <a href="#!" class="" data-value="preset-2"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      2</span></a>
                  <a href="#!" class="" data-value="preset-3"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      3</span></a>
                  <a href="#!" class="" data-value="preset-4"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      4</span></a>
                  <a href="#!" class="" data-value="preset-5"><span><img
                        src=" {{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      5</span></a>
                  <a href="#!" class="" data-value="preset-6"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      6</span></a>
                  <a href="#!" class="" data-value="preset-7"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      7</span></a>
                  <a href="#!" class="" data-value="preset-8"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      8</span></a>
                  <a href="#!" class="" data-value="preset-9"><span><img
                        src="{{ asset('assets/images/customization/theme-color.svg') }}" alt="img"></span><span>Tema
                      9</span></a>
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
            <div class="collapse " id="pctcustcollapse4">
              <div class="pct-content">
                <div class="theme-color themepreset-color boxwidthpreset theme-container">
                  <a href="#!" class="active" onclick="change_box_container('false')" data-value="false"><span><img
                        src="{{ asset('assets/images/customization/default.svg') }} "
                        alt="img"></span><span>Fluid</span></a>
                  <a href="#!" class="" onclick="change_box_container('true')" data-value="true"><span><img
                        src="{{ asset('assets/images/customization/container.svg') }}"
                        alt="img"></span><span>Container</span></a>
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
            <div class="collapse " id="pctcustcollapse5">
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
                  <button class="btn btn-light-danger" id="layoutreset">Resetar Layout</button>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/datepicker-full.min.js') }}"></script>
  <script>
    // minimum setup
    (function () {
      const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
        buttonClass: 'btn'
      });
    })();
    // input group layout
    (function () {
      const d_week = new Datepicker(document.querySelector('#pc-datepicker-2'), {
        buttonClass: 'btn'
      });
    })();
    // enable clear button
    (function () {
      const d_week = new Datepicker(document.querySelector('#pc-datepicker-3'), {
        buttonClass: 'btn',
        todayBtn: true,
        clearBtn: true
      });
    })();

    // orientation
    (function () {
      const d_week = new Datepicker(document.querySelector('#pc-datepicker-4_1'), {
        buttonClass: 'btn',
        orientation: 'top left'
      });
    })();
    (function () {
      const d_week = new Datepicker(document.querySelector('#pc-datepicker-4_2'), {
        buttonClass: 'btn',
        orientation: 'top right'
      });
    })();
    (function () {
      const d_week = new Datepicker(document.querySelector('#pc-datepicker-4_3'), {
        buttonClass: 'btn',
        orientation: 'bottom left'
      });
    })();
    (function () {
      const d_week = new Datepicker(document.querySelector('#pc-datepicker-4_4'), {
        buttonClass: 'btn',
        orientation: 'bottom right'
      });
    })();

    // range picker
    (function () {
      const datepicker_range = new DateRangePicker(document.querySelector('#pc-datepicker-5'), {
        buttonClass: 'btn'
      });
    })();

    // inline picker
    (function () {
      const datepicker_inline = new Datepicker(document.querySelector('#pc-datepicker-6'), {
        buttonClass: 'btn'
      });
    })();
  </script>
  <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/dashboard-analytics.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
  <script>
    // [ Zero Configuration ] start
    $('#myTable').DataTable({
      "ordering": true,
      "paging": true,
      "searching": true,
      "oLanguage": {
        "sEmptyTable": "Nenhum registro encontrado na tabela",
        "sInfo": "Mostrar _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
        "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "Mostrar _MENU_ registros por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
        },
        "oAria": {
          "sSortAscending": ": Ordenar colunas de forma ascendente",
          "sSortDescending": ": Ordenar colunas de forma descendente"
        }
      }
    });

    // [ Default Ordering ] start
    $('#order-table').DataTable({
      order: [[3, 'desc']]
    });

    // [ Multi-Column Ordering ]
    $('#multi-colum-dt').DataTable({
      columnDefs: [
        {
          targets: [0],
          orderData: [0, 1]
        },
        {
          targets: [1],
          orderData: [1, 0]
        },
        {
          targets: [4],
          orderData: [4, 0]
        }
      ]
    });

    // [ Complex Headers ]
    $('#complex-dt').DataTable();

    // [ DOM Positioning ]
    $('#DOM-dt').DataTable({
      dom: '<"top"i>rt<"bottom"flp><"clear">'
    });

    // [ Alternative Pagination ]
    $('#alt-pg-dt').DataTable({
      pagingType: 'full_numbers'
    });

    // [ Scroll - Vertical ]
    $('#scr-vrt-dt').DataTable({
      scrollY: '200px',
      scrollCollapse: true,
      paging: false
    });

    // [ Scroll - Vertical, Dynamic Height ]
    $('#scr-vtr-dynamic').DataTable({
      scrollY: '50vh',
      scrollCollapse: true,
      paging: false
    });

    // [ Language - Comma Decimal Place ]
    $('#lang-dt').DataTable({
      language: {
        decimal: ',',
        thousands: '.'
      }
    });
  </script>

</body>

</html>