<?php
include 'config.php';

// Lấy tên từ URL (Ví dụ: profile.php?name=DavidVan)
$name = isset($_GET['name']) ? $_GET['name'] : '';

$stmt = $conn->prepare("SELECT *  FROM profiles WHERE username = ?");
$stmt->bind_param("ss", $name);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("<h2 style='color:white; text-align:center;'>Không tìm thấy thông tin thành viên này!</h2>");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hồ sơ: <?php echo $data['fullname']; ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        .profile-container {
            max-width: 600px;
            margin: 100px auto;
            padding: 40px;
            text-align: left;
        }
        .info-row {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .info-label { color: var(--primary); font-weight: bold; width: 150px; display: inline-block; }
        .back-btn { margin-top: 30px; display: inline-block; color: var(--text-muted); text-decoration: none; }
    </style>
</head>
<body>
    <div class="glass-card profile-container">
        <h1 style="color: var(--primary); margin-top: 0;"><?php echo $data['fullname']; ?></h1>
        
        <div class="info-row">
            <span class="info-label">Tuổi:</span> <span><?php echo $data['age']; ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Tính cách:</span> <span><?php echo $data['personality']; ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Nghề nghiệp:</span> <span><?php echo $data['job']; ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Chức vụ:</span> <span><?php echo $data['position']; ?></span>
        </div>

        <a href="index.php" class="back-btn">← Quay lại trang chủ</a>
    </div>
</body>
</html>