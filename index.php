<?php
session_start();
include 'config.php';

// Lấy thông tin người dùng nếu đã đăng nhập
$user_data = null;
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = '$id'"; // Lưu ý: Vẫn để hở ID để bạn test Insecure Direct Object Reference (IDOR) sau này
    $res = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Vantech Hacking Lab | Home</title>
    <style>
        :root { --accent: #38bdf8; --bg: #0f172a; }
        body { margin: 0; background: var(--bg); color: white; font-family: 'Inter', sans-serif; }
        
        /* Navigation / Header */
        nav {
            display: flex; justify-content: space-between; align-items: center;
            padding: 20px 5%; background: rgba(255,255,255,0.05); backdrop-filter: blur(10px);
        }
        .logo { font-size: 24px; font-weight: bold; color: var(--accent); }
        
        /* User Profile Corner */
        .user-profile {
            background: rgba(56, 189, 248, 0.1); border: 1px solid var(--accent);
            padding: 10px 20px; border-radius: 12px; font-size: 14px;
        }

        /* Hero Section */
        .hero {
            text-align: center; padding: 100px 5%;
            background: radial-gradient(circle at center, #1e293b 0%, #0f172a 100%);
        }
        .hero h1 { font-size: 48px; margin-bottom: 20px; }
        .hero p { font-size: 18px; color: #94a3b8; max-width: 600px; margin: 0 auto 30px; }
        
        .btn {
            padding: 12px 30px; border-radius: 8px; text-decoration: none;
            font-weight: bold; transition: 0.3s; display: inline-block;
        }
        .btn-primary { background: var(--accent); color: #0f172a; }
        .btn-outline { border: 1px solid var(--accent); color: var(--accent); margin-left: 10px; }
        .btn:hover { opacity: 0.8; transform: translateY(-2px); }

        /* Profile Details Box */
        .details-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px; text-align: left; }
        .label { color: #64748b; font-size: 12px; }
    </style>
</head>
<body>

<nav>
    <div class="logo">VANTECH LAB</div>
    <div class="auth-zone">
        <?php if ($user_data): ?>
            <div class="user-profile">
                <strong>👋 Chào, <?php echo $user_data['fullname']; ?></strong>
                <div class="details-grid">
                    <div><span class="label">Tuổi:</span> <?php echo $user_data['age']; ?></div>
                    <div><span class="label">Số dư:</span> $<?php echo number_format($user_data['totalMoney'], 2); ?></div>
                    <div style="grid-column: span 2;"><span class="label">Email:</span> <?php echo $user_data['email']; ?></div>
                </div>
                <br><a href="logout.php" style="color:#f43f5e; font-size:12px;">Đăng xuất</a>
            </div>
        <?php else: ?>
            <a href="login.php" class="btn btn-primary">Đăng nhập</a>
            <a href="register.php" class="btn btn-outline">Đăng ký</a>
        <?php endif; ?>
    </div>
</nav>

<section class="hero">
    <h1>Khám phá thế giới Cyber Security</h1>
    <p>Chào mừng bạn đến với Lab thực hành SQL Injection chuyên sâu. Tại đây bạn có thể thử nghiệm các lỗ hổng bảo mật trên môi trường thực tế.</p>
    <?php if (!$user_data): ?>
        <p style="color: #fbbf24;">⚠️ Bạn cần đăng nhập để xem thông tin ví và tài khoản cá nhân.</p>
    <?php endif; ?>
</section>

</body>
</html>