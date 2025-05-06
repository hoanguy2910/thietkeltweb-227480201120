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
    $hoten=$_POST['txtHoten'];
    $nganhhoc=$_POST['txtNganhhoc']; 
    $tongdiem=$_POST['txtTongdiem'];
        
        //Xử lý, Insert dữ liệu vào danh sách
        $sql="UPDATE `danhsach` SET `hoten`='$hoten' WHERE `msv` ='$msv'";
        if(mysqli_query($connect,$sql)){
            echo"Cập nhật thành công";
        }else{
            echo"Error: ".$sql."<br>".mysqli_error($connect);
        }
    
    //Đóng kết nối database
    mysqli_close($connect);
?>