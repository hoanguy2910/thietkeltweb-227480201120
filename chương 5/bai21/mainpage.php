<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    TRANG CHÍNH<br>
    <?php

        // Bắt đầu session
        session_start();
        
        // Kiểm tra nếu dữ liệu session tồn tại
        if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
            // Hiển thị dữ liệu từ session
            echo "<p>Người dùng đã đăng nhập với tên " . $_SESSION['user'] ." và Email là ".$_SESSION['email']. "</p>";
    ?>
    <form action="logout.php">
        <button>Đăng xuất</button>
    </form>
    <?php
        } else {
            // Thông báo nếu session trống
            echo "<p>Không có dữ liệu trong session.</p>";
        }
        
    ?>

</body>
</html>