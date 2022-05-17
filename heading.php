<?php
include('./connect_db/connection_db.php');
// session_start();    

$checkLogin = '<div class="header__navbar-item-link_account-list">
                <ul class="header__navbar-item-link_account_list-item">
                   <li class="header_taikhoan" id="btn_dangki" action="">Đăng ký</li>
                   <li class="header_taikhoan" id="btn_dangnhap"> Đăng nhập</li>
                   <li class="header_taikhoan" id="btn_dangnhap_id"> <a href="admin/Admin/login.php" style="color: #fff;text-decoration: none;">Trang Admin</a></li>
                </ul>
              </div>';
// $checkLoginMobile='<li class="header__navbar-item header__navbar-item--strong header__navbar-item--gachdoc"
// id="btn_dangki" action="">Đăng ký</li>';
// var_dump($_SESSION['thanhcong']);

$taikhoandn_dk = '<div class="acount_dk_dn">
                           
<label for="nav-mobile-tablet-input">
    <li class="hearder_navbar_tablet_mb-item acount_dk_dn_item" action="" id="btn_dangnhap1">Đăng nhập</li>
</label>
<span style="color: #fff; font-size:1.7rem">  /  </span>

<label for="nav-mobile-tablet-input">
    <li class="hearder_navbar_tablet_mb-item acount_dk_dn_item" action="" id="btn_dangki1">Đăng ký</li>
</label>
</div>
<li class="hearder_navbar_tablet_mb-item"><a class="hearder_navbar_tablet_mb-link" href="index.php">Trang chủ</a></li>
<li class="hearder_navbar_tablet_mb-item"><a class="hearder_navbar_tablet_mb-link" href="index.php#gt">Giới Thiệu</a></li>
<li class="hearder_navbar_tablet_mb-item"><a class="hearder_navbar_tablet_mb-link" href="product.php">Sản phẩm</a></li>
';
$taikhoandn_dx = '';
if (isset($_SESSION['thanhcong'])) {
    $tennguoidung = $_SESSION['thanhcong'];
    $checkLogin = '<div class="header__navbar-item-link_account-list">
                        <ul class="header__navbar-item-link_account_list-item">
                            <h3 style="    margin: 0;
                            font-size: 1.8rem;
                            border-bottom: 2px solid;
                            margin-bottom: 15px;
                            text-align: center;">Tài khoản</h3>
                            <li class="header_taikhoan">  <a  class="header_taikhoan-link" href="accountuser.php">' . $tennguoidung['hoten'] . '</a> </li>
                            <li class="header_taikhoan">
                                <a  class="header_taikhoan-link" href="xemdonhang.php">Xem đơn hàng</a>
                            </li>
                            <li class="header_taikhoan">
                            <a  class="header_taikhoan-link" href="dangxuat.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>';



    // $checkLoginMobile='<li class="hearder_navbar_tablet_mb-item"><a class="hearder_navbar_tablet_mb-link"href="">'.$tennguoidung['hoten'].'</a></li>';
    $taikhoandn_dk = '<div class="">

                           
<label for="nav-mobile-tablet-input">
    <li class="hearder_navbar_tablet_mb-item acount_dk_dn_item" action="" >' . $tennguoidung['hoten'] . '</li>
</label>
<li class="hearder_navbar_tablet_mb-item"><a class="hearder_navbar_tablet_mb-link" href="index.php">Trang chủ</a></li>
<li class="hearder_navbar_tablet_mb-item"><a class="hearder_navbar_tablet_mb-link" href="index.php#gt">Giới Thiệu</a></li>
<li class="hearder_navbar_tablet_mb-item"><a class="hearder_navbar_tablet_mb-link" href="product.php">Sản phẩm</a></li>
<li>
<a style="text-decoration: none;color:#fff; font-size:1.6rem" href="xemdonhang.php">Xem đơn hàng</a>
</li>

<label for="nav-mobile-tablet-input">
    <li class="hearder_navbar_tablet_mb-item acount_dk_dn_item" action="" > <a href="dangxuat.php" style="text-decoration: none;color:#fff;">Đăng xuất</a></li>
</label>

</div>
';
}



?>

<body>

    <div class="app">
        <!-- Tiêu đề -->


        <div class="header">
            <div class="grid wide">
                <nav class="hearder__navbar ">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item-left ">
                            <img src="assets/image/Logo_LaptopStore.png" alt="logo" class="header_logo">

                        </li>



                    </ul>
                    <ul class="header__navbar-list">



                        <li class="header__navbar-item  header__navbar-item-active" id="header_home">
                            <a class=" header__navbar-item-margin_right header__navbar-item-link " href="index.php">Trang chủ</a>
                        </li>
                        <li class="header__navbar-item header__navbar-item-active" id="header_sale" >
                            <a class=" header__navbar-item-margin_right header__navbar-item-link " href="sale.php">Khuyến mãi</a>
                        </li>
                        <li class="header__navbar-item header__navbar-item-active" id="header_policy">
                            <a class="header__navbar-item-margin_right header__navbar-item-link " href="policy.php">Chính sách</a>
                        </li>
                        <li class="header__navbar-item header__navbar-item-active" id="header_contact">
                            <a class="header__navbar-item-margin_right header__navbar-item-link " href="#footerID">Liên hệ</a>
                        </li>
                        <li class="header__navbar-item  header__navbar-item-cart">
                             <a href="giohang.php"><i class="fa-solid fa-cart-shopping" style="font-size: 1.7rem;color: #333;"></i></a>
                         </li>
                        <li class="header__navbar-item header__navbar-item-margin_right   header__navbar-item-link_account">

                            <i class="fa-solid fa-user"></i>
                            <?php echo $checkLogin ?>

                        </li>



                        <!-- KHi click vao thanh tim kiem se hien thi -->




                    </ul>
                    <!-- hien thi ten nguoi dang nhap -->

                </nav>



            </div>


        </div>
     

        <script>
            // var headerHome = document.querySelector("#header_home");
            // var headerSale = document.querySelector("#header_sale");
            // var headerPolyci = document.querySelector("#header_policy");
            // var headerContact = document.querySelector("#header_contact");
            // var btn=document.getElementsByClassName("header__navbar-item-active");
            // // console.log(btn);
            

           
            // console.log(typeof lastPart)
            // $(document).ready(function() {
            // $('.header__navbar-item-active a').click(function() {
            //     //removing the previous selected menu state
            //     $('.header__navbar-item-active').find('a.active_link-heder').removeClass('active_link-heder');
            //     //adding the state for this parent menu
            //     $(this).parents("a").addClass('active');

            // });
            // });
            
        //     headerHome.addEventListener("click", function() {
        //         var lastPart = window.location.href.split("/").pop();
        //         if(lastPart=='index.php') {
        //             alert('xin chao')
        //             headerHome.classList.add("active_link-heder");
        //             headerSale.classList.remove("active_link-heder");
        //             headerPolyci.classList.remove("active_link-heder");
        //             headerContact.classList.remove("active_link-heder");
        //         }
                
                
               
        //     })
           
 
            // headerSale.addEventListener("click", function(event) {
                
             
               
            //     event.preventDefault();
            //     headerSale.classList.add("active_link-heder");
            //     headerHome.classList.remove("active_link-heder");
            //     headerPolyci.classList.remove("active_link-heder");
            //     headerContact.classList.remove("active_link-heder");
            //     window.location=('sale.php');
            //     console.log(window.location.href);
            // });

            // headerPolyci.addEventListener("click", function() {
            //     headerPolyci.classList.add("active_link-heder");
            //     headerHome.classList.remove("active_link-heder");
            //     headerSale.classList.remove("active_link-heder");
            //     headerContact.classList.remove("active_link-heder");
            //     window.location='policy.php';
            //     console.log(window.location.href);
            // })
            // headerContact.addEventListener("click", function() {
            //     headerContact.classList.add("active_link-heder");
            //     headerHome.classList.remove("active_link-heder");
            //     headerPolyci.classList.remove("active_link-heder");
            //     headerSale.classList.remove("active_link-heder");

            // })
            // console.log(window.location.href);
        </script>



