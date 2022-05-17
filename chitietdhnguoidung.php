<?php include("connect_db/connection_db.php");

session_start();
require_once 'dompdf/autoload.inc.php';
//Khai báo sử dụng thư viện
use Dompdf\Dompdf;
//Khởi tạo đối tượng dompdf
$dompdf = new Dompdf();


if (isset($_POST['quaylai'])) {
    header("Location: xemdonhang.php");
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

    <link href="assets/css/stylechitietsp.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

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



                <div class="row container-content">
                    <div class="col l-7 tacadonhang">

                        <h2 class="heading_text" style="text-align: center;font-size: 1.8rem;">Chi tiết đơn hàng</h2>
                        <?php
                        $magiaodich = $_GET['magiaodich'];
                        $i = 0;
                        $sql_selectdh = mysqli_query($con, "SELECT * FROM tbl_donhang,tbl_sanpham,tbl_cauhinh where tbl_donhang.id_sanpham=tbl_sanpham.id_sp and tbl_sanpham.cauhinh=tbl_cauhinh.ID and tbl_donhang.magiaodich='$magiaodich'");
                        $tongtien = 0;
                        $tongtiensp = 0;
                        $tensanphamdh = "</br>";
                        while ($row_ctdh = mysqli_fetch_array($sql_selectdh)) {
                            $i++;
                            $tensanphamdh = $tensanphamdh . $row_ctdh['tensanpham'] . ",";
                        ?>
                            <div class="container_thanhtoan">
                                <div class="row" style="width: 100%;">
                                    <div class="col l-6" style="font-size: 1.2rem;">
                                        Sản phẩm <?php echo $i ?> - Mã đơn hàng: <?php echo $row_ctdh['magiaodich'] ?>
                                    </div>
                                    <div class="col l-6" style="text-align: end;font-size: 1.2rem;">
                                        Ngày đặt:<?php echo $row_ctdh['ngaydat'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Img -->
                                    <div class="col l-2">
                                        <img src="hinhanhsp/<?php echo $row_ctdh['hinhanhsp'] ?>" alt="hinhanh" width="75px" height="75px">
                                    </div>
                                    <!-- Contain -->
                                    <div class="col l-5">
                                        <h4 style="font-size:1.6rem; margin:10px;"><?php echo $row_ctdh['tensanpham'] ?></h4>
                                        <div style="font-size:1.2rem;margin-left:15px;display:flex;">

                                            <div>Cấu hình: CPU<?php echo $row_ctdh['CPU'] ?> - RAM <?php echo $row_ctdh['RAM'] ?> - SSD <?php echo $row_ctdh['OCUNG'] ?> - Màn hình <?php echo $row_ctdh['MANHINH'] ?></div>
                                        </div>

                                        <p style="font-size:1.6rem;margin-left:15px;color:red;font-weight:bold;margin-top:10px;width: 100%;border:none;background:none;"><?php echo $row_ctdh['giakhuyenmaisp'] ?>
                                            <span style="text-decoration:line-through; color:black;font-size:1.3rem; margin-left:10px;"><?php echo $row_ctdh['giasanpham'] ?></span>

                                        </p>
                                    </div>
                                    <!-- so luong -->
                                    <div class="col l-2">
                                        <div class="" style=" font-size: 1.6rem;display: flex;">
                                            <!-- <button tabindex="-1" type="button" style="background: none;border: none;font-size: 3rem; cursor:pointer;" id-data-giam="` + item.product.id_gh + `" class="btn_giam_gh_sp" onclick="tang_giam_cart(this)">-</button> -->
                                            <p style="text-align: center;">Số lượng </br> <?php echo $row_ctdh['soluong'] ?></p>
                                            <!-- <button tabindex="-1" type="button" style="background: none;border: none;font-size: 3rem;cursor:pointer;" id-data-tang="` + item.product.id_gh + `" class="btn_tang_gh_sp" onclick="tang_giam_cart(this)">+</button> -->
                                        </div>
                                    </div>
                                    <!-- Price -->
                                    <div class="col l-3">
                                        <p style="font-size: 1.8rem;font-weight: 600;color: green;"><?php

                                                                                                    $gia = $row_ctdh['giakhuyenmaisp'];
                                                                                                    $giasp = str_replace('.', '', $gia);
                                                                                                    //  var_dump($giasp);exit;
                                                                                                    $tongtiensp = $giasp * $row_ctdh['soluong'];
                                                                                                    $tongtien += $tongtiensp;
                                                                                                    echo number_format($tongtiensp);

                                                                                                    ?></p>


                                        <!-- <button id-delete-sp='` + item.product.id_gh + `' id-delete-kh='' style="border: none; background: none;" class="btn-delete-gh-sp" onclick="xoaitemsp(` + item.product.id_gh + `)">
                                                        <i class="fa-solid fa-trash-can" style="cursor: pointer; font-size: 1.5rem;color: red;margin:20px"></i>
                                                    </button> -->



                                    </div>
                                </div>

                            </div>
                        <?php
                        }
                        ?>







                    </div>
                    <?php
                    $sql_thongtin = mysqli_query($con, "SELECT * FROM tbl_giaodich WHERE magiaodich='$magiaodich' ");
                    $row_thongtin = mysqli_fetch_array($sql_thongtin);

                    ?>
                    <div class="col l-5" style="padding: 40px;margin-top: -2%;">
                        <div class="row">

                            <input id="indonhang" type="button" value="In đơn hàng" style="font-size: 1.5rem;margin-left: 70%;border: none;background: #dad5d5;padding: 10px;border-radius: 5px;cursor: pointer;">
                        </div>
                        <div class="row" style="background: #fff;border-radius: 5px;margin-top: 30px;padding: 20px;">
                            <h1 class="heading_textdh" style="margin: 0;padding: 0;font-size: 2rem;width: 100%;text-align: center">Thông tin đơn hàng</h1>
                            <div class="row" style="width: 100%;">
                                <div class="col l-6" style="font-size: 1.2rem;">
                                    Mã đơn hàng: <?php echo $row_thongtin['magiaodich'] ?>
                                </div>
                                <div class="col l-6" style="text-align: end;font-size: 1.2rem;">
                                    Ngày đặt:<?php echo $row_thongtin['ngaythang'] ?>
                                </div>
                            </div>
                            <div style="width: 100%;">
                                <div class="thongtindiachinhanhang">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tên người nhận:<label style="font-weight: 600;"><?php echo $row_thongtin['tennguoinhan'] ?></label> </span>

                                    </div>

                                </div>

                                <div class="thongtindiachinhanhang">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Số điện thoại:<label style="font-weight: 600;"><?php echo $row_thongtin['sdtnh'] ?></label> </span>

                                    </div>

                                </div>
                                <div class="thongtindiachinhanhang">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Hình thức thanh toán:<label style="font-weight: 600;">

                                                <?php

                                                if ($row_thongtin['pt_thanhtoan'] == 1) {
                                                    echo "Tiền mặt";
                                                } else {
                                                    echo "Thanh toán bằng MOMO";
                                                }

                                                ?></label> </span>

                                    </div>

                                </div>
                                <div class="thongtindiachinhanhang">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="diachi_xemchitiet">Địa chỉ :
                                            <label style="font-size: 1.6rem;color: #0546e7;" id='diachi_xemchitiet_item'></label><label style="font-size: 1.6rem;color: #0546e7;" id='phuongxa_ct'></label><label style="font-size: 1.6rem;color: #0546e7;" id='quanhuyen_ct'></label><label style="font-size: 1.6rem;color: #0546e7;" id='tinhthanh_ct'></label>

                                        </span>

                                    </div>

                                </div>
                                <div class="thongtindiachinhanhang" style="border-top: 1px solid;margin-top: 40px;padding-top: 20px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="color: red;font-weight: 700;">Tổng cộng:<?php echo number_format($tongtien) ?> </span>

                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="row">
                            
                            <input id="indonhang" type="button" value="Quay lại" style="font-size: 1.5rem;margin-left: 70%;border: none;background: #18d1c9;padding: 10px;border-radius: 5px;cursor: pointer;margin-top: 12px;" onclick="history.back()">
                        </div>
                    </div>

                </div>


            </div>


            <script>
                (function() {
                    var
                        form = $('.container-content'),
                        cache_width = form.width(),
                        a4 = [595.28, 841.89]; // for a4 size paper width and height  

                    $('#indonhang').on('click', function() {
                        $('body').scrollTop(0);
                        createPDF();
                    });
                    //create pdf  
                    function createPDF() {
                        getCanvas().then(function(canvas) {
                            var
                                img = canvas.toDataURL("image/png"),
                                doc = new jsPDF({
                                    unit: 'px',
                                    format: 'a4'
                                });
                            doc.addImage(img, 'JPEG', 20, 20);
                            doc.save('donhang.pdf');
                            form.width(cache_width);
                        });
                    }

                    // create canvas object  
                    function getCanvas() {
                        form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                        return html2canvas(form, {
                            imageTimeout: 5000,
                            removeContainer: true
                        });
                    }

                }());
            </script>


            <script>
                var diachixemct = document.querySelector('#diachi_xemchitiet_item');
                diachixemct.innerHTML += '<?php echo $row_thongtin['diachinhanhang'] ?>-'
                var tinhthanh_ct = document.querySelector('#tinhthanh_ct');
                var quanhuyen_ct = document.querySelector('#quanhuyen_ct');
                var phuongxa_ct = document.querySelector('#phuongxa_ct');
                var tinhthanh = <?php echo $row_thongtin['tinh_thanhpho']; ?>;
                var phuongxa = <?php echo $row_thongtin['phuong_xa']; ?>;
                var quanhuyen = <?php echo $row_thongtin['quan_huyen']; ?>;
                var arayAddress = [];
                var Parameter = {
                    url: "api/datacity.json", //Đường dẫn đến file chứa dữ liệu hoặc api do backend cung cấp
                    method: "GET", //do backend cung cấp
                    responseType: "application/json", //kiểu Dữ liệu trả về do backend cung cấp
                };
                //gọi ajax = axios => nó trả về cho chúng ta là một promise
                var promise = axios(Parameter);
                // console.log(promise);
                //Xử lý khi request thành công
                promise.then(function(result) {
                    // renderCity(result.data);
                    layThongtinhDiachi(result.data);
                    // console.log(result.data)
                    //    var tenTinhthanh= result.data.find(tinhthanh => tinhthanh.Id == tinhthanh)
                    //    console.log(tenTinhthanh);


                });

                // console.log(arayAddress.length);

                function layThongtinhDiachi(data) {
                    data.forEach((data, index) => {
                        if (data.Id == tinhthanh) {
                            // console.log(data)

                            // console.log(data.Name);
                            arayAddress.push(data.Name);
                            //  console.log(data.Districts)
                            // arayAddress+=tenTinh;
                            // diachixemct.innerHTML+=data.Name
                            tinhthanh_ct.innerHTML = data.Name + '-'

                            data.Districts.forEach((data, index) => {
                                if (data.Id == quanhuyen) {

                                    // diachixemct.innerHTML+=data.Name
                                    // diachixemct.innerHTML+=data.Name
                                    quanhuyen_ct.innerHTML = data.Name + '-';
                                    // console.log(tenQuanHuyen)
                                    arayAddress.push(data.Name);

                                    // arayAddress+=tenQuanHuyen;
                                    data.Wards.forEach(data => {
                                        if (data.Id == phuongxa) {

                                            // console.log(tenPhuongXa)
                                            arayAddress.push(data.Name);
                                            // arayAddress+=tenPhuongXa;
                                            // console.log(data.Name);
                                            // diachixemct.innerHTML+=data.Name
                                            phuongxa_ct.innerHTML = data.Name + '-'
                                        }
                                    })

                                }
                            })


                        }

                    })
                }
                console.log(arayAddress);
            </script>


            <style>
                .tacadonhang {
                    height: 400px;
                    overflow: auto;
                }

                .text_tongcong {
                    margin-left: 70%;
                    margin-top: 40px;
                    font-size: 1.3rem;
                }

                .text_tc {
                    display: block;
                }

                .btn-success {
                    /* margin-top: 10px; */
                    background-color: #28a745;
                    color: #fff;
                    font-size: 2rem;
                    border: none;
                    border-radius: 3px;
                    padding: 4px;
                    cursor: pointer;
                    margin-bottom: 10px;
                }

                .thongtin {
                    margin: 25px 29px 10px 80px;
                }

                .textheding_nn {
                    font-size: 2rem;
                    text-align: center;
                }

                .thongtin_list {
                    list-style: none;
                    font-size: 1.8rem;
                    line-height: 3.3rem;
                }
            </style>
            <!-- Cuoi -->
        </div>
        <?php
        include("footer.php");
        ?>