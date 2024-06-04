<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php
    include 'connect.php';
    include 'links.php';
    ?>

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <a href="index.html">
                            <img src="assets/images/SHOOL.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left me-auto ms-3 ps-1"> </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">Admin</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="power" class="svg-icon me-2 ms-1"></i>
                                    Logout</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <div class="left-sidebar" data-sidebarbg="skin6">
            <?php include 'sidebar.php' ?>
        </div>
        <div class="page-wrapper">
            <div class="page-breadcrumb">             
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        Institute of Aquatic Applied Sciences
                                    </h4>
                                    <div id="columnchart_material_small" class="text-center">
                                        <div class="container-fluid">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <img src="image/IAAS.png" alt="IAAS" class="h-75 w-75">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline text-center mt-5 mb-2">
                                        <li class="list-inline-item text-muted fst-italic"><a href="iaas.php">IAAS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        Institute of Computing
                                    </h4>
                                    <div id="columnchart_material_small" class="text-center">
                                        <div class="container-fluid">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <img src="image/IC.png" alt="IC" class="w-50 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline text-center mt-5 mb-2">
                                        <li class="list-inline-item text-muted fst-italic"><a href="ic.php">IC</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        Institute of Leadership, Entreprenurship and Good Governance
                                    </h4>
                                    <div id="columnchart_material_small" class="text-center">
                                        <div class="container-fluid">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <img src="image/ILEGG.png" alt="IAAS" class="w-50 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline text-center mt-5 mb-2">
                                        <li class="list-inline-item text-muted fst-italic"><a href="ilegg.php">ILEGG</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        Institute of Teacher Education
                                    </h4>
                                    <div id="columnchart_material_small" class="text-center">
                                        <div class="container-fluid">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <img src="image/ITED.png" alt="IC" class="w-50 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline text-center mt-5 mb-2">
                                        <li class="list-inline-item text-muted fst-italic"><a href="ited.php">ITED</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center text-muted">
        All Rights Reserved 2024, Google Charts.
    </footer>
    </div>
    </div>

</body>

</html>