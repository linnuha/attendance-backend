<?php
session_start();
include 'koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=attendance.xls");
header("Pragma: no-cache");
header("Expires: 0");

$sql = "SELECT users.username, attendance.date FROM attendance JOIN users ON attendance.user_id = users.id";
$result = $conn->query($sql);

echo "No\tName\tDate\n";
$no = 1;
while($row = $result->fetch_assoc()) {
    echo $no . "\t" . $row['username'] . "\t" . $row['date'] . "\n";
    $no++;
}
?>
