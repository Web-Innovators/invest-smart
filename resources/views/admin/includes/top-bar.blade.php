<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
        style="background: #003C51;">
        <a class="navbar-brand brand-logo" href="{{ route('admin.index.get') }}">
            <img src="{{ url('user-assets') }}/img/logo/logo.png" alt="" style="width: 80%; height: 60px;">
        </a>
        <a class="navbar-brand brand-logo-mini" href="">
            <img src="{{ url('user-assets') }}/img/logo/fc-logo.png" alt="" style="width: 80%; height: 60px;">
        </a>
    </div>
    <style>
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-item:hover {
            margin-bottom: 0;
            padding: 11px 13px;
            cursor: pointer;
            color: #111111;
            font-size: .875rem;
            font-style: normal;
            font-family: "nunito-medium", sans-serif;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #16181b;
            text-decoration: none;
            background-color: #ff0000;
        }
    </style>
    <div class="navbar-menu-wrapper d-flex align-items-stretch"
        style="background: linear-gradient(to right, #222134, #000);">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu text-white" style="font-size:22px;"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    {{-- <div class="nav-profile-img">
                        <img src="{{ url('uploades/users/' . Auth::user()->profile) }}" alt="image">
                    </div> --}}
                    <div class="nav-profile-text">
                        <p class="mb-1 text-white">{{ ucfirst(Auth::guard('admin')->user()->name) }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    <div class="p-3 text-center" style="background:#0d60a7;">
                        {{-- <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ url('uploades/users/' . Auth::user()->profile) }}" alt=""> --}}
                    </div>
                    <div class="p-2 text-white" style="background:#003C51; color:white;">
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between text-white"
                            href="">
                            <span>Profile</span>
                            <span class="p-0">
                                <i class="mdi mdi-account-outline ml-1"></i>
                            </span>
                        </a>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between text-white"
                            href="{{ route('index.get') }}">
                            <span>Site</span>
                            <i class="mdi mdi-web"></i>
                        </a>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between text-white"
                            href="{{ route('admin.logout') }}">
                            <span>Log Out</span>
                            <i class="mdi mdi-logout ml-1"></i>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
