<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php
    include('connect.php');
    include('links.php');
    ?>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Institute', 'totalStudents'],
                <?php
                $sql = "SELECT * FROM institutes";
                $fire = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_assoc($fire)) {
                    echo "['" . $result['institute_name'] . "'," . $result['totalStudents'] . "],";
                }
                ?>
            ]);
            var options = {
                title: 'Population',
                is3D: true,
                width: 500,
                height: 250
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Male', 'Female'],
                <?php
                for ($year = 2020; $year <= 2023; $year++) {
                    $start_date = $year . "-01-01";
                    $end_date = $year . "-12-31";
                    $female_query = "SELECT COUNT(sex) as Female, COALESCE(YEAR(date_enrolled), $year) as Yr FROM students 
                            WHERE date_enrolled BETWEEN '$start_date' AND '$end_date' AND sex = 'Female'";
                    $female_result = $conn->query($female_query);
                    $resultF = $female_result->fetch_assoc();
                    $male_query = "SELECT COUNT(sex) as Male, COALESCE(YEAR(date_enrolled), $year) as Yr
                            FROM students 
                            WHERE date_enrolled BETWEEN '$start_date' AND '$end_date' AND sex = 'Male'";
                    $male_result = $conn->query($male_query);
                    $resultM = $male_result->fetch_assoc();
                    echo "[ '" . $year . "', " . $resultM['Male'] . ", " . $resultF['Female'] . "],";
                }
                ?>
            ]);
            var options = {
                chart: {
                    title: 'Students throughout Years (By Gender)',
                    subtitle: 'SY 2020-2023',
                    width: 400,
                    height: 250
                }
            };
            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Year', 'Total'],
                <?php
                $sql = "SELECT * FROM `total_students_peryear_level`";
                $fire = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_assoc($fire)) {
                    echo "['" . $result['year_level'] . "'," . $result['total_students'] . "],";
                } ?>
            ]);

            var options = {
                width: 550,
                height: 300,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: ' ',
                    subtitle: 'Total Students'
                },
                axes: {
                    x: {
                        0: {
                            side: 'top',
                            label: 'Year Level'
                        }
                    }
                },
                bar: {
                    groupWidth: "90%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Total'],
                <?php
                $sql = "SELECT * FROM `students_per_year`";
                $fire = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_assoc($fire)) {
                    echo "['" . $result['enrollment_year'] . "'," . $result['total_students'] . "],";
                } ?>
            ]);

            var options = {
                title: ' ',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>


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
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Day</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-end">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                <?php echo $conn->query("SELECT * FROM students")->num_rows
                                                ?></h2>
                                            <span class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">
                                                <?php $sql = " SELECT * FROM `student_enrolled_percentage`";
                                                $fire = mysqli_query($conn, $sql);
                                                $result = mysqli_fetch_assoc($fire);
                                                echo $result['2022to2023'] ?>% as of 2023</span>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Students
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                                            <?php echo $conn->query("SELECT * FROM institutes")->num_rows
                                            ?></h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Institutes
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="code"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                <?php echo $conn->query("SELECT * FROM students WHERE admission_stat = 'New'")->num_rows
                                                ?>
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Students
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                            <?php echo $conn->query("SELECT * FROM students WHERE admission_stat = 'Old'")->num_rows
                                            ?></h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Old Students
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">Population per Institutes</h4>
                                </div>
                                <!-- PIECHART -->
                                <div id="piechart_3d" style="height:250px; width:600px;">
                                </div>
                                <ul class="list-style-none mb-0">
                                    <li>
                                        <i class="fas fa-circle text-primary font-10 me-2"></i>
                                        <and class="text-muted">Institute of Computing</span>
                                            <span class="text-dark float-end font-weight-medium">
                                                <?php $sql = "SELECT * FROM institutes";
                                                $fire = mysqli_query($conn, $sql);
                                                $result = mysqli_fetch_assoc($fire);
                                                if ($result['institute_id'] == 1) {
                                                    echo "" . $result['totalStudents'] . "";
                                                }
                                                ?></span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-danger font-10 me-2"></i>
                                        <span class="text-muted">Institute of Leadership, Entrepreneurship, and Good Gov.</span>
                                        <span class="text-dark float-end font-weight-medium">
                                            <?php $sql = "SELECT * FROM institutes";
                                            $fire = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($fire)) {
                                                if ($result['institute_id'] == 2) {
                                                    echo "" . $result['totalStudents'] . "";
                                                }
                                            } ?></span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-warning font-10 me-2"></i>
                                        <span class="text-muted">Institute of Aquatic Applied Sciences</span>
                                        <span class="text-dark float-end font-weight-medium">
                                            <?php $sql = "SELECT * FROM institutes";
                                            $fire = mysqli_query($conn, $sql);

                                            while ($result = mysqli_fetch_assoc($fire)) {
                                                if ($result['institute_id'] == 3) {
                                                    echo "" . $result['totalStudents'] . "";
                                                }
                                            } ?></span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-success font-10 me-2"></i>
                                        <span class="text-muted">Institute of Teacher Education</span>
                                        <span class="text-dark float-end font-weight-medium">
                                            <?php $sql = "SELECT * FROM institutes";
                                            $fire = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_assoc($fire)) {
                                                if ($result['institute_id'] == 4) {
                                                    echo "" . $result['totalStudents'] . "";
                                                }
                                            }
                                            ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Students</h4>
                                <!--BAR CHART-->
                                <div id="columnchart_material" style="height: 300px"></div>
                                <ul class="list-inline text-center mt-5 mb-2">
                                    <li class="list-inline-item text-muted fst-italic">Students throughout the years</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">Population per Institutes</h4>
                                </div>
                                <!-- Bar -->
                                <div id="top_x_div" style="height: 300px;"></div>
                                <ul class="list-inline text-center mt-5 mb-2">
                                    <li class="list-inline-item text-muted fst-italic">Students per year level as 2023</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Students</h4>

                                <!--Line Chart-->
                                <div id="curve_chart" style="height: 300px"></div>
                                <ul class="list-inline text-center mt-5 mb-2">
                                    <li class="list-inline-item text-muted fst-italic">Students throughout the years</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Top Program Enrolled per Institute</h4>
                                    <div class="ms-auto">
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Institute</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Course</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Total Enrollees</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-top-0 px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img src="image/IC.png" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Institute of Computing</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID =  1;");
                                                    if ($result) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            if ($row['Program'] >= 2) {
                                                                echo $row['Program'] . "<br>";
                                                            } else if ($row == null) {
                                                                echo "N/A";
                                                            } else {
                                                                echo $row['Program'] . "<br>";
                                                            }
                                                        }
                                                    } else {
                                                        echo 'Query failed: ' . $conn->error;
                                                    }
                                                    ?></td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID =  1;");
                                                    $row = mysqli_fetch_assoc($result);
                                                    if ($row == null) {
                                                        echo '0';
                                                    } else {
                                                        echo $row['Current_Enrolled'];
                                                    }   ?></td>
                                            </tr>
                                            <tr>
                                                <td class="border-top-0 px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img src="image/ILEGG.png" alt="user" class="rounded-circle" width="50" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Institute of Leadership, Entrepreneurship, and Good Governance</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID = 2");

                                                    if ($result) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            if ($row['Program'] >= 2) {
                                                                echo $row['Program'] . "<br>";
                                                            } else if ($row == null) {
                                                                echo "N/A";
                                                            } else {
                                                                echo $row['Program'] . "<br>";
                                                            }
                                                        }
                                                    } else {
                                                        echo 'Query failed: ' . $conn->error;
                                                    }
                                                    ?></td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID = 2;");
                                                    $row = mysqli_fetch_assoc($result);
                                                    if ($row == null) {
                                                        echo '0';
                                                    } else {
                                                        echo $row['Current_Enrolled'];
                                                    }

                                                    ?><br></td>
                                            </tr>
                                            <tr>
                                                <td class="border-top-0 px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img src="image/IAAS.png" alt="user" class="rounded-circle" width="50" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Institute of Aquatic Applied Sciences</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID = 3");
                                                    if ($result) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            if ($row['Program'] >= 2) {
                                                                echo $row['Program'] . "<br>";
                                                            } else if ($row == null) {
                                                                echo "N/A";
                                                            } else {
                                                                echo $row['Program'] . "<br>";
                                                            }
                                                        }
                                                    } else {
                                                        echo 'Query failed: ' . $conn->error;
                                                    }
                                                    ?></td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID = 3");
                                                    $row = mysqli_fetch_assoc($result);
                                                    if ($row == null) {
                                                        echo '0';
                                                    } else {
                                                        echo $row['Current_Enrolled'];
                                                    }
                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <td class="border-top-0 px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="me-3"><img src="image/ITED.png" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Institute of Teacher Education</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID =  4;");
                                                    if ($result) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            if ($row['Program'] >= 2) {
                                                                echo $row['Program'] . "<br>";
                                                            } else if ($row == null) {
                                                                echo "N/A";
                                                            } else {
                                                                echo $row['Program'] . "<br>";
                                                            }
                                                        }
                                                    } else {
                                                        echo 'Query failed: ' . $conn->error;
                                                    }
                                                     ?></td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM top_enrolled_program_per_institute WHERE ID = 4;");
                                                    $row = mysqli_fetch_assoc($result);
                                                    if ($row == null) {
                                                        echo '0';
                                                    } else {
                                                        echo $row['Current_Enrolled'];
                                                    }
                                                    ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
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