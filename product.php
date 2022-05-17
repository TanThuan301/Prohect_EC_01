<?php include("connect_db/connection_db.php");
// session_start();
$arrSP = array();
// $arrSPNofillter = array();
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$item_total_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 9;
// $offset = ($current_page - 1) * $item_total_page;
// $sql1 = "Select * from tbl_sanpham,tbl_cauhinh where tbl_sanpham.cauhinh=tbl_cauhinh.ID ORDER BY `id_sp` ASC LIMIT '.$item_total_page.' OFFSET '.$offset'";
// $sql_select_sp = mysqli_query($con, "Select * from tbl_sanpham,tbl_cauhinh where tbl_sanpham.cauhinh=tbl_cauhinh.ID ORDER BY `id_sp` ASC LIMIT " . $item_total_page . " OFFSET " . $offset . " ");
$sql_select_sp = mysqli_query($con, "Select * from tbl_sanpham,tbl_cauhinh where tbl_sanpham.cauhinh=tbl_cauhinh.ID");
while ($row = mysqli_fetch_array($sql_select_sp)) {

    $o = new stdClass();
    $o->id_sp = $row['id_sp'];
    $o->tensanpham = $row['tensanpham'];
    $o->hinhanhsp = $row['hinhanhsp'];
    $o->giasanpham = $row['giasanpham'];
    $o->giakhuyenmaisp = $row['giakhuyenmaisp'];
    $o->soluongsp = $row['soluongsp'];
    $o->chitietsp = $row['chitietsp'];
    $o->id_dm = $row['id_danhmuc'];
    $o->xuatxu = $row['xuatxu'];
    $o->thuonghieu = $row['thuonghieu'];
    $o->cauhinh_sp = $row['cauhinh'];
    $o->id_ch = $row['ID'];
    $o->cpu = $row['CPU'];
    $o->ram = $row['RAM'];
    $o->ocung = $row['OCUNG'];
    $o->manhinh = $row['MANHINH'];
    // var_dump($row['id_sp'],"cauhinh".$row['cauhinh']);

    array_push($arrSP, $o);
}
// exit;
// var_dump($arrSP);exit;
$enJonSP = json_encode($arrSP);

$current_pageSP = json_encode($current_page);
$item_total_pageSP = json_encode($item_total_page)
// $totalRecordssql = mysqli_query($con, "Select * from tbl_sanpham,tbl_cauhinh where tbl_sanpham.cauhinh=tbl_cauhinh.ID");
// $totalRecords = $totalRecordssql->num_rows;
// $totalPage = ceil($totalRecords / $item_total_page);
// while ($row = mysqli_fetch_array($totalRecordssql)) {

//     $o = new stdClass();
//     $o->id_sp = $row['id_sp'];
//     $o->tensanpham = $row['tensanpham'];
//     $o->hinhanhsp = $row['hinhanhsp'];
//     $o->giasanpham = $row['giasanpham'];
//     $o->giakhuyenmaisp = $row['giakhuyenmaisp'];
//     $o->soluongsp = $row['soluongsp'];
//     $o->chitietsp = $row['chitietsp'];
//     $o->id_dm = $row['id_danhmuc'];
//     $o->xuatxu = $row['xuatxu'];
//     $o->thuonghieu = $row['thuonghieu'];
//     $o->cauhinh_sp = $row['cauhinh'];
//     $o->id_ch = $row['ID'];
//     $o->cpu = $row['CPU'];
//     $o->ram = $row['RAM'];
//     $o->ocung = $row['OCUNG'];
//     $o->manhinh = $row['MANHINH'];

//     array_push($arrSPNofillter, $o);
// }
// $enJonSPNoFillter = json_encode($arrSPNofillter);
?>

<!-- Nội dung -->
<div class="container " style="margin-button:10px">
    <div class="grid wide">
        <div class="row container-content">
            <!-- Phan danh muc -->
            <div class="col l-3 ">
                <!-- <input text="checkbox" class="rounded_btn_dm">
                    Getting started
                </input> -->
                <?php
                $sSQL = "Select * from tbl_danhmuc ORDER BY id_danhmuc  ";

                // while ($row_select_dm = mysqli_fetch_array($Select_dm)) {
                // 
                ?>

                <div class="row">
                    <!---->
                    <!---->
                    <div style="display:flex;width: 100%; font-size: 2rem;font-weight:600;">

                        <label style="margin-right:5%;cursor: pointer;"><i class="fa-solid fa-filter"></i></label>
                        <label style="cursor: pointer;">Bộ lọc</label>
                    </div>
                </div>
                <!-- Thuong hieu -->
                <div class="row" style="margin-top:20px; border-bottom: 2px solid #ecf0f4;">
                    <input class="rounded_btn_dm" type="checkbox" value="" id="tendanhmuc_th" hidden>
                    <div style="display:flex; justify-content: space-between;" class="rounded_btn_dm" id="tendanhmuc_th-color">
                        <label for="tendanhmuc_th" style="cursor: pointer;">Thương hiệu</label>
                        <label style="margin-left:10%;cursor: pointer;" for="tendanhmuc_th"><i style="color:#b4b7c6;" class="fa-solid fa-plus" id="icon-plus-dm-th"></i></label>
                    </div>

                    <div class="collapse_dm " id="collapse_dm_th">

                        <ul class="list-group list-group-dm">
                            <?php
                            $sSQL_Thuonghieu = "Select * from tbl_thuonghieu ORDER BY ID";
                            $select_th = mysqli_query($con, $sSQL_Thuonghieu);
                            while ($row_select_th = mysqli_fetch_array($select_th)) {

                            ?>
                                <li class="list-group-item" style="cursor: pointer;">
                                    <input class="form-check-input me-1 thuonghieu" id="th0_thuonghieu<?php echo $row_select_th['ID'] ?>" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" value="<?php echo $row_select_th['ID'] ?>" onchange="filterSP()">
                                    <label class="form-check-label" style="cursor: pointer;" for="th0_thuonghieu<?php echo $row_select_th['ID'] ?>"><?php echo $row_select_th['thuonghieu'] ?></label></label>
                                </li>


                            <?php

                            }

                            ?>




                        </ul>

                    </div>
                </div>
                <!-- Gia -->
                <div class="row" style="margin-top:20px; border-bottom: 2px solid #ecf0f4;">
                    <input class="rounded_btn_dm" type="checkbox" value="" id="tendanhmuc_gia" hidden>
                    <div style="display:flex; justify-content: space-between;" class="rounded_btn_dm" id="tendanhmuc_gia-color">
                        <label for="tendanhmuc_gia" style="cursor: pointer;">Mức giá</label>
                        <label style="margin-left:10%;cursor: pointer;" for="tendanhmuc_gia"><i style="color:#b4b7c6;" class="fa-solid fa-plus" id="icon-plus-dm-gia" style="color:#b4b7c6;"></i></label>
                    </div>

                    <div class="collapse_dm " id="collapse_dm_gia">

                        <ul class="list-group list-group-dm">

                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 locgia" id="giaduoi5" onchange="filterSP()" value="giaduoi5" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox">
                                <label class="form-check-label" style="cursor: pointer;" for="giaduoi5">Dưới 5 triệu</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 locgia" id="giatu5den10" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="giatu5den10">
                                <label class="form-check-label" style="cursor: pointer;" for="giatu5den10">Từ 5 - 10 triệu</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 locgia" id="giatren10" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="giatren10">
                                <label class="form-check-label" style="cursor: pointer;" for="giatren10">Trên 10 triệu</label></label>
                            </li>





                        </ul>

                    </div>
                </div>
                <!-- O cung -->
                <div class="row" style="margin-top:20px; border-bottom: 2px solid #ecf0f4;">
                    <input class="rounded_btn_dm" type="checkbox" value="" id="tendanhmuc_ocung" hidden>
                    <div style="display:flex; justify-content: space-between;" class="rounded_btn_dm" id="tendanhmuc_ocung-color">
                        <label for="tendanhmuc_ocung" style="cursor: pointer;">Ổ cứng</label>
                        <label style="margin-left:10%;cursor: pointer;" for="tendanhmuc_ocung"><i style="color:#b4b7c6;" class="fa-solid fa-plus" id="icon-plus-dm-ocung" style="color:#b4b7c6;"></i></label>
                    </div>

                    <div class="collapse_dm " id="collapse_dm_ocung">

                        <ul class="list-group list-group-dm">

                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 lococung" id="th126_ocung" onchange="filterSP()" value="126GB" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox">
                                <label class="form-check-label" style="cursor: pointer;" for="th126_ocung">126GB</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 lococung" id="th256_ocung" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="256GB">
                                <label class="form-check-label" style="cursor: pointer;" for="th256_ocung">256GB</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 lococung" id="th512_ocung" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="512GB">
                                <label class="form-check-label" style="cursor: pointer;" for="th512_ocung">512GB</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 lococung" id="th1000_ocung" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="1000GB">
                                <label class="form-check-label" style="cursor: pointer;" for="th1000_ocung">1TB</label></label>
                            </li>





                        </ul>

                    </div>
                </div>
                <!-- Man hinh -->
                <div class="row" style="margin-top:20px; border-bottom: 2px solid #ecf0f4;">
                    <input class="rounded_btn_dm" type="checkbox" value="" id="tendanhmuc_manhinh" hidden>
                    <div style="display:flex; justify-content: space-between;" class="rounded_btn_dm" id="tendanhmuc_manhinh-color">
                        <label for="tendanhmuc_manhinh" style="cursor: pointer;">Màn hình</label>
                        <label style="margin-left:10%;cursor: pointer;" for="tendanhmuc_manhinh"><i style="color:#b4b7c6;" class="fa-solid fa-plus" id="icon-plus-dm-manhinh"></i></label>
                    </div>

                    <div class="collapse_dm " id="collapse_dm_manhinh">

                        <ul class="list-group list-group-dm">
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 manhinh" id="th12_manhinh" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="12">
                                <label class="form-check-label" style="cursor: pointer;" for="th12_manhinh">12 inch</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 manhinh" id="th14_manhinh" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="14">
                                <label class="form-check-label" style="cursor: pointer;" for="th14_manhinh">14 inch</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 manhinh" id="th15_manhinh" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="15.6">
                                <label class="form-check-label" style="cursor: pointer;" for="th15_manhinh">15.6 inch</label></label>
                            </li>



                        </ul>

                    </div>
                </div>
                <!-- CPU -->
                <div class="row" style="margin-top:20px; border-bottom: 2px solid #ecf0f4;">
                    <input class="rounded_btn_dm" type="checkbox" value="" id="tendanhmuc_cpu" hidden>
                    <div style="display:flex; justify-content: space-between;" class="rounded_btn_dm" id="tendanhmuc_cpu-color">
                        <label for="tendanhmuc_cpu" style="cursor: pointer;">CPU</label>
                        <label style="margin-left:10%;cursor: pointer;" for="tendanhmuc_cpu"><i style="color:#b4b7c6;" class="fa-solid fa-plus" id="icon-plus-dm-cpu"></i></label>
                    </div>

                    <div class="collapse_dm " id="collapse_dm_cpu">

                        <ul class="list-group list-group-dm">

                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 cpu" id="thi3_cpu" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="Core i3">
                                <label class="form-check-label" style="cursor: pointer;" for="thi3_cpu">Core I3 </label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 cpu" id="thi5_cpu" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="Core i5">
                                <label class="form-check-label" style="cursor: pointer;" for="thi5_cpu">Core I5 </label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 cpu" id="thi7_cpu" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="Core i7">
                                <label class="form-check-label" style="cursor: pointer;" for="thi7_cpu">Core I7 </label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 cpu" id="thi9_cpu" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="Core i9">
                                <label class="form-check-label" style="cursor: pointer;" for="thi9_cpu">Core I9 </label></label>
                            </li>

                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 cpu" id="thiamdren5_cpu" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="AMD RYZEN5">
                                <label class="form-check-label" style="cursor: pointer;" for="thiamdren5_cpu">AMD RYZEN 5 </label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 cpu" id="thiamdren7_cpu" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="AMD RYZEN7">
                                <label class="form-check-label" style="cursor: pointer;" for="thiamdren7_cpu">AMD RYZEN 7 </label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 cpu" id="thikhac_cpu" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="">
                                <label class="form-check-label" style="cursor: pointer;" for="thikhac_cpu">KHÁC </label></label>
                            </li>



                        </ul>

                    </div>
                </div>
                <!-- Ram -->
                <div class="row" style="margin-top:20px; border-bottom: 2px solid #ecf0f4;">
                    <input class="rounded_btn_dm" type="checkbox" value="" id="tendanhmuc_ram" hidden>
                    <div style="display:flex; justify-content: space-between;" class="rounded_btn_dm" id="tendanhmuc_ram-color">
                        <label for="tendanhmuc_ram" style="cursor: pointer;">RAM</label>
                        <label style="margin-left:10%;cursor: pointer;" for="tendanhmuc_ram"><i style="color:#b4b7c6;" class="fa-solid fa-plus" id="icon-plus-dm-ram"></i></label>
                    </div>

                    <div class="collapse_dm " id="collapse_dm_ram">

                        <ul class="list-group list-group-dm">

                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 ram" id="th4_ram" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="4GB">
                                <label class="form-check-label" style="cursor: pointer;" for="th4_ram">4GB</label></label>
                            </li>

                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 ram" id="th8_ram" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="8GB">
                                <label class="form-check-label" style="cursor: pointer;" for="th8_ram">8GB</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 ram" id="th16_ram" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="16GB">
                                <label class="form-check-label" style="cursor: pointer;" for="th16_ram">16GB</label></label>
                            </li>
                            <li class="list-group-item" style="cursor: pointer;">
                                <input class="form-check-input me-1 ram" id="th32_ram" style="width: 15px; height: 15px;cursor: pointer;" type="checkbox" onchange="filterSP()" value="32GB">
                                <label class="form-check-label" style="cursor: pointer;" for="th32_ram">32GB</label></label>
                            </li>






                        </ul>

                    </div>
                </div>
                <div class="row">
                    <input style=" padding: 5px;background-color: #fff;border: 1px solid; font-size: 1.6rem;border-radius: 4px;margin-top: 10%;cursor: pointer; font-weight:600" type="button" value="Xóa bộ lọc" id="delete_boloc">
                </div>

            </div>
            <script>
                // THƯƠNG HIỆU
                var btn_dmm = document.querySelector("#tendanhmuc_th");
                var show_dm = document.querySelector("#collapse_dm_th");
                var icon_dm_minus = document.querySelector("#icon-plus-dm-th");
                var tendanhmuc_th_color = document.querySelector("#tendanhmuc_th-color");
                btn_dmm.addEventListener("click", function() {
                    if (this.checked) {
                        show_dm.style.display = "block";
                        tendanhmuc_th_color.style.color = "#146ebe";
                        icon_dm_minus.classList.remove('fa-plus');
                        icon_dm_minus.classList.add('fa-minus');

                    } else {
                        show_dm.style.display = "none";
                        tendanhmuc_th_color.style.color = "black";
                        icon_dm_minus.classList.remove('fa-minus');
                        icon_dm_minus.classList.add('fa-plus');
                    }
                })
                // GIA
                var btn_dmm_gia = document.querySelector("#tendanhmuc_gia");
                var show_dm_gia = document.querySelector("#collapse_dm_gia");
                var icon_dm_minus_gia = document.querySelector("#icon-plus-dm-gia");
                var tendanhmuc_gia_color = document.querySelector("#tendanhmuc_gia-color");
                btn_dmm_gia.addEventListener("click", function() {
                    if (this.checked) {
                        tendanhmuc_gia_color.style.color = "#146ebe";
                        show_dm_gia.style.display = "block";
                        icon_dm_minus_gia.classList.remove('fa-plus');
                        icon_dm_minus_gia.classList.add('fa-minus');

                    } else {
                        tendanhmuc_gia_color.style.color = "black";
                        show_dm_gia.style.display = "none";
                        icon_dm_minus_gia.classList.remove('fa-minus');
                        icon_dm_minus_gia.classList.add('fa-plus');
                    }
                })
                // CPU
                var btn_dmm_cpu = document.querySelector("#tendanhmuc_cpu");
                var show_dm_cpu = document.querySelector("#collapse_dm_cpu");
                var icon_dm_minus_cpu = document.querySelector("#icon-plus-dm-cpu");
                var tendanhmuc_cpu_color = document.querySelector("#tendanhmuc_cpu-color");
                btn_dmm_cpu.addEventListener("click", function() {
                    if (this.checked) {
                        tendanhmuc_cpu_color.style.color = "#146ebe";
                        show_dm_cpu.style.display = "block";
                        icon_dm_minus_cpu.classList.remove('fa-plus');
                        icon_dm_minus_cpu.classList.add('fa-minus');

                    } else {
                        tendanhmuc_cpu_color.style.color = "black";
                        show_dm_cpu.style.display = "none";
                        icon_dm_minus_cpu.classList.remove('fa-minus');
                        icon_dm_minus_cpu.classList.add('fa-plus');
                    }
                })
                // RAM
                var btn_dmm_ram = document.querySelector("#tendanhmuc_ram");
                var show_dm_ram = document.querySelector("#collapse_dm_ram");
                var icon_dm_minus_ram = document.querySelector("#icon-plus-dm-ram");
                var tendanhmuc_ram_color = document.querySelector("#tendanhmuc_ram-color");
                btn_dmm_ram.addEventListener("click", function() {
                    if (this.checked) {
                        tendanhmuc_ram_color.style.color = "#146ebe";
                        show_dm_ram.style.display = "block";
                        icon_dm_minus_ram.classList.remove('fa-plus');
                        icon_dm_minus_ram.classList.add('fa-minus');

                    } else {
                        tendanhmuc_ram_color.style.color = "black";
                        show_dm_ram.style.display = "none";
                        icon_dm_minus_ram.classList.remove('fa-minus');
                        icon_dm_minus_ram.classList.add('fa-plus');
                    }
                })
                // OCUNG
                var btn_dmm_ocung = document.querySelector("#tendanhmuc_ocung");
                var show_dm_ocung = document.querySelector("#collapse_dm_ocung");
                var icon_dm_minus_ocung = document.querySelector("#icon-plus-dm-ocung");
                var tendanhmuc_ocung_color = document.querySelector("#tendanhmuc_ocung-color");
                btn_dmm_ocung.addEventListener("click", function() {
                    if (this.checked) {
                        tendanhmuc_ocung_color.style.color = "#146ebe";
                        show_dm_ocung.style.display = "block";
                        icon_dm_minus_ocung.classList.remove('fa-plus');
                        icon_dm_minus_ocung.classList.add('fa-minus');

                    } else {
                        tendanhmuc_ocung_color.style.color = "black";
                        show_dm_ocung.style.display = "none";
                        icon_dm_minus_ocung.classList.remove('fa-minus');
                        icon_dm_minus_ocung.classList.add('fa-plus');
                    }
                })
                // MAN HINH
                var btn_dmm_manhinh = document.querySelector("#tendanhmuc_manhinh");
                var show_dm_manhinh = document.querySelector("#collapse_dm_manhinh");
                var icon_dm_minus_manhinh = document.querySelector("#icon-plus-dm-manhinh");
                var tendanhmuc_manhinh_color = document.querySelector("#tendanhmuc_manhinh-color");
                btn_dmm_manhinh.addEventListener("click", function() {
                    if (this.checked) {
                        tendanhmuc_manhinh_color.style.color = "#146ebe";
                        show_dm_manhinh.style.display = "block";
                        icon_dm_minus_manhinh.classList.remove('fa-plus');
                        icon_dm_minus_manhinh.classList.add('fa-minus');

                    } else {
                        tendanhmuc_manhinh_color.style.color = "black";
                        show_dm_manhinh.style.display = "none";
                        icon_dm_minus_manhinh.classList.remove('fa-minus');
                        icon_dm_minus_manhinh.classList.add('fa-plus');
                    }
                })
            </script>
            <!-- Phan san pham va sap xep -->
            <div class="col l-9">
                <div class="home-filter">
                    <span class="home-filter-label">Tìm kiếm:  </span>

                    <input style="outline:none;font-size: 2rem;border-radius: 5px;border: 1px solid;padding: 5px;" type="text" value="" name="search_pr" class="search-input" id="ip_search_product" 
                    placeholder="Nhập sản phẩm" style="margin-left: 20px;border-radius: 5px; border: 1px solid; padding: 5px;" onkeyup="filterSP()">
                </div>
                <script type="text/javascript">
                    // SEARCH
                    var btniconsearch = document.querySelector("#iconSearch");
                    var search_pr = document.querySelector('#ip_search_product');
                    // search_pr.style.display = "none"
                    btniconsearch.addEventListener('click', function() {
                        if (this.checked) {
                            search_pr.style.display = "block";
                        } else {
                            search_pr.style.display = "none"
                        }

                    })
                </script>
                <!-- Phan san pham -->
                <div class="home-product">
                    <div class="grid">
                        <div class="row" id="sanpham_sp"></div>



                        <div class="row" style=" justify-content: center;margin-top: 20px;">
                            <div id="pagination">

                                <!--  -->
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>



<script>
    // Thương hiệu
    var th_dell = document.querySelector("#th0_thuonghieu1");
    var th_asus = document.querySelector("#th0_thuonghieu2");
    var th_hp = document.querySelector("#th0_thuonghieu3");
    var th_lenovo = document.querySelector("#th0_thuonghieu4");
    var th_gigabye = document.querySelector("#th0_thuonghieu5");
    var th_msi = document.querySelector("#th0_thuonghieu6");
    var th_acer = document.querySelector("#th0_thuonghieu7");
    var th_huawei = document.querySelector("#th0_thuonghieu8");
    // Gia
    var th_giaduoi5 = document.querySelector("#giaduoi5");
    var th_giatu5den10 = document.querySelector("#giatu5den10");
    var th_tren10 = document.querySelector("#giatren10");

    // // Ổ cứng
    var th_126_oc = document.querySelector("#th126_ocung");
    var th_256_oc = document.querySelector("#th256_ocung");
    var th_512_oc = document.querySelector("#th512_ocung");
    var th_1000_oc = document.querySelector("#th1000_ocung");
    // // Màn hình
    var th_12_mh = document.querySelector("#th12_manhinh");
    var th_14_mh = document.querySelector("#th14_manhinh");
    var th_15_mh = document.querySelector("#th15_manhinh");
    // // CPU
    var th_i3_cpu = document.querySelector("#thi3_cpu");
    var th_i5_cpu = document.querySelector("#thi5_cpu");
    var th_i7_cpu = document.querySelector("#thi7_cpu");
    var th_i9_cpu = document.querySelector("#thi9_cpu");
    var th_amdren5_cpu = document.querySelector("#thiamdren5_cpu");
    var th_amdren7 = document.querySelector("#thiamdren7_cpu");
    var th_khac_cpu = document.querySelector("#thikhac_cpu");



    // // RAM
    var th_4_ram = document.querySelector("#th4_ram");
    var th_8_ram = document.querySelector("#th8_ram");
    var th_16_ram = document.querySelector("#th16_ram");
    var th_32_ram = document.querySelector("#th32_ram");


    var btn_delete_boloc = document.querySelector("#delete_boloc");
    console.log(btn_delete_boloc);



    var arraySPSP = [];

    function ApiJS() {

        var jsonArraysp = <?php echo $enJonSP ?>;
        // console.log(arrSP[1]);
        // Lay du lieu tu database 
        for (var i = 0; i < jsonArraysp.length; i++) {
            // console.log(arrSP[1]);
            arraySPSP.push(jsonArraysp[i]);
        }


    }
    ApiJS()

    function paginate(array, page_size, page_number) {
        // human-readable page numbers usually start with 1, so we reduce 1 in the first argument
        return array.slice((page_number - 1) * page_size, page_number * page_size);
    }



    function showSP(th_chonArr = [], gia_chonArr = [], ocung_chonArr = [], manhinh_chonArr = [], cpu_chonArr = [], ram_chonArr = [], arrSearch) {
        var sanpham_sp = document.querySelector("#sanpham_sp");
        // console.log("rftg",th_chonArr.length)
        sanpham_sp.innerHTML = '';
        console.log(th_chonArr.length)
        console.log(ocung_chonArr.length)

        // console.log(ram_cho)
        if (th_chonArr.length == 0 && gia_chonArr.length == 0 && ocung_chonArr.length == 0 && manhinh_chonArr.length == 0 && cpu_chonArr.length == 0 && ram_chonArr.length == 0 && arrSearch == undefined) {
            // var pagination = document.querySelector('#pagination');
            // alert('fewgruek')
            var arraySP = [];
            var item_total_page = <?php echo $item_total_pageSP ?>;
            var current_page = <?php echo $current_pageSP ?>;
            // var totalSP = array.length;
            // console.log(totalSP)
            arraySP = paginate(arraySPSP, item_total_page, current_page);
            console.log("h", arraySP);
            for (var i = 0; i < arraySP.length; i++) {
                // Tim khong co thi bo qua

                sanpham_sp.innerHTML += `
                                <div class="col l-4 m-3 c-12" >
                                    <a href="chitietsp.php?id_sp=` + arraySP[i].id_sp + `&id_ch=` + arraySP[i].cauhinh_sp + `" class="home-product-item">
                                        <div class="home-product-item-img" style="background-image: url(hinhanhsp/` + arraySP[i].hinhanhsp + `">
                                    
                                        </div>
                                        <h4 class="home-product-item-name">` + arraySP[i].tensanpham + `</h4>
                                        <div class="home-product-item-price">
                                            <span class="home-product-item-price-goc">
                                            
                                                ` + arraySP[i].giasanpham + `
                                            </span>
                                            <!-- Gia hien tai -->
                                            <span class="home-product-item-price-ht">
                                               
                                                ` + arraySP[i].giakhuyenmaisp + `
                                            </span>

                                        </div>
                                        <div class="overlay"></div>
                                        <div class="show_detail">
                                            <h3 style="font-size: 2.4rem; text-align: center;font-weight: 600;color: red;">Thông tin cấu hình</h3>
                                            <hr>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Vi xử lý(CPU):` + arraySP[i].cpu + ` </p>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Ram:` + arraySP[i].ram + `</p>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Ổ cứng:` + arraySP[i].ocung + ` </p>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Kích thước màn hình:` + arraySP[i].manhinh + `</p>
                                 
                                            <p style="   font-size: 1.6rem;color: #333;font-weight: 600; border: 2px solid; text-align: center;padding: 10px;width: 50%;margin-left: 22%;">Xem chi tiết</p>
                                        </div>

                                        <!-- xuat xu -->
                                        <div class="home-product-item-origin">

                                            <span class="home-product-item-origin-nguongoc" style="margin-right:5px"><i class="fa-solid fa-gift"></i></span>
                                            <span class="home-product-item-origin-thuonghie" style="color:black;">Giảm giá & Nhiều quà tặng kèm</span>
                                            <!-- <span class="home-product-item-origin-nguongoc"></span> -->
                                        </div>
                                    </a>
                                </div>

                        `

            }
        } else {
            sanpham_sp.innerHTML = '';

            for (var i = 0; i < arraySPSP.length; i++) {
                // Tim khong co thi bo qua
                if (th_chonArr.length > 0) {
                    if (th_chonArr.includes(arraySPSP[i].thuonghieu) == false) {
                        continue;
                    }
                }

                // Loc theo gia
                // var giakm=parseInt(arraySPSP[i].giakhuyenmaisp);
                var tienstring = arraySPSP[i].giakhuyenmaisp.split('.').join('');
                var tienInt = parseInt(tienstring);

                if (gia_chonArr.length > 0) {
                    if (tienInt < 5000000 && gia_chonArr.includes('giaduoi5') == false) {
                        continue;
                    }
                    if (tienInt >= 5000000 && tienInt < 10000000 && gia_chonArr.includes('giatu5den10') == false) {
                        continue;
                    }
                    if (tienInt >= 10000000 && gia_chonArr.includes('giatren10') == false) {
                        continue;
                    }
                }

                // Loc theo o cung
                // console.log(ocung_chonArr)
                // console.log(arraySPSP[i].ocung);
                if (ocung_chonArr.length > 0) {
                    if (ocung_chonArr.includes(arraySPSP[i].ocung) == false) {
                        continue;
                    }
                }
                // Man hinh
                console.log(manhinh_chonArr);
                console.log(arraySPSP[i].manhinh);
                if (manhinh_chonArr.length > 0) {
                    if (manhinh_chonArr.includes(arraySPSP[i].manhinh) == false) {
                        continue;
                    }
                }

                // CPU

                if (cpu_chonArr.length > 0) {
                    if (cpu_chonArr.includes(arraySPSP[i].cpu) == false) {
                        continue;
                    }
                }
                // RAM

                console.log(arraySPSP[i].manhinh);
                if (ram_chonArr.length > 0) {
                    if (ram_chonArr.includes(arraySPSP[i].ram) == false) {
                        continue;
                    }
                }
                // Search
                // console.log(arraySPSP[i].tensanpham.search(arrSearch));
                console.log(arraySPSP[i].tensanpham.search(arrSearch));
                if (arrSearch != undefined) {
                    // console.log("aaaaaa")
                    if ((arraySPSP[i].tensanpham).toLowerCase().search(arrSearch.toLowerCase()) < 0) {
                        continue;
                    }
                }

                sanpham_sp.innerHTML += `
                                <div class="col l-4 m-3 c-12" >
                                    <a href="chitietsp.php?id_sp=` + arraySPSP[i].id_sp + `&id_ch=` + arraySPSP[i].cauhinh_sp + `" class="home-product-item">
                                        <div class="home-product-item-img" style="background-image: url(hinhanhsp/` + arraySPSP[i].hinhanhsp + `">
                                            <!-- <img src="assets/image/sp.jpg" alt="" srcset=""> -->
                                            <!-- de xet hinh vuong cho anh nen dung backround image -->

                                        </div>
                                        <h4 class="home-product-item-name">` + arraySPSP[i].tensanpham + `</h4>
                                        <div class="home-product-item-price">
                                            <span class="home-product-item-price-goc">
                                            
                                                ` + arraySPSP[i].giasanpham + `
                                            </span>
                                            <!-- Gia hien tai -->
                                            <span class="home-product-item-price-ht">
                                               
                                                ` + arraySPSP[i].giakhuyenmaisp + `
                                            </span>

                                        </div>
                                        <div class="overlay"></div>
                                        <div class="show_detail">
                                            <h3 style="font-size: 2.4rem; text-align: center;font-weight: 600;color: red;">Thông tin cấu hình</h3>
                                            <hr>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Vi xử lý(CPU):` + arraySPSP[i].cpu + ` </p>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Ram:` + arraySPSP[i].ram + `</p>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Ổ cứng:` + arraySPSP[i].ocung + ` </p>
                                            <p style="font-size: 1.8rem;color: #26b54c;font-weight: 500;">Kích thước màn hình:` + arraySPSP[i].manhinh + `</p>
                                 
                                            <p style="   font-size: 1.6rem;color: #333;font-weight: 600; border: 2px solid; text-align: center;padding: 10px;width: 50%;margin-left: 22%;">Xem chi tiết</p>
                                        </div>

                                        <!-- xuat xu -->
                                        <div class="home-product-item-origin">

                                            <span class="home-product-item-origin-nguongoc" style="margin-right:5px"><i class="fa-solid fa-gift"></i></span>
                                            <span class="home-product-item-origin-thuonghie" style="color:black;">Giảm giá & Nhiều quà tặng kèm</span>
                                            <!-- <span class="home-product-item-origin-nguongoc"></span> -->
                                        </div>
                                    </a>
                                </div>

                        `


            }
        }

    }

    showSP();





    function filterSP() {
        // Thương hiệu
        var arrTH_active = document.getElementsByClassName("thuonghieu");
        var arrTH_filter = [];
        for (var i = 0; i < arrTH_active.length; i++) {
            if (arrTH_active[i].checked == true) {
                arrTH_filter.push(arrTH_active[i].value);
            }
        }
        // Giá

        var arrGia_active = document.getElementsByClassName("locgia");
        var arrGia_filter = [];
        for (var i = 0; i < arrGia_active.length; i++) {
            if (arrGia_active[i].checked == true) {
                arrGia_filter.push(arrGia_active[i].value);
            }
        }
        // Loc O cung
        var arrOcung_active = document.getElementsByClassName("lococung");
        var arrOcung_filter = [];
        for (var i = 0; i < arrOcung_active.length; i++) {
            if (arrOcung_active[i].checked == true) {
                arrOcung_filter.push(arrOcung_active[i].value);
            }
        }

        // Loc Man hinh
        var arrManhinh_active = document.getElementsByClassName("manhinh");
        var arrManhinh_filter = [];
        for (var i = 0; i < arrManhinh_active.length; i++) {
            if (arrManhinh_active[i].checked == true) {
                arrManhinh_filter.push(arrManhinh_active[i].value);
            }
        }
        // console.log(arrManhinh_filter)

        // Loc CPU
        var arrCPU_active = document.getElementsByClassName("cpu");
        var arrCPU_filter = [];
        for (var i = 0; i < arrCPU_active.length; i++) {
            if (arrCPU_active[i].checked == true) {
                arrCPU_filter.push(arrCPU_active[i].value);
            }
        }

        // Loc Ram
        var arrRam_active = document.getElementsByClassName("ram");
        var arrRam_filter = [];
        for (var i = 0; i < arrRam_active.length; i++) {
            if (arrRam_active[i].checked == true) {
                arrRam_filter.push(arrRam_active[i].value);
            }
        }
        // Search
        var ip_search_pr = document.querySelector('#ip_search_product');
        // console.log(ip_search_pr.value);
        var arrSearch = "";
        if (ip_search_pr.value != "") {
            arrSearch += ip_search_pr.value;
        }
        // console.log(arrSearch)

        // for (var i = 0; i < ip_search_pr.length; i++) {
        //     console.log(ip_search_pr[i].value);
        //     if (ip_search_pr[i].value !="") {
        //         // console.log(ip_search[i])
        //         arrSearch.push(ip_search_pr[i].value);
        //     }
        // }
        showSP(arrTH_filter, arrGia_filter, arrOcung_filter, arrManhinh_filter, arrCPU_filter, arrRam_filter, arrSearch)
        // console.log(arrTH_filter);
        //    console.log(arrTH_active); 

    }

    function Pagination(array) {
        // console.log(arraySP)
        // var arraySP = [];
        var pagination = document.querySelector('#pagination');
        var item_total_page = <?php echo $item_total_pageSP ?>;
        var current_page = <?php echo $current_pageSP ?>;

        var totalSP = array.length;
        // console.log(totalSP)
        //    arraySP=paginate(array, item_total_page, current_page);
        //  console.log( paginate(array, item_total_page, current_page))
        var totalPage = Math.ceil(totalSP / item_total_page);
        // console.log(totalPage)
        // console.log(arraySP);
        for (var num = 1; num <= totalPage; num++) {
            if (num != current_page) {
                pagination.innerHTML += `<li class="pg-item  " data-page="` + num + `">
                        <a class="pg-link" href="?per_page=` + item_total_page + `&page=` + num + `">
                            ` + num + `
                        </a>
                    </li>`
            } else {
                pagination.innerHTML += `<li class="pg-item active" data-page="` + num + `">
                        <a class="pg-link" href="?per_page=` + item_total_page + `&page=` + num + `">
                            ` + num + `
                        </a>
                    </li>`
            }
        }
        // return arraySP;
    }
    // console.log(arraySPSP);
    Pagination(arraySPSP);
    btn_delete_boloc.addEventListener("click", function() {

        th_dell.checked = false;
        th_asus.checked = false;
        th_hp.checked = false;
        th_lenovo.checked = false;
        th_gigabye.checked = false;
        th_msi.checked = false;
        th_acer.checked = false;
        th_huawei.checked = false;
        th_126_oc.checked = false;
        th_256_oc.checked = false;
        th_512_oc.checked = false;
        th_1000_oc.checked = false;
        th_12_mh.checked = false;
        th_14_mh.checked = false;
        th_15_mh.checked = false;
        th_i3_cpu.checked = false;
        th_i5_cpu.checked = false;
        th_i7_cpu.checked = false;
        th_i9_cpu.checked = false;
        th_amdren5_cpu.checked = false;
        th_amdren7.checked = false;
        th_khac_cpu.checked = false;
        th_4_ram.checked = false;
        th_8_ram.checked = false;
        th_16_ram.checked = false;
        th_32_ram.checked = false;
        th_giaduoi5 = false;
        th_giatu5den10 = false;
        th_tren10 = false;
        showSP();

    });
</script>

<!-- <script type="text/javascript">
    var pagination = document.querySelector('#pagination');

    function paginate() {
        var arraypageSP = [];
        var jsonArraypagesp =
        // console.log(arrSP[1]);
        // Lay du lieu tu database 
        var sanpham_sp = document.querySelector("#sanpham_sp");
        sanpham_sp.innerHTML = '';
        for (var i = 0; i < jsonArraypagesp.length; i++) {
            // console.log(arrSP[1]);
            arraypageSP.push(jsonArraypagesp[i]);
        }
        var current_page = 1;
        var item_page = 4;

        function paginate(array, page_size, page_number) {
            // human-readable page numbers usually start with 1, so we reduce 1 in the first argument
            return array.slice((page_number - 1) * page_size, page_number * page_size);
        }
        paginate($arraypageSP, current_page, item_page)
    }
</script> -->