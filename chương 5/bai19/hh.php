<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "Chao ban,<br>";
        if(isset($_COOKIE['thoigiantruycap'])){
            echo "Thoi gian truy cap gan day nhat la: ".date('d/m/Y H:i:s',$_COOKIE['thoigiantruycap']);
            setcookie('thoigiantruycap',time(),time() +600);
        }else{
            setcookie('thoigiantruycap',time(),time() +600);
        }
    ?>
</body>
</html>