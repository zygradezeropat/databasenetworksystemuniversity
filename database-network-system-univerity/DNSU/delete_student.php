
<?php
include 'connect.php';
session_start();
if (isset($_POST['delete_student'])) {

    $del = $_POST['delete_id'];

    $lol = $conn->query("DELETE FROM students WHERE student_id = '$del'");


        header("Location: student.php");


        $conn->close();
    exit();
}

