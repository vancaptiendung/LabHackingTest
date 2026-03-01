<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tham gia Vantech Lab | Đăng ký</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #38bdf8;
            --bg: #0f172a;
            --card-bg: rgba(255, 255, 255, 0.03);
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Hiệu ứng vòng tròn trang trí phía sau */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), #818cf8);
            filter: blur(80px);
            z-index: -1;
            opacity: 0.2;
        }

        .register-container {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 24px;
            width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 { text-align: center; font-size: 28px; margin-bottom: 10px; color: var(--primary); }
        p.desc { text-align: center; color: #94a3b8; font-size: 14px; margin-bottom: 30px; }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .input-group { margin-bottom: 20px; position: relative; }
        .full-width { grid-column: span 2; }

        label { display: block; margin-bottom: 8px; font-size: 13px; color: #cbd5e1; }

        input {
            width: 100%;
            padding: 12px 16px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid #334155;
            border-radius: 12px;
            color: white;
            font-size: 14px;
            transition: all 0.3s;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
            outline: none;
            background: rgba(0, 0, 0, 0.3);
        }

        button {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: #0f172a;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background: #7dd3fc;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(56, 189, 248, 0.4);
        }

        .login-link { text-align: center; margin-top: 20px; font-size: 14px; color: #94a3b8; }
        .login-link a { color: var(--primary); text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>

    <div class="circle" style="width: 300px; height: 300px; top: -100px; right: -50px;"></div>
    <div class="circle" style="width: 200px; height: 200px; bottom: -50px; left: -50px; background: #818cf8;"></div>

    <div class="register-container">
        <h2>Tạo tài khoản mới</h2>
        <p class="desc">Bắt đầu hành trình chinh phục thử thách bảo mật.</p>

        <form method="POST" id="regForm">
            <div class="form-grid">
                <div class="input-group full-width">
                    <label>Họ và Tên</label>
                    <input type="text" name="n" placeholder="Nguyễn Văn A" required>
                </div>
                <div class="input-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" name="u" placeholder="username" required>
                </div>
                <div class="input-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="p" placeholder="••••••••" required>
                </div>
                <div class="input-group full-width">
                    <label>Email liên hệ</label>
                    <input type="email" name="e" placeholder="admin@vantech.io" required>
                </div>
                <div class="input-group full-width">
                    <label>Tuổi</label>
                    <input type="number" name="a" placeholder="18" min="1" max="100" required>
                </div>
            </div>
            
            <button type="submit" name="reg">Đăng ký tài khoản</button>
        </form>

        <div class="login-link">
            Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a>
        </div>
    </div>

    <?php
    if(isset($_POST['reg'])){
        include 'config.php';
        $u = $_POST['u']; $p = $_POST['p']; $n = $_POST['n']; $e = $_POST['e']; $a = $_POST['a'];
        
        // Cố tình để hở SQL Injection để bạn thực hành
        $sql = "INSERT INTO users (username, password, fullname, email, age, totalMoney) 
                VALUES ('$u', '$p', '$n', '$e', $a, 500.00)";
        
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Đăng ký thành công! Bạn nhận được $500 làm vốn khởi đầu.'); window.location='login.php';</script>";
        } else {
            echo "<p style='color:#f43f5e; text-align:center;'>Lỗi hệ thống: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>