<?php
require '../functions.php';
include 'insertcode.php';
$jdw = query("SELECT * FROM jadwal");
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Jadwal | RSU Kaliwates Admin</title>
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
                    <h2>Daftar Jadwal</h2>
                    <p>Selamat Datang <span class="bread-ntd">Admin</span></p>
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
                        <h4 class="modal-title" id="exampleModalLabel" align="left">Tambah Jadwal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="../dokter/insertcode.php" method="POST">
                        <div class="modal-body">
                          <div class="form-example-int">
                          <input type="hidden" name="update_id" id="update_id">
                            <div class="form-group" align="left">
                            <label>Hari</label>
                            <div class="nk-int-st">
                            <input type="text" name="hari" id="hari" class="form-control input-sm" placeholder="Enter Hari">
                            </div>
                            </div>
                        </div>
                          <div class="form-group" align="left">
                            <label>Mulai</label>
                            <input type="text" name="mulai" class="form-control" placeholder="Enter Jam Mulai" required>
                          </div>
                            <div class="form-group" align="left">
                             <label>Selesai</label>
                            <input type="text" name="selesai" class="form-control" placeholder="Enter Jam Selesai" required>
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
    <!-- Data Daftar Jadwal Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Daftar Jadwal</h2>
                            <p>Berisi semua jadwal dokter</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  $i=1;
                                  foreach ($jdw as $row) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['hari'];?></td>
                                        <td><?= $row['mulai'];?></td>
                                        <td><?= $row['selesai'];?></td>
                                          <td> <!-- <button type="button"class="btn btn-primary btn-xs editbtn"><i class="fa fa-edit"></i>edit</button> -->
                                          <a href="../dokter/deletecode.php?id=<?=$row['id_jadwal']?>" onclick=”return confirm(‘Yakin Hapus?’)”><button type="button"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>delete</button></a>
                                        </td>
                                    </tr>
                                  <?php $i++; endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
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
    <!-- awal edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
  <form role="form" action="../dokter/updatecode.php" method="POST">
          <div class="modal-body">
            <div class="form-example-int">
              <input type="hidden" name="update_id" id="update_id">
                <div class="form-group">
                    <label>Hari</label>
                    <div class="nk-int-st">
                        <input type="text" name="hari" id="hari" class="form-control input-sm" placeholder="Enter Hari" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mulai</label>
                    <div class="nk-int-st">
                        <input type="text" name="mulai" id="mulai" class="form-control input-sm" placeholder="Enter Jam Mulai" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Selesai</label>
                    <div class="nk-int-st">
                        <input type="text" name="selesai" id="selesai" class="form-control input-sm" placeholder="Enter Jam Selesai" required="">
                    </div>
                </div>
            </div>     
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name ="updatedata" class="btn btn-primary">Save Data</button>
          </div>
          </form>

        </div>
      </div>
    </div>
    <!-- Data Table area End-->
    <!-- Start Footer area-->
   <?php include '../part/footer.php' ?>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <?php require '../part/javascript.php'; ?>
    <script>
    $(document).ready(function(){
      $('.editbtn').on('click', function(){
          $('#editModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();
            console.log(data);
            $('#update_id').val(data[0]);
            $('#hari').val(data[1]);
            $('#mulai').val(data[2]);
            $('#selesai').val(data[3]);
      });
    });
    </script>
</body>
</html>