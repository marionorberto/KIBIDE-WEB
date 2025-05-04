<!DOCTYPE html>
<html lang="pt">
<title>@yield('title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description"
  content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
<meta name="keywords"
  content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
<meta name="author" content="CodedThemes">
<link rel="icon" href="{{ asset('assets/images/favicon.svg')}}" type="image/x-icon"> <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
  id="main-font-link">
<link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/fonts/feather.css')}}">
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css')}}">
<link rel="stylesheet" href="{{ asset('assets/fonts/material.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" id="main-style-link">
<link rel="stylesheet" href="{{ asset('assets/css/style-preset.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/landing.css')}}">


<body>

  @yield('content')

  <script src="{{ asset('assets/js/plugins/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/simplebar.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/fonts/custom-font.js')}}"></script>
  <script src="{{ asset('assets/js/pcoded.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/wow.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js')}}"></script>
  <script>layout_change('light');</script>
  <script>change_box_container('false');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
  <script>font_change("Public-Sans");</script>
  <script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener('scroll', function () {
      let cOst = document.documentElement.scrollTop;
      if (cOst == 0) {
        document.querySelector(".navbar").classList.add("top-nav-collapse");
      } else if (cOst > ost) {
        document.querySelector(".navbar").classList.add("top-nav-collapse");
        document.querySelector(".navbar").classList.remove("default");
      } else {
        document.querySelector(".navbar").classList.add("default");
        document.querySelector(".navbar").classList.remove("top-nav-collapse");
      }

      if (cOst > 500) {
        document.querySelector(".pc-landing-custmizer").classList.add("active");
      } else {
        document.querySelector(".pc-landing-custmizer").classList.remove("active");
      }
      ost = cOst;
    });
    // End [ Menu hide/show on scroll ]
    var wow = new WOW({
      animateClass: 'animated',
    });
    wow.init();
    // light dark image start
    function initComparisons() {
      var x, i;
      /*find all elements with an "overlay" class:*/
      x = document.getElementsByClassName("img-comp-overlay");
      for (i = 0; i < x.length; i++) {
        /*once for each "overlay" element:
        pass the "overlay" element as a parameter when executing the compareImages function:*/
        compareImages(x[i]);
      }
      function compareImages(img) {
        var slider, img, clicked = 0, w, h;
        /*get the width and height of the img element*/
        w = img.offsetWidth;
        h = img.offsetHeight;
        /*set the width of the img element to 50%:*/
        img.style.width = (w / 2) + "px";
        /*create slider:*/
        slider = document.createElement("DIV");
        slider.setAttribute("class", "img-comp-slider ti ti-separator-vertical bg-primary");
        /*insert slider*/
        img.parentElement.insertBefore(slider, img);
        /*position the slider in the middle:*/
        slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
        slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
        /*execute a function when the mouse button is pressed:*/
        slider.addEventListener("mousedown", slideReady);
        /*and another function when the mouse button is released:*/
        window.addEventListener("mouseup", slideFinish);
        /*or touched (for touch screens:*/
        slider.addEventListener("touchstart", slideReady);
        /*and released (for touch screens:*/
        window.addEventListener("touchend", slideFinish);
        function slideReady(e) {
          /*prevent any other actions that may occur when moving over the image:*/
          e.preventDefault();
          /*the slider is now clicked and ready to move:*/
          clicked = 1;
          /*execute a function when the slider is moved:*/
          window.addEventListener("mousemove", slideMove);
          window.addEventListener("touchmove", slideMove);
        }
        function slideFinish() {
          /*the slider is no longer clicked:*/
          clicked = 0;
        }
        function slideMove(e) {
          var pos;
          /*if the slider is no longer clicked, exit this function:*/
          if (clicked == 0) return false;
          /*get the cursor's x position:*/
          pos = getCursorPos(e)
          /*prevent the slider from being positioned outside the image:*/
          if (pos < 0) pos = 0;
          if (pos > w) pos = w;
          /*execute a function that will resize the overlay image according to the cursor:*/
          slide(pos);
        }
        function getCursorPos(e) {
          var a, x = 0;
          e = (e.changedTouches) ? e.changedTouches[0] : e;
          /*get the x positions of the image:*/
          a = img.getBoundingClientRect();
          /*calculate the cursor's x coordinate, relative to the image:*/
          x = e.pageX - a.left;
          /*consider any page scrolling:*/
          x = x - window.pageXOffset;
          return x;
        }
        function slide(x) {
          img.style.width = x + "px";
          slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
        }
      }
    }
    initComparisons();
    $('.marquee').marquee({
      duration: 500000,
      pauseOnHover: true,
      startVisible: true,
      duplicated: true
    });
    $('.marquee-1').marquee({
      duration: 500000,
      pauseOnHover: true,
      startVisible: true,
      duplicated: true,
      direction: 'right'
    });
    var elem = document.querySelectorAll('.color-checkbox');
    for (var j = 0; j < elem.length; j++) {
      elem[j].addEventListener('click', function (event) {
        var targetElement = event.target;
        if (targetElement.tagName == 'INPUT') {
          targetElement = targetElement.parentNode;
        }
        if (targetElement.tagName == 'I') {
          targetElement = targetElement.parentNode;
        }
        var temp = targetElement.children[0].getAttribute('data-pc-value');
        document.getElementsByTagName('body')[0].setAttribute('data-pc-preset', 'preset-' + temp);
        var img_elem = document.querySelectorAll('.img-landing');
        for (var i = 0; i < img_elem.length; i++) {
          var img_name = img_elem[i].getAttribute('data-img');
          var img_type = img_elem[i].getAttribute('data-img-type');
          img_elem[i].setAttribute('src', img_name + temp + img_type);
        }
      });
    }
  </script>
</body>

</html>