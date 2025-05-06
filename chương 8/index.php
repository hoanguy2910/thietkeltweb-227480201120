<?php 
    $username="if0_38812076";
    $passwprd="x1kWkGXwS5Al";
    $server="sql313.infinityfree.com";
    $dbname="if0_38812076_quanlykhachsan";
    //Kết nối database sinhvien
    $mysql=mysqli_connect($server,$username,$passwprd,$dbname);
    //Nếu kết nối bị lỗi thì báo lỗi và thoát.
    if(!$mysql){
        die("Không kết nối: ".mysqli_connect_error());
        exit();
    }
    if (isset($_POST['them'])) {
    $maks = $_POST['maks'];
    $ten = $_POST['ten'];
    $diachi = $_POST['diachi'];
    $namxd = $_POST['namxd'];

    $sql = "INSERT INTO ksan (MAKS, TEN, DIACHIKS, NAMXD) VALUES ('$maks', '$ten', '$diachi', '$namxd')";
    if ($mysql->query($sql) === TRUE) {
            echo "<script>alert('Thêm thành công!'); window.location.href='".$_SERVER['PHP_SELF']."';</script>";
        }
    mysqli_query($mysql, $sql);
}

// Xử lý xoá
if (isset($_POST['xoa'])) {
    $maks = $_POST['xoa'];
    $sql = "DELETE FROM ksan WHERE MAKS = '$maks'";
    if ($mysql->query($sql) === TRUE) {
            echo "<script>alert('Xoá thành công!'); window.location.href='".$_SERVER['PHP_SELF']."';</script>";
        }
    mysqli_query($mysql, $sql);
}

    $sql="SELECT * FROM ksan";
    $result=mysqli_query($mysql,$sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="qlks.css">
</head>
    <body>
    <style>
        /* Reset mặc định */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Body */
body {
    background-color: #f4f6f8;  /* Màu nền nhẹ nhàng */
    padding: 40px;
    font-size: 16px;
    color: #333;
}

/* Form chính */
form {
    max-width: 500px; /* Điều chỉnh độ rộng của form */
    margin: 50px auto; /* Căn giữa form */
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    text-align: center; /* Căn giữa nội dung trong form */
    border: 1px solid #e0e0e0; /* Thêm viền nhẹ */
}

/* Tiêu đề form */
form h2 {
    color: #007bff;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
}

/* Nhóm input căn giữa và nằm thẳng hàng theo chiều dọc */
.form-group {
    display: flex;
    flex-direction: column;  /* Đặt các input theo chiều dọc */
    align-items: center;     /* Căn giữa các input */
    gap: 18px;               /* Khoảng cách giữa các input */
    margin-bottom: 25px;
}

/* Input */
form input {
    padding: 12px;
    width: 100%;              /* Độ rộng 100% để dễ dàng thay đổi theo màn hình */
    max-width: 380px;         /* Đảm bảo input không quá rộng */
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: 0.3s;
    font-size: 16px;
    background-color: #fafafa; /* Nền input sáng */
}

/* Hiệu ứng hover và focus cho input */
form input:focus {
    border-color: #007bff;
    outline: none;
    background-color: #e6f7ff; /* Màu nền sáng khi focus */
}

/* Nút Thêm */
form button[name="them"] {
    padding: 12px 30px;
    background-color: #28a745;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    max-width: 380px;
    font-size: 16px;
    transition: 0.3s;
    margin-top: 20px;
}

form button[name="them"]:hover {
    background-color: #218838;
}

/* Bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);  /* Tạo bóng mờ cho bảng */
    border-radius: 8px;  /* Bo tròn góc bảng */
    background-color: #fff;  /* Nền bảng trắng */
}

table thead {
    background-color: #007bff;  /* Màu nền của tiêu đề bảng */
    color: white;
    font-size: 16px;
    font-weight: bold;
    border-top-left-radius: 8px;  /* Bo tròn góc trái */
    border-top-right-radius: 8px;  /* Bo tròn góc phải */
}

table th, table td {
    padding: 14px;
    border: 1px solid #ddd;  /* Viền nhẹ giữa các ô */
    font-size: 14px;
    color: #333;  /* Màu chữ */
}

table tr:nth-child(even) {
    background-color: #f8f9fa;  /* Màu nền của các hàng chẵn */
}

table tr:nth-child(odd) {
    background-color: #ffffff;  /* Màu nền của các hàng lẻ */
}

table tr:hover {
    background-color: #f1f1f1;  /* Hiệu ứng hover khi di chuột vào hàng */
    cursor: pointer;
}

table th {
    text-align: center;  /* Canh giữa tiêu đề cột */
    border-bottom: 2px solid #007bff;  /* Thêm đường viền dưới tiêu đề cột */
}

table td {
    text-align: center;  /* Canh giữa nội dung trong các ô */
}

button[name="xoa"] {
    padding: 8px 16px;
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
}

button[name="xoa"]:hover {
    background-color: #c82333;
}

    </style>
    <h2 style="text-align: center; margin-bottom: 20px;">Quản lý khách sạn</h2>

        <form method="post" action="">
            <div class="form-group">
            <input name="maks" placeholder="Mã KS">
            <input name="ten" placeholder="Tên">
            <input name="diachi" placeholder="Địa chỉ">
            <input name="namxd" placeholder="Năm XD">
            </div>
            <button name="them" >Thêm</button>
            
        <table>
            <thead>
                <tr>
                <th>Mã KS</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Năm xây dựng</th>
                <th>Hành động</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                    while($row=mysqli_fetch_assoc($result)){
                ?>

                <tr>
                <td><?php echo $row['MAKS'] ?></td>
                <td><?php echo $row['TEN'] ?></td>
                <td><?php echo $row['DIACHIKS'] ?></td>
                <td><?php echo $row['NAMXD'] ?></td>
                <td><button type="submit" name="xoa" value="<?php echo $row['MAKS']; ?>" onclick=\"return confirm('Bạn có chắc muốn xóa?');\">Xoá</button></td>
                </tr>
            <?php 
            }
            ?>
            </tbody>
            
        </table>
        </form>
        
    </body>
</html>
