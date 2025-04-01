<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        $password='';
        $email='';
        $maso='';
        $show=false;
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $password=$_POST['password'];
            if(isset($_POST['hien'])){
                $show=true;
            }
            $email=$_POST['email'];
            $maso=$_POST['maso'];
            //đọc file
            $users=parse_ini_file('users.ini',true);
            $kiemtra=false;
            foreach($users as $user){
                if(
                    $user['email']==$email && $user['password']==$password && $user['maso']==$maso
                ){
                    $kiemtra=true;break;
                }
            }
            if($kiemtra){
                $_SESSION['Login']=time();
                echo"Đăng nhập thành công";
            }else{
                echo"Thông tin đăng nhập không đúng! Vui lòng nhập lại!";
            }
        }
        if(isset($_SESSION['Login'])){
            $thoigian=time()-$_SESSION['Login'];
            if($thoigian>10){
                session_destroy();
                echo"Phiên đăng nhập đã hết hạn";
            }else{
                echo"Bạn còn ".(10-$thoigian)."giây";
            }
        }
    ?>
    <form method="POST">
        <div class="chu">Đăng nhập thành viên</div>
        <input name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        <input name="them" value="@blu.edu.vn"><br><br>
        <input type="<?php echo $show ? 'text' : 'password'; ?>" 
        value="<?php echo htmlspecialchars($password); ?>" name="password" required>
        <button name="hien" type="submit">Hiện</button><br><br>
        <input name="maso" value="<?php echo htmlspecialchars($maso) ?>" required><br><br>
        <button name="dangnhap" type="submit">Đăng nhập</button><br><br>
        <button name="dangky" type="submit">Đăng ký</button><br><br>
    </form>
</body>
</html>