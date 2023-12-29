<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
  <meta charset="utf-8">
  <link href="{{ asset('storage/posts/dist/images/logo.svg') }}" rel="shortcut icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="LEFT4CODE">
  <title>Judul</title>
  <!-- BEGIN: CSS Assets-->
  <link rel="stylesheet" href="{{ asset('storage/posts/dist/css/app.css') }}" />
  <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
  <!-- BEGIN: Mobile Menu -->
  <div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
      <a href="" class="flex mr-auto">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6"
          src="{{ asset('storage/posts/dist/images/logo.svg') }}">
      </a>
      <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
          class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
      <li>
        <a href="index.html" class="menu menu--active">
          <div class="menu__icon"> <i data-feather="home"></i> </div>
          <div class="menu__title"> Dashboard </div>
        </a>
      </li>
      <li>
        <a href="javascript:;" class="menu">
          <div class="menu__icon"> <i data-feather="box"></i> </div>
          <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
        </a>
        <ul class="">
          <li>
            <a href="index.html" class="menu">
              <div class="menu__icon"> <i data-feather="activity"></i> </div>
              <div class="menu__title"> Side Menu </div>
            </a>
          </li>
          <li>
            <a href="simple-menu-dashboard.html" class="menu">
              <div class="menu__icon"> <i data-feather="activity"></i> </div>
              <div class="menu__title"> Simple Menu </div>
            </a>
          </li>
          <li>
            <a href="top-menu-dashboard.html" class="menu">
              <div class="menu__icon"> <i data-feather="activity"></i> </div>
              <div class="menu__title"> Top Menu </div>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="side-menu-inbox.html" class="menu">
          <div class="menu__icon"> <i data-feather="inbox"></i> </div>
          <div class="menu__title"> Inbox </div>
        </a>
      </li>
      <li>
        <a href="side-menu-file-manager.html" class="menu">
          <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
          <div class="menu__title"> File Manager </div>
        </a>
      </li>
      <li>
        <a href="side-menu-point-of-sale.html" class="menu">
          <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
          <div class="menu__title"> Point of Sale </div>
        </a>
      </li>
    </ul>
  </div>
  <!-- END: Mobile Menu -->
  <div class="flex">
    @include('shared.sidebar')
    <div class="content">
      @include('shared.navbar')
      @yield('content')
    </div>
  </div>
  <!-- BEGIN: JS Assets-->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
  <script src="{{ asset('storage/posts/dist/js/app.js') }}"></script>
  <script>
    //message with toastr
    @if (session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
  </script>
  <!-- END: JS Assets-->
</body>

</html>
