<?php include("connect_db/connection_db.php");
session_start(); ?>
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


    <!-- ********** -->
    <link rel="stylesheet" href="./assets/css/cdnjs_normalize.css">
    <link href="assets/fontawesome-free-5.15.3/css/all.min.css" rel="stylesheet">
    <!-- <link href="assets/fontawesome-free-5.15.3/css/all.min.css" rel="stylesheet"> -->
    <!--load all styles -->
    <!-- css js chi tiet sp -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <link href="assets/css/stylechitietsp.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    
   

    <title>Chi tiết Sản phẩm</title>
</head>

<body>
    <script>
        // function showNotice(value) {
        //     var container_notice = document.querySelector('body');
        //     // console.log(container_notice);
        //     var body_notice = document.getElementById('body_notice');
        //     var containHTML=value;
        //     // console.log(containHTML);

        //     container_notice.innerHTML = `<div id="exampleModalLive" class="modal_notice">
        //                             <div class="modal_overlay_notices" id="modal_overlay_notice"></div>
        //                             <div class="modal-dialog_notice" role="document">
        //                                 <div class="modal-content_notice">
        //                                     <div class="modal-header_notice">
        //                                         <div class="modal-title_notice">

        //                                             <p id="exampleModalLiveLabel"><i class="fa-solid fa-circle-exclamation" style="margin-right: 10px;"></i>Đã có lỗi xảy ra !</p>
        //                                         </div>

        //                                         <button type="button" class="close" id="btn_close_notice_x" data-dismiss="modal_notice" aria-label="Close">
        //                                             <span aria-hidden="true">×</span>
        //                                         </button>
        //                                     </div>
        //                                     <div class="modal-body_notice">
        //                                         <p>`+containHTML+`</p>
        //                                     </div>
        //                                     <div class="modal-footer_notice">
        //                                         <button type="button" class="btn btn-secondary btn_close_notice" id="btn_close_notice">Close</button>
        //                                         <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        //                                     </div>
        //                                 </div>
        //                             </div>
        //                              </div>`;

        // }
        // showNotice("Day la loi !")

        // var btn_notice = document.getElementById('btn_notice');
        // var exampleModalLive = document.getElementById('exampleModalLive')
        // var overlay_notice = document.getElementById('modal_overlay_notice');
        // var btn_close_notice = document.querySelector('#btn_close_notice');
        // var btn_close_notice_x = document.querySelector('#btn_close_notice_x');
        // console.log(btn_notice);
        // btn_notice.addEventListener('click', function() {
        //     exampleModalLive.style.display = "block";
        //     overlay_notice.style.display = "block";


        // })
        // overlay_notice.addEventListener('click', function() {
        //     exampleModalLive.style.display = "none";
        //     overlay_notice.style.display = "none";
        // })
        // btn_close_notice.addEventListener("click", function() {
        //     exampleModalLive.style.display = "none";
        //     overlay_notice.style.display = "none";
        // })
        // btn_close_notice_x.addEventListener("click", function() {
        //     exampleModalLive.style.display = "none";
        //     overlay_notice.style.display = "none";
        // })
        // btn_notice.style.display="block";
        // showNotice('Vui lòng đăng nhập để thêm vào giỏ hàng!')
    </script>


    <?php
    // if (isset($_POST['themgiohang'])) {
    //     if (!isset($_SESSION['thanhcong'])) {
    // ?>
           <script>
    //             alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!");
    //             // showNotice('Vui lòng đăng nhập để thêm vào giỏ hàng!')
    //         </script>
     <?php


    //     } else {

    //         $id_sp = $_POST['id_sp'];
    //         $tensp = $_POST['tensanpham'];
    //         // var_dump($tensp);exit;
    //         $giasp = $_POST['giakhuyenmaisp'];
    //         $hinhanh = $_POST['hinhanh'];
    //         $id_kh = $_SESSION['thanhcong'];
    //         $soluong = $_POST['soluongsp'];
    //         // var_dump($soluong);exit;
    //         $id_khachhang = $id_kh['tendangnhap'];
    //         // 1:L 2:M 3:XL
    //         $kichthuocsp = $_POST['kichthuocspgh'];
    //         // var_dump($kichthuocsp);exit;
    //         // Kiem tra gio hang co ton tai khong
    //         $sql_select_kiemtragh = mysqli_query($con, "SELECT * FROM `tbl_giohang`,`tbl_khachhang` WHERE tbl_giohang.id_khachhang=tbl_khachhang.tendangnhap AND tbl_giohang.id_sp='$id_sp' AND tbl_khachhang.tendangnhap='$id_khachhang'  ");

    //         $count = mysqli_num_rows($sql_select_kiemtragh);
    //         // var_dump(empty($count));exit;
    //         if ($count > 0) {
    //             $row_select_ktgh = mysqli_fetch_array($sql_select_kiemtragh);
    //             $soluongco = $row_select_ktgh['soluongspgh'] + $soluong;
    //             $sql_addgiohang = "UPDATE `tbl_giohang` SET `soluongspgh`='$soluongco' WHERE tbl_giohang.id_khachhang='$id_khachhang' and tbl_giohang.id_sp='$id_sp'";
    //         } else {
    //             $sql_addgiohang = "INSERT INTO `tbl_giohang`(`id_sp`, `tensanpham`, `hinhanh`, `soluongspgh`, `id_khachhang`,`kichthuoc`) 
    //         VALUES ('$id_sp','$tensp','$hinhanh','$soluong','$id_khachhang','$kichthuocsp')";
    //         }
    //         $sql_addgh = mysqli_query($con, $sql_addgiohang);
    //     ?>
        <script type="text/javascript">
    //             alert("Thêm vào giỏ hàng thành công vui lòng vào giỏ hàng để thanh toán");
    //             window.location='thanhtoan.php';
        </script>




        <?php

    //     }

        //  header("Location: product.php");
    // }
    if (isset($_POST['quaylaisp'])) {
        ?>
        <script>
            window.location = 'index.php'
        </script>

    <?php
    }

    ?>




    <?php
    include("heading.php");
    ?>
    <!-- Nội dung -->
    <div class="container">


        <div class="grid wide">
            <div class="row container-content">
                <div class="banner-bootom-w3-agileits py-5">
                    <div class="container py-xl-4 py-lg-2">
                        <!-- tittle heading -->
                        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                            <span>C</span>hi
                            <span>T</span>iết
                            <span>S</span>ản
                            <span>P</span>hẩm
                        </h3>
                        <!-- //tittle heading -->
                        <?php
                        // if(isset($_GET['id_sp']))
                        //    var_dump($_GET['id_sp']);exit;
                        $id_sp = $_GET['id_sp'];
                        $id_cauhinh=$_GET['id_ch'];
                        $sql_select_sp = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_cauhinh WHERE id_sp='$id_sp' AND tbl_cauhinh.ID=tbl_sanpham.cauhinh AND tbl_sanpham.cauhinh='$id_cauhinh'");
                        $row_select_ctsp = mysqli_fetch_array($sql_select_sp);


                        ?>
                        <div class="row">
                            <div class="col l-6 col-md-8 single-right-left " style="box-shadow: 0px 2px #c6bdbd ;border-radius:5px;">
                                <div class="grid images_3_of_2">
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <li data-thumb="hinhanhsp/<?php echo $row_select_ctsp['hinhanhsp'] ?>">
                                                <div class="thumb-image">
                                                    <img src="hinhanhsp/<?php echo $row_select_ctsp['hinhanhsp'] ?>" data-imagezoom="true" class="img-fluid" alt="">
                                                </div>
                                            </li>
                                            <li data-thumb="hinhanhsp/<?php echo $row_select_ctsp['hinhanhsp'] ?>">
                                                <div class="thumb-image">
                                                    <img src="hinhanhsp/<?php echo $row_select_ctsp['hinhanhsp'] ?>" data-imagezoom="true" class="img-fluid" alt="">
                                                </div>
                                            </li>
                                            <li data-thumb="hinhanhsp/<?php echo $row_select_ctsp['hinhanhsp'] ?>">
                                                <div class="thumb-image">
                                                    <img src="hinhanhsp/<?php echo $row_select_ctsp['hinhanhsp'] ?>" data-imagezoom="true" class="img-fluid" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- <form action="" method="POST" class="marginleft"> -->
                                <div class="col l-6 single-right-left simpleCart_shelfItem " style="background: #fff;border-radius: 10px;padding:15px;box-shadow: 0px 2px #c6bdbd;">
                                    <h3 class="mb-3 text_tensp"><?php echo $row_select_ctsp['tensanpham'] ?></h3>
                                    <p class="mb-3">
                                        <span class="item_price giahienhanh"><?php echo $row_select_ctsp['giakhuyenmaisp'] ?> VND</span>
                                        <del class="mx-2 font-weight-light giagoc"><?php echo $row_select_ctsp['giasanpham'] ?> VND</del>

                                    </p>
                                    <div class="single-infoagile">
                                        <ul>
                                            <li class="mb-3">
                                                <h2>  Hình thức thanh toán</h2>
                                            </li>
                                            <li class="mb-3 " style="    margin-left: 10px;">
                                                * Thanh toán khi nhận hàng
                                            </li>

                                            <li class="mb-3"style="    margin-left: 10px;">
                                                * Thanh toán bằng thẻ ATM
                                            </li>
                                            <li class="mb-3"style="    margin-left: 10px;">
                                                * Thanh toán bằng MOMO
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-single-w3l">
                                        <p class="my-3 text_mota">
                                            <!-- <i class="far fa-hand-point-right mr-2"></i> -->
                                            <label> </label>Mô tả
                                        </p>
                                        <ul>
                                            <li class="mb-1">
                                                <?php echo $row_select_ctsp['chitietsp'] ?>
                                            </li>

                                        </ul>
                                        </div>
                                        <div class="my-sm-4 my-3 text_sl ">
                                            <label for="" class="text_kichthuoc">Số lượng:</label>
                                            <div class="btn_sl">
                                                <div class="btn_slsp" id="btn_giam" onclick=giamsl()>-</div>

                                                <input type="text" class="inputsoluong" name="soluongsp" value="1" id="input_sl">
                                                <div class="btn_slsp" id="btn_tang" onclick="tangsl()">+</div>

                                           </div>
                                                <div class="select_ktsp" style="display: none">
                                                    <label for="" class="text_kichthuoc">Kích thước:</label>
                                                    <select name="kichthuocspgh" class="form_controlkichthuoc">



                                                        <option value="1">L</option>

                                                        <option value="2">M</option>
                                                        <option value="3">XL</option>


                                                    </select>
                                                </div>


                                        </div>
                                        <!-- ************************ -->

                                        <style>
                                            .text_tensp {
                                                font-size: 2rem;
                                                display: block;
                                                font-weight: 700;
                                            }

                                            span.item_price.giahienhanh {
                                                font-size: 2.5rem;
                                            }

                                            .giagoc {
                                                font-size: 1.9rem;
                                                margin-left: 50px;
                                            }

                                            .text_sl {
                                                font-size: 1.7rem;
                                                display: flex;
                                            }

                                            .btn_sl {
                                                /* border: 1px solid #FFD; */
                                                height: -23px;
                                                display: flex;
                                                margin-left: 6px;
                                            }

                                            .inputsoluong {
                                                width: 50px;
                                                height: 32px;
                                                outline: none;
                                                font-size: 16px;
                                                font-weight: 700;
                                                border: none;
                                                text-align: center;
                                                cursor: text;
                                                border-radius: 0;
                                                border: 1px solid rgba(0, 0, 0, .09);

                                            }

                                            .btn_slsp {
                                                /* outline: none; */
                                                cursor: pointer;
                                                /* border: none; */
                                                font-size: 2rem;
                                                font-weight: 300;
                                                line-height: 1;
                                                /* letter-spacing: 0; */
                                                /* transition: background-color .1s cubic-bezier(.4, 0, .6, 1); */
                                                border: 1px solid rgba(0, 0, 0, .09);
                                                border-radius: 2px;
                                                background: #fff;
                                                color: rgba(0, 0, 0, .8);
                                                width: 32px;
                                                height: 32px;
                                                text-align: center;
                                                padding-top: 5px;

                                            }

                                            .select_ktsp {
                                                margin-left: 50px;
                                            }

                                            .text_kichthuoc {
                                                font-size: 1.9rem;
                                                padding-top: 6px;
                                                margin-left: 25px;
                                                font-weight: 700;
                                            }

                                            .form_controlkichthuoc {
                                                font-size: 1.9rem;
                                                margin-bottom: 10px;
                                                outline: none;
                                                padding: 4px 10px;
                                            }
                                        </style>
                                   
                                    <div class="occasion-cart"  style="    margin-top: 15%;">
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out btn_gh_ql" style="width:100%">

                                            <fieldset>
                                                <input type="hidden" name="tensanpham" value="<?php echo $row_select_ctsp['tensanpham'] ?>" id="gh_tensanpham" />
                                                <input type="hidden" name="id_sp" value="<?php echo $row_select_ctsp['id_sp'] ?>" id="id_gh_sanpham"/>
                                                <input type="hidden" name="giakhuyenmaisp" value="<?php echo $row_select_ctsp['giakhuyenmaisp'] ?>" id="gh_giasanpham_km"/>
                                                <input type="hidden" name="hinhanh" value="<?php echo $row_select_ctsp['hinhanhsp'] ?>" id="gh_hinhanhsanpham" />
                                                <input type="hidden" name="giasanpham" value="<?php echo $row_select_ctsp['giasanpham'] ?>"id="gh_giasanpham" />
                                                <input type="hidden" name="cauhinh" id="gh_cauhinhsanpham" value="CPU <?php echo $row_select_ctsp['CPU'] ?> - RAM <?php echo $row_select_ctsp['RAM']?> - SSD <?php echo $row_select_ctsp['OCUNG']?> - Màn hình <?php echo $row_select_ctsp['MANHINH']?>" />


                                                <input type="submit" name="themgiohang" value="Thêm Vào Giỏ Hàng" class="button" id='add_cart_sp' />
                                                <input style="background: #792727;" type="submit" name="quaylaisp" value="Quay lại" class="button" onclick="history.back()" />
                                            </fieldset>

                                        </div>
                                    </div>
                                    <style>

                                    </style>
                                </div>

                          
                            <script>
                                function giamsl() {
                                    var giam = document.querySelector('#btn_giam');
                                    var tang = document.querySelector('#btn_tang');
                                    var inputsl = document.querySelector('#input_sl');
                                    var inputsl_1 = inputsl.value;

                                    if (!isNaN(inputsl_1) && inputsl_1 > 1) {
                                        inputsl.value--;
                                    }
                                    return
                                }

                                function tangsl() {
                                    var giam = document.querySelector('#btn_giam');
                                    var tang = document.querySelector('#btn_tang');
                                    var inputsl = document.querySelector('#input_sl');
                                    var inputsl_1 = inputsl.value;

                                    if (!isNaN(inputsl_1)) {
                                        inputsl.value++;
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- js-files -->
        <!-- jquery -->
        <script src="assets/js/jquery-2.2.3.min.js"></script>

        <!-- imagezoom -->
        <script src="assets/js/imagezoom.js"></script>


        <!-- flexslider -->
        <link rel="stylesheet" href="assets/css/flexsliderctsp.css" type="text/css" media="screen" />

        <script src="assets/js/jquery.flexslider.js"></script>
        <script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    </div>
    <!-- Cuoi -->
    <?php
    include("footer.php");
    ?>
 <script src="assets/js/chitietsp.js"></script>
 <script src="./assets/js/sweetalert.min.js"></script>
</body>
