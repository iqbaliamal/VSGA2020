<?php

require_once 'koneksi.php';

if (isset($_POST['tmbhdata'])) {
  # code...
  $nim = htmlspecialchars($_POST['nim']);
  $nama = htmlspecialchars($_POST['nama']);
  $jenis_kelamin = htmlspecialchars($_POST['jk']);
  $jurusan = htmlspecialchars($_POST['jurusan']);
  $alamat = htmlspecialchars($_POST['alamat']);

  $query = "INSERT INTO mahasiswa SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', alamat='$alamat'";
  $query_run = mysqli_query($koneksi, $query);

  if ($query_run) {
    # code...
    echo "<script>alert('Data Tersimpan!');</script>";
    header('location:index.php');
  } else {
    echo "<script>alert('Data Gagal Tersimpan!');</script>";
  }
}
