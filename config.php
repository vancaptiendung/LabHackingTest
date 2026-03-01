<?php
$host = 'localhost';
$user = 'gmbiwafg_VanTech'; // Ví dụ: ttam_admin
$pass = 'Bonanhem123@';
$dbname = 'gmbiwafg_lab_sqli'; // Ví dụ: ttam_lab

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>