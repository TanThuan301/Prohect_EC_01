<?php include("connect_db/connection_db.php");
session_start();
// if (!isset($_SESSION['thanhcong'])) {

?>
<?php

// Dang xuat
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {

    if ($_GET[''])
        session_destroy();
    header('Location: index.php');
}

if (isset($_POST['thanhtoangh'])) {
    $kh = $_SESSION['thanhcong'];
    $id_kh = $kh['tendangnhap'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phonenumber'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $commune = $_POST['commune'];
    $adress = $_POST['diachicuthe'];
    $hinhthucthanhtoangh = $_POST['phuongthucthanhtoan'];
    if (empty($id_kh) || empty($fullname) || empty($phone) || empty($city) || empty($district) || empty($commune) || empty($adress) || empty($hinhthucthanhtoangh)) {
?>
        <script>
            // alert("hjd")
            setTimeout(function() {
                swal("Error", "Vui lòng nhập đầy đủ thông tin trước khi thanh toán!", "error");
                // alert('dkf')
            }, 300)
        </script>
        <?php
    } else {
        if ($hinhthucthanhtoangh == 1) {
            $magiaodich = rand(1000, 10000);
            if (!empty($_POST['id_sp_thanhtoan'])) {
                // var_dump($_POST['id_sp_thanhtoan']);
                for ($i = 0; $i < count($_POST['id_sp_thanhtoan']); $i++) {
                    $id_sp = $_POST['id_sp_thanhtoan'][$i];
                    $quantity = $_POST['quantity_sp_thanhtoan'][$i];
                    // var_dump($id_sp);
                    // var_dump($quantity);
                    $thanhtoan_dh = mysqli_query($con, "INSERT INTO `tbl_donhang`( `ten_kh`, `id_sanpham`, `soluong`,  `magiaodich`) 
                                                            VALUES ('$id_kh','$id_sp','$quantity','$magiaodich')");
                    $sql_gd = "INSERT INTO `tbl_giaodich`( `id_sanpham`, `id_khachhang`, `soluong`, `magiaodich`, `tennguoinhan`, `diachinhanhang`, `tinh_thanhpho`, `sdtnh`, `pt_thanhtoan`, `phuong_xa`, `quan_huyen`)
                                         VALUES ('$id_sp','$id_kh','$quantity','$magiaodich','$fullname','$adress',' $city','$phone',' $hinhthucthanhtoangh','$commune','$district')";
                    $thanhtoan_gd = mysqli_query($con, $sql_gd);
                }
        ?>
                <script>
                    localStorage.removeItem('data_gh');
                    setTimeout(function() {
                        swal("Good", "Cảm ơn bạn đã đặt hàng . Chúng tôi sẽ liên hệ lại bạn để xác nhận đơn hàng", "success").then(() => {
                            window.location = 'chitietdhnguoidung.php?quanly=chitietdonhang&magiaodich=<?php echo $magiaodich ?>';

                        });
                    }, 200)
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Bạn chưa có sản phẩm nào để thanh toán !')
                </script>
            <?php
            }
        } else if ($hinhthucthanhtoangh == 2) {
            $tongtien = $_POST['tongtien_hiden'];
            // var_dump($tongtien);exit;
            $magiaodich1 = rand(11000, 90000);
            $_SESSION['magiaodich'] = $magiaodich1;
            $_SESSION['tongtien'] = $tongtien;
            var_dump($magiaodich1);
            var_dump($_SESSION['magiaodich']);

            if (!empty($_POST['id_sp_thanhtoan'])) {

                for ($i = 0; $i < count($_POST['id_sp_thanhtoan']); $i++) {
                    $id_spthanhtoan = $_POST['id_sp_thanhtoan'][$i];
                    $soluong_sp = $_POST['quantity_sp_thanhtoan'][$i];
                    $thanhtoan_dh = mysqli_query($con, "INSERT INTO `tbl_donhang`( `ten_kh`, `id_sanpham`, `soluong`,  `magiaodich`) 
                    VALUES ('$id_kh','$id_spthanhtoan','$soluong_sp','$magiaodich1')");
                    $sql_gd = "INSERT INTO `tbl_giaodich`( `id_sanpham`, `id_khachhang`, `soluong`, `magiaodich`, `tennguoinhan`, `diachinhanhang`, `tinh_thanhpho`, `sdtnh`, `pt_thanhtoan`, `phuong_xa`, `quan_huyen`)
                                    VALUES ('$id_spthanhtoan','$id_kh','$soluong_sp','$magiaodich1','$fullname','$adress',' $city','$phone',' $hinhthucthanhtoangh','$commune','$district')";
                    $thanhtoan_gd = mysqli_query($con, $sql_gd);
                }
            ?>
                <script>
                    localStorage.removeItem('data_gh');
                    setTimeout(function() {
                        swal({
                            title: "Good",
                            text: "Cảm ơn bạn đã đặt hàng. Vui lòng chọn tiếp tục để thanh toán bằng ví MOMO!",
                            icon: "success",
                            button: "Tiếp tục!",
                        }).then(() => {
                            <?php  //header('Location:php/init_payment.php'); 
                            ?>
                            location.href = 'php/init_payment.php'
                        });
                    }, 200)
                    // swal("Good", "Cảm ơn bạn đã đặt hàng . Chúng tôi sẽ liên hệ lại bạn để xác nhận đơn hàng", "success");
                </script>
            <?php
            } else {
            ?>

                <script>
                    alert("khong co sp")
                </script>
<?php
            }
        }
        // var_dump($kh,"aaa",$id_kh,"aaa",$fullname,"aaa",$phone,"aaa",$city,"aaa",$district,"aaa",$commune,"aaa",$adress,"aaa",$hinhthucthanhtoangh,"aaa",$id_sp,"aaa",$quantity);

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
    <!-- scroll -->
    <link rel="stylesheet" href="assets/css/scroll.css">
    <script src="/assets/js/scroll.js"></script>

    <!--modal-->
    <script src="./assets/js/modal.js"></script>
    <!-- show thong bao -->
    <script src="./assets/js/sweetalert.min.js"></script>

    <!-- ********** -->
    <link rel="stylesheet" href="./assets/css/cdnjs_normalize.css">
    <link href="assets/fontawesome-free-5.15.3/css/all.min.css" rel="stylesheet">
    <!--load all styles -->
    <!-- css js chi tiet sp -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" /> -->

    <link href="assets/css/stylechitietsp.css" rel="stylesheet" type="text/css" media="all" />



    <title>Sản phẩm</title>
</head>

<body>
    <div class="app">
        <!-- Tiêu đề -->


        <?php
        include("heading.php");
        ?>
        <!-- Nội dung -->
        <div class="container">


            <div class="grid wide">
                <form action="" method="POST">
                    <div class="row container-content">
                        <form>
                            <div class="col l-7 tacadonhang">

                                <div class="heder_cart_gh" style="display:flex;justify-content:space-between">
                                    <h2 class="text_heding">Thanh toán</h2>
                                    <div class="btn_quaylai_gh" style="/* margin: 26px; */font-size: 1.8rem;padding: 3%; cursor: pointer;color: #0742bb;" onclick="history.back()"><i class="fa-solid fa-caret-left"></i> Quay lại</div>
                                </div>

                                <?php
                                // $sSQL_select_gh = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE ")
                                ?>
                                <?php
                                // $idkh = $_SESSION['thanhcong'];
                                // $id_kh = $idkh['tendangnhap'];
                                // $sql = "SELECT * FROM tbl_giohang,tbl_khachhang,tbl_sanpham,tbl_cauhinh WHERE tbl_sanpham.id_sp=tbl_giohang.id_sp AND tbl_giohang.id_khachhang=tbl_khachhang.tendangnhap AND tbl_giohang.id_khachhang='$id_kh' AND tbl_sanpham.cauhinh=tbl_cauhinh.ID";
                                // $sql_select_gh = mysqli_query($con, $sql);

                                // while ($row_gh = mysqli_fetch_array($sql_select_gh)) {
                                ?>

                                <!-- Lay du lieu bang localStorage -->



                                <!-- <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_gh['id_sp'] ?>"> -->
                                <!-- <input type="hidden" name="thanhtoan_soluong[]" value=" //echo $row_gh['soluongspgh'] ?>"> -->




                                <div class="thanhtoan_gh_row" style="margin-top:10px">
                                    <div class="" data-id_itemsp="` + item.product.id_gh + `" style=" background-color: #fff;border-radius: 10px;box-shadow: 0px 3px rgb(236 236 230 / 87%); padding: 15px; margin-top: 20px; ">
                                        <div class="row" style="padding: 10px;">
                                            <!-- Img -->
                                            <h3 style="width: 100%;font-size: 1.7rem;padding: 0;margin: 0;">1. Thông tin liên hệ</h3>
                                            <div class="contain_lienhe" style="display: flex;/* justify-content: space-between; */width: 100%;">
                                                <div class="col l-6">
                                                    <div class="thongtinlienhe_left" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.4rem;">Họ tên</h4>
                                                        <input name="fullname" type="Text" value="<?php
                                                                                                    $tenkh0001 = $_SESSION['thanhcong'];
                                                                                                    echo $tenkh0001['hoten'];

                                                                                                    ?>" placeholder="Tên người nhận" style="width: 220px;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;">
                                                    </div>
                                                </div>
                                                <!-- Contain -->
                                                <div class="col l-6">
                                                    <div class="thongtinlienhe_right" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.4rem;">Số điện thoại</h4>
                                                        <input name="phonenumber" type="Text" value="<?php
                                                                                                        echo $tenkh0001['sdt'];
                                                                                                        ?>" placeholder="Số điện thoại người nhận" style="width: 220px;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4; padding:5px;   font-size: 1.5rem;">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="thanhtoan_gh_row" style="margin-top:10px">
                                    <div class="" data-id_itemsp="` + item.product.id_gh + `" style=" background-color: #fff;border-radius: 10px;box-shadow: 0px 3px rgb(236 236 230 / 87%); padding: 15px; margin-top: 20px; ">
                                        <div class="row" style="padding: 10px;">
                                            <!-- Img -->
                                            <h3 style="width: 100%;font-size: 1.7rem;padding: 0;margin: 0;">2. Địa chỉ nhận hàng</h3>
                                            <div class="contain_lienhe" style="display: flex;/* justify-content: space-between; */width: 100%;">
                                                <div class="col l-7">
                                                    <div class="thongtinlienhe_left" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.4rem;">Tỉnh / Thành phố </h4>
                                                        <!-- <input type="Text" value="" placeholder="Tên người nhận" style="width: 220px;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;"> -->
                                                        <div class="form-group_nhanhang">
                                                            <select name="city" class="form-select form-select-sm" id="city" aria-label=".form-select-sm" style="width: 80%;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;">
                                                                <option value="" selected>Chọn Tỉnh / Thành phố</option>
                                                            </select>
                                                        </div>


                                                    </div>
                                                    <div class="thongtinlienhe_left" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.4rem;">Quận / Huyện</h4>
                                                        <!-- <input type="Text" value="" placeholder="Tên người nhận" style="width: 80%;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;"> -->
                                                        <div class="form-group_nhanhang">
                                                            <select name="district" class="form-select form-select-sm " id="district" aria-label=".form-select-sm" style="width: 80%;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;">
                                                                <option value="" selected>Chọn Quận / Huyện</option>
                                                            </select>
                                                        </div>


                                                    </div>
                                                    <div class="thongtinlienhe_left" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.4rem;">Phường / Xã</h4>
                                                        <!-- <input type="Text" value="" placeholder="Tên người nhận" style="width: 80%;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;"> -->
                                                        <div class="form-group_nhanhang">
                                                            <select name="commune" class="form-select form-select-sm" id="ward" aria-label=".form-select-sm" style="width: 80%;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;">
                                                                <option value="" selected>Chọn Phường / Xã</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="thongtinlienhe_left" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.4rem;">Địa chỉ cụ thể </h4>
                                                        <input type="Text" value="" name="diachicuthe" placeholder="Số nhà - Tòa - Khu vực" style="width: 80%;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;    font-size: 1.5rem;padding:5px;">

                                                    </div>



                                                    <!-- <div class="form-group_nhanhang">
                                                        <input type="text" class="form-control-thanhtoan" value="<?php echo $idkh['sdt'] ?> " name="diachi">

                                                    </div> -->
                                                </div>
                                                <!-- Contain -->
                                                <div class="col l-5">
                                                    <div class="thongtinlienhe_right" style="">
                                                        <img src="assets/image/giaotannoi.png" alt="" srcset="" style='width:100%;height:100%'>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="thanhtoan_gh_row" style="margin-top:10px">
                                    <div class="" data-id_itemsp="` + item.product.id_gh + `" style=" background-color: #fff;border-radius: 10px;box-shadow: 0px 3px rgb(236 236 230 / 87%); padding: 15px; margin-top: 20px; ">
                                        <div class="row" style="padding: 10px;">
                                            <!-- Img -->
                                            <h3 style="width: 100%;font-size: 1.7rem;padding: 0;margin: 0;">3. Phương thức thanh toán</h3>
                                            <div class="contain_lienhe" style="display: flex;/* justify-content: space-between; */width: 100%;">
                                                <div class="col l-6">
                                                    <div class="thongtinlienhe_left" style="font-size: 1.6rem;margin: 0;">
                                                        <!-- <h4 style="font-weight: 200;font-size: 1.4rem;">Thanh toán khi nhận hàng</h4> -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="phuongthucthanhtoan" id="flexRadioDefault1" value="1" checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Thanh toán khi nhận hàng
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Contain -->
                                                <div class="col l-6">
                                                    <div class="thongtinlienhe_right" style="font-size: 1.6rem;margin: 0;">
                                                        <!-- <h4 style="font-weight: 200;font-size: 1.4rem;">Momo</h4> -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="phuongthucthanhtoan" value="2" id="flexRadioDefault2">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Thanh toán qua
                                                                <img src="assets/image/momo1.png" alt="" srcset="" style="    border-style: none;width: 80px;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <?php


                                // }
                                ?>

                            </div>
                            <!-- // Xoa san pham gio hang -->



                        </form>
                        <div class="col l-5 tacadonhang">

                            <h1 class="heading_textdh">Thanh toán</h1>



                            <div class="cart-total">

                                <div class="thanhtoan_gh_row" style="margin-top:10px">
                                    <div class="" data-id_itemsp="` + item.product.id_gh + `" style=" background-color: #fff;border-radius: 10px;box-shadow: 0px 3px rgb(236 236 230 / 87%); padding: 15px; margin-top: 20px; ">
                                        <div class="row" style="padding: 35px;">
                                            <!-- Img -->
                                            <h1 class="heading_textdh" style="margin: 0;padding: 0;font-size: 2rem;margin-left:100px;"></i>Đơn hàng của bạn</h1>


                                            <div class="thongtindiachinhanhang" style="width: 100%;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="datetime_tt" style="font-size: 1.3rem;margin-left: 40%;">
                                                        <!-- Date: 22-12-2001 Time: -->

                                                    </span>

                                                </div>

                                            </div>
                                            <script>
                                                var myVar = setInterval(function() {
                                                    Clock()
                                                }, 0);

                                                function Clock() {
                                                    a = new Date();
                                                    w = Array("Chủ Nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy");
                                                    var a = w[a.getDay()],
                                                        w = new Date,
                                                        d = w.getDate();
                                                    m = w.getMonth() + 1;
                                                    y = w.getFullYear();
                                                    h = w.getHours();
                                                    mi = w.getMinutes();
                                                    se = w.getSeconds();
                                                    if (10 > d) {
                                                        d = "0" + d
                                                    }
                                                    if (10 > m) {
                                                        m = "0" + m
                                                    }
                                                    if (10 > h) {
                                                        h = "0" + h
                                                    }
                                                    if (10 > mi) {
                                                        mi = "0" + mi
                                                    }
                                                    if (10 > se) {
                                                        se = "0" + se
                                                    }
                                                    var datetime_tt = document.querySelector('#datetime_tt');
                                                    datetime_tt.innerHTML = "" + a + ", " + d + " / " + m + " / " + y + " - " + h + ":" + mi + ":" + se + "";
                                                    // document.getElementById("clockDiv").innerHTML = "Hôm nay: " + a + ", " + d + " / " + m + " / " + y + " - " + h + ":" + mi + ":" + se + "";
                                                }
                                                console.log(h, mi, se);
                                            </script>

                                            <div class="thongtindiachinhanhang">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Tạm tính: <input type="text" style="background: none;border: none;width: 160px;font-weight: 700;/* display: inline-block; */" disabled='disable' value="" class="" id="thanhthoantomtat_tamtinh"></input></span>

                                                </div>

                                            </div>

                                            <div class="thongtindiachinhanhang">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Khuyến mãi: <input type="text" style="    background: none;border: none;width: 160px;/* display: inline-block; */" disabled='disable' value="" id="thanhthoantomtat_khuyenmai"></input></span>

                                                </div>

                                            </div>

                                            <div class="thongtindiachinhanhang" style="border-top: 1px solid;margin-top: 40px;padding-top: 20px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Tổng cộng: <input type="text" style="background: none;border: none;width: 160px;color: red;font-weight: 800;" disabled='disable' value="" id="thanhthoantomtat_tongcong" name="thanhthoantomtat_tongcong"></input></span>

                                                </div>

                                            </div>
                                            <p style="width: 100%;font-size: 1.2rem;color: #078ac9;">Chúng tôi sẽ liên hệ lại với bạn để xác nhận đơn hàng và chi phí vận chuyển.</p>
                                            <div style="margin-top: 1em;">

                                                <input type="submit" class="btn_thanhtoan" value="Thanh toán" name="thanhtoangh">
                                                <input type="hidden" value="" name="tongtien_hiden" id='tongtien_hiden'>
                                            </div>
                                            <div class="thanhtoangh_hiden"></div>
                                            <!-- Input hiden du lieu submit -->




                                        </div>

                                    </div>
                                </div>



                                <script>
                                    function thanhtoandonhang() {
                                        var storage = JSON.parse(localStorage.getItem('data_gh'));
                                        // console.log(storage)
                                        var total = 0;
                                        var thanhtoangh_hiden = document.querySelector('.thanhtoangh_hiden');
                                        var tongtien_hiden = document.querySelector('#tongtien_hiden');
                                        // console.log(storage.length)
                                        for (var i = 0; i < storage.length; i++) {
                                            // console.log(data);
                                            total += (parseInt(storage[i].product.giakhuyenmai.replaceAll('.', '')) * storage[i].quantity);
                                            thanhtoangh_hiden.innerHTML += `
                                            <input type="hidden" value="` + storage[i].product.id_gh + `" name="id_sp_thanhtoan[]">
                                            <input type="hidden" value="` + storage[i].quantity + `" name="quantity_sp_thanhtoan[]">
                                            `
                                        }

                                        tongtien_hiden.value = total;
                                        // storage.forEach((data, index) => {
                                        //             console.log(data);
                                        //     total += (parseInt(data.product.giakhuyenmai.replaceAll('.', '')) * data.quantity);
                                        //     thanhtoangh_hiden.innerHTML = `
                                        //     <input type="text" value="` + data.product.id_gh + `" name="id_sp_thanhtoan[]">
                                        //     <input type="text" value="` + data.quantity + `" name="quantity_sp_thanhtoan[]">`

                                        // })

                                        var formatTotal = new Intl.NumberFormat('it-IT').format(total);

                                        var thanhthoantomtat_tamtinh = document.querySelector('#thanhthoantomtat_tamtinh');
                                        var thanhthoantomtat_khuyenmai = document.querySelector('#thanhthoantomtat_khuyenmai');
                                        var thanhthoantomtat_tongcong = document.querySelector('#thanhthoantomtat_tongcong');
                                        thanhthoantomtat_tamtinh.value = formatTotal + ' VNĐ';
                                        thanhthoantomtat_khuyenmai.value = 0;
                                        thanhthoantomtat_tongcong.value = formatTotal + 'VNĐ';

                                        var btn_thanhtoan_th = document.querySelector('.btn_thanhtoan');
                                        if (storage.length == -0 || storage == null) {
                                            btn_thanhtoan_th.disabled = true;
                                            btn_thanhtoan_th.style.background = '#b3b3b3'
                                        } else {
                                            btn_thanhtoan_th.disabled = false;
                                            // btn_thanhtoan_th.style.background='#b3b3b3'
                                        }
                                    }
                                    thanhtoandonhang();
                                </script>
                            </div>


                            <!-- <h2 class="text_heding">Phương thức thanh toán</h2>
                            <select name="phuongthucthanhtoan" id="" class="phuongthucthanhtoan">

                                <option value="0">Chọn phương thức thanh toán</option>
                                <option value="1">Thanh toán khi nhận hàng</option>
                                <option value="2">Thanh toán momo</option>
                            </select> -->





                        </div>

                    </div>
                </form>
            </div>

        </div>
        <style>
            .heading_textdh {
                font-size: 2.5rem;
                text-align: center;
            }

            .tieude {
                background-color: darkgoldenrod;
            }

            .text_heding {
                font-size: 1.8rem;
            }

            .phuongthucthanhtoan {
                font-size: 2rem;
                margin-bottom: 20px;
                padding: 4px 4px;
            }

            .btn_thanhtoan {
                font-size: 2rem;
                padding: 8px 4px;
                border-radius: 4px;
                border: none;
                background-color: #1dbfaf;
                outline: none;
                font-weight: 600;
                color: #fff;
                border: none;
                cursor: pointer;
                margin-left: 100%;
                margin-top: 10%;
                margin-bottom: 5px;
            }
        </style>
        <!-- Cuoi -->
        <?php
        include("footer.php");
        ?>

        <!-- <script src="assets/js/axios.min.js"></script> -->
        <script src="./assets/js/axios.min.js"></script>
        <script src="assets/js/city.js"></script>