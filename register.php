<?php
include 'config.php';
if(isset($_POST['reg'])){
    $u = $_POST['u']; $p = $_POST['p']; $n = $_POST['n']; $e = $_POST['e']; $a = $_POST['a'];
    
    // Kiểm tra tồn tại
    $check = mysqli_query($conn, "SELECT id FROM users WHERE username = '$u'");
    if(mysqli_num_rows($check) > 0){
        $error = "Tài khoản đã tồn tại!";
    } else {
        mysqli_query($conn, "INSERT INTO users (username, password, fullname, email, age, totalMoney) 
                            VALUES ('$u', '$p', '$n', '$e', '$a', 100.00)");
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register | Vantech Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center;">
    <div class="glass-card" style="width: 500px; padding: 3rem;">
        <h2 style="text-align: center;">Tạo Tài Khoản</h2>
        <?php if(isset($error)) echo "<p style='color: #fb7185; text-align: center;'>$error</p>"; ?>
        <form method="POST" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="input-group" style="grid-column: span 2;">
                <label>Họ tên</label><input type="text" name="n" required>
            </div>
            <div class="input-group">
                <label>Username</label><input type="text" name="u" required>
            </div>
            <div class="input-group">
                <label>Password</label><input type="password" name="p" required>
            </div>
            <div class="input-group">
                <label>Email</label><input type="email" name="e" required>
            </div>
            <div class="input-group">
                <label>Tuổi</label><input type="number" name="a" required>
            </div>
            <button type="submit" name="reg" class="btn btn-primary" style="grid-column: span 2;">Đăng ký ngay</button>
        </form>
    </div>
</body>
</html>