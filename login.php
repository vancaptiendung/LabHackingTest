<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $u = $_POST['u']; $p = $_POST['p'];
    $stmt = $conn->prepare("SELECT id, fullname, totalMoney FROM users WHERE username = ? AND password = ?");
    $stmt->bind_pram("ss", $u, $p);
    $stmt->execute();
    $result = $stmt->get_result();

    if($row = mysqli_fetch_assoc($result)){
        $_SESSION['user_id'] = $row['id'];
        setcookie("user_login_token", $row['id'], time() + 900, "/"); // 15 phút
        header("Location: index.php");
    } else {
        $error = "Sai tài khoản hoặc mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login | Vantech Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center;">
    <div class="glass-card" style="width: 400px; padding: 3rem;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Đăng Nhập</h2>
        <?php if(isset($error)) echo "<p style='color: #fb7185; text-align: center;'>$error</p>"; ?>
        <form method="POST">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="u" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="p" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary" style="width: 100%;">Truy cập hệ thống</button>
        </form>
    </div>
</body>
</html>