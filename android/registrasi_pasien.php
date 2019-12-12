<?php
include '../config.php';
$nik = $_GET['nik'];
$date = date("Y-m-d");
$sql = "SELECT * FROM `antrian` JOIN pasien on antrian.no_registrasi = pasien.no_registrasi WHERE nik = '$nik' and status_antrian='0' ";
$query = $link->query($sql);
$row = mysqli_fetch_assoc($query);
$sql1 = "SELECT * FROM `antrian` JOIN pasien on antrian.no_registrasi = pasien.no_registrasi WHERE nik = '$nik' and status_antrian='1' and waktu like '%$date%' "; 
$query1 = $link->query($sql1);
$cek_baris = $query1->num_rows;
if($query->num_rows>0){
    echo "
    <h3> ANTRIAN ANDA ADALAH
    ".$row['no_antrian']."</h3>";
}

elseif ($cek_baris>0) {
    echo "<h3>Anda Sudah Antri Hari Ini</h3></br>";
    echo "<h3>Silahkan Konfirmasi Ke Front Office</h3>";
}
else{
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard | RSU Kaliwates Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/notika-custom-icon.css">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/wave/waves.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
     <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
                                <form method="get">
                                <h2 style="text-align: center;">Register Pasien </h2>
                                <label style="text-align: left;">NIK Pasien</label>
                                <input class="form-control" type="text" name="nik" value="<?=$_GET['nik']?>" readonly="" required="" placeholder="Keluhan Pasien">
                                <label style="text-align: left;">Poli</label>
                                <select class="form-control" name="id_poli">
                                   
                                <?php
                                $query = "SELECT * FROM `poli` ";
                                $sql = $link->query($query);
                                while ($row=mysqli_fetch_array($sql)) {
                                ?>
                                 <option value="<?= $row['id_poli']?>"><?= $row['poli'];?></option>
                                
                                <?php
                                }
                                ?>
                                </select>
                                <label style="text-align: left;">Keluhan Pasien</label>
                                <input class="form-control" type="text" name="keluhan" required="" placeholder="Keluhan Pasien">
                                <label style="text-align: left;">Riwayat Penyakit Pasien</label>
                                <input class="form-control" type="text" name="riwayat" required="" placeholder="Riwayat Penyakit Pasien">
                                <label>&nbsp</label>
                                <input class="btn btn-success notika-btn-success waves-effect" style="background: green" type="submit" name="submit" value="submit">
                                <form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_GET['submit'])){
            include '../api/kode_pasien.php';
            $nik = $_GET['nik'];
            $id_poli = $_GET['id_poli'];
            $keluhan = $_GET['keluhan'];
            $riwayat = $_GET['riwayat'];


            $sql = "INSERT INTO `pasien` (`no_registrasi`, `nik`, `id_poli`, `tanggal`, `keluhan`, `riwayat_sakit`) VALUES ('$no_resep', '$nik', '$id_poli', CURRENT_TIMESTAMP, '$keluhan', '$riwayat')";
            $query = $link->query($sql);
                $sql1 = "SELECT * FROM `no_antri`  WHERE status_antrian = 'tersedia' ORDER BY no_antrian ASC limit 1";
                $query2 = mysqli_query($link,$sql1);
                $rows = mysqli_fetch_array($query2);
                $no_antrian = $rows['no_antrian'];
                if($no_antrian!=null){
                    $sql = "INSERT INTO `antrian` (`id`, `waktu`, `no_registrasi`, `no_antrian`, `status_antrian`) VALUES (NULL, CURRENT_TIMESTAMP, '$no_resep', '$no_antrian', '0')";
                    $query3 = mysqli_query($link,$sql);
                    //insert data
                    if ($query3) {
                    $sql_update = "UPDATE `no_antri` SET `status_antrian` = 'tidak' WHERE `no_antri`.`no_antrian` = '$no_antrian' ";
                    $query1 = $link->query($sql_update);
                    //update
                    $result['success'] = "1";
                    echo json_encode($result);
                    }else{
                        mysqli_error($link);
                    }
                }else{
                    mysqli_error($link);
                }           
        }
        ?>
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2019 
.<a href="#">RSU Kaliwates</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
        ============================================ -->
        <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="../js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="../js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="../js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="../js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="../js/counterup/jquery.counterup.min.js"></script>
    <script src="../js/counterup/waypoints.min.js"></script>
    <script src="../js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
        ============================================ -->
    <!-- <script src="../js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../js/jvectormap/jvectormap-active.js"></script> -->
    <!-- sparkline JS
        ============================================ -->
    <script src="../js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="../js/flot/jquery.flot.js"></script>
    <script src="../js/flot/jquery.flot.resize.js"></script>
    <script src="../js/flot/curvedLines.js"></script>
    <script src="../js/flot/flot-active.js"></script>
    <!-- knob JS
        ============================================ -->
    <script src="../js/knob/jquery.knob.js"></script>
    <script src="../js/knob/jquery.appear.js"></script>
    <script src="../js/knob/knob-active.js"></script>
    <!--  wave JS
        ============================================ -->
    <script src="../js/wave/waves.min.js"></script>
    <script src="../js/wave/wave-active.js"></script>
    <!--  todo JS
        ============================================ -->
    <script src="../js/todo/jquery.todo.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="../js/plugins.js"></script>
    <!--  Chat JS
        ============================================ -->
   
    <!-- main JS
        ============================================ -->
    <script src="../js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
</body>

</html>

<?php
}
?>