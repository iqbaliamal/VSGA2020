<?php

require_once 'koneksi.php';

if (isset($_POST['updatedata'])) {
  $id = $_POST['update_id'];

  $merk = $_POST['nama_merk'];
  $warna = $_POST['warna'];
  $jumlah = $_POST['jumlah'];

  $query = "UPDATE printer SET nama_merk='$merk', warna='$warna', jumlah='$jumlah' WHERE no='$id'";
  $query_run = mysqli_query($koneksi, $query);

  if ($query_run) {
    echo '<script> alert("Data Telah Di Update"); </script>';
    header("Location:index.php");
  } else {
    echo '<script> alert("Data Gagal Di Updated"); </script>';
  }
}
