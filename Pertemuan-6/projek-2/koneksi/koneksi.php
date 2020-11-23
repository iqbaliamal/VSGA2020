<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_siswa";

$db = mysqli_connect($server, $user, $password, $nama_database);
echo "Koneksi Berhasil....   ";

if (!$db) {
  # code...
  die("Koneksi Gagal....    ") . mysqli_connect_error();
}
