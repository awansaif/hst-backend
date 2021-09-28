<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="{{ auth()->guard('editor')->user()->profile?  asset('storage/'.auth()->guard('editor')->user()->profile->avatar_path) : 'https://ui-avatars.com/api/?background=303030&color=f1f1f1&name=Editor' }}"
                    alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    {{ auth()->guard('editor')->user()->name }}
                    <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="{{ Route('editor.profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-outline"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <a href="{{ Route('editor.setting') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings-outline"></i>
                    <span>Settings</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ Route('editor.logout') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ Route('editor.dashboard') }}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{ asset("assets/images/logo-dark.png") }}" alt="" height="26">
                <!-- <span class="logo-lg-text-dark">Simple</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-lg-text-dark">S</span> -->
                <img src="{{ asset("assets/images/logo-sm.png") }}" alt="" height="22">
            </span>
        </a>

        <a href="{{ Route('editor.dashboard') }}" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{ asset("assets/images/logo-light.png") }}" alt="" height="26">
                <!-- <span class="logo-lg-text-light">Simple</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-lg-text-light">S</span> -->
                <img src="{{ asset("assets/images/logo-sm.png") }}" alt="" height="22">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>
