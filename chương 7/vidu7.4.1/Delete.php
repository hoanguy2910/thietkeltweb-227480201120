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
    
    
    $msv=$_POST['txtMsv'];
        
        //Xử lý, Insert dữ liệu vào danh sách
        $sql="DELETE FROM `danhsach` WHERE `msv` ='$msv'";
        if(mysqli_query($connect,$sql)){
            echo"Xoá thành công";
        }else{
            echo"Error: ".$sql."<br>".mysqli_error($connect);
        }
    
    //Đóng kết nối database
    mysqli_close($connect);
?>