<?php

require_once 'koneksi.php';

if (isset($_POST['updatedata'])) {
  $id = $_POST['update_id'];

  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $jenis_kelamin = $_POST['jk'];
  $jurusan = $_POST['jurusan'];
  $alamat = $_POST['alamat'];

  $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', alamat='$alamat' WHERE id_mhs='$id'";
  $query_run = mysqli_query($koneksi, $query);

  if ($query_run) {
    echo '<script> alert("Data Telah Di Update"); </script>';
    header("Location:index.php");
  } else {
    echo '<script> alert("Data Gagal Di Updated"); </script>';
  }
}
