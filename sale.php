<?php
include("connect_db/connection_db.php");
session_start();

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

    <!-- scroll -->
    <link rel="stylesheet" href="assets/css/scroll.css">
    <script src="/assets/js/scroll.js"></script>
    <!-- ********** -->
    <!--modal-->
    <script src="/assets/js/modal.js"></script>

    <!-- fomat the body -->
    <link rel="stylesheet" href="./assets/css/cdnjs_normalize.css">

    <link rel="stylesheet" href="assets/loadding/style.css" />
    <title>Khuyến mãi</title>
</head>

<body>

    <?php include("heading.php") ?>
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
        <?php
        include("product.php");

        ?>

    </div>

  




    <?php

    include("footer.php");
    ?>


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

</body>
<script>
    setTimeout(function() {
        var headerHome = document.querySelector("#header_home");
        var headerSale = document.querySelector("#header_sale");
        var headerPolyci = document.querySelector("#header_policy");
        var headerContact = document.querySelector("#header_contact");
        var loadding=document.querySelector(".modal_loadding");

        // console.log(headerHome);
        // console.log(headerSale);
        // console.log(headerPolyci);
        // console.log(headerContact);
        headerHome.classList.remove("active_link-heder");
        headerSale.classList.add("active_link-heder");
        
        headerPolyci.classList.remove("active_link-heder");
        headerContact.classList.remove("active_link-heder");
        loadding.style.display="none"
        


    }, 800)




    
</script>

</html>