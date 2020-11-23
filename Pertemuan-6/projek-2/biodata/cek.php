<?php
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat = $_POST['tempat'];
$jenis = $_POST['jenis'];
$usia = $_POST['usia'];

if ($nama == "") {
  header("location:biodata.php?");
} else {
  echo "Nama : " . $nama . "<br>";
  echo "Alamat : " . $alamat . "<br>";
  echo "tempat : " . $tempat . "<br>";
  echo "jenis : " . $jenis . "<br>";
  echo "usia : " . $usia . "<br>";
  echo "<a href='biodata.php?'>kembali</a>";
};
