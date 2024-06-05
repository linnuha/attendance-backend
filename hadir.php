<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['role'] == 'guest') {
    $userid = $_SESSION['userid'];
    $date = date('Y-m-d');
    
    $sql = "INSERT INTO attendance (user_id, date) VALUES ('$userid', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "Attendance marked successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
