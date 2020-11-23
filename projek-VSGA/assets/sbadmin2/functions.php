<?php
require_once '../../connection.php';

//======================// TAMBAH DATA GURU //======================//

if (isset($_POST['tmbhguru'])) {
  # code...
  $nama = htmlspecialchars($_POST['nama']);
  $user = htmlspecialchars($_POST['user']);
  $pass = htmlspecialchars($_POST['pass']);

  $query = $koneksi->query("INSERT INTO tb_users SET username='$user', password='$pass', id_level=1");

  if ($query == true) {
    # code...
    $get_last_id = mysqli_fetch_array($koneksi->query("SELECT max(id_users) as last_id FROM tb_users"))['last_id'];

    $insert2 = $koneksi->query("INSERT INTO tb_guru SET id_users='$get_last_id', nama_guru='$nama'");
    if ($insert2 == true) {
      header("Location: addguru.php?sukses=Data Berhasil Di Tambahkan");
      exit();
    } else {
      header("Location: addguru.php?error=Data Gagal Di Tambahkan");
      exit();
    }
  }
}

//======================// EDIT DATA GURU //======================//
if (isset($_POST['editguru'])) {
  # code...
  $id = htmlspecialchars($_POST['id_guru']);
  $nama = htmlspecialchars($_POST['nama']);
  $user = htmlspecialchars($_POST['username']);
  $pass = htmlspecialchars($_POST['password']);

  $query = $koneksi->query("SELECT id_users FROM tb_guru WHERE id_guru='$id'");
  $row = mysqli_fetch_array($query);
  $id_user = $row['id_user'];

  $update = $koneksi->query("UPDATE tb_users SET username='$user', password='$pass' WHERE id_users='$id_user'");
  if ($update == true) {
    $update2 = $koneksi->query("UPDATE tb_guru SET nama_guru='$nama' WHERE id_guru='$id'");
    if ($update2 == true) {
      header("Location: addguru.php?sukses=Data Berhasil Di Update");
      exit();
    } else {
      header("Location: addguru.php?error=Data Gagal Di Update");
      exit();
    }
  } else {
    header("Location: addguru.php?error=Data Gagal Di Update");
    exit();
  }
  header("location: addguru.php");
}

//======================// HAPUS DATA GURU //======================//
if (isset($_POST['hapusguru'])) {

  $id_guru = $_POST['delete_id'];

  $qs = $koneksi->query("SELECT id_users FROM tb_guru WHERE id_guru='$id_guru'");
  $row = mysqli_fetch_array($qs);
  $user = $row['id_users'];

  $hapus = mysqli_query($koneksi, "DELETE FROM tb_guru WHERE id_guru = '$id_guru'");
  if ($hapus) {
    $hapus_user = mysqli_query($koneksi, "DELETE FROM tb_users WHERE id_users = '$user'");
    if ($hapus_user) {
      header("Location: addguru.php?sukses=Data Berhasil Dihapus");
      exit();
    } else {
      header("Location: addguru.php?error=Data Gagal Dihapus");
      exit();
    }
  } else {
    header("Location: addguru.php?error=Data Gagal Dihapus");
    exit();
  }
  header("location: addguru.php");
}

//======================// TAMBAH DATA SISWA //======================//
if (isset($_POST['tmbhsiswa'])) {
  # code...
  $nama = htmlspecialchars($_POST['nama']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $user = htmlspecialchars($_POST['user']);
  $pass = htmlspecialchars($_POST['pass']);

  $query = $koneksi->query("INSERT INTO tb_users SET username='$user', password='$pass', id_level=2");

  if ($query == true) {
    $get_last_id = mysqli_fetch_array($koneksi->query("SELECT max(id_users) as last_id FROM tb_users"))['last_id'];

    $insert2 = $koneksi->query("INSERT INTO tb_siswa SET id_users='$get_last_id', nama_siswa='$nama', id_kelas='$kelas'");

    if ($insert2 == true) {
      header("Location: addsiswa.php?sukses=Data Berhasil Di Tambahkan");
      exit();
    } else {
      header("Location: addsiswa.php?sukses=Data Berhasil Di Tambahkan");
      exit();
    }
  }
}

//======================// EDIT DATA SISIWA //======================//
if (isset($_POST['editsiswa'])) {
  # code...
  $id = htmlspecialchars($_POST['id_siswa']);
  $nama = htmlspecialchars($_POST['nama']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $user = htmlspecialchars($_POST['username']);
  $pass = htmlspecialchars($_POST['password']);

  $query = $koneksi->query("SELECT id_users FROM tb_siswa WHERE id_siswa='$id'");
  $row = mysqli_fetch_array($query);
  $id_user = $row['id_users'];

  $update = $koneksi->query("UPDATE tb_users SET username='$user', password='$pass' WHERE id_users='$id_user'");
  if ($update == true) {
    $update2 = $koneksi->query("UPDATE tb_siswa SET nama_siswa='$nama', id_kelas='$kelas' WHERE id_siswa='$id'");
    if ($update2 == true) {
      header("Location: addsiswa.php?sukses=Data Berhasil Di Update");
      exit();
    } else {
      header("Location: addsiswa.php?error=Data Gagal Di Update");
      exit();
    }
  } else {
    header("Location: addsiswa.php?error=Data Gagal Di Update");
    exit();
  }
  header("location: addsiswa.php");
}

//======================// HAPUS DATA SISWA //======================//
if (isset($_POST['hapussiswa'])) {

  $id_siswa = $_POST['delete_id'];

  $qs = $koneksi->query("SELECT id_users FROM tb_siswa WHERE id_siswa='$id_siswa'");
  $row = mysqli_fetch_array($qs);
  $id_user = $row['id_users'];

  $hapus = mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'");
  if ($hapus) {
    $hapus_user = mysqli_query($koneksi, "DELETE FROM tb_users WHERE id_users = '$id_user'");
    if ($hapus_user) {
      header("Location: addsiswa.php?sukses=Data Berhasil Dihapus");
      exit();
    } else {
      header("Location: addsiswa.php?error=Data Gagal Dihapus");
      exit();
    }
  } else {
    header("Location: addsiswa.php?error=Data Gagal Dihapus");
    exit();
  }
  header("location: addsiswa.php");
}
