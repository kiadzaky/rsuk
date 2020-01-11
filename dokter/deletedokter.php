<?php
include '../config.php';
  $id = $_GET['id'];
  $query = "DELETE FROM dokter WHERE id_dokter='$id'";
  $query_run = mysqli_query($link, $query);
  if ($query_run) {
    echo '<script> alert("Data Delete");
    window.location.replace("http://127.0.0.1/rsuk/index/?dokter=index");
    </script>';
  } else {
    echo '<script> alert("Data not Delete");
    window.location.replace("http://127.0.0.1/rsuk/index/?dokter=index");</script>';

}
