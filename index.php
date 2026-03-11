<?php
session_start();
include 'config.php';

$user = null;
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE id = '$uid'");
    $user = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vantech Hacking Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav style="display: flex; justify-content: space-between; padding: 1.5rem 5%; align-items: center;">
        <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">VANTECH.LAB</div>
        <div>
            <?php if($user): ?>
                <div class="glass-card" style="padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 15px;">
                    <div style="text-align: right;">
                        <div style="font-weight: bold;"><?= $user['fullname'] ?></div>
                        <div style="font-size: 0.75rem; color: var(--primary);">$<?= number_format($user['totalMoney'], 2) ?></div>
                    </div>
                    <a href="logout.php" class="btn" style="background: rgba(244, 63, 94, 0.2); color: #fb7185; padding: 0.5rem 1rem;">Thoát</a>
                </div>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">Đăng nhập</a>
                <a href="register.php" class="btn" style="color: white;">Đăng ký</a>
            <?php endif; ?>
        </div>
        
    </nav>

    <main style="text-align: center; padding-top: 100px;">
        <h1 style="font-size: 4rem; margin-bottom: 1rem;">Nâng tầm kỹ năng <br><span style="color: var(--primary);">Cyber Security</span></h1>
        <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto 2rem;">Hệ thống Lab thực hành SQL Injection thực tế. Hãy đăng nhập để quản lý ví tiền và thông tin cá nhân của bạn.</p>
        
        <?php if($user): ?>
            <div class="glass-card" style="max-width: 500px; margin: 0 auto; padding: 2rem; text-align: left;">
                <h3 style="margin-top: 0; border-bottom: 1px solid var(--border); padding-bottom: 10px;">Thông tin cá nhân</h3>
                <p><strong>Email:</strong> <?= $user['email'] ?></p>
                <p><strong>Tuổi:</strong> <?= $user['age'] ?></p>
                <p><strong>Số dư tài khoản:</strong> <span style="color: #10b981;">$<?= number_format($user['totalMoney'], 2) ?></span></p>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>

<style>
    .expert-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .expert-card {
        padding: 25px;
        text-align: center;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .expert-card:hover {
        background: rgba(14, 165, 233, 0.1);
        border-color: var(--primary);
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(14, 165, 233, 0.2);
    }

    .expert-card .avatar {
        width: 60px;
        height: 60px;
        background: var(--primary);
        border-radius: 50%;
        margin: 0 auto 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 1.2rem;
        color: var(--bg);
    }

    .expert-name {
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 5px;
    }

    .expert-role {
        font-size: 0.8rem;
        color: var(--text-muted);
    }
</style>

<section style="margin-top: 50px;">
    <h2 style="text-align: center; color: var(--text-muted); font-size: 1rem; text-transform: uppercase; letter-spacing: 2px;">
        Thành viên tiêu biểu
    </h2>
    
    <div class="expert-grid">
        <div class="glass-card expert-card" onclick="viewProfile('DavidVan')">
            <div class="avatar">DV</div>
            <div class="expert-name">DavidVan</div>
            <div class="expert-role">Senior Security Analyst</div>  
        </div>

        <div class="glass-card expert-card" onclick="viewProfile('YGUY')">
            <div class="avatar">YG</div>
            <div class="expert-name">YGUY</div>
            <div class="expert-role">Pentester</div>
        </div>

        <div class="glass-card expert-card" onclick="viewProfile('T.Hung')">
            <div class="avatar">TH</div>
            <div class="expert-name">T.Hung</div>
            <div class="expert-role">Web Developer</div>
        </div>
    </div>
</section>

<script>
    function viewProfile(name) {
    // Chuyển hướng trang kèm tham số tên người dùng
        window.location.href = "profile.php?name=" + encodeURIComponent(name);
    }
</script>