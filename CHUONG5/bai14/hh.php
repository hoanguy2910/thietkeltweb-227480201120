<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Nhập số dòng: <input name="row" required><br><br>
        Nhập số cột: <input name="coll" required><br><br>
        Nhập vào các phần tử mảng: <textarea name=text rows="5" cols="30"></textarea><br><br>
        1.Tìm số lớn nhất trong ma trận<br><br>
        2.Tìm số nhỏ nhất trong ma trận<br><br>
        3.Tính tống các số trong ma trận<br><br>
        4.In ra màn hình theo dạng toán học<br><br>
        Chọn công việc: <input name="so"> <button type="submit" name="chon">Chọn</button>
    </form>
    
    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $row=$_POST['row'];
            $coll=$_POST['coll'];
            $text=$_POST['text'];
            $chon=$_POST['so'];

            $so=array_map('intval',explode(' ',$text));
            if (count($so) != $row * $coll) {
                echo "Số phần tử không phù hợp với kích thước ma trận ($row x $coll). Vui lòng nhập lại!";
                exit;
            }
            $mang=[];
            $index=0;
            for($i=0;$i<$row;$i++){
                $mang[$i]=array_slice($so,$index,$coll);
                $index += $coll;
            }
            switch($chon){
                case 1:
                    $max = PHP_INT_MIN;
                    foreach($mang as $row){
                        $max = max($max,max($row));
                    }
                    echo"Số lớn nhất trong ma trận là: $max";
                    break;
                case 2:
                    $min = PHP_INT_MAX;
                    foreach($mang as $row){
                        $min = min($min,min($row));
                    }
                    echo"Số nhỏ nhất trong ma trận là: $min";
                    break;
                case 3:
                    $sum = 0;
                    foreach($mang as $row){
                        $sum += array_sum($row);
                    }
                    echo"Tổng các số trong ma trận là: $sum";
                    break;
                case 4:
                    echo"In ra theo dạng toán học:<br>";
                    foreach($mang as $row){
                       echo implode(' ',$row)."<br>";
                    }
                    break;
                default:
                    echo"Vui lòng chọn từ 1 - 4!";
                    break;
            }
        }
    ?>

</body>
</html>