<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bideshi') }} | @yield('title') </title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/animate.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/slick.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/screen.css')}}">
    
</head>
<body>
    <div id="app">
        
        <header class="header">
          <div class="logo-div">
            <a href="/"><img src="{{asset('images/logo.png')}}" alt=""></a>
            <div class="nav-toggle">
              <i class="ti-menu"></i>
            </div>
          </div>
          <ul class="top-nav">
            @if(Auth::check())
              @if(Shinobi::isRole('admin'))
                <li><a href="/dashboard">@lang('site.dashboard')</a></li>
              @else
                <li><a href="/profile">@lang('site.dashboard')</a></li>
              @endif
              <li><a href="/logout">@lang('site.logout')</a></li>
            @else
              <li><a href="/login">@lang('site.login')</a></li>
              <li><a href="/register">@lang('site.register')</a></li>

            @endif
              <li><a href="locale/en">@lang('site.english')</a></li>
              <li><a href="locale/np">@lang('site.nepali')</a></li>
            {{-- <li><a href="/login">login</a></li> --}}
          </ul>
          <ul class="nav">
            <li><a href="/">@lang('site.home')</a></li>
            <li><a href="/about">@lang('site.about')</a></li>
            <li><a href="/jobs">@lang('site.jobs')</a></li>
            <li><a href="/training">@lang('site.training')</a></li>
            <li><a href="/company">@lang('site.agencies')</a></li>
            <li><a href="/faq">@lang('site.faq')</a></li>
            <li><a href="/contact">@lang('site.contact')</a></li>
          </ul>
        </header>
        <div class="page-wrap">
            
            @yield('content')
        </div>
        <footer class="footer">
          <div class="row">
            <div class="s12 m4 col">
              <h5>@lang('site.contact')</h5>
              <ul class="contacts">
                <li>
                  <i class="ti-map"></i>
                  <p>@lang('site.city_address')</p>
                  <p>@lang('site.country')</p>
                </li>
                <li>
                  <i class="ti-envelope"></i>
                  <a href="mailto:info@bideshikaam.com">info@bideshikaam.com</a>
                </li>
                <li>
                  <i class="ti-phone"></i>
                  <a href="tel:984651325">984651325</a>
                  <a href="tel:984651325">984651325</a>
                </li>
              </ul>
            </div>
            <div class="s12 m4 col">
              <h5>Help & support</h5>
              <li><a href="/faq">FAQ</a></li>
              <li><a href="/faq">FAQ</a></li>
              <li><a href="/faq">FAQ</a></li>
              <li><a href="/faq">FAQ</a></li>
            </div>
            <div class="s12 m4 col">
              <h5>Follow Us</h5>
              <ul class="social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-facebook"></i></a></li>
              </ul>
            </div>
          </div>
          <p class="cp">&copy; All rights reserved </p>
        </footer>
    </div>
    <script src="{{asset('js/jquery-3.1.0.js')}}"></script>
    <script src="{{asset('js/materialize.js')}}"></script>
    <script src="{{asset('js/pace.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('js/particles.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    @stack('script')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
    <!-- Scripts -->
    
    <script>
        $(document).ready(function() {
            $('select').material_select();
          });
    </script>
</body>
</html>

