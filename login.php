<?php
session_start();
include 'config.php';

// ... đoạn code kiểm tra username/password ...


if(isset($_POST['login'])){
    $u = $_POST['u'];
    $p = $_POST['p'];

    // CÁCH FIX BẢO MẬT: Sử dụng Prepared Statements
    $stmt = $conn->prepare("SELECT id, fullname, totalMoney FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $u, $p);
    $stmt->execute();
    $result = $stmt->get_result();

    if($row = $result->fetch_assoc()){
        // 1. Tạo Session để lưu trạng thái đăng nhập tạm thời
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        // 2. Tạo Tracking Cookie (tồn tại trong 30 ngày)
        // Cookie này lưu username để "nhận diện" người dùng khi họ quay lại
        setcookie("user_tracking", $row['username'], time() + (86400 * 30), "/"); 
        
        // Tạo thêm một ID định danh duy nhất (UID) để tracking chuyên sâu
        $uid = md5($row['username'] . time());
        setcookie("track_id", $uid, time() + (86400 * 30), "/", "", false, true); // HttpOnly để bảo mật

        header("Location: index.php");
        exit();

    } else {
        $error = "Tài khoản hoặc mật khẩu không chính xác!";
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