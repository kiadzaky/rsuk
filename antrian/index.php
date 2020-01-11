<!doctype html>
<html class="no-js" lang="">

<?php include '../part/head.php' ?>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <?php include '../part/header.php' ?>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <?php include '../part/navbar_h.php' ?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
     <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                   <marquee> <h4>Selamat Datang <?= $_SESSION['username']?></h4> </marquee>
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
                                
                            </div>
                            <div class="ambil-no">
                                <h2 style="text-align: center;">TOLONG JAGA KERAHASIAAN DATA</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include '../part/navbar_v.php' ?>
    <!-- Main Menu area End--> 
    <!-- Start Footer area-->
    <?php include '../part/footer.php' ?>
    <!-- End Footer area-->
     <?php include '../part/javascript.php' ?>
</body>

</html>