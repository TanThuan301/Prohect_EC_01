<?php include("connect_db/connection_db.php");
session_start();



?>
<!-- Xu li dang ki -->


<!-- Xu li dang nhap -->
<?php
// Bien luu tru

if (isset($_GET['action']) && $_GET['action'] == 'dangnhap') {
    $tendangnhap1 = $_POST['tendangnhap'];
    $matkhau1 = $_POST['matkhau'];
    if (empty($tendangnhap1) || empty($matkhau1)) {
?>
        <script>
            // var modal_dangnhap = document.getElementById("modal_id_dangnhap");
            //  alert("Vui lòng nhập đầy đủ thông tin");
            // modal_dangnhap.style.display = "flex";



            var modal_loi = document.getElementById("modal_id_loi");
            var btn_trolai_loi = document.getElementById("btn_loi_trolai");
            var nhan = document.querySelector('.xacminh_error');
            console.log(nhan);
            nhan.classList.add("active_error");


            // nhan.onclick = function() {
            //     modal_loi.style.display = "flex";
            // }

            // btn_overlay_loi.onclick = function() {
            //     modal_loi.style.display = "none";
            // }

            btn_trolai_loi.onclick = function() {
                modal_loi.style.display = "none";
            }
        </script>
        <?php

    } else {
        $sSQL1 = "SELECT `hoten`, `tendangnhap`, `matkhau`, `nhaplaimatkhau`, `sdt`, `diachi` FROM `tbl_khachhang` WHERE `tendangnhap`='$tendangnhap1' and `matkhau`='$matkhau1'";
        $result1 = mysqli_query($con, $sSQL1);
        if (!$result1) {
        ?>
            <script>
                alert("Tài khoản đăng nhập không đúng");
            </script>
        <?php
        } else {
            $user = mysqli_fetch_assoc($result1);
            // $row_dangnhap = mysqli_fetch_array($sql_select_admin);
            $_SESSION['thanhcong'] = $user;
            // $_SESSION['tennguoidung'] = $row_dangnhap['admin_name'];
        }
        if (empty($_SESSION['thanhcong'])) {
        ?>
            <script>
                alert("Tài khoản đăng nhập không đúng");
            </script>
<?php

        } else {
            // if(isset($_GET['chitietsp.php'])){
            //     var_dump($_GET['id-sp']);exit;
            // }
            // var_dump($_GET['id_sp']);exit;
            header('Location: index.php');
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
    <!-- icon  -->
    <link href="assets/fontawesome-free-5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
 
   
    <!-- <link rel="stylesheet" href="assets/css/dist/css/adminlte.min.css"> -->
    <!-- scroll -->
    <link rel="stylesheet" href="assets/css/scroll.css">
    <script src="/assets/js/scroll.js"></script>
    <!-- ********** -->
    <!--modal-->
    <script src="/assets/js/modal.js"></script>
    <script src="assets/js/jquery-2.2.3.min.js"></script>
    <!-- fomat the body -->
    <link rel="stylesheet" href="./assets/css/cdnjs_normalize.css">
    <link rel="stylesheet" href="assets/loadding/style.css" />
    <title>Trang chủ</title>
</head>

<body>
<script>
        function showNotice(value) {
            var container_notice = document.getElementById('container_notice');
            var containHTML=value;
            // console.log(containHTML);
            
            container_notice.innerHTML = ` <div id="exampleModalLive" class="modal_notice"  >
                                    <div class="modal_overlay_notices" id="modal_overlay_notice"></div>
                                    <div class="modal-dialog_notice" role="document">
                                        <div class="modal-content_notice">
                                            <div class="modal-header_notice">
                                                <div class="modal-title_notice">

                                                    <p id="exampleModalLiveLabel"><i class="fa-solid fa-circle-exclamation" style="margin-right: 10px;"></i>Đã có lỗi xảy ra !</p>
                                                </div>

                                                <button type="button" class="close" id="btn_close_notice_x" data-dismiss="modal_notice" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body_notice">
                                                <p>`+containHTML+`</p>
                                            </div>
                                            <div class="modal-footer_notice">
                                                <button type="button" class="btn btn-secondary btn_close_notice" id="btn_close_notice">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            </div>
                                        </div>
                                    </div>
                                     </div>`;

        }
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
    </script>


    <div class="model_error" id="modal_id_loi">
        <div class="modal_overlay1" id="id_modal_overlay_loi">

        </div>
        <div class="modal_body_error">
            <div class="xacminh_error" id="error_active">
                <div class="xacminh_container">
                    <div class="xacminh_header">
                        <h3 class="loi">Lỗi</h3>
                    </div>

                    <div>
                        <span class="motaloi">Vui lòng nhập đầy đủ thông tin </span>
                    </div>


                    <div class="xacminh_btn_control">

                        <button class="btn btn--primary" id="btn_loi_trolai">TRỞ LẠI</button>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .modal_body_error {
            --growth-from: 0.7;
            --growth-to: 1;
            background-color: #fff;
            margin: auto;
            position: relative;
            z-index: 3;
            border-radius: 5px;
            animation: growth linear 0.1s;
        }

        .model_error {
            width: 335px;
            position: fixed;
            z-index: 1000;
        }

        .xacminh_error {
            position: fixed;
            width: 360px;
            height: 200px;
            top: 20%;
            left: 38%;
            animation: fadeIn linear 0.1s;
            background-color: #c7d2c7;
            border-radius: 8px;
            display: none;
        }

        .active_error {
            display: block;
        }

        .modal_overlay1 {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 2;
        }
    </style>
    <?php
    include("heading.php")
    ?>
        <div class="modal_overlay-loadding container_sale">
        <div class="container ">
            <div class="grid wide">
                <div class="row container-content">

                    <div class="col l-9 ">

                        <div onclick="changeImage()" class="slidehomepage">
                            <div class="image">
                                <img src="assets/image/img_slidesale1.png" alt="Anh nen" id="img">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 saleLeft-describe">

                        <div class="saleLeft-describe-item">
                            <div class="">
                                <div class="saleLeft-describe-item_vanchuyen">
                                    <div id="" class="">
                                        <div class="">
                                            <div class="">
                                                <div id="" class=""></div>
                                                <h3 id="" dir="ltr" class="CDt4Ke zfr3Q OmQG5e" style="line-height: 1.2;"><span style="color: #0e0e0e; font-family: 'Arial'; font-size: 11pt; font-variant: normal; vertical-align: baseline;"><strong>Miễn phí vận chuyển</strong></span></h3>
                                                <p dir="ltr" class="CDt4Ke zfr3Q" style="background-color: transparent; border-bottom: none; border-left: none; border-right: none; border-top: none; line-height: 1.2; margin-bottom: 0; margin-top: 6pt; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0;"><span style="color: #0e0e0e; font-family: 'Arial'; font-size: 11pt; font-variant: normal; font-weight: normal; vertical-align: baseline;">100% đơn hàng đều được miễn phí vận chuyển khi thanh toán trước.</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="saleLeft-describe-item_baohanh">
                                    <div>
                                        <div>
                                            <div>

                                                <h3 id="h.zbbowhricygs_l" dir="ltr" class="CDt4Ke zfr3Q OmQG5e" style="line-height: 1.2;"><span style="color: #0e0e0e; font-family: 'Arial'; font-size: 11pt; font-variant: normal; vertical-align: baseline;"><strong>Bảo hành tận tâm</strong></span></h3>
                                                <p dir="ltr" class="" style="background-color: transparent; border-bottom: none; border-left: none; border-right: none; border-top: none; line-height: 1.2; margin-bottom: 0; margin-top: 6pt; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0;"><span style="color: #0e0e0e; font-family: 'Arial'; font-size: 11pt; font-variant: normal; font-weight: normal; vertical-align: baseline;">Bất kể giấy tờ thế nào, ThinkPro luôn cam kết sẽ hỗ trợ khách hàng tới cùng.</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row border_sale">

                </div>



                <div class="row container-content-banner">

                    <div class="col l-12 ">

                        <div class="img_promosale">
                            <img class="img_promosale-item" src="assets/image/promo-bannersale.png" alt="promo" srcset="">
                        </div>



                    </div>

                </div>

            </div>





        </div>
        <script>
            var index = 1;
            var indextext = 1;
            changeImage = function() {

                var img = ["assets/image/img_slidesale1.png", "assets/image/img_slidesale2.png", "assets/image/img_slidesale3.png"];

                document.getElementById("img").src = img[index];


                index++;

                if (index == 3) {
                    index = 1;

                }
            }
            setInterval(changeImage, 2000);
        </script>
       

    </div>

    <?php
    include("product.php")

    ?>

    <?php include('footer.php') ?>

    <div class="modal_loadding">
        <div class="container_loadding">
            <section id="loadding">
                <div class="loader loader-1">
                    <div class="loader-outter"></div>
                    <div class="loader-inner"></div>
                </div>
            </section>
        </div>
</div>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'dangki') {
        //   var_dump($_POST['hoten']);
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $matkhau = $_POST['matkhau'];

        $nhaplaimatkhau = $_POST['nhaplaimatkhau'];
        if (empty($hoten) || empty($email) || empty($matkhau) || empty($nhaplaimatkhau) || empty($sdt) || empty($diachi)) {
    ?>


            <script>
                var elementFormdk = document.querySelector('#form-dk');

                if (elementFormdk) {
                    var elementInputfullname = elementFormdk.querySelector('#fullname');
                    var elementInputEmail = elementFormdk.querySelector('#email');
                    var elementInputSdt = elementFormdk.querySelector('#sdt');
                    var elementInputDiachi = elementFormdk.querySelector('#diachi');
                    var elementInputPassword = elementFormdk.querySelector('#password');
                    var elementInputPwconfirmation = elementFormdk.querySelector('#password_confirmation');
                    // console.log(b.);
                    var messfullname = elementInputfullname.parentElement.querySelector('.form-message');
                    var messEmail = elementInputEmail.parentElement.querySelector('.form-message');
                    var messSdt = elementInputSdt.parentElement.querySelector('.form-message');
                    var messDiachi = elementInputDiachi.parentElement.querySelector('.form-message');
                    var messPass = elementInputPassword.parentElement.querySelector('.form-message');
                    var messPassnl = elementInputPwconfirmation.parentElement.querySelector('.form-message');


                    if (elementInputfullname) {
                        messfullname.innerText = "Vui lòng nhập tên của bạn";
                        elementInputfullname.parentElement.classList.add('invalid');
                        elementInputfullname.onblur = function() {
                            if (elementInputfullname.value == "") {
                                messfullname.innerText = "Vui lòng nhập tên của bạn";
                                elementInputfullname.parentElement.classList.add('invalid');
                            } else {
                                messfullname.innerText = "";
                                elementInputfullname.parentElement.classList.remove('invalid');
                            }
                        }

                    }

                    if (elementInputEmail) {
                        messEmail.innerText = "Vui lòng nhập email của bạn";
                        elementInputEmail.parentElement.classList.add('invalid');
                        elementInputEmail.onblur = function() {
                            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            if (elementInputEmail.value == "" || !regex) {
                                messEmail.innerText = "Vui lòng nhập email hoặc không phải email ";
                                elementInputEmail.parentElement.classList.add('invalid');
                            } else {
                                messEmail.innerText = "";
                                elementInputEmail.parentElement.classList.remove('invalid');
                            }
                        }
                    }
                    if (elementInputSdt) {
                        messSdt.innerText = "Vui lòng nhập địa chỉ của bạn";
                        elementInputSdt.parentElement.classList.add('invalid');
                        elementInputSdt.onblur = function() {
                            if (elementInputSdt.value == "") {
                                messSdt.innerText = "Vui lòng nhập địa chỉ của bạn";
                                elementInputSdt.parentElement.classList.add('invalid');
                            } else {
                                messSdt.innerText = "";
                                elementInputSdt.parentElement.classList.remove('invalid');
                            }
                        }

                    }
                    if (elementInputDiachi) {
                        messDiachi.innerText = "Vui lòng nhập số điện thoại của bạn";
                        elementInputDiachi.parentElement.classList.add('invalid');
                        elementInputDiachi.onblur = function() {
                            if (elementInputDiachi.value == "") {
                                messDiachi.innerText = "Vui lòng nhập số điện thoại của bạn";
                                elementInputDiachi.parentElement.classList.add('invalid');
                            } else {
                                messDiachi.innerText = "";
                                elementInputDiachi.parentElement.classList.remove('invalid');
                            }
                        }

                    }
                    if (elementInputPassword) {
                        messPass.innerText = "Vui lòng nhập mật khẩu";
                        elementInputPassword.parentElement.classList.add('invalid');
                        elementInputPassword.onblur = function() {
                            if (elementInputPassword.value == "") {
                                messPass.innerText = "Vui lòng nhập mật khẩu";
                                elementInputPassword.parentElement.classList.add('invalid');
                            } else {
                                messPass.innerText = "";
                                elementInputPassword.parentElement.classList.remove('invalid');
                            }
                        }
                    }
                    if (elementInputPwconfirmation) {
                        messPassnl.innerText = "Vui lòng nhập lại mật khẩu của bạn";
                        elementInputPwconfirmation.parentElement.classList.add('invalid');
                        elementInputPwconfirmation.onblur = function() {
                            if (elementInputPwconfirmation.value == "") {
                                messPassnl.innerText = "Vui lòng nhập lại mật khẩu của bạn";
                                elementInputPwconfirmation.parentElement.classList.add('invalid');
                            } else {
                                messPassnl.innerText = "";
                                elementInputPwconfirmation.parentElement.classList.remove('invalid');
                            }
                        }
                    }

                }

                modal_dangki.style.display = "flex";
            </script>






            <?php
            exit;
        } else {

            $sSQL = "INSERT INTO `tbl_khachhang`(`hoten`, `tendangnhap`, `matkhau`, `nhaplaimatkhau`,`sdt`,`diachi`) VALUES ('$hoten','$email','$matkhau','$nhaplaimatkhau','$sdt','$diachi')";


            if ($matkhau == $nhaplaimatkhau) {
                $result = mysqli_query($con, $sSQL);

                if (!$result) {
                    if (strpos(mysqli_errno($con), "Duplicate enty") == FALSE) {
            ?>
                        <script>
                            alert("Tài khoản đã tồn tại trong hệ thống!");
                        </script>

                    <?php
                    }
                    mysqli_close($con);
                } else {
                    ?>
                    <Script>
                        alert("Đăng kí tài khoản thành công !")
                    </Script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Mật khẩu không khớp! ")
                    modal_dangki.style.display = "flex";
                </script>
    <?php
            }
        }
    }
    ?>





    <script>
        setTimeout(function() {
            var headerHome = document.querySelector("#header_home");
            var headerSale = document.querySelector("#header_sale");
            var headerPolyci = document.querySelector("#header_policy");
            var headerContact = document.querySelector("#header_contact");
            var loadding = document.querySelector(".modal_loadding");
            headerHome.classList.add("active_link-heder");
            headerSale.classList.remove("active_link-heder");
            headerPolyci.classList.remove("active_link-heder");
            headerContact.classList.remove("active_link-heder");
            loadding.style.display = "none"
 


        }, 800)
    </script>
</body>

</html>