<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacking Lab - Login</title>
    <style>
        :root {
            --primary-color: #4facfe;
            --secondary-color: #00f2fe;
            --dark-bg: #1a1a2e;
            --text-white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 350px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-white);
        }

        h2 { text-align: center; margin-bottom: 30px; font-weight: 300; letter-spacing: 2px; }

        .input-group { position: relative; margin-bottom: 25px; }

        .input-group input {
            width: 100%;
            padding: 10px 0;
            background: transparent;
            border: none;
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            outline: none;
            color: #fff;
            font-size: 16px;
            transition: 0.3s;
        }

        .input-group label {
            position: absolute;
            top: 10px; left: 0;
            pointer-events: none;
            transition: 0.3s;
            color: rgba(255, 255, 255, 0.6);
        }

        .input-group input:focus ~ label,
        .input-group input:valid ~ label {
            top: -15px;
            font-size: 12px;
            color: var(--text-white);
        }

        .input-group input:focus { border-bottom: 2px solid #fff; }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background: #fff;
            color: var(--primary-color);
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            background: var(--dark-bg);
            color: #fff;
        }

        .footer-links { text-align: center; margin-top: 20px; font-size: 14px; }
        .footer-links a { color: #fff; text-decoration: none; opacity: 0.8; }
        .footer-links a:hover { opacity: 1; text-decoration: underline; }

        /* Hiển thị câu lệnh SQL cho việc học tập */
        .sql-debug {
            margin-top: 20px;
            padding: 10px;
            background: #000;
            color: #0f0;
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            border-radius: 5px;
            word-break: break-all;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>MEMBER LOGIN</h2>
    <form method="POST" action="">
        <div class="input-group">
            <input type="text" name="user" required>
            <label>Username</label>
        </div>
        <div class="input-group">
            <input type="password" name="pass" required>
            <label>Password</label>
        </div>
        <button type="submit" name="login">SIGN IN</button>
    </form>

    <div class="footer-links">
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
    </div>

    <?php
    if(isset($_POST['login'])){
        // Đây là phần logic PHP xử lý SQLi của bạn ở bài trước
        include 'config.php';
        $u = $_POST['user'];
        $p = $_POST['pass'];
        $sql = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
        
        echo "<div class='sql-debug'><strong>SQL Query:</strong><br> $sql</div>";
        
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
             echo "<p style='color: #2ecc71; text-align:center;'>Đăng nhập thành công!</p>";
        } else {
             echo "<p style='color: #ff4757; text-align:center;'>Sai thông tin!</p>";
        }
    }
    ?>
</div>

</body>
</html>