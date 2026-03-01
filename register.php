<?php include 'config.php'; ?>
<form method="POST">
    <h2>Đăng ký tài khoản</h2>
    User: <input type="text" name="user" required><br>
    Pass: <input type="password" name="pass" required><br>
    Name: <input type="text" name="name"><br>
    <button type="submit" name="register">Đăng ký</button>
</form>

<?php
if(isset($_POST['register'])){
    $u = $_POST['user'];
    $p = $_POST['pass'];
    $n = $_POST['name'];
    $sql = "INSERT INTO users (username, password, fullname) VALUES ('$u', '$p', '$n')";
    if(mysqli_query($conn, $sql)) echo "Đăng ký thành công!";
    else echo "Lỗi: " . mysqli_error($conn);
}
?>