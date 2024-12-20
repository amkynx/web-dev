<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "lab_5b");

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "DELETE FROM users WHERE matric='$matric'";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_users.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
