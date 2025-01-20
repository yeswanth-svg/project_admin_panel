<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Admin')</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{assert('img/kaiadmin/favicon.ico')}}" type="image/x-icon" />



    <!-- Fonts and icons -->
    <script src="{{asset('js/admin/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{asset('css/admin/fonts.min.css')}}"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <script src="{{asset('js/admin/core/jquery-3.7.1.min.js')}}"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/kaiadmin.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/demo.css')}}" />
  


    <!-- Add these to your main layout (e.g., app.blade.php) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>





</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="{{route('admin.dashboard')}}" class="logo">
                        <img src="{{asset('images/kaiadmin/logo_dark.svg')}}" alt="navbar brand" class="navbar-brand"
                            height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="#dashboard">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>

                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Desgin Section</h4>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.carousel.index')}}">
                                <i class="fas fa-images"></i>
                                <p>Header Section</p>
                                <!-- <span class="caret"></span> -->
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.about_us.edit', 1)}}">
                                <i class="fas fa-info-circle"></i>
                                <p>About Us Section</p>
                                <!-- <span class="caret"></span> -->
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.products.index')}}">
                                <i class="fas fa-concierge-bell"></i>
                                <p>Products Section</p>

                            </a>

                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.content.index')}}">
                                <i class="fas fa-edit"></i>
                                <p>Content Management Section</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.testimonials.index')}}">
                                <i class="fas fa-comment-dots"></i>
                                <p>Testimonials Section</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.team.index')}}">
                                <i class="fas fa-users"></i>
                                <p>Team Members Section</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="{{route('admin.dashboard')}}" class="logo">
                            <img src="{{asset('images/kaiadmin/logo_light.svg')}}" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{asset('img/mlane.jpg')}}" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">Hizrian</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="{{asset('images/profile.jpg')}}" alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>Hizrian</h4>
                                                    <p class="text-muted">hello@example.com</p>
                                                    <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">My Profile</a>
                                            <a class="dropdown-item" href="#">My Balance</a>
                                            <a class="dropdown-item" href="#">Inbox</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Account Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <!-- End Sidebar -->
            @yield('content')
        </div>

    </div>




    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Success notification
            @if(session('success'))
                var content = {
                    message: "{{ session('success') }}",
                    title: "Success",
                    icon: "fa fa-bell"
                };

                $.notify(content, {
                    type: 'success', // You can change this to match your notification type
                    placement: {
                        from: 'top', // Correct capitalization
                        align: 'right' // Correct capitalization
                    },
                    time: 1000,
                    delay: 5000, // Adjust delay if needed
                });
            @endif


            // Error notification
            @if($errors->any())
                var content = {
                    message: "{{ $errors->first() }}",
                    title: "Error",
                    icon: "fa fa-exclamation-circle",
                };

                $.notify(content, {
                    type: "danger", // Error style
                    allow_dismiss: true,
                    delay: 5000,
                    placement: {
                        from: "top",
                        align: "right",
                    },
                    offset: { x: 20, y: 70 },
                    animate: {
                        enter: "animated fadeInDown",
                        exit: "animated fadeOutUp",
                    },
                });
            @endif

        });
    </script>


    <!--   Core JS Files   -->


    <script src="{{asset('js/admin/core/popper.min.js')}}"></script>
    <script src="{{asset('js/admin/core/bootstrap.min.js')}}"></script>
   
    <!-- jQuery Scrollbar -->
    <script src="{{asset('js/admin/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('js/admin/plugin/chart.js/chart.min.js')}}"></script>


    <!-- Chart Circle -->
    <script src="{{asset('js/admin/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('js/admin/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('js/admin/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>


    <!-- Sweet Alert -->
    <script src="{{asset('js/admin/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('js/admin/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset('js/admin/setting-demo.js')}}"></script>
    <script src="{{asset('js/admin/demo.js')}}"></script>


</body>

</html>