<?php
require 'functions.php';
$query = query("SELECT * FROM `req_ambulance` WHERE id_ambulance='AMBL2' and (status_req = '0' or status_req = '1' or status_req = '2')");
?>
<!doctype html>
<html class="no-js" lang="">
<?php include '../part/head.php' ?>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css" href="../css/table.css">
<link rel="stylesheet" type="text/css" href="../css/wave/button.css">
</head>
<body>
    <!-- Start Header Top Area -->
    <?php include '../part/header.php' ?>
    <!-- End Header Top Area -->
    <!-- Navbar Horizontal -->
    <?php include '../part/navbar_h.php' ?>
    <!-- Mobile Menu end -->
    <!-- Navbar Vertical-->
    <?php include '../part/navbar_v.php' ?>
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
										<h2>Tabel Ambulance Darurat </h2>
										<p>Selamat Datang di RSU Kaliwates <span class="bread-ntd">Admin</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<!-- <div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Normal Table area Start-->
    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2>Ambulance Darurat</h2>
                            <p>Data masuk ambulance darurat</p>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>No Req</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Keluhan</th>
                                        <th>Tanggal</th>
                                        <th>Koordinat (Maps)</th>
                                        <th>Index</th>
                                        <th>Status</th>
                                        <th>Ubah Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <form action="" method="post">
                                  <?php $i = 1; ?>
                                  <?php foreach ($query as $row) : ?>
                                    <tr>
                                        <td><?= $row["id_req_ambulance"]; ?></td>
                                        <td><?= $row["nik"]; ?></td>
                                        <td><?= $row["alamat"]; ?></td>
                                        <td><?= $row["no_hp"]; ?></td>
                                        <td><?= $row["keluhan"]; ?></td>
                                        <td><?= $row["tanggal"]; ?></td>
                                        <td><?= $row["link"]; ?></td>
                                        <td><?= $row["status_req"];  ?></td>
                                        <td>
                                          <?php
                                          if($row['status_req']==1){
                                            echo "<p id=str".$row['id_req_ambulance'].">Masuk</p>";
                                          }elseif($row['status_req']==2) {
                                            echo "<p id=str".$row['id_req_ambulance'].">Diterima</p>";
                                          }else {
                                            echo "<p id=str".$row['id_req_ambulance'].">Selesai</p>";
                                          }

                                           ?>
                                        </td>
                                        <td>
                                          <select onchange="active_diactive_user(this.value, <?= $row['id_req_ambulance']; ?>)">
                                            <option value="1">Masuk</option>
                                            <option value="2">Diterima</option>
                                            <option value="3">Selesai</option>
                                          </select>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                  </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Normal Table area End-->
    <!-- awal delete modal -->
    <div class="modal fade" id="deletemodals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data Ambulance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

  <form role="form" action="deleteambldarurat.php" method="POST">
          <div class="modal-body">

              <input type="text" name="delete_id" id="delete_id">

              <h4>Apakah anda yakin ingin menghapus data ini? </h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
            <button type="submit" name ="deletedata" class="btn btn-primary"> Yes </button>
          </div>
          </form>

        </div>
      </div>
    </div>



    <!-- akhir delete modal -->
    <!-- Start Footer area-->
    <?php include '../part/footer.php' ?>
    <!-- End Footer area-->
    <?php include '../part/javascript.php' ?>
</body>

<script type="text/javascript">
    function active_diactive_user(val, id_req_ambulance){
      var id_req_ambulance = id_req_ambulance;
      var val = val;
        $.ajax({
          type:'post',
          url:'ambulance_update.php',
          data:{val:val,id_req_ambulance:id_req_ambulance},
          success: function(result){
            if (result==1){
              $('#str'+id_req_ambulance).html('Masuk');

            }else if (result==2){
              $('#str'+id_req_ambulance).html('Diterima');
            }else if (result==3){
              $('#str'+id_req_ambulance).html('Selesai');
            }
          }
        });
      }
</script>

<script>
$(document).ready(function(){
  $('.deletebtn').on('click', function(){

      $('#deletemodals').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

  });
});

</script>
</html>
