<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $khachhang = $_POST['khachhang'];
    $sdt = $_POST['sdt'];

    // Tạo cookie với thời gian tồn tại 10 phút
    setcookie("khachhang", $khachhang, time() + 600, "/");
    setcookie("sdt", $sdt, time() + 600, "/");

    echo "<p>Cookies đã được lưu!</p>";
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        .tong{
            display: flex;
            flex-flow: column wrap;
            
        }
        form{
            width: 500px;
            height: 300px;
            border: 3px solid black;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .cookie{
            margin-left:0;
        }
    </style>
    <center>
    <div class="tong">
        <div class="con">
            <?php 
                // Kiểm tra nếu cookies tồn tại
        if (isset($_COOKIE['khachhang']) && isset($_COOKIE['sdt'])) {
            echo "<p class='cookie'>Tên khách hàng từ cookie: " . $_COOKIE['khachhang'] . "</p><br>";
            echo "<p class='cookie'>Số điện thoại từ cookie: " . $_COOKIE['sdt'] . "</p>";
        } else {
            echo "<p class='cookie'>Cookies không tồn tại hoặc đã hết hạn!</p>";
        }
            ?>
        </div>
        
        <div class="form">
        <form action="hh.php" method="POST">
            Tên khách hàng: <input name="khachhang"><br><br>
            Số điện thoại: <input name="sdt"><br>
            <button type="submit">Gửi</button>
        </form>
        </div>
    </div>
    </center>
    
    
</body>
</html>