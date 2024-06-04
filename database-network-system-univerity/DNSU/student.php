<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'studentmanagement');
    if (mysqli_connect_errno()) {
        die("Failed to connect with MySQL: " . mysqli_connect_error());
    }
    include('links.php');
    ?>

    <style>
        a {
            text-decoration: none;
        }

        .table-wrapper {
            overflow-y: auto;
            max-height: 230px;
        }

        .hidethis {
            display: none;
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

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editForm" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content p-md-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="edit_student.php" method="POST">
                                    <input type="hidden" id="edit_id" name="edit_id">
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname" name="fname" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="mname" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="mname" name="mname">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname" name="lname" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="sex" class="form-label">Sex</label>
                                            <select name="sex" class="form-control" id="sex">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="program" class="form-label">Program</label>
                                            <select name="program" class="form-control" id="program">
                                                <option value="1">Bachelor of Science in Fisheries and Aquatic Sciences</option>
                                                <option value="2">Bachelor of Science in Marine Biology</option>
                                                <option value="3">Bachelor of Science in Food Technology</option>
                                                <option value="4">Bachelor of Science in Agroforestry</option>
                                                <option value="5">Bachelor of Science in Information Technology</option>
                                                <option value="6">Bachelor of Science in Information Systems</option>
                                                <option value="7">Bachelor of Science in Public Administration</option>
                                                <option value="8">Bachelor of Science in Disaster Resilience and Management</option>
                                                <option value="9">Bachelor of Science in Entrepreneurship</option>
                                                <option value="10">Bachelor of Science in Social Work</option>
                                                <option value="11">Bachelor of Science in Tourism Management</option>
                                                <option value="12">Bachelor of Arts in Communication</option>
                                                <option value="13">Bachelor of Secondary Education Major in English</option>
                                                <option value="14">Bachelor of Secondary Education Major in Mathematics</option>
                                                <option value="15">Bachelor of Technology and Livelihood Education</option>
                                                <option value="16">Bachelor of Secondary Education Major in Science</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="year" class="form-label">Year Level</label>
                                            <select name="year" class="form-control" id="year">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="barangay" class="form-label">Barangay</label>
                                            <input type="text" class="form-control" id="barangay" name="barangay" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="municipality" class="form-label">Municipality/City</label>
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="province" class="form-label">Province</label>
                                            <input type="text" class="form-control" id="province" name="province" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="date" class="form-label">Date Enrolled</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="status" class="form-label">Admission Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="Old">Old</option>
                                                <option value="New">New</option>
                                            </select>
                                        </div>
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





                <!--ADD STUDENT-->

                <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content p-md-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="add_student.php" method="POST">
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname" name="fname" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="mname" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="mname" name="mname">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname" name="lname" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="sex" class="form-label">Sex</label>
                                            <select name="sex" class="form-control" id="sex">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="program" class="form-label">Program</label>
                                            <select name="program" class="form-control" id="program">
                                                <option value="1">Bachelor of Science in Fisheries and Aquatic Sciences</option>
                                                <option value="2">Bachelor of Science in Marine Biology</option>
                                                <option value="3">Bachelor of Science in Food Technology</option>
                                                <option value="4">Bachelor of Science in Agroforestry</option>
                                                <option value="5">Bachelor of Science in Information Technology</option>
                                                <option value="6">Bachelor of Science in Information Systems</option>
                                                <option value="7">Bachelor of Science in Public Administration</option>
                                                <option value="8">Bachelor of Science in Disaster Resilience and Management</option>
                                                <option value="9">Bachelor of Science in Entrepreneurship</option>
                                                <option value="10">Bachelor of Science in Social Work</option>
                                                <option value="11">Bachelor of Science in Tourism Management</option>
                                                <option value="12">Bachelor of Arts in Communication</option>
                                                <option value="13">Bachelor of Secondary Education Major in English</option>
                                                <option value="14">Bachelor of Secondary Education Major in Mathematics</option>
                                                <option value="15">Bachelor of Technology and Livelihood Education</option>
                                                <option value="16">Bachelor of Secondary Education Major in Science</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="year" class="form-label">Year Level</label>
                                            <select name="year" class="form-control" id="year">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="barangay" class="form-label">Barangay</label>
                                            <input type="text" class="form-control" id="barangay" name="barangay" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="municipality" class="form-label">Municipality/City</label>
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="province" class="form-label">Province</label>
                                            <input type="text" class="form-control" id="province" name="province" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="date" class="form-label">Date Enrolled</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="status" class="form-label">Admission Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="Old">Old</option>
                                                <option value="New">New</option>
                                            </select>
                                        </div>
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Renter -->
                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="delete_student.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <input type="hidden" name="delete_id" id="delete_id">

                                <div class="modal-body" id="mbody">
                                    Do you want to delete this data?
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="delete_student">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <center><button type="button" class="btn btn-primary mx-auto d-block" data-bs-toggle="modal" data-bs-target="#modalForm">
                                                Add Student
                                            </button></center>
                                    </h4>
                                    <div id="columnchart_material_small" style="width: 100%; height: 300px;">
                                        <div class="container-fluid">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div id="report">

                                                                <div class="col-md-12 mb-3">
                                                                    <input type="text" id="myInput" class="form-control" placeholder="Search" onkeyup="myFunction()">
                                                                </div>
                                                                <p>
                                                                    <center>All students</center>
                                                                </p>

                                                                <div class="row table-wrapper">

                                                                    <table class="table table-bordered" id="myTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Name</th>
                                                                                <th>Course</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php

                                                                            $i = 1;
                                                                            $allstudent = $conn->query("SELECT program_description, students.`student_id`, `first_name`, `last_name`, `m_name`, `program_id`, `year_level`, `sex`, `barangay`, `municipality_city`, `province`, `email_add`, `date_enrolled`, `admission_stat`, `Name`
                                                                            FROM students
                                                                            JOIN all_student ON students.student_id = all_student.student_id;
                                                                            ");
                                                                           
                                                                            while ($row = $allstudent->fetch_assoc()) :

                                                                            ?>
                                                                                <tr>
                                                                                    <td class=""><p><b><?php echo ucwords($row['student_id']) ?></b></p></td>
                                                                                    <td><p><b><?php echo ucwords($row['Name']) ?></b></p></td>
                                                                                    <td><?php echo $row['program_description'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['first_name'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['m_name'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['last_name'] ?></td>
                                                                                    <td class="hidethis"><?php echo ucwords($row['sex']) ?></td>
                                                                                    <td class="hidethis"><?php echo $row['program_id'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['year_level'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['barangay'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['municipality_city'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['province'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['email_add'] ?></td>
                                                                                    <td class="hidethis"><?php echo $row['date_enrolled'] ?></td>
                                                                                    <td class="hidethis"><?php echo ucwords($row['admission_stat']) ?></td>                                                                        
                                                                                    <td class="text-center">
                                                                                        <button class="btn btn-sm btn-outline-primary editbtn" type="button">Edit</button>
                                                                                        <button class="btn btn-sm btn-outline-danger deleteBtn"> Delete</button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endwhile;
                                                                             ?>

                                                                                

                                                                        </tbody>
                                                                        <tfoot>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline text-center mt-5 mb-2">
                                        <li class="list-inline-item text-muted fst-italic">Students throughout the years</li>
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

<script>
    function myFunction() {

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");


        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    $('.deleteBtn').on('click', function() {
        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);


        $('#delete_id').val(data[0]);


        $('#mbody').text("Are you sure you want to delete " + data[1] + "?");

    });
</script>



<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editModal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);

            $('#edit_id').val(data[0]);
            $('#fname').val(data[3]);
            $('#lname').val(data[5]);
            $('#mname').val(data[4]);
            $('#sex').val(data[6]);
            $('#program').val(data[7]);
            $('#year').val(data[8]);
            $('#barangay').val(data[9]);
            $('#city').val(data[10]);
            $('#province').val(data[11]);
            $('#email').val(data[12]);
            $('#date').val(data[13]);
            $('#status').val(data[14]);
            
         



        });
    });
</script>