<?php
$host = 'localhost';
$user = 'gmbiwafg_VanTech';
$pass = 'Bonanhem123@';
$db   = 'lab_sqli';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) { die("Kết nối thất bại"); }
?>