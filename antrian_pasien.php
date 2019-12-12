<!doctype html>
<html class="no-js" lang="">

<?php include 'part/head.php' ?>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <?php include 'part/header.php' ?>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <?php include 'part/navbar_h.php' ?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
<?php
    include 'ambil_no.php';
?>

     <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                    <h4>Sisa Antrian: <?= $row['jml'] ?></h4>
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
                                <h2 style="text-align: center;">NOMOR ANTRIAN</h2>
                            </div>
                            <div class="ambil-no">
                                
                                    <?php
                                    if($query->num_rows>0 && $row['jml']>0){
                                        ?>
                                        <div class="row-antrian">
                                        <h1 class="load" style="font-size: 200px"><?= $row['no_antrian']?></h1>
                                        <button class="btn btn-info notika-btn-info waves-effect" disabled="disabled" style="font-size: 25px; text-transform: uppercase; padding-right: 100px; padding-left: 100px"><?= $row['nama']?></button>
                                        </div>
                                <div class="email-ctn-nock" style="margin-top: 10px">
                                    <form method="post" action="reload_antrian.php">
                                        <input type="text" name="no_antrian" hidden="" value="<?= $row['no_antrian']?>">
                                    <input class="btn-lg" type="submit" name="lanjut" value="LANJUT" style="background-color: green;color: white">
                                </div>
                                    </form>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="">
                                        <h1 class="load" style="font-size: 100px">KOSONG</h1>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include 'part/navbar_v.php' ?>
    <!-- Main Menu area End--> 
    <!-- Start Footer area-->
    <?php include 'part/footer.php' ?>
    <!-- End Footer area-->
     <?php include 'part/javascript.php' ?>
</body>

</html>
