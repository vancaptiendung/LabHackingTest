<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Secure Hacking Lab | Login</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; padding: 0;
            background: #0f172a; /* Màu tối huyền bí */
            font-family: 'Inter', sans-serif;
            display: flex; justify-content: center; align-items: center; height: 100vh;
        }
        /* Hiệu ứng kính mờ nâng cao */
        .login-box {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px; border-radius: 24px;
            width: 400px; color: white; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        }
        h2 { text-align: center; font-size: 24px; margin-bottom: 8px; color: #38bdf8; }
        p.subtitle { text-align: center; font-size: 14px; color: #94a3b8; margin-bottom: 30px; }
        
        .input-field { margin-bottom: 20px; }
        .input-field label { display: block; margin-bottom: 8px; font-size: 14px; color: #cbd5e1; }
        .input-field input {
            width: 100%; padding: 12px; background: rgba(0,0,0,0.2);
            border: 1px solid #334155; border-radius: 12px; color: white;
            outline: none; transition: 0.3s;
        }
        .input-field input:focus { border-color: #38bdf8; box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.2); }
        
        button {
            width: 100%; padding: 12px; background: #38bdf8; color: #0f172a;
            border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: 0.3s;
        }
        button:hover { background: #7dd3fc; transform: scale(1.02); }

        .sql-panel {
            margin-top: 25px; padding: 15px; background: #000;
            border-left: 4px solid #38bdf8; font-family: 'Fira Code', monospace;
            font-size: 12px; color: #10b981; border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Hacking Lab</h2>
    <p class="subtitle">Vui lòng đăng nhập để tiếp tục</p>
    
    <form id="loginForm" method="POST">
        <div class="input-field">
            <label>Tên đăng nhập</label>
            <input type="text" name="user" id="user" placeholder="Nhập username...">
        </div>
        <div class="input-group input-field">
            <label>Mật khẩu</label>
            <input type="password" name="pass" id="pass" placeholder="••••••••">
        </div>
        <button type="submit" name="login">Đăng nhập</button>
    </form>

    <script>
        // Kiểm tra người dùng xíu bằng Javascript
        document.getElementById('loginForm').onsubmit = function(e) {
            let u = document.getElementById('user').value;
            let p = document.getElementById('pass').value;
            if(u === "" || p === "") {
                alert("Bạn chưa nhập đủ thông tin kìa!");
                e.preventDefault();
            }
        };
    </script>

    <?php
    if(isset($_POST['login'])){
        include 'config.php';
        $u = $_POST['user'];
        $p = $_POST['pass'];
        
        // Cố tình để hổng để bạn học SQL Injection
        $sql = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
        echo "<div class='sql-panel'><strong>Query:</strong> $sql</div>";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['id']; // Lưu ID để dùng ở trang index
                header("Location: index.php"); // Chuyển hướng về trang chủ
                exit();
            }
            // echo "<p style='color:#10b981; text-align:center;'>✅ Đăng nhập thành công!</p>";
        } else {
            echo "<p style='color:#f43f5e; text-align:center;'>❌ Sai thông tin rồi!</p>";
        }
    }
    ?>
</div>

</body>
</html> 