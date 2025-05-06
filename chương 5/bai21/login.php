
    <?php 
    session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $user = $_POST['user'];
            $email = $_POST['email'];
            $password=$_POST['password'];
        
            // Kiểm tra tính hợp lệ của dữ liệu
            if (!empty($user) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
                $_SESSION['user']=$user;
                $_SESSION['email']=$email;
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        form{
            width: 500px;
            height: 300px;
            border: 3px solid black;
            justify-content: center;
            text-align: center;
            margin-top: 300px;
            border-radius: 30px;
        }
    </style>
    <center>
        <form action="mainpage.php" method="POST">
            <p><b>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</b></p>
            <hr size="1" color="black"><br><br>
            Thông tin đăng nhập hợp lệ<br><br>
            <button type="submit" name="trangchinh">Trang chính</button>
        </form>
    </center>
</body>
</html>
    <?php
            } else {
                echo "<p>Dữ liệu không hợp lệ!</p>";
            }
        } else {
            echo "<p>Không có dữ liệu để xử lý.</p>";
        }
    ?>
