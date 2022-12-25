<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('template/style.css') }}">
    <link href="{{ asset('template/custome_styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>





<body class="sb-nav-fixed" id="body">

    <nav class="sb-topnav navbar navbar-expand navbar-danger  " id="my-nav">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 fw-bold text-danger fs-3" href="#">Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-info" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <div class="d-flex justtify-content-between mx-auto order-2">
            <!-- Navbar Search-->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 text-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-info"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
    </nav>
    </div>
    <div id="layoutSidenav" class="mb-auto">

        <div id="layoutSidenav_nav" class=" shadow myside-nav">
            <nav class="sb-sidenav accordion sb-sidenav-info " id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav fs-5 ">
                        <div class="sb-sidenav-menu-heading"> </div>
                        <a class="nav-link text-info" href="" id="books-data">
                            <div class="sb-nav-link-icon text-danger"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <hr class="bg-danger">

                        <a class="nav-link text-info" href="" type="button" id="users-data" onclick="">
                            <div class="sb-nav-link-icon text-danger"><i class="fa-solid fa-users"></i></div>
                            Users Data
                        </a>
                        <a class="nav-link text-info" href="{{ route('admin.courses') }}" type="button" id="registered-students-data" onclick="">
                            <div class="sb-nav-link-icon text-danger"><i class="fa-solid fa-registered"></i></div>
                            Courses
                        </a>
                        <a class="nav-link text-info" href="{{ route('admin.students') }}" type="button" id="students-data" onclick="">
                            <div class="sb-nav-link-icon text-danger"><i class="fa-solid fa-users"></i></div>
                            Students Data
                        </a>
                        <a class="nav-link text-info" href="{{ route('admin.registerations') }}" type="button" id="registered-students-data" onclick="">
                            <div class="sb-nav-link-icon text-danger"><i class="fa-solid fa-registered"></i></div>
                            Registered Students
                        </a>

                        <hr class="bg-danger">




                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer bg-transparent  text-danger  text-center fw-bold fs-4">
                    <u>Admin</u>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main class="bg-white">
                <div class="container-fluid bg-white px-4" id="data-container">
                    <h1 class="mt-4">@yield('section-title')</h1>

                    @yield('contents')
                </div>
            </main>

<script src="{{ asset('template/bootstrap.js') }}"></script>
</body>
