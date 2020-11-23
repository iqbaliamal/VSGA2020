<?php

require_once 'koneksi.php';

if (isset($_POST['hapusdata'])) {
  $id = $_POST['delete_id'];

  $query = "DELETE FROM mahasiswa WHERE id_mhs='$id'";
  $query_run = mysqli_query($koneksi, $query);

  if ($query_run) {
    echo '<script> alert("Data Telah Terhapus!"); </script>';
    header("Location:index.php");
  } else {
    echo '<script> alert("Data Tidak Terhapus!"); </script>';
  }
}
