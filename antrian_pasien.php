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
include 'config.php';
$query = $link->query("SELECT * FROM `antrian` WHERE status_antrian = '0' ORDER BY no_antrian DESC LIMIT 1");
$row = mysqli_fetch_array($query);
?>

     <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
                                <h2>Email Statistics</h2>
                            </div>
                            <div class="email-statis-wrap">
                                
                                    <?php
                                    if($query->num_rows>0){
                                        ?>
                                        <div class="email-round-nock">
                                        <h1 style="font-size: 250px"><?= $row['no_antrian']?></h1>
                                        </div>
                                <div class="email-ctn-nock" style="margin-top: 130px">
                                    <form method="post" action="reload_antrian.php">
                                        <input type="text" name="no_antrian" hidden="" value="<?= $row['no_antrian']?>">
                                    <input class="btn-lg" type="submit" name="lanjut" value="LANJUT" style="background-color: green;color: white">
                                    </form>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="email-round-nock">
                                        <h1 style="font-size: 100px">KOSONG</h1>
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
    </div>

<script type="text/javascript">
    var no_antrian = $("input[name='no_antrian']").val();
    $.ajax({
        url: 'reload_antrian.php',
        method: 'GET',
        data: {status_antrian: 1},
        cache: false,
        dataType:'html'
    });

</script>


    <?php include 'part/navbar_v.php' ?>
    <!-- Main Menu area End--> 
    <!-- Start Footer area-->
    <?php include 'part/footer.php' ?>
    <!-- End Footer area-->
     <?php include 'part/javascript.php' ?>
</body>

</html>
