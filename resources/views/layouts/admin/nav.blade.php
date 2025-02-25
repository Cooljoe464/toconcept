<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            @if($user->hasRole(['super-admin','SuperAdmin', 'admin']))
                <!-- Dashboards -->
                <li class="menu-item @if(request()->is('home')) {{ __('active') }} @endif">
                    <a href="{{ route('home') }}" class="menu-link">
                        <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                        <div data-i18n="Home">Home</div>
                    </a>
                </li>
            @endif
            <li class="menu-item @if(request()->is('manuals')) {{ __('active') }} @endif @if(request()->is('manual/add')) {{ __('active') }} @endif">
                <a href="{{ route('manual.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-book-account"></i>
                    <div data-i18n="Manuals">Manuals</div>
                </a>
            </li>
            @if($user->hasRole(['super-admin', 'admin', 'librarian']))
                {{--                                <li class="menu-item @if(request()->is('issue/books')) {{ __('active') }} @endif @if(request()->is('issue/books/add')) {{ __('active') }} @endif">--}}
                {{--                                    <a href="{{ route('issue.books.index') }}" class="menu-link">--}}
                {{--                                        <i class="menu-icon tf-icons mdi mdi-book-plus"></i>--}}
                {{--                                        <div data-i18n="Book Issue">Book Issue</div>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}

                <li class="menu-item @if(request()->is('users')) {{ __('active') }} @endif @if(request()->is('users/add')) {{ __('active') }} @endif">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons mdi mdi-account-group"></i>
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>

                @if($user->hasRole(['super-admin']))
                    <li class="menu-item">
                        <a class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons mdi mdi-apps"></i>
                            <div data-i18n="Settings">Settings</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item @if(request()->is('roles')) {{ __('active') }} @endif @if(request()->is('roles/create')) {{ __('active') }} @endif">
                                <a href="{{ route('roles') }}" class="menu-link">
                                    <i class="menu-icon tf-icons mdi mdi-apps"></i>
                                    <div data-i18n="Roles">Roles</div>
                                </a>
                            </li>

                            <li class="menu-item @if(request()->is('permissions')) {{ __('active') }} @endif @if(request()->is('permissions/create')) {{ __('active') }} @endif">
                                <a href="{{ route('permissions') }}" class="menu-link">
                                    <i class="menu-icon tf-icons mdi mdi-apps"></i>
                                    <div data-i18n="Permissions">Permissions</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endif
            @endif
        </ul>
    </div>
</aside>
<!-- / Menu -->
