<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Multitenant</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta property="og:title" content="Admin Templates - Dashboard Templates" />
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta property="og:type" content="Website" />

    <!-- *************
  ************ CSS Files *************
 ************* -->
    <link rel="stylesheet" href="{{ url('assets/fonts/remix/remixicon.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/main.min.css') }}" />

    <!-- *************
  ************ Vendor Css Files *************
 ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}" />
</head>
<?php $page = Route::current()->getName(); ?>

<body>
    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class="spin-wrapper">
            <div class="spin">
                <div class="inner"></div>
            </div>
            <div class="spin">
                <div class="inner"></div>
            </div>
            <div class="spin">
                <div class="inner"></div>
            </div>
            <div class="spin">
                <div class="inner"></div>
            </div>
            <div class="spin">
                <div class="inner"></div>
            </div>
            <div class="spin">
                <div class="inner"></div>
            </div>
        </div>
    </div>
    <!-- Loading ends -->

    <!-- Page wrapper starts -->
    <div class="page-wrapper">
        <!-- App header starts -->
        <div class="app-header d-flex align-items-center">
            <!-- Toggle buttons starts -->
            <div class="d-flex">
                <button class="toggle-sidebar">
                    <i class="ri-menu-line"></i>
                </button>
                <button class="pin-sidebar">
                    <i class="ri-menu-line"></i>
                </button>
            </div>
            <!-- Toggle buttons ends -->

            <!-- App brand starts -->
            <div class="app-brand ms-3">
                <a href="index.html" class="d-lg-block d-none">
                    <img src="{{ url('assets/images/logo.svg') }}" class="logo" alt="Medicare Admin Template" />
                </a>
                <a href="index.html" class="d-lg-none d-md-block">
                    <img src="{{ url('assets/images/logo-sm.svg') }}" class="logo" alt="Medicare Admin Template" />
                </a>
            </div>
            <!-- App brand ends -->

            <!-- App header actions starts -->
            <div class="header-actions">
                <!-- Search container starts -->
                <div class="search-container d-lg-block d-none mx-3">
                    <input type="text" class="form-control" id="searchId" placeholder="Search" />
                    <i class="ri-search-line"></i>
                </div>
                <!-- Search container ends -->

                <!-- Header actions starts -->
                <div class="d-lg-flex d-none gap-2">


                    <!-- Notifications dropdown starts -->
                    <div class="dropdown">
                        <a class="dropdown-toggle header-icon" href="#!" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ri-alarm-warning-line"></i>
                            <span class="count-label success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-300">
                            <h5 class="fw-semibold px-3 py-2 text-primary">Alerts</h5>

                            <!-- Scroll starts -->
                            <div class="scroll300">
                                <!-- Alert list starts -->
                                <div class="p-3">
                                    <div class="d-flex py-2">
                                        @if ($notifications->count() > 0)
                                            @foreach ($notifications as $notification)
                                                {{-- <div class="icon-box md bg-info rounded-circle me-3">
                                            <span class="fw-bold fs-6 text-white">DS</span>
                                        </div> --}}
                                                <div class="m-0">
                                                    <a href="{{ $notification->data['url'] }}">
                                                        <h6 class="mb-1 fw-semibold">{{ $notification->data['name'] }}</h6>
                                                    </a>
                                                    <p class="mb-1">
                                                        {{ $notification->data['noti-msg'] }}
                                                    </p>
                                                    <p class="small m-0 opacity-50">
                                                        {{ date('j M Y, g:i A', strtotime($notification->created_at)) }}
                                                    </p>
                                                </div>
                                                <hr>
                                            @endforeach
                                            {{-- <a href="#" class="dropdown-item" id="mark-all">
                                                    Mark all as read
                                                </a> --}}
                                        @else
                                            <div id="result==" class="pt-3">
                                                There are no new notifications
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Alert list ends -->
                            </div>
                            <!-- Scroll ends -->

                            <!-- View all button starts -->
                            <div class="d-grid m-3">
                                <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                            </div>
                            <!-- View all button ends -->
                        </div>
                    </div>
                    <!-- Notifications dropdown ends -->
                </div>
                <!-- Header actions ends -->

                <!-- Header user settings starts -->
                <div class="dropdown ms-2">
                    <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar-box">
                            <i class="ri-user-2-fill"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow-lg">
                        <div class="px-3 py-2">
                            {{-- <span class="small">Admin</span> --}}
                            <h6 class="m-0">{{ Auth::user()->name }}</h6>
                        </div>
                        <div class="mx-3 my-2 d-grid">
                            <a href="{{ route('tenant.profile.edit') }}" class="">Profile</a>
                        </div>
                        <div class="mx-3 my-2 d-grid">
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- Header user settings ends -->
            </div>
            <!-- App header actions ends -->
        </div>
        <!-- App header ends -->

        <!-- Main container starts -->
        <div class="main-container">
            <!-- Sidebar wrapper starts -->
            <nav id="sidebar" class="sidebar-wrapper">
                <!-- Sidebar profile starts -->
                <div class="sidebar-profile">
                    <div class="m-0">
                        <h5 class="mb-1 profile-name text-nowrap text-truncate">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="m-0 small profile-name text-nowrap text-truncate">
                            Hospital Dashboard
                            {{-- {{ Auth::user()->roles[0]->name }} --}}
                        </p>
                    </div>
                </div>
                <!-- Sidebar profile ends -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        {{-- <li class="active current-page">
                            <a href="index.html">
                                <i class="ri-home-6-line"></i>
                                <span class="menu-text">Hospital Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="dashboard2.html">
                                <i class="ri-home-smile-2-line"></i>
                                <span class="menu-text">Medical Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="ri-user-6-line"></i>
                                <span class="menu-text">Users</span>
                            </a>
                        </li> --}}

                        @can('role-read')
                            <li
                                @if ($page == 'roles.index' || $page == 'permissions.index') class="treeview active current-page" @else class="treeview" @endif>
                                <a href="#!">
                                    <i class="ri-lock-line"></i>
                                    <span class="menu-text">Authorization</span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="{{ route('roles.index') }}"
                                            @if ($page == 'roles.index') class="active-sub" @endif>
                                            Roles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('permissions.index') }}"
                                            @if ($page == 'permissions.index') class="active-sub" @endif>
                                            Permissions
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('user-read')
                            <li @if ($page == 'users.index') class="active current-page" @endif>
                                <a href="{{ route('users.index') }}">
                                    <i class="ri-user-3-line"></i>
                                    <span class="menu-text">Users List</span>
                                </a>
                            </li>
                        @endcan

                        @can('appointment-read')
                            <li @if ($page == 'appointments.index') class="active current-page" @endif>
                                <a href="{{ route('appointments.index') }}">
                                    <i class="ri-calendar-2-line"></i>
                                    <span class="menu-text">Appointments</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </div>
                <!-- Sidebar menu ends -->
            </nav>
            <!-- Sidebar wrapper ends -->

            @yield('content')



        </div>
        <!-- Main container ends -->
    </div>
    <!-- Page wrapper ends -->
    

    <!-- *************
   ************ JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/moment.min.js') }}"></script>

    <!-- *************
   ************ Vendor Js Files *************
  ************* -->

    <!-- Overlay Scroll JS -->
    <script src="{{ url('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ url('assets/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

    <!-- Apex Charts -->
    {{-- <script src="{{ url('assets/vendor/apex/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/vendor/apex/custom/home/patients.js') }}"></script>
    <script src="{{ url('assets/vendor/apex/custom/home/treatment.js') }}"></script>
    <script src="{{ url('assets/vendor/apex/custom/home/available-beds.js') }}"></script>
    <script src="{{ url('assets/vendor/apex/custom/home/earnings.js') }}"></script>
    <script src="{{ url('assets/vendor/apex/custom/home/gender-age.js') }}"></script>
    <script src="{{ url('assets/vendor/apex/custom/home/claims.js') }}"></script> --}}

    <!-- Custom JS files -->
    <script src="{{ url('assets/js/custom.js') }}"></script>

    @yield('scripts')
</body>

</html>
