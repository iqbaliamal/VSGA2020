<?php
require_once '../../connection.php';

//======================// TAMBAH DATA BARANG //======================//

if (isset($_POST['tmbh_barang'])) {
  # code...
  $kd_barang    = htmlspecialchars($_POST['kd_barang']);
  $nama_barang  = htmlspecialchars($_POST['nama_barang']);
  $harga_jual   = htmlspecialchars($_POST['harga_jual']);
  $harga_beli   = htmlspecialchars($_POST['harga_beli']);
  $satuan       = htmlspecialchars($_POST['satuan']);

  $query_add = $koneksi->query("INSERT INTO tb_barang SET kd_barang='$kd_barang', nama_barang='$nama_barang', harga_jual='$harga_jual', harga_beli='$harga_beli', satuan='$satuan'");

  if ($query_add == true) {
    header("Location: barang.php?sukses=Data Berhasil Di Tambahkan");
    exit();
  } else {
    header("Location: barang.php?error=Data Gagal Di Tambahkan");
    exit();
  }
}

//======================// HAPUS DATA BARANG //======================//
if (isset($_POST['hapus_barang'])) {

  $kd_barang = $_POST['delete_id'];

  $query = $koneksi->query("SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'");
  $row = mysqli_fetch_array($query);

  $query_hapus = $koneksi->query("DELETE FROM tb_barang WHERE kd_barang = '$kd_barang'");
  if ($query_hapus == true) {
    header("Location: barang.php?sukses=Data Berhasil Dihapus");
    exit();
  } else {
    header("Location: barang.php?error=Data Gagal Dihapus");
    exit();
  }
}


//======================// EDIT DATA BARANG //======================//

if (isset($_POST['edit_barang'])) {
  # code...
  $kd_barang    = htmlspecialchars($_POST['kd_barang']);
  $nama_barang  = htmlspecialchars($_POST['nama_barang']);
  $harga_jual   = htmlspecialchars($_POST['harga_jual']);
  $harga_beli   = htmlspecialchars($_POST['harga_beli']);
  $satuan       = htmlspecialchars($_POST['satuan']);

  $query = $koneksi->query("SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'");
  $row = mysqli_fetch_array($query);

  $query_update = $koneksi->query("UPDATE tb_barang SET nama_barang='$nama_barang', harga_jual='$harga_jual', harga_beli='$harga_beli', satuan='$satuan' WHERE kd_barang='$kd_barang'");
  if ($query_update) {
    header("Location: barang.php?sukses=Data Berhasil Di Update");
    exit();
  } else {
    header("Location: barang.php?error=Data Gagal Di Update");
    exit();
  }
  header("location: addguru.php");
}


//======================// TAMBAH DATA TRANSAKSI //======================//

if (isset($_POST['tmbh_transaksi'])) {

  $tanggal_faktur = $_POST['tanggal'];
  $nama_konsumen  = htmlspecialchars($_POST['nama_konsumen']);
  $kd_barang      = $_POST['kd_barang'];
  $jumlah         = $_POST['jumlah'];
  $harga_satuan   = $_POST['harga_satuan'];
  $harga_total    = $jumlah * $harga_satuan;

  $query = $koneksi->query("SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'");
  $row = mysqli_fetch_array($query);
  $satuan = $row['satuan'];
  $stok   = $satuan - $jumlah;

  $q = $koneksi->query("INSERT INTO `tb_penjualan` (`no_faktur`, `tanggal_faktur`, `nama_konsumen`, `kd_barang`, `jumlah`, `harga_satuan`, `harga_total`) VALUES (NULL, '$tanggal_faktur', '$nama_konsumen', '$kd_barang', '$jumlah', '$harga_satuan', '$harga_total');");

  if ($q == true) {
    $query_update = $koneksi->query("UPDATE tb_barang SET satuan='$stok' WHERE kd_barang='$kd_barang'");
    if ($query_update == true) {
      header("Location: penjualan.php?sukses=Data Berhasil Di Update");
      exit();
    }
  } else {
    header("Location: penjualan.php?error=Data Gagal Di Tambahkan");
    exit();
  }
}


//======================// HAPUS DATA PENJUALAN //======================//
if (isset($_POST['hapus_transaksi'])) {

  $no_faktur = $_POST['delete_id'];

  $query = $koneksi->query("SELECT * FROM tb_penjualan WHERE no_faktur='$no_faktur'");
  $row = mysqli_fetch_array($query);

  $query_hapus = $koneksi->query("DELETE FROM tb_penjualan WHERE no_faktur='$no_faktur'");
  if ($query_hapus == true) {
    header("Location: penjualan.php?sukses=Data Berhasil Dihapus");
    exit();
  } else {
    header("Location: penjualan.php?error=Data Gagal Dihapus");
    exit();
  }
}


// ======================// EDIT DATA PENJUALAN //======================//

if (isset($_POST['edit_transaksi'])) {
  # code...
  $no_faktur      = $_POST['no_faktur'];
  $nama_konsumen  = htmlspecialchars($_POST['nama_konsumen']);
  $kd_barang      = $_POST['kd_barang'];
  $jumlah         = $_POST['jumlah'];
  $harga_satuan   = $_POST['harga_satuan'];

  $query = $koneksi->query("SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'");
  $row = mysqli_fetch_array($query);
  $satuan = $row['satuan'];
  $stok   = $satuan - $jumlah;
  $harga_total    = $jumlah * $harga_satuan;

  $query_u = $koneksi->query("UPDATE tb_penjualan SET nama_konsumen='$nama_konsumen', kd_barang='$kd_barang', jumlah='$jumlah', harga_satuan='$harga_satuan', harga_total='$harga_total' WHERE no_faktur='$no_faktur'");
  if ($query_u == true) {
    $query_update = $koneksi->query("UPDATE tb_barang SET satuan='$stok' WHERE kd_barang='$kd_barang'");
    if ($query_update == true) {
      header("Location: penjualan.php?sukses=Data Berhasil Di Update");
      exit();
    }
  } else {
    header("Location: penjualan.php?error=Data Gagal Di Update");
    exit();
  }
}
