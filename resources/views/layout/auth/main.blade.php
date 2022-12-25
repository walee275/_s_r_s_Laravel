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

    <nav class="sb-topnav navbar navbar-expand navbar-danger bg-dark " id="">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 fw-bold text-danger fs-3" href="#">@yield('student')</a>


        <div class="d-flex justtify-content-between mx-auto order-2">
    </nav>
    </div>
    <div id="layoutSidenav" class="mb-auto">

        </div>

        <div id="layoutSidenav_content" class="p-5">
            <main>
                <div class="container-fluid px-4" id="data-container">

                    @yield('contents')
            </main>

<script src="{{ asset('template/bootstrap.js') }}"></script>
</body>
