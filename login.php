<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('images/giaothongvantai.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            width: 400px;
            max-width: 90%;
            margin: 80px auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(255, 140, 0, 0.5);
            text-align: center;
            position: relative;
        }

        .login-container img {
            width: 90px;
            height: 100px;
        }

        h3 {
            color: #ef6c00;
            margin: 10px 0 5px;
        }

        h4 {
            color: #fb8c00;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ef6c00;
            border-radius: 6px;
            font-size: 16px;
        }

        input:focus {
            border-color: #fb8c00;
            outline: none;
            box-shadow: 0 0 8px rgba(251, 140, 0, 0.4);
        }

        .btn-login {
            background-color: #ef6c00;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 6px;
            margin-top: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #fb8c00;
        }

        .show-btn {
            position: absolute;
            right: 45px;
            top: 62%;
            transform: translateY(-50%);
            color: #ef6c00;
            cursor: pointer;
        }

        hr {
            border: 0;
            border-top: 1px solid #ffa726;
            width: 80%;
            margin: 10px auto;
        }
    </style>
</head>

<body>
    <form action="index.php" method="POST" class="login-container">
        <img src="images/giaothongvantai.jpg" alt="Logo trường">
        <h3>Trường Đại Học CNGTVT</h3>
        <h4>Đăng nhập quản trị viên</h4>
        <hr>
        <input type="text"
               name="username"
               placeholder="Tên đăng nhập"
               value="<?php if(isset($_COOKIE['member_login'])) echo $_COOKIE['member_login']; ?>"
               pattern="^[A-Za-z][A-Za-z0-9_]{7,29}$"
               title="Username từ 7 ký tự trở lên"
               required>

        <input type="password"
               name="passlg"
               class="pass"
               placeholder="Mật khẩu"
               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
               title="Password phải chứa ít nhất một số, một chữ hoa, chữ thường và ít nhất 8 ký tự trở lên"
               required>

        <span class="show-btn"><i class="fas fa-eye"></i></span>

        <button type="submit" name="login" class="btn-login">Đăng nhập</button>
    </form>

    <script>
        const passField = document.querySelector(".pass");
        const showBtn = document.querySelector(".show-btn i");

        showBtn.onclick = () => {
            if (passField.type === "password") {
                passField.type = "text";
                showBtn.classList.add("hide-btn");
            } else {
                passField.type = "password";
                showBtn.classList.remove("hide-btn");
            }
        };
    </script>
</body>
</html>
