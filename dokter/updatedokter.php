<?php
require '../functions.php';
$id_dokter = $_GET['id'];
$dr = query("SELECT * FROM `dokter` JOIN jadwal ON dokter.id_jadwal = jadwal.id_jadwal JOIN poli on dokter.id_poli = poli.id_poli where id_dokter='$id_dokter'");
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
              <label>ID Dokter</label>
              <input type="text" name="id_dokter" value="<?=$row['id_dokter']?>" id="id_dokter" class="form-control" readonly>
            </div>
            <div class="form-group" align="left">
              <label>Nama Dokter</label>
              <input type="text" name="nama_dokter" id="nama_dokter" value="<?=$row['nama_dokter']?>" class="form-control" placeholder="Enter Nama Dokter" required>
            </div>
            <div class="form-group" align="left">
              <label for="id_poli">Poli</label>
              <input type="text" name="poli" id="id_poli" class="form-control" value="<?php echo $row['poli'] ?>" readonly>
            </div>
            <div class="form-group" align="left">
              <label>Jadwal</label>
              <select name="id_jadwal" id="id_jadwal" class="form-control" value="<?php echo $row['jadwal'] ?>" required>
                <option value="<?=$row['id_jadwal']?>" ><?= $row['hari']?> &nbsp <?= $row['mulai'] ?> &nbsp <?= $row['selesai'] ?> </option>
                <?php
                $sql = "SELECT * FROM jadwal";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                  ?>
                  <option value="<?php echo $row['id_jadwal'] ?>"><?php echo $row['hari']; ?> &nbsp <?php echo $row['mulai']; ?> &nbsp <?php echo $row['selesai']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group" align="left">
              <label>Keterangan</label>
               <select type="text" name="keterangan" id="keterangan" class="form-control" required="">
                  <option></option>
                  <option value="UMUM">Umum</option>
                  <option value="BPJS">BPJS</option>
                  <option value="Umum dan BPJS">Umum dan BPJS</option>
                </select> 
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
  <!-- sparkline JS
        ============================================ -->
  <script src="../js/sparkline/jquery.sparkline.min.js"></script>
  <script src="../js/sparkline/sparkline-active.js"></script>
  <!-- flot JS
        ============================================ -->
  <script src="../js/flot/jquery.flot.js"></script>
  <script src="../js/flot/jquery.flot.resize.js"></script>
  <script src="../js/flot/flot-active.js"></script>
  <!-- knob JS
        ============================================ -->
  <script src="../js/knob/jquery.knob.js"></script>
  <script src="../js/knob/jquery.appear.js"></script>
  <script src="../js/knob/knob-active.js"></script>
  <!--  Chat JS
        ============================================ -->
  <script src="../js/chat/jquery.chat.js"></script>
  <!--  todo JS
        ============================================ -->
  <script src="../js/todo/jquery.todo.js"></script>
  <!--  wave JS
        ============================================ -->
  <script src="../js/wave/waves.min.js"></script>
  <script src="../js/wave/wave-active.js"></script>
  <!-- plugins JS
        ============================================ -->
  <script src="../js/plugins.js"></script>
  <!-- Data Table JS
        ============================================ -->
  <script src="../js/data-table/jquery.dataTables.min.js"></script>
  <script src="../js/data-table/data-table-act.js"></script>
  <!-- main JS
        ============================================ -->
  <script src="../js/main.js"></script>
  <!-- tawk chat JS
        ============================================ -->
  <script src="../js/tawk-chat.js"></script>
  
</body>

</html>
<?php
include '../config.php';
if (isset($_POST['updatedata'])) {
    $id_dokter = $_POST['id_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $id_jadwal = $_POST['id_jadwal'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE dokter SET nama_dokter='$nama_dokter',id_jadwal='$id_jadwal',keterangan='$keterangan' WHERE id_dokter='$id_dokter' ";
    $query_run = mysqli_query($link, $query);

    if ($query_run) {
        echo '<script> alert("Data Update");
        window.location.replace("http://127.0.0.1/rsuk/index/?dokter=index");
        </script>';
    } else {
        //echo '<script> alert("Data not Update")</script>';
        echo mysqli_error($query_run);
    }
}else{
    echo "asd";
}
?>
