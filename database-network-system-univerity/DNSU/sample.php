<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'studentmanagement');
    if (mysqli_connect_errno()) {
        die("Failed to connect with MySQL: " . mysqli_connect_error());
    }

    ?>

    <style>
        a {
            text-decoration: none;
        }

        .table-wrapper {
            overflow-y: auto;
            max-height: 230px;
        }
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
        
    


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

                                                                    <table id="exampleTable" class="table table-striped table-bordered" style="width: 70%">
                                                                        <thead id="thead">
                                                                            <tr style="background-color: #1573ff">
                                                                                <th>Name</th>
                                                                                <th>Position</th>
                                                                                <th>Office</th>
                                                                                <th>Age</th>
                                                                                <th>Start date</th>
                                                                                <th>Salary</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Tiger Nixon</td>
                                                                                <td>System Architect</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>61</td>
                                                                                <td>2011/04/25</td>
                                                                                <td>$320,800</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Garrett Winters</td>
                                                                                <td>Accountant</td>
                                                                                <td>Tokyo</td>
                                                                                <td>63</td>
                                                                                <td>2011/07/25</td>
                                                                                <td>$170,750</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Ashton Cox</td>
                                                                                <td>Junior Technical Author</td>
                                                                                <td>San Francisco</td>
                                                                                <td>66</td>
                                                                                <td>2009/01/12</td>
                                                                                <td>$86,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Cedric Kelly</td>
                                                                                <td>Senior Javascript Developer</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>22</td>
                                                                                <td>2012/03/29</td>
                                                                                <td>$433,060</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Airi Satou</td>
                                                                                <td>Accountant</td>
                                                                                <td>Tokyo</td>
                                                                                <td>33</td>
                                                                                <td>2008/11/28</td>
                                                                                <td>$162,700</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Brielle Williamson</td>
                                                                                <td>Integration Specialist</td>
                                                                                <td>New York</td>
                                                                                <td>61</td>
                                                                                <td>2012/12/02</td>
                                                                                <td>$372,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Herrod Chandler</td>
                                                                                <td>Sales Assistant</td>
                                                                                <td>San Francisco</td>
                                                                                <td>59</td>
                                                                                <td>2012/08/06</td>
                                                                                <td>$137,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Rhona Davidson</td>
                                                                                <td>Integration Specialist</td>
                                                                                <td>Tokyo</td>
                                                                                <td>55</td>
                                                                                <td>2010/10/14</td>
                                                                                <td>$327,900</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Colleen Hurst</td>
                                                                                <td>Javascript Developer</td>
                                                                                <td>San Francisco</td>
                                                                                <td>39</td>
                                                                                <td>2009/09/15</td>
                                                                                <td>$205,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sonya Frost</td>
                                                                                <td>Software Engineer</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>23</td>
                                                                                <td>2008/12/13</td>
                                                                                <td>$103,600</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jena Gaines</td>
                                                                                <td>Office Manager</td>
                                                                                <td>London</td>
                                                                                <td>30</td>
                                                                                <td>2008/12/19</td>
                                                                                <td>$90,560</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Quinn Flynn</td>
                                                                                <td>Support Lead</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>22</td>
                                                                                <td>2013/03/03</td>
                                                                                <td>$342,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Charde Marshall</td>
                                                                                <td>Regional Director</td>
                                                                                <td>San Francisco</td>
                                                                                <td>36</td>
                                                                                <td>2008/10/16</td>
                                                                                <td>$470,600</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Haley Kennedy</td>
                                                                                <td>Senior Marketing Designer</td>
                                                                                <td>London</td>
                                                                                <td>43</td>
                                                                                <td>2012/12/18</td>
                                                                                <td>$313,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tatyana Fitzpatrick</td>
                                                                                <td>Regional Director</td>
                                                                                <td>London</td>
                                                                                <td>19</td>
                                                                                <td>2010/03/17</td>
                                                                                <td>$385,750</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Michael Silva</td>
                                                                                <td>Marketing Designer</td>
                                                                                <td>London</td>
                                                                                <td>66</td>
                                                                                <td>2012/11/27</td>
                                                                                <td>$198,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Paul Byrd</td>
                                                                                <td>Chief Financial Officer (CFO)</td>
                                                                                <td>New York</td>
                                                                                <td>64</td>
                                                                                <td>2010/06/09</td>
                                                                                <td>$725,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Gloria Little</td>
                                                                                <td>Systems Administrator</td>
                                                                                <td>New York</td>
                                                                                <td>59</td>
                                                                                <td>2009/04/10</td>
                                                                                <td>$237,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Bradley Greer</td>
                                                                                <td>Software Engineer</td>
                                                                                <td>London</td>
                                                                                <td>41</td>
                                                                                <td>2012/10/13</td>
                                                                                <td>$132,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Dai Rios</td>
                                                                                <td>Personnel Lead</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>35</td>
                                                                                <td>2012/09/26</td>
                                                                                <td>$217,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jenette Caldwell</td>
                                                                                <td>Development Lead</td>
                                                                                <td>New York</td>
                                                                                <td>30</td>
                                                                                <td>2011/09/03</td>
                                                                                <td>$345,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Yuri Berry</td>
                                                                                <td>Chief Marketing Officer (CMO)</td>
                                                                                <td>New York</td>
                                                                                <td>40</td>
                                                                                <td>2009/06/25</td>
                                                                                <td>$675,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Caesar Vance</td>
                                                                                <td>Pre-Sales Support</td>
                                                                                <td>New York</td>
                                                                                <td>21</td>
                                                                                <td>2011/12/12</td>
                                                                                <td>$106,450</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Doris Wilder</td>
                                                                                <td>Sales Assistant</td>
                                                                                <td>Sydney</td>
                                                                                <td>23</td>
                                                                                <td>2010/09/20</td>
                                                                                <td>$85,600</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Angelica Ramos</td>
                                                                                <td>Chief Executive Officer (CEO)</td>
                                                                                <td>London</td>
                                                                                <td>47</td>
                                                                                <td>2009/10/09</td>
                                                                                <td>$1,200,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Gavin Joyce</td>
                                                                                <td>Developer</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>42</td>
                                                                                <td>2010/12/22</td>
                                                                                <td>$92,575</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jennifer Chang</td>
                                                                                <td>Regional Director</td>
                                                                                <td>Singapore</td>
                                                                                <td>28</td>
                                                                                <td>2010/11/14</td>
                                                                                <td>$357,650</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Brenden Wagner</td>
                                                                                <td>Software Engineer</td>
                                                                                <td>San Francisco</td>
                                                                                <td>28</td>
                                                                                <td>2011/06/07</td>
                                                                                <td>$206,850</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Fiona Green</td>
                                                                                <td>Chief Operating Officer (COO)</td>
                                                                                <td>San Francisco</td>
                                                                                <td>48</td>
                                                                                <td>2010/03/11</td>
                                                                                <td>$850,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Shou Itou</td>
                                                                                <td>Regional Marketing</td>
                                                                                <td>Tokyo</td>
                                                                                <td>20</td>
                                                                                <td>2011/08/14</td>
                                                                                <td>$163,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Michelle House</td>
                                                                                <td>Integration Specialist</td>
                                                                                <td>Sydney</td>
                                                                                <td>37</td>
                                                                                <td>2011/06/02</td>
                                                                                <td>$95,400</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Suki Burks</td>
                                                                                <td>Developer</td>
                                                                                <td>London</td>
                                                                                <td>53</td>
                                                                                <td>2009/10/22</td>
                                                                                <td>$114,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Prescott Bartlett</td>
                                                                                <td>Technical Author</td>
                                                                                <td>London</td>
                                                                                <td>27</td>
                                                                                <td>2011/05/07</td>
                                                                                <td>$145,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Gavin Cortez</td>
                                                                                <td>Team Leader</td>
                                                                                <td>San Francisco</td>
                                                                                <td>22</td>
                                                                                <td>2008/10/26</td>
                                                                                <td>$235,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Martena Mccray</td>
                                                                                <td>Post-Sales support</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>46</td>
                                                                                <td>2011/03/09</td>
                                                                                <td>$324,050</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Unity Butler</td>
                                                                                <td>Marketing Designer</td>
                                                                                <td>San Francisco</td>
                                                                                <td>47</td>
                                                                                <td>2009/12/09</td>
                                                                                <td>$85,675</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Howard Hatfield</td>
                                                                                <td>Office Manager</td>
                                                                                <td>San Francisco</td>
                                                                                <td>51</td>
                                                                                <td>2008/12/16</td>
                                                                                <td>$164,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Hope Fuentes</td>
                                                                                <td>Secretary</td>
                                                                                <td>San Francisco</td>
                                                                                <td>41</td>
                                                                                <td>2010/02/12</td>
                                                                                <td>$109,850</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Vivian Harrell</td>
                                                                                <td>Financial Controller</td>
                                                                                <td>San Francisco</td>
                                                                                <td>62</td>
                                                                                <td>2009/02/14</td>
                                                                                <td>$452,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Timothy Mooney</td>
                                                                                <td>Office Manager</td>
                                                                                <td>London</td>
                                                                                <td>37</td>
                                                                                <td>2008/12/11</td>
                                                                                <td>$136,200</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jackson Bradshaw</td>
                                                                                <td>Director</td>
                                                                                <td>New York</td>
                                                                                <td>65</td>
                                                                                <td>2008/09/26</td>
                                                                                <td>$645,750</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Olivia Liang</td>
                                                                                <td>Support Engineer</td>
                                                                                <td>Singapore</td>
                                                                                <td>64</td>
                                                                                <td>2011/02/03</td>
                                                                                <td>$234,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Bruno Nash</td>
                                                                                <td>Software Engineer</td>
                                                                                <td>London</td>
                                                                                <td>38</td>
                                                                                <td>2011/05/03</td>
                                                                                <td>$163,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sakura Yamamoto</td>
                                                                                <td>Support Engineer</td>
                                                                                <td>Tokyo</td>
                                                                                <td>37</td>
                                                                                <td>2009/08/19</td>
                                                                                <td>$139,575</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Thor Walton</td>
                                                                                <td>Developer</td>
                                                                                <td>New York</td>
                                                                                <td>61</td>
                                                                                <td>2013/08/11</td>
                                                                                <td>$98,540</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Finn Camacho</td>
                                                                                <td>Support Engineer</td>
                                                                                <td>San Francisco</td>
                                                                                <td>47</td>
                                                                                <td>2009/07/07</td>
                                                                                <td>$87,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Serge Baldwin</td>
                                                                                <td>Data Coordinator</td>
                                                                                <td>Singapore</td>
                                                                                <td>64</td>
                                                                                <td>2012/04/09</td>
                                                                                <td>$138,575</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Zenaida Frank</td>
                                                                                <td>Software Engineer</td>
                                                                                <td>New York</td>
                                                                                <td>63</td>
                                                                                <td>2010/01/04</td>
                                                                                <td>$125,250</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Zorita Serrano</td>
                                                                                <td>Software Engineer</td>
                                                                                <td>San Francisco</td>
                                                                                <td>56</td>
                                                                                <td>2012/06/01</td>
                                                                                <td>$115,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jennifer Acosta</td>
                                                                                <td>Junior Javascript Developer</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>43</td>
                                                                                <td>2013/02/01</td>
                                                                                <td>$75,650</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Cara Stevens</td>
                                                                                <td>Sales Assistant</td>
                                                                                <td>New York</td>
                                                                                <td>46</td>
                                                                                <td>2011/12/06</td>
                                                                                <td>$145,600</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Hermione Butler</td>
                                                                                <td>Regional Director</td>
                                                                                <td>London</td>
                                                                                <td>47</td>
                                                                                <td>2011/03/21</td>
                                                                                <td>$356,250</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Lael Greer</td>
                                                                                <td>Systems Administrator</td>
                                                                                <td>London</td>
                                                                                <td>21</td>
                                                                                <td>2009/02/27</td>
                                                                                <td>$103,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jonas Alexander</td>
                                                                                <td>Developer</td>
                                                                                <td>San Francisco</td>
                                                                                <td>30</td>
                                                                                <td>2010/07/14</td>
                                                                                <td>$86,500</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Shad Decker</td>
                                                                                <td>Regional Director</td>
                                                                                <td>Edinburgh</td>
                                                                                <td>51</td>
                                                                                <td>2008/11/13</td>
                                                                                <td>$183,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Michael Bruce</td>
                                                                                <td>Javascript Developer</td>
                                                                                <td>Singapore</td>
                                                                                <td>29</td>
                                                                                <td>2011/06/27</td>
                                                                                <td>$183,000</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Donna Snider</td>
                                                                                <td>Customer Support</td>
                                                                                <td>New York</td>
                                                                                <td>27</td>
                                                                                <td>2011/01/25</td>
                                                                                <td>$112,000</td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Position</th>
                                                                                <th>Office</th>
                                                                                <th>Age</th>
                                                                                <th>Start date</th>
                                                                                <th>Salary</th>
                                                                            </tr>
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
        $('#exampleTable').DataTable();
    });
</script>