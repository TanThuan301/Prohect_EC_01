<?php
session_start();
include('../../connect_db/connection_db.php');
?>
<?php

$error="";

if (isset($_POST['dangnhap']) ) {
	$tendangnhap = $_POST['email'];
	$matkhau = $_POST['password'];
	if ($tendangnhap ==''|| $matkhau =='') {
		$error="<span class='text_error'>Email hoặc mật khẩu không được bỏ trống</span>";
		
?>

		
<?php
	}
	else{
		$sSQL="SELECT * FROM `tbl_taikhoanadmin` WHERE tendangnhap='$tendangnhap' AND matkhau='$matkhau' ";
		$sql_select_admin=mysqli_query($con,$sSQL);
		// Kiem tra co ton tai tai khoan khong
		$count=mysqli_num_rows($sql_select_admin);
		// Lay du lieu tu database theo mang
		$row_dangnhap=mysqli_fetch_array($sql_select_admin);
		if($count>0){
			$_SESSION['tendangnhap']=$row_dangnhap['tendangnhap'];
			$_SESSION['matkhau']=$row_dangnhap['matkhau'];
			header('Location: index.php');
		}
		else{
				$error="<span class='text_error'>Tài khoản hoặc mật khẩu không đúng</span>";
		}
		
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleadmin.css">
	<script src="scriptadmin.js"></script>
	
	<title>Đăng nhập</title>
</head>

<body>
	<div class="main">


	     

		<?php echo($error)?>
		<form action="login.php?action=dangnhap" method="POST" class="form" id="form-2" >
			<h3 class="heading">Đăng nhập Admin</h3>
			<p class="desc">Chào mừng bạn đến với trang Admin</p>

			<div class="spacer"></div>

			<div class="form-group">
				<label for="email" class="form-label">Email</label>
				<input id="email" name="email" type="text" value="" placeholder="VD: email@domain.com" class="form-control">
				<span class="form-message"></span>
			</div>

			<div class="form-group">
				<label for="password" class="form-label">Mật khẩu</label>
				<input id="password" name="password" value="" type="password" placeholder="Nhập mật khẩu" class="form-control">
				<span class="form-message "></span>
			</div>

			<input type="submit" name="dangnhap" class="form-submit" value="Đăng nhập">
		</form>

	</div>

	
</body>

</html>