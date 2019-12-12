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
     <div class="data-table-area">
        <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2 style="text-align: center;">NOMOR ANTRIAN YANG TERSEDIA</h2>
                            <form method="post">
                            <input type="submit" name="reset" class="btn-danger btn-lg" onclick="return confirm('YAKIN RESET ANTRIAN??')" value="RESET">
                            </form>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Antrian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        include 'config.php';
                                        $query = $link->query("SELECT * FROM `no_antri` ");
                                        $no=1;
                                        while ($row=mysqli_fetch_array($query)) {
                                           
                                            ?>
                                            <tr>
                                                <td><?= $no?></td>
                                                <td><?= $row['no_antrian']?></td>
                                                <td><?= $row['status_antrian'] ?></td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
if(isset($_POST['reset'])){
    for ($i=0; $i < 10; $i++) { 
        $nomor="P00".$i;
       $query = $link->query("UPDATE `no_antri` SET `status_antrian` = 'tersedia' WHERE `no_antri`.`no_antrian` = '$nomor' "); 
       echo "<script>

        document.location='no_antrian.php';
        </script>";
    }
    

}

?>

    <?php include '../part/navbar_v.php' ?>
    <!-- Main Menu area End--> 
    <!-- Start Footer area-->
    <?php include '../part/footer.php' ?>
    <!-- End Footer area-->
     <?php include '../part/javascript.php' ?>
</body>

</html>
