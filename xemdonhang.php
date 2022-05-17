<?php

use function PHPSTORM_META\type;

include("connect_db/connection_db.php");
session_start();



?>
<!-- xu li huy don -->
<?php
// 0: chua gui yeu cau 1: gui yeu cau 2 la xac nhan huy don
if (isset($_GET['huydon']) && isset($_GET['magiaodich'])) {
    $huydon = $_GET['huydon'];
    $magiaodich = $_GET['magiaodich'];
} else {
    $huydon = "";
    $magiaodich = "";
}
$sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
$sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
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



    <title>Sản phẩm</title>
</head>

<body>

    <!-- Tiêu đề -->


    <?php
    include("heading.php");
    ?>
    <!-- Nội dung -->
    <div class="container">


        <div class="grid wide">
            <div class="row container-content">
                <div class="col l-12 tacadonhang">
                    <h2 class="heading_textdh">Tất cả đơn hàng</h2>
                    <div class="row">
                        <?php
                        $kh = $_SESSION['thanhcong'];
                        $id_kh = $kh['tendangnhap'];
                        $tenkh = $kh['hoten'];
                        $i = 0;
                        $sSQL = "SELECT * FROM tbl_giaodich WHERE tbl_giaodich.id_khachhang='$id_kh' GROUP BY tbl_giaodich.magiaodich ORDER BY tbl_giaodich.id_giaodich DESC ";
                        $sql_select_dh = mysqli_query($con, $sSQL);


                        while ($row_donhang = mysqli_fetch_array($sql_select_dh)) {


                            $i++;
                        ?>
                            <div class="col l-6">

                                <div class="container_thanhtoan">
                                    <div class="row" style="padding:0 10px 10px 20px">
                                        <div class="row" style="width: 100%;">
                                            <div class="col l-6" style="font-size: 1.2rem;">
                                                STT <?php echo $i ?> - Mã đơn hàng: <?php echo $row_donhang['magiaodich'] ?>
                                            </div>
                                            <div class="col l-6" style="text-align: end;font-size: 1.2rem;">
                                                Ngày đặt:<?php echo $row_donhang['ngaythang'] ?>
                                            </div>
                                        </div>
                                        <div class="row" style="width: 100%;justify-content: space-between">
                                            <div class="col l-2">
                                                <img src="assets/image/quanlydonhang.png" alt="hinhanh" width="75px" height="75px">
                                            </div>
                                            <!-- Contain -->

                                            <div class="col l-5">
                                                <h4 class="heading_textdh" style="font-size: 1.5rem;padding: 0;margin: 0;text-align: center;">Tình trạng đơn hàng</h4>
                                                <p style="font-size: 1.3rem;color: green;font-weight: 600;text-align: center;"><?php
                                                                                                                                // =0 chua đang xử li =1 thi đang giao
                                                                                                                                if ($row_donhang['tinhtrangdh'] == 0) {
                                                                                                                                    echo "Đơn hàng đang được xử lí !";
                                                                                                                                } else {
                                                                                                                                    echo "<lable style='color:red'>Đơn hàng đang được giao !</lable>";
                                                                                                                                   
                                                                                                                                }

                                                                                                                                ?></p>
                                            </div>
                                            <div class="col l-5">

                                                <h4 class="heading_textdh" style="font-size: 1.5rem;margin: 0;text-align: center;margin-bottom: 15px;">Action</h4>
                                                <div class="container_actiondh" style="/* text-align: center; */width: 100%;text-align: -webkit-center;">
                                                    <!-- <button type="button" class="btn btn"> -->
                                                    <div style="font-size: 1.4rem;font-weight: 600;/* color: #333; */background: #078349;width: 50%;height: 30px;border-radius: 5px;margin-bottom: 10px;padding-top: 3%;">
                                                        <a href="chitietdhnguoidung.php?quanly=chitietdonhang&magiaodich=<?php echo $row_donhang['magiaodich'] ?> " class="text_huydonhang" style="color: #fff;" >Xem chi tiết</a>

                                                    </div>
                                                    <!-- </button> -->
                                                    <!-- <button type="button" class="btn btn" style="margin-top:10px"> -->
                                                    <div style="font-size: 1.4rem;font-weight: 600;background:#db0c0c;width: 50%;height: 30px;border-radius: 5px;margin-bottom: 10px;padding-top: 3%;">
                                                        
                                                        <?php
                                                        // 0: yeu cau huy 1:dang cho ben kia con lai da xu li xong
                                                        if ($row_donhang['huydon'] == 0) {
                                                            if($row_donhang['tinhtrangdh'] == 1){

                                                                echo "<lable style='color:#c09c28'>Dang giao</lable>";
                                                        ?>
                                                           <!-- <a href="xemdonhang.php?quanly=yeucauhuydon&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1 " class="text_huydonhang" style="color: #fff;" id="huydonhang_dg" >Hủy đơn hàng</a> -->
                                                                
                                                        <?php
                                                        }else{
                                                            ?>
                                                           <a href="xemdonhang.php?quanly=yeucauhuydon&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1 " class="text_huydonhang" style="color: #fff;" id="huydonhang_dg" >Hủy đơn hàng</a>
                                                           
                                                        <?php
                                                        }
                                                        } elseif ($row_donhang['huydon'] == 1) {
                                                            echo "<lable style='color:#baf501;'>Đang chờ hủy</lable>";
                                                        } else {
                                                            echo "<lable style='color:#c9c5b6'>Đã hủy</lable>";
                                                        }
                                                        ?>

                                                    </div>
                                                    <!-- </button> -->

                                                </div>


                                            </div>

                                            <!-- Img -->

                                        </div>

                                    </div>
                                </div>

                            </div>

                        <?php
                        }

                        ?>


                    </div>

                </div>
            </div>

        </div>
        <style>
            .tacadonhang {
                /* height: 600px; */
                /* overflow: auto; */
            }

            .text_huydonhang {
                text-decoration: none;
            }
        </style>
        <!-- Cuoi -->
    </div>
        <?php
        include("footer.php");
        ?>
</body>
</html>