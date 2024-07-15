<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- App css -->
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>
<body data-menu-color="dark" data-sidebar="default">

    @yield('content')


    <!-- Left Sidebar Start -->
    <div class="app-sidebar-menu">
        <div class="h-100" data-simplebar>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <div class="logo-box">
                    <a class='logo logo-light' href='index.html'>
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="/assets/images/logo-light.png" alt="" height="24">
                        </span>
                    </a>
                    <a class='logo logo-dark' href='index.html'>
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="/assets/images/logo-dark.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul id="side-menu">

                    <li class="menu-title">Menu</li>

                    <li>
                        <a href='index.html'>
                            <i data-feather="home"></i>
                            <span class="badge bg-success rounded-pill float-end">9+</span>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="menu-title">Pages</li>

                    <li>
                        <a href="#sidebarExpages" data-bs-toggle="collapse">
                            <i data-feather="file-text"></i>
                            <span> Admin </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarExpages">
                            <ul class="nav-second-level">
                                <li>
                                    <a href='/admin/permission'>Permmision</a>
                                </li>
                                <li>
                                    <a href='/admin/roles'>Roles</a>
                                </li>
                                <li>
                                    <a href='/admin/users'>User Management</a>
                                </li>
                                <li>
                                    <a href='/logout'>
                                        <span> Logout </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- Left Sidebar End -->




        <!-- Vendor -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="/assets/libs/feather-icons/feather.min.js"></script>

        <!-- Apexcharts JS -->
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Boxplot Charts Init Js -->
        <script src="/assets/js/pages/apexcharts-pie.init.js"></script>

        <!-- App js-->
        <script src="/assets/js/app.js"></script>
</body>
</html>
