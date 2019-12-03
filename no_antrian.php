<?php
include 'config.php';
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(no_antrian) as maxKode FROM antrian";
$hasil = mysqli_query($link,$query);
$data = mysqli_fetch_array($hasil);
$no_resep = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($no_resep, 2, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "P";
$no_resep = $char . sprintf("%03s", $noUrut);
echo $no_resep;


 ?>
