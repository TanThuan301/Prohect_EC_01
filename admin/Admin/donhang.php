<?php
include('../../connect_db/connection_db.php');
session_start();
if (!isset($_SESSION['tendangnhap'])) {
  header('Location: login.php');
}

if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
  session_destroy();
  header('Location: index.php');
}
?>
<?php
// if (isset($_GET['xoa'])&&isset($_GET['magd'])) {
//   $id_xoa = $_GET['xoa'];
//   $ma_gd=$_GET['magd'];

//   $sql_xoa = mysqli_query($con, "DELETE FROM tbl_donhang WHERE ma_donhang='$id_xoa'");
//   $sql_xoa = mysqli_query($con, "DELETE FROM tbl_giaodich WHERE magiaodich='$ma_gd'");

//   // header("location: donhang.php");
// }


?>
<?php

if (isset($_GET['quanly']) == 'xemchitietdh') {
  $id_magd = $_GET['magiaodich'];
  $_SESSION['magiaodich'] = $id_magd;

  header("Location: xemchitietdonhang.php");
}

?>
<!-- xu li huy don -->
<?php
if (isset($_GET['quanly']) == 'xacnhanhuydonhang' && isset($_GET['xacnhanhuy']) && isset($_GET['magiaodich'])) {
  $xacnhanhuy = $_GET['xacnhanhuy'];
  $magiaodich = $_GET['magiaodich'];
} else {
  $xacnhanhuy = "";
  $magiaodich = "";
}
$sql_update_donhang = mysqli_query($con, "UPDATE tbl_donhang SET huydon='$xacnhanhuy' WHERE magiaodich='$magiaodich'");
$sql_update_giaodich = mysqli_query($con, "UPDATE tbl_giaodich SET huydon='$xacnhanhuy' WHERE magiaodich='$magiaodich'");
//    header('Location: xulydonhang.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Sản phẩm</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="../../assets/css/css.css" rel="stylesheet">
<!-- show thong bao -->
  <script src="../../assets/js/sweetalert.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['tendangnhap'] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="donhang.php" class="nav-link active">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Đơn hàng
                  <?php
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.id_sanpham=tbl_sanpham.id_sp AND tbl_donhang.ten_kh=tbl_khachhang.tendangnhap GROUP BY magiaodich");
                $soluongdonhang = 0;
                while ($row_dh = mysqli_fetch_array($sql_select)) {
                  $soluongdonhang+=1;
                }
                $_SESSION['soluongdonhang'] = $soluongdonhang;
                ?>
                 <span class="badge badge-info right"><?php echo $soluongdonhang ?></span>
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="khachhang.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Khách hàng
                  <!-- <i class="fas fa-angle-left right"></i> -->
                  <span class="badge badge-info right"><?php echo $_SESSION['soluongkhachhang'] ?></span>
                </p>
              </a>

            </li>
            <li class="nav-item has-treeview">
              <a href="sanpham.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Sản phẩm
                  <!-- <i class="right fas fa-angle-left"></i> -->
                  <!-- <i class="fas fa-angle-left right"></i> -->
                  <span class="badge badge-info right"><?php echo $_SESSION['soluongsanpham']?></span>
                </p>
              </a>

            </li>
            <li class="nav-item has-treeview">
              <a href="thuonghieu-cauhinh.php" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Thương hiệu-Cấu hình
                  <!-- <i class="fas fa-angle-left right"></i> -->
                </p>
              </a>

            </li>
            

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Đơn hàng</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Đơn hàng</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Đơn hàng</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 1%" class="text-center">
                    #
                  </th>
                  <th style="width: 10%" class="text-center">
                    Mã đơn hàng
                  </th>
                  <th style="width: 14%"class="text-center">
                    Tình trạng
                  </th>
                  <th style="width: 15%" class="text-center">
                    Tên khách hàng
                  </th>
                  <th style="width: 15%" class="text-center">
                    Ngày đặt
                  </th>
                  <th style="width: 15%" class="text-center">
                    Hủy đơn
                  </th>
                  <th style="width: 20%" class="text-center">
                    Quản lý
                  </th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.id_sanpham=tbl_sanpham.id_sp AND tbl_donhang.ten_kh=tbl_khachhang.tendangnhap GROUP BY magiaodich");
                $i = 0;
                while ($row_dh = mysqli_fetch_array($sql_select)) {
                  $i++;
                ?>


                  <tr>
                    <td class="text-center">
                      <?php echo $i ?>
                    </td>
                    <td class="text-center">
                      <a>
                        <?php echo $row_dh['magiaodich'] ?>
                      </a>


                    </td>
                    <td class="text-center">
                      <?php if ($row_dh['tinhtrang'] == 0) {
                            echo ' <span class="badge badge-success">Chưa xử lý</span>';
                          } else {
                            echo '<span class="badge badge-danger">Đã xử lý/Đang giao</span>';
                          } ?>
                      
                    </td >
                    <td class="project_progress text-center">
                      <a><?php echo $row_dh['hoten'] ?></a>
                    </td>
                    <td class="project-state text-center">
                      <span class="badge badge-success"><?php echo $row_dh['ngaydat'] ?></span>
                    </td>
                    <td class="project-state text-center">
                     <!-- 0 dang cho
								1 xac nhan
							2 huy thanh cong -->
                    <?php if ($row_dh['huydon'] == 0) {
                      echo "----";
                    } elseif ($row_dh['huydon'] == 1) {
                      echo '<a href="?quanly=xacnhanhuydonhang&magiaodich=' . $row_dh['magiaodich'] . '&xacnhanhuy=2">Xác nhận hủy đơn</a>';
                    } else {
                      echo 'Đã hủy';
                    }
                    ?>
                    </td>
                    <td class="project-actions text-center">
                      <a class="btn btn-primary btn-sm" href="?quanly=xemchitietdh&magiaodich=<?php echo $row_dh['magiaodich'] ?>">
                        <i class="fas fa-folder">
                        </i>
                        Xem chi tiết
                      </a>
                    
                      <!-- <a class="btn btn-danger btn-sm" href="?xoa=" onclick="deletedh()">
                        <i class="fas fa-trash">
                        </i>
                        Xóa
                      </a> -->
                    </td>
                  </tr>
                <?php


                }
                ?>
                <script type="text/javascript">
                  // function deletedh(id,magd){
                  //   event.preventDefault();
                  //  swal({
                  //    title: "Bạn muốn xóa đơn hàng này !",
                  //    text: "Tất cả dữ liệu về đơn sẽ bị xóa và không hiển thị trên website của bạn nữa!",
                  //    icon: "warning",
                  //    buttons: true,
                  //    dangerMode: true,
                  //    buttons: ["Không", "Xóa"]
                  //  }).then((willDelete) => {
                  //    if (willDelete) {
                  //     //  url='sanpham.php?xoa='+id
                  //      window.location=`donhang.php?xoa=`+id+`&magd=`+magd;
                  //    } else {
                  //     event.preventDefault();
                  //    }
                  //  });

                  // }

                </script>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.1-pre
      </div>
      <strong>Copyright &copy; 2014-2022 <a href="http://adminlte.io"></a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>