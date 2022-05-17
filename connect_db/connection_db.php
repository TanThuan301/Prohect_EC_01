<?php 
$host="localhost";
$user="root";
$pass="";
$database="doanwebbanhang";
$con=mysqli_connect($host,$user,$pass,$database);
if(mysqli_connect_errno()){
    // echo "Ket noi that bai";
}
else{
    //  echo "Thanh cong";
}
?>