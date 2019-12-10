<?php
date_default_timezone_set('Asia/Jakarta');
if(!ISSET($_POST['filter'])){
 ?>
 <?php
 require 'konek.php';
 $query = mysqli_query($link, "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli, dokter.nama_dokter, jadwal.jadwal FROM pasien
                                            JOIN dokter ON pasien.id_dokter = dokter.id_dokter join akun on 
                                            pasien.nik = akun.nik join poli on dokter.id_poli = poli.id_poli 
                                            join jadwal on dokter.id_jadwal = jadwal.id_jadwal ORDER BY `date` ASC") or die(mysqli_error());
 while($fetch = mysqli_fetch_array($query)){
  ?>
  <tr>
   <td><?php echo $fetch['no_registrasi']?></td>
   <td><?php echo $fetch['nama']?></td>
   <td><?php echo $fetch['poli']?></td>
   <td><?php echo $fetch['nama_dokter']?></td>
   <td><?php echo date('M d, Y', strtotime($fetch['date']))?></td>
   <td><?php echo $fetch['jadwal']?></td>
   <td><?php echo $fetch['keluhan']?></td>
   <td><?php echo $fetch['riwayat_sakit']?></td>
  </tr>
  <?php
 }
 ?>
 
 <?php
}
?>


<?php
if(ISSET($_POST['filter'])){
 require 'konek.php';
 $date = $_POST['date'];
 $query = mysqli_query($link, "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli, dokter.nama_dokter, jadwal.jadwal FROM pasien
                                            JOIN dokter ON pasien.id_dokter = dokter.id_dokter join akun on 
                                            pasien.nik = akun.nik join poli on dokter.id_poli = poli.id_poli 
                                            join jadwal on dokter.id_jadwal = jadwal.id_jadwal WHERE MONTH(date) = '$date' ORDER BY `date` ASC") or die(mysqli_error());
 while($fetch = mysqli_fetch_array($query)){
  ?>
  <tr>
   <td><?php echo $fetch['no_registrasi']?></td>
   <td><?php echo $fetch['nama']?></td>
   <td><?php echo $fetch['poli']?></td>
   <td><?php echo $fetch['nama_dokter']?></td>
   <td><?php echo date('M d, Y', strtotime($fetch['date']))?></td>
   <td><?php echo $fetch['jadwal']?></td>
   <td><?php echo $fetch['keluhan']?></td>
   <td><?php echo $fetch['riwayat_sakit']?></td>
  </tr> 
  <?php  
 }
}
?>


                                    
                                    