<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ToConcepts').' | '.ucfirst(Route::currentRouteName()) }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <!--All Main Preloads-->

    <link rel="preload" href="{{ asset('assets/img/logo/logo_black.ico', env('SECURE_ASSETS')) }}" as="image"/>
    <link rel="preload" href="{{ asset('assets/css/font-awesome.min.css', env('SECURE_ASSETS')) }}" as="font"/>
    <link rel="preload" href="{{ asset('assets/css/font-iconano.css', env('SECURE_ASSETS')) }}" as="font"/>
    <link rel="preload" href="{{ asset('assets/css/theme.css', env('SECURE_ASSETS')) }}" as="style"/>
    <link rel="preload" href="{{ asset('assets/css/custom.css', env('SECURE_ASSETS')) }}" as="style"/>
    <link rel="preload" href="{{ asset('assets/css/responsive.css', env('SECURE_ASSETS')) }}" as="style"/>
    @stack('preloads')
    <!--End Main Preloads-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo_black.ico', env('SECURE_ASSETS')) }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo/logo_black.ico', env('SECURE_ASSETS')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href='{{ asset('assets/css/font-awesome.min.css', env('SECURE_ASSETS')) }}'>

{{--    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,700,900" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,900" rel="stylesheet">--}}
    <link rel="stylesheet" href='{{ asset('assets/css/font-iconano.css', env('SECURE_ASSETS')) }}'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
{{--    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,500&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,500&family=Oswald:wght@200..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Theme style -->
    <link rel='stylesheet' href='{{ asset('assets/css/theme.css', env('SECURE_ASSETS')) }}'>

    <!-- Custom style -->
    <link rel='stylesheet' href='{{ asset('assets/css/custom.css', env('SECURE_ASSETS')) }}' type='text/css' media='all'/>

    <!-- Responsive -->
    <link rel='stylesheet' href='{{ asset('assets/css/responsive.css', env('SECURE_ASSETS')) }}' type='text/css' media='all'/>
    @stack('styles')
</head>

<body class="home page-template-default
{{--@if(request()->is('/')) page-template-page-fullscreen-slider page-template-page-fullscreen-slider-php @endif --}}
{{--page-template-page-albums page-template-page-albums-php--}}
@if(request()->is('about')||request()->is('portfolio')) page-template page-template-page-albums page-template-page-albums-php  || page-template-page-with-slider page-template-page-with-slider-php @endif page page_with_abs_header dark_color_scheme">
<div class="gt3_preloader">
    <div class="gt3_preloader_content">
        <img src="{{ asset('assets/img/logo/logo.png', env('SECURE_ASSETS')) }}" width="150" alt="To-concepts Logo">
        <div class="arc1"></div>
        <div class="arc2"></div>
        <div class="arc3"></div>
    </div>
</div>

<div class="header_holder"></div>
<div class="mobile_menu_wrapper"></div>
<div class="sticky_menu_enabled"></div>


@include('layouts.guest-navigation')

@yield('content')

<!-- .wrapper -->
<div class="footer">
{{--    @if(request()->is('/'))--}}
        @include('layouts.guest-footer')
{{--    @endif--}}
    <div class="footer_wrapper" data-pad-top="15" data-pad-bottom="15">
        <div class="copyright">&copy; 2020 - {{ date('Y') }} @ ToConcepts. All right reserved. Made by
            <a href="mailto:{{ __('joelonyedinefu@gmail.com') }}">Onyedinefu Joel</a></div>
        <div class="foot_info_block">
            <ul class="social_icons">
                @if(!empty($homePage['twitter']))
                    <li>
                        <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                @endif
                @if(!empty($homePage['facebook']))
                    <li>
                        <a title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                @endif
                @if(!empty($homePage['linkedin']))
                    <li>
                        <a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                @endif
                @if(!empty($homePage['instagram']))
                    <li>
                        <a title="Instagram" href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                @endif
                @if(!empty($homePage['tiktok']))
                    <li>
                        <a title="Tiktok" href="#"><i class="fa fa-tiktok"></i></a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<a href="#" class="back2top" title="Back to Top">Back to Top</a>

<!-- jQuery -->
<script src='{{ asset('assets/js/jquery/jquery.js', env('SECURE_ASSETS')) }}'></script>
<script src='{{ asset('assets/js/jquery/jquery-migrate.min.js', env('SECURE_ASSETS')) }}'></script>

@stack('scripts')

</body>

</html>



