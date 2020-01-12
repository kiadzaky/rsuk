<?php
require '../functions.php';
$dr = query("SELECT * FROM `akun` where nama='admin' and username = 'admin'");
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Data Dokter | RSU Kaliwates Admin</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
        ============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
  <!-- Google Fonts
        ============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
        ============================================ -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- font awesome CSS
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
  <!-- wave CSS
        ============================================ -->
  <link rel="stylesheet" href="../css/wave/waves.min.css">
  <link rel="stylesheet" href="../css/wave/button.css">
  <!-- mCustomScrollbar CSS
        ============================================ -->
  <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- Notika icon CSS
        ============================================ -->
  <link rel="stylesheet" href="../css/notika-custom-icon.css">
  <!-- Data Table JS
        ============================================ -->
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
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
  <!-- Start Header Top Area -->
  <?php include '../part/header.php' ?>
  <!-- End Header Top Area -->
  <!-- Navbar vertikal start -->
  <?php include '../part/navbar_v.php' ?>
  <!-- Navbar vertikal end -->
  <!-- Navbar horizontal start-->
  <?php include '../part/navbar_h.php' ?>
  <!-- Navbar horizontal End-->
  <!-- Tambah data dokter start-->
  <!-- Tambah data dokter end-->
  <!-- Tampil data dokter Start-->
  <div class="data-table-area">
    <div class="container">
      <div class="row">
        <form  method="POST">
            <?php foreach ($dr as $row) {
                ?>

          <div class="modal-body" id="data_dokter">
            <div class="form-group" align="left">
              <label>NIK</label>
              <input type="text" name="nik" value="<?=$row['nik']?>" id="id_dokter" class="form-control" readonly>
            </div>
            <div class="form-group" align="left">
              <label>Password Baru</label>
              <input type="text" name="password_baru" id="password" class="form-control" placeholder="Enter Password" required>
            </div>
          </div>
          <?php
            } ?>
            <button name="updatedata" class="btn btn-warning">Edit Data</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Tampil data dokter end-->

  <!-- Start Footer area-->
  <?php include '../part/footer.php' ?>
  <!-- End Footer area-->
  <!-- jquery
        ============================================ -->
  <?php include '../part/javascript.php'; ?>
  
</body>

</html>
<?php
include '../config.php';
if (isset($_POST['updatedata'])) {
    $nik = $_POST['nik'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $query = "UPDATE `akun` SET `password` = '$password_baru' WHERE `akun`.`nik` = '$nik'; ";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        echo '<script> alert("Data Update");
        window.location.replace("http://127.0.0.1/rsuk/index/?dokter=index");
        </script>';
    } else {
        //echo '<script> alert("Data not Update")</script>';
        echo mysqli_error($query_run);
    } 
}
?>
