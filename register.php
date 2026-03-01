<div class="login-box">
    <h2>Tạo tài khoản Lab</h2>
    <form method="POST">
        <div class="input-field"><label>Username</label><input type="text" name="u" required></div>
        <div class="input-field"><label>Mật khẩu</label><input type="password" name="p" required></div>
        <div class="input-field"><label>Họ tên</label><input type="text" name="n" required></div>
        <div class="input-field"><label>Email</label><input type="email" name="e" required></div>
        <div class="input-field"><label>Tuổi</label><input type="number" name="a" required></div>
        <button type="submit" name="reg">Đăng ký ngay</button>
    </form>
</div>

<?php
if(isset($_POST['reg'])){
    include 'config.php';
    $u = $_POST['u']; $p = $_POST['p']; $n = $_POST['n']; $e = $_POST['e']; $a = $_POST['a'];
    // Gán mặc định tiền cho user mới là 100$
    $sql = "INSERT INTO users (username, password, fullname, email, age, totalMoney) 
            VALUES ('$u', '$p', '$n', '$e', $a, 100.00)";
    if(mysqli_query($conn, $sql)) header("Location: login.php");
}
?>