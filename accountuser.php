<?php include("connect_db/connection_db.php");
session_start();
// if (!isset($_SESSION['thanhcong'])) {

?>
<?php

// header('Location: index.php');
// }
// Dang xuat
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {

    if ($_GET[''])
        session_destroy();
    header('Location: index.php');
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
                        <?php
                        if (isset($_SESSION['thanhcong'])) {
                            $thanhcong = $_SESSION['thanhcong'];
                            $tenuser = $thanhcong['hoten'];
                            $phone_user = $thanhcong['sdt'];
                            $email_user = $thanhcong['tendangnhap'];
                            // var_dump($phone_user);



                        ?>
                            <div class="col l-12 tacadonhang">

                                <div class="heder_cart_gh" style="display:flex;justify-content:space-between">
                                    <h2 class="text_heding" style="margin: 0;margin-top: 4%;margin-left: 35%;font-size: 3rem;">Thông tin tài khoản</h2>
                                    <div class="btn_quaylai_gh" style="/* margin: 26px; */font-size: 1.8rem;padding: 3%; cursor: pointer;color: #0742bb;" onclick="history.back()"><i class="fa-solid fa-caret-left"></i> Quay lại</div>
                                </div>
                                <div class="thanhtoan_gh_row" style="margin-top:10px">
                                    <div class="" data-id_itemsp="` + item.product.id_gh + `" style=" background-color: #fff;border-radius: 10px;box-shadow: 0px 3px rgb(236 236 230 / 87%); padding: 15px; margin-top: 20px; ">
                                        <div class="row" style="padding: 10px;">
                                            <!-- Img -->
                                            <h3 style="width: 100%;font-size: 1.7rem;padding: 0;margin: 0;">1. Thông tin người dùng</h3>
                                            <div class="contain_lienhe" style="display: flex;/* justify-content: space-between; */width: 100%;">
                                                <div class="col l-4">
                                                    <div class="thongtinlienhe_left" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.8rem;">Họ tên: <input name="fullname" type="Text" value="<?php echo $tenuser?>" style="outline: none; width: 220px;height: 40px;/* border-radius: 5px; */border: 1px solid #ddd4d4;font-size: 1.8rem;padding:5px;border: none;border-bottom: 1px solid;font-weight: 600;"></h4>
                                                        <!-- <input name="fullname" type="Text" value="" placeholder="Tên người nhận" style="width: 220px;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4;font-size: 1.5rem;padding:5px;"> -->
                                                        <!-- Mã quốc gia: <input type="text" name="maquocgia" pattern="[A-Za-z]{3}" title="Mã quốc gia có 3 chữ cái"> -->
                                                    </div>
                                                </div>
                                                <!-- Contain -->
                                                <div class="col l-4">
                                                    <div class="thongtinlienhe_right" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.8rem;">Số điện thoại: <input name="sđt" pattern="{10}" title="Bạn nhập không đúng số điện thoại" type="number" value="<?php echo  $phone_user?>" style="outline: none; width: 220px;height: 40px;/* border-radius: 5px; */border: 1px solid #ddd4d4;font-size: 1.8rem;padding:5px;border: none;border-bottom: 1px solid;font-weight: 600;"></h4>
                                                        <!-- <input name="phonenumber" type="Text" value="" placeholder="Số điện thoại người nhận" style="width: 220px;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4; padding:5px;   font-size: 1.5rem;"> -->
                                                    </div>
                                                </div>
                                                <div class="col l-4">
                                                    <div class="thongtinlienhe_right" style="font-size: 1.6rem;margin: 0;">
                                                        <h4 style="font-weight: 200;font-size: 1.8rem;">Email: <input name="email"  title="Bạn nhập không đúng email" type="text" value="<?php echo $email_user ?>" style="outline: none; width: 220px;height: 40px;/* border-radius: 5px; */border: 1px solid #ddd4d4;font-size: 1.8rem;padding:5px;border: none;border-bottom: 1px solid;font-weight: 600;"></h4>
                                                        <!-- <input name="phonenumber" type="Text" value="" placeholder="Số điện thoại người nhận" style="width: 220px;height: 40px;border-radius: 5px;border: 1px solid #ddd4d4; padding:5px;   font-size: 1.5rem;"> -->
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




                            </div>
                            <!-- // Xoa san pham gio hang -->


                        <?php


                        }
                        ?>




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
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="assets/js/city.js"></script>