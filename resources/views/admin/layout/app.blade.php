<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/binani-137x141.png') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('storage/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href=" {{ url('storage/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('storage/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('storage/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('storage/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('storage/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('storage/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('storage/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('assets/images/binani-137x141.png') }}" alt="Binani Printing Press Logo"
             height="60" width="60">
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
            <img src="{{ asset('assets/images/binani-137x141.png') }}" alt="Binani Printing Press Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Binani Printing Press</span>
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
                        <a href="#" class="nav-link @if(request()->is('admin/contact')) active @endif">
                            <i class="nav-icon fas fa-phone"></i>
                            <p>
                                Contacts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->is('admin/gallery')) active @endif">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->is('admin/faq')) active @endif">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                FAQ's
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->is('admin/clients')) active @endif">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Clients
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->is('admin/services')) active @endif">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Services
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


    @yield('content')

    <footer class="main-footer">
        <strong>Copyright &copy; 2024 @if(date('Y')!== '2024')
                - {{ date('Y') }}
            @endif <a href="{{ route('dashboard') }}">Binani Printing Press</a>.</strong>
        All rights reserved.
    </footer>
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('storage/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('storage/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('storage/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@if(request()->is('admin/gallery') || request()->is('admin/donation') || request()->is('admin/clients') || request()->is('admin/faq')|| request()->is('admin/services'))
    <script src="{{ url('storage/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('storage/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('storage/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('storage/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('storage/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endif

<!-- ChartJS -->
<script src="{{ url('storage/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('storage/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('storage/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('storage/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('storage/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('storage/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('storage/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('storage/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('storage/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('storage/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('storage/dist/js/adminlte.js') }}"></script>
@if(request()->is('admin/gallery') || request()->is('admin/donation') || request()->is('admin/clients')|| request()->is('admin/faq')|| request()->is('admin/services'))
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

        $(function () {

            $("#gallery").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": true,
                "buttons": [
                    {
                        html: '<a class="btn btn-primary" href="{{ route('admin.addGallery') }}"><span class="fa fa-plus-circle" aria-hidden="true"></span> Add</a>',
                    }]
            }).buttons().container().appendTo('#gallery_wrapper .col-md-6:eq(0)');

            $("#faq").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": true,
                "buttons": [
                    {
                    html: '<a class="btn btn-primary" href="{{ route('admin.addFaq') }}"><span class="fa fa-plus-circle" aria-hidden="true"></span> Add</a>',
                }]
            }).buttons().container().appendTo('#faq_wrapper .col-md-6:eq(0)');

            $("#client").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": true,
                "buttons": [
                    {
                    html: '<a class="btn btn-primary" href="{{ route('admin.addClients') }}"><span class="fa fa-plus-circle" aria-hidden="true"></span> Add</a>',
                }]
            }).buttons().container().appendTo('#client_wrapper .col-md-6:eq(0)');

            $("#services").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": true,
                "buttons": [
                    {
                    html: '<a class="btn btn-primary" href="{{ route('admin.addServices') }}"><span class="fa fa-plus-circle" aria-hidden="true"></span> Add</a>',
                }]
            }).buttons().container().appendTo('#services_wrapper .col-md-6:eq(0)');
        });
    </script>
@endif
</body>
</html>

