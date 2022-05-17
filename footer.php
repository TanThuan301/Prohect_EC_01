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
                            <span class="motaloi">Vui lòng đăng nhập </span>
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
            .active_error{
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



<?php include("connect_db/connection_db.php");
//  session_start();



?>
<?php
if (isset($_GET['xoagh'])) {
    $id_gh = $_GET['xoagh'];

    $sSQL_deletegh = mysqli_query($con, "DELETE FROM `tbl_giohang` WHERE id_giohang='$id_gh'");


    // header("Location: product.php");
}

?>
<?php

// if (isset($_POST['thanhtoangh'])) {
   
//     if (isset($_SESSION['thanhcong'])) {
    //     $kh = $_SESSION['thanhcong'];
    //     $id_kh = $kh['tendangnhap'];
    //     // if (!empty($id_kh)) {
    //         //     $magiaodich=rand(1000,10000);
    //         // for( $i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
    //         //     $id_sptt=$_POST['thanhtoan_product_id'][$i];
    //         //     $soluongsptt=$_POST['thanhtoan_soluong'][$i];
    //         //     $sql_insert_dh=mysqli_query($con,"INSERT INTO `tbl_donhang`( `ten_kh`, `id_sanpham`,  `soluong`,`magiaodich`) VALUES ('$id_kh','$id_sptt','$soluongsptt','$magiaodich')");
    //         //     $sql_insert_giaodich=mysqli_query($con,"INSERT INTO `tbl_giaodich`(`id_sanpham`, `id_khachhang`, `soluong`,`magiaodich`) VALUES ('$id_sptt','$id_kh','$soluongsptt','$magiaodich')");
    //         //     $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE id_sp='$id_sptt'");
    //         // }
           
    //             // include("thanhtoan.php");
            //  header('Location: thanhtoan.php');
        // }
           
    // }else{
        
                    
    // }
// }

?>
<div class="footer" id="footerID">
    <div class="grid wide">
        <div class="row footer-content">
            <div class="col l-2-4 m-4 c-12 ">
                <h3 class="footer-heading">Chăm sóc khách hàng</h3>
                <ul class="footer-heading-list">
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Trung tâm trợ giúp</a>
                    </li>
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Hướng dẫn mua hàng</a>
                    </li>
                    <!-- <li class="footer-heading-item"><a href="#" class="footer-heading-link">Liên hệ</a></li> -->
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-12">

                <h3 class="footer-heading">Giới thiệu</h3>
                <ul class="footer-heading-list">
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Giới thiệu</a></li>
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Tuyển dụng</a></li>
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Điều khoảng</a></li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-12">
                <h3 class="footer-heading">Thông tin liên hệ</h3>
                <ul class="footer-heading-list">
                    <!-- <li class="footer-heading-item"><a href="#" class="footer-heading-link">Nguyễn Văn A</a></li> -->
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Hotline: 1900.63.3579</a></li>
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Địa chỉ: 1 An Dương Vương P10 Quận 5</a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-12">
                <h3 class="footer-heading">Theo dõi</h3>
                <ul class="footer-heading-list">
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Facebook</a></li>
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Instagram</a></li>
                    <li class="footer-heading-item"><a href="#" class="footer-heading-link">Youtube</a></li>
                </ul>

            </div>
            
            <div class="col l-2-4 m-4 c-12 hide-on-mobile">
                <h3 class="footer-heading">Tải app</h3>
                <div class="footer-dowload">

                    <img src="assets/image/qr1.png" alt="QR" class="footer-app-qr-img">

                    <div class="footer-app-dowload">
                        <a href="#" class="footer-app-dowload-link">
                            <img src="assets/image/Chplay.png" alt="QR" class="footer-app-dowload-img">

                        </a>
                        <a href="#" class="footer-app-dowload-link">
                            <img src="assets/image/store.png" alt="QR" class="footer-app-dowload-img">


                        </a>
                        <a href="#" class="footer-app-dowload-link">
                            <img src="assets/image/appgallery.png" alt="QR" class="footer-app-dowload-img">


                        </a>


                    </div>
                </div>

            </div>
        </div>
        <!-- Phân bản quyên -->
        <div class="row footer-copyright">
            <p class="footer-text">@2022 - Bản quyền thuộc về trường ĐH Sài Gòn</p>
        </div>
    </div>


</div>


<!--đăng kí đăng nhập-->

<!--form  dang nhap-->
<div class="modal" id="modal_id_dangnhap">
    <div class="modal_overlay" id="id_modal_overlay_dangnhap">

    </div>
    <div class="modal_body">
        <div class="xacminh">
            <form class="xacminh_container" action="index.php?action=dangnhap" method="POST" id="form-dn">
                <div class="xacminh_header">
                    <h3 class="xacminh_heding">Đăng nhập</h3>
                    <!-- <a href="?action=dangki" class="xacminh_chuyendoiform-btn">Đăng kí</a> -->
                </div>

                <div class="xacminh_form">
                    <div class="xacminh_form-group">
                        <input type="text" value="" name="tendangnhap" class="xacminh_form-input" id="emaildn" placeholder="Email của bạn">
                        <span class="form-message"></span>
                    </div>

                    <div class="xacminh_form-group">
                        <input type="password" value="" name="matkhau" class="xacminh_form-input" id="passworddn" placeholder="Mật khẩu của bạn">
                        <span class="form-message"></span>
                    </div>

                </div>

                <div class="xacminh_quen" style="margin-top: 20px;font-size: 1.5rem;  ">
                       
                    <label >Bạn chưa có tại khoản <a style="color: #063cb9;cursor: pointer;" class="" onclick="chuyenformdk()">Đăng ký</a></label>
                
                    
                    <!-- <a class="link_help">Quên mật khẩu</a> -->
                   
                </div>

                <div class="xacminh_btn_control">
                    <!-- <button class="btn" id="btn_dangnhap_trolai">TRỞ LẠI</button> -->
                   
                    <input type="submit" class="btn btn--primary" value="ĐĂNG NHẬP">


                </div>
            </form>

           




        </div>
    </div>
</div>


<!--form  dang ki-->
<div class="modal" id="modal_id_dangki">
    <div class="modal_overlay" id="id_modal_overlay">

    </div>
    <div class="modal_body">


        <div class="xacminh">

            <form class="xacminh_container" action="index.php?action=dangki" method="POST" id="form-dk">
                <div class="xacminh_header">
                    <h3 class="xacminh_heding">Đăng kí</h3>
                    <!-- <a href="?action=dangnhap" class="xacminh_chuyendoiform-btn" id="chuyendangnhap">Đăng nhập</a> -->
                </div>

                <!-- <div class="xacminh_form"> -->
                <div class="xacminh_form-group">
                    <input name="hoten" type="text" class="xacminh_form-input" id="fullname" placeholder="Họ và Tên của bạn">
                    <span class="form-message"></span>
                </div>
                <div class="xacminh_form-group">
                    <input name="email" type="text" class="xacminh_form-input" id="email" placeholder="Email của bạn">
                    <span class="form-message"></span>
                </div>
                <div class="xacminh_form-group">
                    <input name="sdt" type="text" class="xacminh_form-input" id="sdt" placeholder="Số điện thoại">
                    <span class="form-message"></span>
                </div>

                <div class="xacminh_form-group">
                    <input name="diachi" type="text" class="xacminh_form-input" id="diachi" placeholder="Địa chỉ">
                    <span class="form-message"></span>
                </div>


                <div class="xacminh_form-group">
                    <input name="matkhau" type="password" class="xacminh_form-input" id="password" placeholder="Mật khẩu của bạn">
                    <span class="form-message"></span>
                </div>

                <div class="xacminh_form-group">
                    <input name="nhaplaimatkhau" type="password" class="xacminh_form-input" id="password_confirmation" placeholder="Nhập lại mật khẩu của bạn">
                    <span class="form-message"></span>
                </div>
                <!-- </div> -->

                <div class="xacminh_form-bosung">
                    <p class="xacminh_form-chinhsach">
                        Bằng việc đáng kí, bạn đã đồng ý với chúng tôi về
                        <a href="#" class="xacminh_form-link">Điều khoản dịch vụ</a> và
                        <a href="policy.php" class="xacminh_form-link">Chính sách bảo mật</a>
                    </p>
                </div>

                <div class="xacminh_btn_control">
                    <!-- <input type="submit" class="btn" id="trolai" value="TRỞ LẠI" name="trolai"> -->
                    <input type="submit" class="btn btn--primary" value="ĐĂNG KÍ" name="dangki">
                </div>

            </form>
        </div>
    </div>

</div>

<script src="assets/js/scriptform.js"></script>




<!--------------------------------------------->
<!--thêm vào giỏ hàng-->



<div class="modal" id="modal_id_giohang">
    <div class="modal_overlay" id="id_modal_overlay_giohang">

    </div>

    <div class="modal_body">
        <div class="xacminh doronggiohang">
            <div class="xacminh_container">
                <div class="xacminh_header">
                    <h3 class="xacminh_heding">Giỏ hàng</h3>
                    <div class="close">x</div>
                </div>

                <form action="" method="POST" enctype="multipart/form-data" class="modal-body">
                    <!-- <div class="cart-row">
                        <span class="cart-price cart-header cart-column">Hình ảnh</span>
                        <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                        
                        <span class="cart-price cart-header cart-column">Giá</span>
                        <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                    </div> -->

                    <div class="cart-items">
                        <table class="tablegh table-borderedgh">
                            <tr class="tb_heading">
                                <th class="td_border">Hình ảnh</th>
                                <th class="td_border">Tên sản phẩm</th>
                                <th class="td_border">Giá</th>
                                <th class="td_border">Số lượng</th>
                                <th>Quản lý</th>
                            </tr>
                            <?php
                            if (isset($_SESSION['thanhcong'])) {
                                $idsp = $_SESSION['thanhcong'];
                                $id_kh = $idsp['tendangnhap'];
                                $sql = "SELECT * FROM tbl_giohang,tbl_khachhang,tbl_sanpham WHERE tbl_sanpham.id_sp=tbl_giohang.id_sp AND tbl_giohang.id_khachhang=tbl_khachhang.tendangnhap AND tbl_giohang.id_khachhang='$id_kh'";
                                $sql_select_gh = mysqli_query($con, $sql);

                                //  $row_gh = mysqli_fetch_array($sSQL_select_themgh);
                                //  $tensp = $row_gh['tensanpham'];
                                //  $giasp = $row_gh['giakhuyenmaisp'];
                                //  $soluong = $_POST['soluongsp'];


                                // $count=mysqli_num_rows($sql_select_gh);

                                while ($row_gh = mysqli_fetch_array($sql_select_gh)) {

                            ?>


                                    <tr>
                                        <td class="td_border td_gia"><img src="hinhanhsp/<?php echo $row_gh['hinhanh'] ?>" alt="Hinhanh" width="75px" height="75px"> </td>
                                        <td class="td_border td_boder_tsp"><?php echo $row_gh['tensanpham'] ?></td>
                                        <td class="td_border td_gia"><?php echo $row_gh['giakhuyenmaisp'] ?></td>

                                        <td class="td_border">
                                            <?php echo $row_gh['soluongspgh'] ?>
                                            <!-- <input type="text" class="input_soluonggh" name="slghcn" value=""> -->



                                        </td>
                                        <td><a href="product.php?xoagh=<?php echo $row_gh['id_giohang'] ?>">Xóa</a>
                                            <!-- <a href="?capnhatgh=<?php echo $row_gh['id_giohang'] ?>">Cập nhật</a> -->
                                            <!-- <input type="hidden" name="id_gh" value="">
                                        <input type="submit"  name="capnhatgh" value="Cập nhật">
                                     -->

                                        </td>

                                    </tr>

                                    <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_gh['id_sp'] ?>">
                                    <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_gh['soluongspgh'] ?>">




                            <?php
                                }
                            }
                            ?>




                        </table>
                    </div>
                    <div class="cart-total">
                        <?php
                        if (isset($_SESSION['thanhcong'])) {
                            $idsp = $_SESSION['thanhcong'];
                            $id_kh = $idsp['tendangnhap'];





                            $sql = "SELECT tbl_sanpham.giakhuyenmaisp,tbl_giohang.soluongspgh FROM tbl_giohang,tbl_khachhang,tbl_sanpham WHERE tbl_sanpham.id_sp=tbl_giohang.id_sp AND tbl_giohang.id_khachhang=tbl_khachhang.tendangnhap AND tbl_giohang.id_khachhang='$id_kh'";
                            $sql_select_gh1 = mysqli_query($con, $sql);

                            $tong = 0;

                            while ($row_gh1 = mysqli_fetch_array($sql_select_gh1)) {
                                $gia = str_replace('.', '', $row_gh1['giakhuyenmaisp']);
                                $tong += $gia * $row_gh1['soluongspgh'];
                            }
                        ?>
                            <strong class="cart-total-title " style=" font-size: 1.7rem;">Tổng Cộng:</strong>

                            <span class="cart-total-price" style=" font-size: 1.7rem;
                                font-weight: bold;"><?php echo number_format($tong) . " VND"  ?></span>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="modal-footer">
                        <input type="submit" class="btn close-footer" id="dong_gio_hang" value="Đóng">
                        <!-- <input type="submit" class="btn btn--primary order" value="Thanh Toán" name="thanhtoangh"> -->
                        <a href="thanhtoan.php" class="btn btn--primary order" >Thanh toán</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
   

   
</style>
<!--------------------------------------------->


<!----------------------------------->
<!--js của đăng kí đăng nhập-->

<!--dang nhap-->
<script>
    var modal_dangnhap = document.getElementById("modal_id_dangnhap");
    var modal_dangki = document.getElementById("modal_id_dangki");
    var modal_giohang = document.getElementById("modal_id_giohang");
    var btn_trolai_dangnhap = document.getElementById("btn_dangnhap_trolai");
    var btn_overlay_dangnhap = document.getElementById("id_modal_overlay_dangnhap");
    var btn_dangnhap1=document.getElementById("btn_dangnhap1");

    btn_dangnhap.onclick = function() {
        if (modal_dangki.style.display == "flex" || modal_giohang.style.display == "flex") {
            modal_dangki.style.display = "none";
            modal_giohang.style.display = "none";
            modal_dangnhap.style.display = "flex";

        }
        modal_dangnhap.style.display = "flex";

    }
    // btn_dangnhap1.onclick = function() {
       
    //     modal_dangnhap.style.display = "flex";

    // }
    btn_overlay_dangnhap.onclick = function() {
        modal_dangnhap.style.display = "none";
    }

    // btn_trolai_dangnhap.onclick = function() {
    //     modal_dangnhap.style.display = "none";
    // }


    function chuyenformdk(){
            modal_dangki.style.display = "flex";
            modal_giohang.style.display = "none";
            modal_dangnhap.style.display = "none";
    }
   
</script>








<script>
    var modal_dangki = document.getElementById("modal_id_dangki");
    var modal_dangnhap = document.getElementById("modal_id_dangnhap");
    var modal_giohang = document.getElementById("modal_id_giohang");
    var chuyendangnhap = document.getElementById("chuyendangnhap");
    var btn_dangki = document.getElementById("btn_dangki");
    var btn_trolai_dangki = document.getElementById("trolai");
    var btn_overlay_dangki = document.getElementById("id_modal_overlay");
    var btn_dangki1 = document.getElementById("btn_dangki1");
    


    btn_dangki.onclick = function() {
        if (modal_dangnhap.style.display == "flex" || modal_giohang.style.display == "flex") {

            modal_dangnhap.style.display = "none";
            modal_giohang.style.display = "none";
            modal_dangki.style.display = "flex";
        }
        modal_dangki.style.display = "flex";


    }
    // btn_dangki1.onclick = function() {
        
    //     modal_dangki.style.display = "flex";


    // }
    
    btn_overlay_dangki.onclick = function() {
        modal_dangki.style.display = "none";
    }

    // btn_trolai_dangki.onclick = function() {
    //     modal_dangki.style.display = "none";
    // }
</script>


<!--gio hang-->
<script>
    var modal_giohang = document.getElementById("modal_id_giohang");
    var modal_dangki = document.getElementById("modal_id_dangki");
    var modal_dangnhap = document.getElementById("modal_id_dangnhap");
    var btn_overlay_giohang = document.getElementById("id_modal_overlay_giohang");
    var btn = document.getElementById("cart");
    var close = document.getElementsByClassName("close")[0];
    // tại sao lại có [0] như  thế này bởi vì mỗi close là một html colection nên khi mình muốn lấy giá trị html thì phải thêm [0]. 
    //Nếu mình có 2 cái component cùng class thì khi [0] nó sẽ hiển thị component 1 còn [1] thì nó sẽ hiển thị component 2.
    var close_footer = document.getElementsByClassName("close-footer")[0];
    var order = document.getElementsByClassName("order")[0];
    // btn.onclick = function() {
    //     if (modal_dangki.style.display == "flex" || modal_dangnhap.style.display == "flex") {
    //         modal_dangki.style.display = "none";
    //         modal_dangnhap.style.display = "none";
    //         modal_giohang.style.display = "flex";
    //     }

    //     modal_giohang.style.display = "flex";
    // }
    // close.onclick = function() {
    //     modal_giohang.style.display = "none";
    // }
    close_footer.onclick = function() {
        modal_giohang.style.display = "none";
    }

    btn_overlay_giohang.onclick = function() {
        modal_giohang.style.display = "none";
    }

    // order.onclick = function() {
    //     alert("Cảm ơn bạn đã thanh toán đơn hàng")
    // }
    window.onclick = function(event) {
        if (event.target == modal_giohang) {
            modal_giohang.style.display = "none";
        }
    }
</script>
<!-------------------------------->
<!-- xu li form -->



</body>

</html>