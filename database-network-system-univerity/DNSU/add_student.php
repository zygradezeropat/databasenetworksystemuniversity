<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['fname']);
    $mname = validate($_POST['mname']);
    $lname = validate($_POST['lname']);
    $sex = validate($_POST['sex']);
    $program = validate($_POST['program']);
    $year = validate($_POST['year']);
    $barangay = validate($_POST['barangay']);
    $city = validate($_POST['city']);
    $province = validate($_POST['province']);
    $email = validate($_POST['email']);
    $date = validate($_POST['date']);
    $status = validate($_POST['status']);

    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, m_name, program_id, year_level, sex, barangay, municipality_city, province, email_add, date_enrolled, admission_stat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("ssssssssssss", $fname, $mname, $lname, $program, $year, $sex, $barangay, $city, $province, $email, $date, $status);

        if ($stmt->execute()) {
            header("Location: student.php");
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
