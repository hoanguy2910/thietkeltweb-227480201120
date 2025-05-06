<?php 
    $username="root";
    $passwprd="";
    $server="localhost";
    $dbname="sinhvien";
    //Kết nối database sinhvien
    $connect=mysqli_connect($server,$username,$passwprd,$dbname);
    //Nếu kết nối bị lỗi thì báo lỗi và thoát.
    if(!$connect){
        die("Không kết nối: ".mysqli_connect_error());
        exit();
    }
    //Khai báo giá trị ban đầu, khi chưa submit câu lệnh Insert sẽ báo lỗi
    $msv="";
    $hoten="";
    $nganhhoc="";
    $tongdiem="";
    //Lấy giá trị POST từ form vừa submit
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["txtMsv"])){
            $msv=$_POST['txtMsv'];
        }
        if(isset($_POST["txtHoten"])){
            $hoten=$_POST['txtHoten'];
        }
        if(isset($_POST["txtNganhhoc"])){
            $nganhhoc=$_POST['txtNganhhoc'];
        }
        if(isset($_POST["txtTongdiem"])){
            $tongdiem=$_POST['txtTongdiem'];
        }
        //Xử lý, Insert dữ liệu vào danh sách
        $sql="INSERT INTO `danhsach`(`msv`, `hoten`, `nganhhoc`, `tongdiem`) VALUES ('$msv','$hoten','$nganhhoc','$tongdiem')";
        if(mysqli_query($connect,$sql)){
            echo"Thêm thành công";
        }else{
            echo"Error: ".$sql."<br>".mysqli_error($connect);
        }
    }
    //Đóng kết nối database
    mysqli_close($connect);
?>