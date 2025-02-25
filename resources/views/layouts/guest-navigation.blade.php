<div class="main_header">
    <div class="header_parent_wrap">
        <header>
            <div class="logo_sect" data-height="85">
                <a href="{{ route('landing') }}" class="logo">
                    <!-- Logo -->
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" width="200" height="85">
                </a>
            </div>
            <div class="fright">
                <nav class="menu-main-menu-container">
                    <ul id="menu-main-menu" class="menu">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom @if(request()->is('/')) current-menu-ancestor @endif">
                            <a href="{{ route('landing') }}">Home</a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children @if(request()->is('portfolio')) current-menu-ancestor @endif">
                            <a href="{{ route('portfolio') }}">Portfolio</a>
                            <div class="sub-nav">
                                <ul class="sub-menu">
                                    @foreach($getTags as $tags)
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                            <a href="{{ route('portfolio.others', $tags->id) }}">{{ $tags->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children @if(request()->is('about')) current-menu-ancestor @endif @if(request()->is('faq')) current-menu-ancestor @endif">
                            <a href="{{ route('about') }}">About</a>
                            <div class="sub-nav">
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                        <a href="{{ route('faq') }}">FAQ</a>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                        <a href="{{ route('legal') }}">Legal</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page @if(request()->is('contact')) current-menu-ancestor @endif">
                            <a href="{{ route('contact') }}">Contact/Booking</a>
                        </li>
{{--                        <li class="menu-item menu-item-type-custom menu-item-object-custom @if(request()->is('services')) current-menu-ancestor @endif">--}}
{{--                            <a href="{{ route('services') }}">Services</a>--}}
{{--                        </li>--}}

                        <li class="menu-item menu-item-type-custom menu-item-object-custom @if(request()->is('events')) current-menu-ancestor @endif">
                            <a href="{{ route('events') }}">Events</a>
                        </li>

                        <li class="menu-item menu-item-type-post_type menu-item-object-page @if(request()->is('login')) current-menu-ancestor @endif">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </header>
    </div>
</div>
