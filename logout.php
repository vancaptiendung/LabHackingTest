<?php
session_start();
session_destroy(); // Xóa Session
setcookie("user_login_token", "", time() - 3600, "/"); // Xóa Cookie bằng cách cho nó hết hạn
header("Location: index.php");
exit();
?>