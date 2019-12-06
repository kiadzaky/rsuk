<?php
require 'functions.php';
$dr = query("SELECT dokter.id_dokter,dokter.nama_dokter,dokter.no_hp,poli.poli,jadwal.jadwal FROM dokter JOIN poli ON dokter.id_poli = poli.id_poli JOIN jadwal ON dokter.id_jadwal = jadwal.id_jadwal");
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
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- font awesome CSS
		============================================ -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <!-- meanmenu CSS
		============================================ -->
  <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- wave CSS
		============================================ -->
  <link rel="stylesheet" href="css/wave/waves.min.css">
  <link rel="stylesheet" href="css/wave/button.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- Notika icon CSS
		============================================ -->
  <link rel="stylesheet" href="css/notika-custom-icon.css">
  <!-- Data Table JS
		============================================ -->
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="css/main.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <!-- Start Header Top Area -->
  <?php include 'part/header.php' ?>
  <!-- End Header Top Area -->
  <!-- Navbar vertikal start -->
  <?php include 'part/navbar_v.php' ?>
  <!-- Navbar vertikal end -->
  <!-- Navbar horizontal start-->
  <div class="main-menu-area mg-tb-40">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
            <li><a href="registrasi_pasien.php"><i class="notika-icon notika-menus"></i> Registrasi Pasien</a>
            </li>
            <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-alarm"></i> Ambulance</a>
            </li>
            <li><a href="tracking_obat.php"><i class="notika-icon notika-edit"></i> Tracking Obat</a>
            </li>
            <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-form"></i> Data Master</a>
            </li>
            <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Laporan</a>
            </li>
          </ul>
          <div class="tab-content custom-menu-content">
            <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
              <ul class="notika-main-menu-dropdown">
                <li><a href="index.php">Ambulance Darurat</a>
                </li>
                <li><a href="index.php">Penjemputan Jenazah</a>
                </li>
              </ul>
            </div>
            <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
              <ul class="notika-main-menu-dropdown">
                <li><a href="index_dokter.php">Data Dokter</a>
                </li>
                <li><a href="index_user.php">Data User</a>
                </li>
              </ul>
            </div>
            <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
              <ul class="notika-main-menu-dropdown">
                <li><a href="laporanregistrasipasien.php">Laporan Registrasi Pasien</a>
                </li>
                <li><a href="laporanobat.php">Laporan Tracking Obat</a>
                </li>
                <li><a href="laporan_ambulan.php">Laporan Ambulance</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar horizontal End-->
  <!-- Tambah data dokter start-->
  <div class="breadcomb-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcomb-list">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcomb-wp">
                  <div class="breadcomb-icon">
                    <i class="notika-icon notika-windows"></i>
                  </div>
                  <div class="breadcomb-ctn">
                    <h2>Data Table</h2>
                    <p>Welcome to Notika <span class="bread-ntd">Admin Template</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                  <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success btn-md"><i class="fa fa-plus"></i><i class="notika-icon notika-plus"></i></button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" align="left">Tambah Data Dokter</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php
                      $conn = mysqli_connect("localhost", "root", "", "db_rsuk");
                      $db = mysqli_select_db($conn, 'db_rsuk');
                      $query = "SELECT max(id_dokter) as maxKode FROM dokter";
                      $hasil = mysqli_query($conn, $query);
                      $data = mysqli_fetch_array($hasil);
                      $id_dokter = $data['maxKode'];
                      $noUrut = (int) substr($id_dokter, 3, 5);
                      $noUrut++;
                      $char = "DR";
                      $id_dokter = $char . sprintf("%03s", $noUrut);
                      ?>
                      <form action="insertdokter.php" method="POST">
                        <div class="modal-body">
                          <div class="form-group" align="left">
                            <label>ID Dokter</label>
                            <input type="text" name="id_dokter" class="form-control" value="<?php echo $id_dokter; ?>">
                          </div>
                          <div class="form-group" align="left">
                            <label>Nama Dokter</label>
                            <input type="text" name="nama_dokter" class="form-control" placeholder="Enter Nama Dokter" required>
                          </div>
                          <div class="form-group" align="left">
                            <label>No Hp</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Enter No Hp" required>
                          </div>
                          <div class="form-group" align="left">
                            <label>Poli</label>
                            <select name="id_poli" id="poli" class="form-control" required>
                              <?php
                              $sql = "SELECT * FROM poli";
                              $query = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?php echo $row['id_poli'] ?>"><?php echo $row['poli']; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group" align="left">
                            <label>Jadwal</label>
                            <select name="id_jadwal" id="jadwal" class="form-control" required>
                              <?php
                              $sql = "SELECT * FROM jadwal";
                              $query = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?php echo $row['id_jadwal'] ?>"><?php echo $row['jadwal']; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                          <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tambah data dokter end-->
  <!-- Tampil data dokter Start-->
  <div class="data-table-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="data-table-list">
            <div class="basic-tb-hd">
              <h2>Data Registrasi Pasien</h2>
              <p>Berisi semua data registrasi pasien</p>
            </div>
            <div class="table-responsive">
              <table id="data-table-basic" class="table table-striped">
                <thead>
                  <tr>
                    <th>ID Dokter</th>
                    <th>Nama Dokter</th>
                    <th>No.Hp</th>
                    <th>Poli</th>
                    <th>Jadwal</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dr as $row) : ?>
                    <tr>
                      <td><?= $row["id_dokter"]; ?></td>
                      <td><?= $row["nama_dokter"]; ?></td>
                      <td><?= $row["no_hp"]; ?></td>
                      <td><?= $row["poli"]; ?></td>
                      <td><?= $row["jadwal"]; ?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-xs editbtn"><i class="fa fa-edit "></i>Edit</button>
                        <button type="button" class="btn btn-danger btn-xs deletebtn"><i class="fa fa-trash-o"></i>delete</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Dokter</th>
                    <th>Nama Dokter</th>
                    <th>No.Hp</th>
                    <th>Poli</th>
                    <th>Jadwal</th>
                    <th>Opsi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tampil data dokter end-->
  <!-- Edit data dokter Strat -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Dokter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="updatedokter.php" method="POST">
          <div class="modal-body">
            <div class="form-group" align="left">
              <label>ID Dokter</label>
              <input type="text" name="id_dokter" id="id_dokter" class="form-control" readonly>
            </div>
            <div class="form-group" align="left">
              <label>Nama Dokter</label>
              <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" placeholder="Enter Nama Dokter" required>
            </div>
            <div class="form-group" align="left">
              <label>No Hp</label>
              <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Enter No Hp" required>
            </div>
            <div class="form-group" align="left">
              <label for="id_poli">Poli</label>
              <input type="text" name="poli" id="id_poli" class="form-control" value="<?php echo $row['poli'] ?>" readonly>
            </div>
            <div class="form-group" align="left">
              <label>Jadwal</label>
              <select name="id_jadwal" id="jadwal" class="form-control" value="<?php echo $row['jadwal'] ?>" required>
                <?php
                $sql = "SELECT * FROM jadwal";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                  ?>
                  <option value="<?php echo $row['id_jadwal'] ?>"><?php echo $row['jadwal']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Edit data dokter End -->
  <!-- Hapus data dokter start -->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Data Dokter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="deletedokter.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <h4>Apakah anda yakin ingin menghapus data ini? </h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
            <button type="submit" name="deletedata" class="btn btn-primary"> Yes </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Hapus data dokter end -->
  <!-- Start Footer area-->
  <?php include 'part/footer.php' ?>
  <!-- End Footer area-->
  <!-- jquery
		============================================ -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="js/wow.min.js"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="js/jquery-price-slider.js"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="js/jquery.scrollUp.min.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="js/meanmenu/jquery.meanmenu.js"></script>
  <!-- counterup JS
		============================================ -->
  <script src="js/counterup/jquery.counterup.min.js"></script>
  <script src="js/counterup/waypoints.min.js"></script>
  <script src="js/counterup/counterup-active.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sparkline JS
		============================================ -->
  <script src="js/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/sparkline/sparkline-active.js"></script>
  <!-- flot JS
		============================================ -->
  <script src="js/flot/jquery.flot.js"></script>
  <script src="js/flot/jquery.flot.resize.js"></script>
  <script src="js/flot/flot-active.js"></script>
  <!-- knob JS
		============================================ -->
  <script src="js/knob/jquery.knob.js"></script>
  <script src="js/knob/jquery.appear.js"></script>
  <script src="js/knob/knob-active.js"></script>
  <!--  Chat JS
		============================================ -->
  <script src="js/chat/jquery.chat.js"></script>
  <!--  todo JS
		============================================ -->
  <script src="js/todo/jquery.todo.js"></script>
  <!--  wave JS
		============================================ -->
  <script src="js/wave/waves.min.js"></script>
  <script src="js/wave/wave-active.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="js/plugins.js"></script>
  <!-- Data Table JS
		============================================ -->
  <script src="js/data-table/jquery.dataTables.min.js"></script>
  <script src="js/data-table/data-table-act.js"></script>
  <!-- main JS
		============================================ -->
  <script src="js/main.js"></script>
  <!-- tawk chat JS
		============================================ -->
  <script src="js/tawk-chat.js"></script>
  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#deletemodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[0]);
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {
        $('#editModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        console.log(data);
        $('#id_dokter').val(data[0]);
        $('#nama_dokter').val(data[1]);
        $('#no_hp').val(data[2]);
        $('#id_poli').val(data[3]);
        $('#jadwal').val(data[4]);
      });
    });
  </script>
</body>

</html>