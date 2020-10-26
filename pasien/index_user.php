<?php
require '../functions.php';
$user = query("SELECT * FROM akun where level='1'");
?>
<!doctype html>
<html class="no-js" lang="">

<?php include '../part/head.php' ?>
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
  <!-- Breadcomb area Start-->
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
                    <h2>Data Pasien</h2>
                    <p>Selamat Datang<span class="bread-ntd"> Admin </span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                  <!-- <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--awal modal-->
  <!-- Breadcomb area End-->
  <!-- Data Table area Start-->
  <div class="data-table-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="data-table-list">
            <div class="basic-tb-hd">
              <h2>Data Pasien</h2>
              <p>Berisi semua data pasien aplikasi RSU Kaliwates</p>
            </div>
            <div class="table-responsive">
              <table id="data-table-basic" class="table table-striped">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Np.Telepon</th>
                    <th>Username</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user as $row) : ?>
                    <tr>
                      <td><?= $row["nik"]; ?></td>
                      <td><?= $row["nama"]; ?></td>
                      <td><?= $row["tanggal_lahir"]; ?></td>
                      <td><?= $row["alamat"]; ?></td>
                      <td><?= $row["jenis_kelamin"]; ?></td>
                      <td><?= $row["no_telepon"]; ?></td>
                      <td><?= $row["username"]; ?></td>
                      <td>
                        <a href="../pasien/deleteuser.php?id=<?= $row['nik'] ?>"><button type="button" class="btn btn-danger btn-xs deletebtn"><i class="fa fa-trash-o"></i>delete</button></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No.Telepon</th>
                    <th>Username</th>
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
  <!-- Data Table area End-->
  <!-- Start Footer area-->
  <?php include '../part/footer.php' ?>
  <!-- End Footer area-->
  <!-- jquery
		============================================ -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
 <?php include '../part/javascript.php' ?>
</body>

</html>