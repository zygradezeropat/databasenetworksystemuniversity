<?php
include 'connect.php'; 

if (isset($_POST['submit'])) {
    $student_id = $_POST['edit_id'];
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name = $_POST['lname'];
    $gender = $_POST['sex'];
    $program_id = $_POST['program'];
    $year_level = $_POST['year'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $email = $_POST['email'];
    $date_enrolled = $_POST['date'];
    $admission_status = $_POST['status'];

    $stmt = $conn->prepare("CALL EditStudent(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiisssssss", $student_id, $first_name, $middle_name, $last_name,  $program_id, $year_level,$gender, $barangay, $city, $province, $email, $date_enrolled, $admission_status);
    $stmt->execute();
    $stmt->close();

   
}
header("Location: student.php");
?>
