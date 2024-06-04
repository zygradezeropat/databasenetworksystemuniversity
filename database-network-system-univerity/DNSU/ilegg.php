<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'studentmanagement');
    if (mysqli_connect_errno()) {
        die("Failed to connect with MySQL: " . mysqli_connect_error());
    }
    include 'links.php';
    ?>

    <style>
        a {
            text-decoration: none;
        }
     
    </style>
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
                        <a href="index.php">
                            <img src="assets/images/SHOOL.png" alt="DNSU" class="img-fluid">
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
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="power" class="svg-icon me-2 ms-1"></i> Logout</a>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        Institute of Leadership, Entrepreneurship and Good Governance
                                    </h4>
                                    <h6 class="card-title text-center">Programs</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card border-end">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="text-dark">Bachelor of Science in Disaster Resilience and Management</h6>
                                                            <div class="d-inline-flex align-items-center">
                                                                <h2 class="text-dark mb-1 font-weight-medium">
                                                                    <?php echo $conn->query("SELECT * FROM students WHERE program_id = 8")->num_rows; ?>
                                                                </h2>
                                                            </div>
                                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">out of 250 students</h6>
                                                        </div>
                                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card border-end">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="text-dark">Bachelor of Science in Entrepreneurship</h6>
                                                            <div class="d-inline-flex align-items-center">
                                                                <h2 class="text-dark mb-1 font-weight-medium">
                                                                    <?php echo $conn->query("SELECT * FROM students WHERE program_id = 9")->num_rows; ?>
                                                                </h2>
                                                            </div>
                                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">out of 200 students</h6>
                                                        </div>
                                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card border-end">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="text-dark">Bachelor of Science in Public Administration</h6>
                                                            <div class="d-inline-flex align-items-center">
                                                                <h2 class="text-dark mb-1 font-weight-medium">
                                                                    <?php echo $conn->query("SELECT * FROM students WHERE program_id = 7")->num_rows; ?>
                                                                </h2>
                                                            </div>
                                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">out of 200 students</h6>
                                                        </div>
                                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card border-end">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="text-dark">Bachelor of Science in Social Work</h6>
                                                            <div class="d-inline-flex align-items-center">
                                                                <h2 class="text-dark mb-1 font-weight-medium">
                                                                    <?php echo $conn->query("SELECT * FROM students WHERE program_id = 10")->num_rows; ?>
                                                                </h2>
                                                            </div>
                                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">out of 200 students</h6>
                                                        </div>
                                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="card border-end">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="text-dark">Bachelor of Science in Tourism Management</h6>
                                                            <div class="d-inline-flex align-items-center">
                                                                <h2 class="text-dark mb-1 font-weight-medium">
                                                                    <?php echo $conn->query("SELECT * FROM students WHERE program_id = 11")->num_rows; ?>
                                                                </h2>
                                                            </div>
                                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">out of 200 students</h6>
                                                        </div>
                                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                       
                                        </div>
                                    </div>
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
    
</body>
</html>
