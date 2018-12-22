<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bombay Sweets</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <h2 >
                <a class="navbar-brand pt-3" href="#">Bombay</a>
            </h2>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <div class="pull-left p-2 d-xs-none">
                <input style="border:solid 1px orange; border-radius: 15px; padding: 5px;" type="text" placeholder="Search...">
            </div>
            @if (Auth::guest())
                <li class="animated fadeIn navbar-nav navbar-nav-right"><a href="{{ route('login') }}">Login</a></li>
            @else
                <ul style="border-radius: 50px; height: 35px; text-autospace:punctuation; color:white; background-color: #ff6a00bd" class="navbar-nav navbar-nav-right">
                    <i class="fa-bell"></i>
                    <li  class="nav-item dropdown d-none d-xl-inline-block">
                        <a  class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <span class="profile-text">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <a class="dropdown-item p-0">
                                <div class="d-flex border-bottom">
                                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                        <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                                    </div>
                                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                        <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                                    </div>
                                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                        <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item mt-2">
                                Manage Accounts
                            </a>
                            <a class="dropdown-item">
                                Change Password
                            </a>
                            <a class="dropdown-item">
                                Check Inbox
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            @endif
            <button class="bg-twitter navbar-toggler navbar-toggler-left d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @if(!Auth::guest())
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="user-wrapper">
                            <div class="profile-image">
                                <img src="images/faces/face1.jpg" alt="profile image">
                            </div>
                        </div>
                        <div class="text-wrapper">
                            <p class="profile-name">Mohammad Rabanni</p>
                            <div class="text-center">
                                <small class="designation text-muted">Manager</small>
                                <span class="status-indicator online"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-television"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-box"></i>
                        <span class="menu-title">Menu Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-backup-restore"></i>
                        <span class="menu-title">Orders</span>
                    </a>
                </li>
            </ul>
        </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
         @else
            <div class="content-wrapper">
                @yield('content')
            </div>
        @endif
        <!-- partial -->

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>