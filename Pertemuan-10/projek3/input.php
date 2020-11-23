<?php

require_once 'koneksi.php';

if (isset($_POST['tmbhdata'])) {
  # code...
  $merk = $_POST['nama_merk'];
  $warna = $_POST['warna'];
  $jumlah = $_POST['jumlah'];

  $query = "INSERT INTO printer (`nama_merk`, `warna`, `jumlah`) VALUES ('$merk', '$warna', '$jumlah')";
  $query_run = mysqli_query($koneksi, $query);

  if ($query_run) {
    # code...
    echo "<script>alert('Data Tersimpan!');</script>";
    header('location:index.php');
  } else {
    echo "<script>alert('Data Gagal Tersimpan!');</script>";
  }
}
