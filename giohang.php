<?php include("connect_db/connection_db.php");
session_start();

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
                <!-- <form action="" method="POST"> -->
                <div class="row container-content">
                    <!-- <form> -->
                    <div class="col l-8 tacadonhang">
                        <div class="heder_cart_gh" style="display:flex;justify-content:space-between">
                            <h2 class="text_heding">Giỏ hàng</h2>
                            <div class="btn_quaylai_gh" style="/* margin: 26px; */font-size: 1.8rem;padding: 3%; cursor: pointer;color: #0742bb;" onclick="history.back()"><i class="fa-solid fa-caret-left"></i> Quay lại</div>
                        </div>

                        <!-- Lay du lieu bang localStorage -->
                        <div class="sp_gh_row">
                        </div>

                        <!--Show gio hang -->


                    </div>

                    <!-- </form> -->

                    <div class="col l-4 tacadonhang" style="padding: 40px;margin-top: 20px;">
                        <form action="" method="post">
                            <div class="row" style="background: #fff;border-radius: 5px;">
                                <h4 style="font-size: 1.8rem;/* display: inline-block; */margin-left: 33px;margin: 10px;padding-left: 10px;">Mã khuyến mãi</h4>
                                <div class="input_km" style="display: flex;padding-left: 20px;padding-bottom: 10px;">
                                    <img src="assets/image/sale.png" alt="" srcset="" style="width: 63px;height: 68px;background: #0d34c4;border-bottom-left-radius: 8px;border-top-left-radius: 8px;">
                                    <div style="background: #0b2dce;/* padding: 7%; */font-size: 1.8rem;width: 200px;border-bottom-rig-radius: 8px;
                                                /* border-top-left-radius: 8px; */border-bottom-right-radius: 8px;border-top-right-radius: 8px;">
                                        <input type="text" value="" placeholder="Nhập mã khuyến mãi" style="width: 93%;height: 31px;padding: 20px;margin-top: 13px;/* margin-right: 49px; */border: none;border-radius: 5px;font-size: 1.5rem;">
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="background: #fff;border-radius: 5px;margin-top: 30px;padding: 20px;">
                                <h1 class="heading_textdh" style="margin: 0;padding: 0;font-size: 2rem;width: 100%;"></i>Tóm tắt đơn hàng</h1>
                                <div style="width: 100%;">
                                    <div class="thongtindiachinhanhang">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tạm tính: <input type="text" style="border: none;width: 160px;background: none;/* display: inline-block; */" disabled='disable' value="1000" class="" id="tomtat_tamtinh"></input> </span>

                                        </div>

                                    </div>

                                    <div class="thongtindiachinhanhang">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Khuyến mãi: <input type="text" style="border: none;width: 160px;background: none;/* display: inline-block; */" disabled='disable' value="0" id="tomtat_khuyenmai"></input></span>

                                        </div>

                                    </div>
                                    <div class="thongtindiachinhanhang" style="border-top: 1px solid;margin-top: 40px;padding-top: 20px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tổng cộng: <input type="text" style="border: none;width: 160px;color: red;font-weight: 800;background:none;" disabled='disable' value="1000" id="tomtat_tongcong"></input></span>

                                        </div>

                                    </div>

                                </div>
                                <div style="margin-top: 1em;">
                                    <input type="submit" class="btn_thanhtoan" value="Đặt hàng" name="thanhtoangh" onclick="btn_thanhtoandathang()">
                                </div>

                            </div>
                            <!-- Show gio hang -->
                            <script type="text/javascript">
                                function showGH() {
                                    var arraySP_Giohang = JSON.parse(localStorage.getItem('data_gh'));
                                    var html_data = document.querySelector('.sp_gh_row');
                                    var btn_dh001 = document.querySelector('.btn_thanhtoan');
                                    // console.log(btn_dh001)
                                    
                                    if (arraySP_Giohang == null || arraySP_Giohang.length == 0) {
                                        html_data.innerHTML = `
                                    <p style="font-size: 2rem;/* text-align: center; */margin-top: 10%;margin-left: 25%;color:red;font-weight:bold;">Không có sản phẩm nào</p>
                                    <div> <img style="width: 60%;margin-left: 12%;" src="assets/image/cart_empty.png" alt="" srcset=""> </div>
                                    `
                                        btn_dh001.disabled = true;
                                        btn_dh001.style.background = "#b3b3b3";
                                    } else {
                                        // console.log(arraySP_Giohang[0]);
                                        arraySP_Giohang.map(item => {
                                            var totalgiasp = parseInt(item.product.giakhuyenmai.replaceAll('.', '')) * item.quantity;
                                            console.log(item.product.tensp);
                                            html_data.innerHTML += `<div class="container_thanhtoan" data-id_itemsp="` + item.product.id_gh + `" >
                                        <div class="row">
                                        <!-- Img -->
                                        <div class="col l-2">
                                            <img src="` + item.product.hinhanhsp + `" alt="hinhanh" width="75px" height="75px">
                                        </div>
                                        <!-- Contain -->
                                        <div class="col l-5">
                                            <h4 style="font-size:1.6rem; margin:10px;">` + item.product.tensp + `</h4>
                                            <div style="font-size:1.2rem;margin-left:15px;display:flex;">

                                                <div>` + item.product.cauhinh + `</div>
                                            </div>
                                            <input class="number-input__gia_sp" id-data-gia-sp="` + item.product.id_gh + `" style="font-size:1.6rem;margin-left:15px;color:red;font-weight:bold;margin-top:10px;width: 105px;border:none;background:none;" disabled='disabled'
                                             value="` + item.product.giakhuyenmai + `">
                                             <span style="text-decoration:line-through; color:black;font-size:1.3rem; margin-left:10px;">` + item.product.giasp + `
                                             </span></input>
                                        </div>
                                        <!-- so luong -->
                                        <div class="col l-2">
                                            <div class="" style=" font-size: 1.6rem;display: flex;">
                                                <button tabindex="-1" type="button" style="background: none;border: none;font-size: 3rem; cursor:pointer;" id-data-giam="` + item.product.id_gh + `" class="btn_giam_gh_sp" onclick="tang_giam_cart(this)">-</button>
                                                <input id="ip_gh" id-data-input='` + item.product.id_gh + `' name="thanhtoan_soluong[]" max="99" min="1" step="1" aria-label="Nhập số" type="number" class="number-input__input_thanhtoan" value="` + item.quantity + `">
                                                <button tabindex="-1" type="button" style="background: none;border: none;font-size: 3rem;cursor:pointer;" id-data-tang="` + item.product.id_gh + `" class="btn_tang_gh_sp" onclick="tang_giam_cart(this)">+</button>
                                            </div>
                                        </div>
                                        <!-- Price -->
                                        <div class="col l-3">
                                            <input class="number-input__total_sp" value="` + new Intl.NumberFormat('it-IT').format(totalgiasp) + `" id-data-gia="` + item.product.id_gh + `" class="" disabled="disabled" type="text" style=" border: none;background:none;font-size: 1.6rem;display: flex;width:100%;color: red;font-weight: bold;    margin-top: 10px;">
                                            </input>


                                            <button id-delete-sp='` + item.product.id_gh + `' id-delete-kh='' style="border: none; background: none;" class="btn-delete-gh-sp" onclick="xoaitemsp(` + item.product.id_gh + `)">
                                                <i class="fa-solid fa-trash-can" style="cursor: pointer; font-size: 1.5rem;color: red;margin:20px"></i>
                                            </button>



                                        </div>
                                    </div>
                                        
                                    </div>
                                        `;

                                        })
                                        btn_dh001.disabled = false;
                                    }


                                }
                                showGH();
                            </script>
                            <!--  -->
                            <!-- // Xoa san pham gio hang -->

                            <script>
                                function xoaitemsp(value) {
                                    event.preventDefault();
                                    var container_thanhtoan = document.getElementsByClassName('container_thanhtoan');
                                    console.log(container_thanhtoan);
                                    // var xacnhanxoa = confirm('Bạn muốn xóa sản phẩm này ư 🤔')

                                    swal({
                                            title: "Bạn muốn xóa sản phẩm này ư 🤔",
                                            text: "Thật là buồn đó sản phẩm này đang được giảm giá đó . Bạn có suy nghĩ lại không !",
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                            buttons: ["Không", "Xóa"]
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                data_item_gh = []
                                                var storage = localStorage.getItem('data_gh');
                                                data_item_gh = JSON.parse(storage);
                                                var item = data_item_gh.find(data => data.product.id_gh == value)
                                                // console.log(item.product.id_gh);
                                                if (item) {
                                                    data_item_gh.map((data, index) => {
                                                        // console.log(data_item_gh[index])
                                                        // console.log(data.product.id_gh)
                                                        // console.log(item.product.id_gh)
                                                        if (data.product.id_gh == item.product.id_gh) {

                                                            data_item_gh.splice(index, 1);
                                                            for (var i = 0; i < container_thanhtoan.length; i++) {
                                                                // console.log(container_thanhtoan[i].getAttribute('data-id_itemsp'));
                                                                if (container_thanhtoan[i].getAttribute('data-id_itemsp') == item.product.id_gh) {
                                                                    //         console.log(container_thanhtoan[i]);
                                                                    container_thanhtoan[i].remove();
                                                                }
                                                            }
                                                            console.log(data_item_gh);
                                                            localStorage.setItem('data_gh', JSON.stringify(data_item_gh));

                                                        }
                                                    })
                                                    // data_item_gh.delete(item.product.id_gh);
                                                    // showGH();
                                                }
                                                
                                                // console.log(JSON.parse(storage))
                                                storage = localStorage.getItem('data_gh')
                                                if(JSON.parse(storage)==0 || JSON.parse(storage)==null){
                                                    console.log("xoa het")
                                                    showGH();
                                                }
                                                // console.log(data_item_gh);
                                                
                                                
                                                tomtatdonhang();
                                                swal("Sản phẩm được xóa thành công !", {
                                                    icon: "success",
                                                });
                                            } else {
                                                event.preventDefault();
                                            }
                                        });

                                   

                                    


                                }


                                function tang_giam_cart(value) {
                                    var input_sl_sp_gh = document.getElementsByClassName('number-input__input_thanhtoan');
                                    var input_total_sp = document.getElementsByClassName('number-input__total_sp');
                                    var number_input__gia_tung_sp = document.getElementsByClassName('number-input__gia_sp');
                                    var btn_tang_gh_sp = value.getAttribute('id-data-tang');
                                    var btn_giam_gh_sp = value.getAttribute('id-data-giam');
                                    // console.log(btn_tang_gh_sp)
                                    // console.log(btn_giam_gh_sp)
                                    if (btn_tang_gh_sp != null) {
                                        for (var i = 0; i < input_sl_sp_gh.length; i++) {
                                            if (input_sl_sp_gh[i].getAttribute('id-data-input') === btn_tang_gh_sp) {
                                                var totalsp = parseInt(input_total_sp[i].value.replaceAll('.', ''));
                                                var giatungsp = parseInt(number_input__gia_tung_sp[i].value.replaceAll('.', ''));
                                                //    var total_total=totalsp;

                                                //    console.log(giatungsp);

                                                input_sl_sp_gh[i].value++
                                                // total_total=(totalsp+giatungsp);
                                                input_total_sp[i].value = new Intl.NumberFormat('it-IT').format(totalsp + giatungsp)
                                                // console.log(Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format( total_total));
                                                // total_total.replaceAll(3,'.')
                                            };
                                        }
                                        tomtatdonhang();
                                    }
                                    if (btn_giam_gh_sp != null) {
                                        for (var i = 0; i < input_sl_sp_gh.length; i++) {
                                            if (input_sl_sp_gh[i].getAttribute('id-data-input') === btn_giam_gh_sp) {
                                                var totalsp = parseInt(input_total_sp[i].value.replaceAll('.', ''));
                                                var giatungsp = parseInt(number_input__gia_tung_sp[i].value.replaceAll('.', ''));


                                                if (input_sl_sp_gh[i].value <= 1) {
                                                    // value.setAttribute('disabled', 'disabled'); 
                                                    input_total_sp[i].value = new Intl.NumberFormat('it-IT').format(giatungsp)
                                                } else {
                                                    input_sl_sp_gh[i].value--
                                                    // input_total_sp[i].value-=number_input__gia_tung_sp[i].value;
                                                    input_total_sp[i].value = new Intl.NumberFormat('it-IT').format(totalsp - giatungsp)
                                                }



                                            };
                                        }
                                        tomtatdonhang();
                                    }


                                }
                            </script>
                            <!-- Tom tat don hang -->
                            <script>
                                function tomtatdonhang() {
                                    var tomtat_tamtinh = document.querySelector('#tomtat_tamtinh');
                                    var tomtat_khuyenmai = document.querySelector('#tomtat_khuyenmai');
                                    var tomtat_tongcong = document.querySelector('#tomtat_tongcong');
                                    var total = 0;
                                    var valueTotal = document.getElementsByClassName('number-input__total_sp');
                                    for (var i = 0; i < valueTotal.length; i++) {
                                        total += parseInt(valueTotal[i].value.replaceAll('.', ''));
                                    }
                                    // console.log(total);
                                    tomtat_tamtinh.value = new Intl.NumberFormat('it-IT').format(total);
                                    tomtat_tongcong.value = new Intl.NumberFormat('it-IT').format(total);
                                }
                                tomtatdonhang();

                                function btn_thanhtoandathang() {
                                    <?php

                                    // if(isset($_GET['action']) && $_GET['action']=='checkdangnhap'){
                                    if (!isset($_SESSION['thanhcong'])) {
                                    ?>

                                        // alert('Bạn chưa đăng nhập! Vui lòng đăng nhập để đặt hàng nhé');
                                        var modal_dangnhap = document.getElementById("modal_id_dangnhap");
                                        swal("Failed", "Bạn cần đăng nhập để đặt hàng nhé", "error")
                                            // window.location='giohang.php'
                                            .then(() => {
                                                modal_dangnhap.style.display = "flex";
                                            });


                                    <?php
                                    } else {
                                        

                                    ?>
                                        var inputid_gh_soluong=document.querySelector('#ip_gh');
                                        var id_sp=inputid_gh_soluong.getAttribute('id-data-input');
                                        var storage_gh=localStorage.getItem('data_gh');
                                        var storage_sp_gh=JSON.parse(storage_gh);

                                        var item=storage_sp_gh.find(quantitysp => quantitysp.product.id_gh==id_sp);
                                        // console.log(inputid_gh_soluong.value);
                                        // console.log(id_sp);
                                        // console.log(item);
                                        if(item){
                                            item.quantity=parseInt(inputid_gh_soluong.value);
                                            console.log(parseInt(inputid_gh_soluong.value));
                                            localStorage.setItem('data_gh',JSON.stringify(storage_sp_gh));
                                        }
                                        // console.log(id_sp)

                                        window.location = 'thanhtoan.php'
                                    <?php
                                    }
                                    // }
                                    ?>
                                    event.preventDefault();
                                    // window.location = 'thanhtoan.php';
                                }
                            </script>


                        </form>
                    </div>

                </div>
                <!-- </form> -->
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
                margin-left: 85%;
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
        <script src="./assets/js/sweetalert.min.js"></script>