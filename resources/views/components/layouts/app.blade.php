<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToConcepts| </title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo_black.ico', env('SECURE_ASSETS')) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo/logo_black.ico', env('SECURE_ASSETS')) }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href=" {{ url('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.min.css') }}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('assets/img/logo/logo_black.png', env('SECURE_ASSETS')) }}" alt="ToConcepts Logo"
             height="60" width="150">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/logo/logo.png', env('SECURE_ASSETS')) }}" alt="ToConcepts Logo"
                 class="" width="200"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"> </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <span class="h3"><i class="fa fas fa-user"></i></span>
                </div>
                <div class="info">
                    <a href="mailto:{{ \Illuminate\Support\Facades\Auth::user()->email }}"
                       class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link @if(request()->is('dashboard')) active @endif">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home Page
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('portfolio-crud') }}" class="nav-link @if(request()->is('admin/portfolio')) active @endif">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Portfolio
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('event-crud') }}" class="nav-link @if(request()->is('admin/events')) active @endif">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Events
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('client-crud') }}" class="nav-link @if(request()->is('admin/clients')) active @endif">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Clients
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('team-crud') }}" class="nav-link @if(request()->is('admin/teams')) active @endif">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Teams
                            </p>
                        </a>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link @if(request()->is('admin/services')) active @endif">--}}
{{--                            <i class="nav-icon fas fa-user-check"></i>--}}
{{--                            <p>--}}
{{--                                Services--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->is('admin/faq')) active @endif">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                FAQ's
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                           class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          class="d-none">
                        @csrf
                    </form>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

{{ $slot }}

    <footer class="main-footer">
        <strong>Copyright &copy; 2018 @if(date('Y')!== '2018')
                - {{ date('Y') }}
            @endif <a href="{{ route('dashboard') }}">To-Concepts</a>.</strong>
        All rights reserved.
    </footer>
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('asset/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- ChartJS -->
<script src="{{ asset('asset/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('asset/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('asset/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/dist/js/adminlte.js') }}"></script>
@stack('scripts')

    <script>

        // Get all elements with class "auto-close"
        const autoCloseElements = document.querySelectorAll(".auto-close");

        // Define a function to handle the fading and sliding animation
        function fadeAndSlide(element) {
            const fadeDuration = 500;
            const slideDuration = 500;

            // Step 1: Fade out the element
            let opacity = 1;
            const fadeInterval = setInterval(function () {
                if (opacity > 0) {
                    opacity -= 0.1;
                    element.style.opacity = opacity;
                } else {
                    clearInterval(fadeInterval);
                    // Step 2: Slide up the element
                    let height = element.offsetHeight;
                    const slideInterval = setInterval(function () {
                        if (height > 0) {
                            height -= 10;
                            element.style.height = height + "px";
                        } else {
                            clearInterval(slideInterval);
                            // Step 3: Remove the element from the DOM
                            element.parentNode.removeChild(element);
                        }
                    }, slideDuration / 10);
                }
            }, fadeDuration / 10);
        }

        // Set a timeout to execute the animation after 5000 milliseconds (5 seconds)
        setTimeout(function () {
            autoCloseElements.forEach(function (element) {
                fadeAndSlide(element);
            });
        }, 5000);

    </script>
</body>
</html>


