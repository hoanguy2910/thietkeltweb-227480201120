<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hh.css">
</head>

<body>
    <?php
    session_start();
    $password = '';
    $email = '';
    $maso = '';
    $show = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $maso = $_POST['maso'];
        
        //đọc file
        $users = parse_ini_file('users.ini', true);
        $kiemtra = false;
        foreach ($users as $user) {
            if (
                $user['email'] == $email && $user['password'] == $password && $user['maso'] == $maso
            ) {
                $kiemtra = true;
                break;
            }
        }
        if ($kiemtra) {
            $_SESSION['Login'] = time();
            echo "Đăng nhập thành công\n";
        } else {
            echo "Thông tin đăng nhập không đúng! Vui lòng nhập lại!";
        }
    }
    if (isset($_SESSION['Login'])) {
        $thoigian = time() - $_SESSION['Login'];
        if ($thoigian > 10) {
            session_destroy();
            echo "Phiên đăng nhập đã hết hạn";
        } else {
            echo "Bạn còn " . (10 - $thoigian) . "giây";
        }
    }
    
    ?>
    <script>
        function input() {
            var kiemtra = document.getElementById("hien");
            if (kiemtra.type == "password") {
                kiemtra.type = "text";
            } else {
                kiemtra.type = "password";
            }
        }
        setTimeout(function(){
            document.getElementById("formm").reset();
            location.reload();
        },10000);
    </script>
    <center>
        <div class="tong">
            <form method="POST" id="formm">
                <div class="chu">Đăng nhập thành viên</div><br><br>
                <div class="dong1">
                    <input id="email" placeholder="Email name" name="email" required>
                    <input id="them" name="them" value="@blu.edu.vn"><br><br>
                    <img id="emailicon" src="email.png">
                </div>
                <div class="dong2">
                    <input id="hien" placeholder="Password" type="password" name="password" required>
                    <button id="button" type="button" onclick="input()">Hiện</button><br><br>
                    <img id="khoaicon" src="khoa1.png">
                </div>
                <div class="dong3">
                    <input id="maso" placeholder="Mã số" name="maso" value="<?php echo htmlspecialchars($maso) ?>" required><br><br>
                    <img id="mavach" src="vah.png">
                </div>
                <div class="dong4">
                    <button id="dangnhap" name="dangnhap" type="submit">Đăng nhập</button><br><br>
                    <button id="dangky" name="dangky" type="submit">Đăng ký</button><br><br>
                </div>
            </form>
        </div>
    </center>

</body>

</html>