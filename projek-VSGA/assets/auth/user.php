<?php
session_start();
require_once '../../connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $user = validate($_POST['username']);
  $pass = validate($_POST['password']);


  if (empty($user)) {
    header("Location: login.php?error=User Name is required");
    exit();
  } else if (empty($pass)) {
    header("Location: login.php?error=Password is required");
    exit();
  } else {
    $query = "SELECT * FROM tb_users WHERE username='$user' AND password='$pass'";

    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['username'] === $user && $row['password'] === $pass) {
        $_SESSION['user'] = $row['username'];
        $_SESSION['id'] = $row['id_users'];
        $_SESSION['role'] = $row['id_level'];
        $id_user = $row['id_users'];

        $id_siswa = $row['id_users'];

        $q = $koneksi->query("SELECT * FROM tb_siswa INNER JOIN tb_users ON tb_siswa.id_users = tb_users.id_users WHERE tb_users.id_users = '$id_siswa'");
        $data = mysqli_fetch_assoc($q);
        $_SESSION['kelas'] = $data['id_kelas'];

        if ($row['id_level'] == 1) {
          header("Location: ../sbadmin2/index.php");
          exit();
        } else if ($row['id_level'] == 2) {
          if ($q) {
            if ($data['id_kelas'] == 1) {
              header("Location: ../sbadmin2/hitung.php");
              exit();
            } else if ($data['id_kelas'] == 2) {
              header("Location: ../sbadmin2/hitung2.php");
              exit();
            } else {
              header("Location: login.php");
              exit();
            }
          } else {
            header("Location: login.php");
            exit();
          }
        }

        exit;
      } else {
        header("Location: login.php?error=Username or Password is Incorrect");
        exit();
      }
    } else {
      header("Location: login.php?error=Incorect Username or Password is Incorrect");
      exit();
    }
  }
} else {
  header("Location: login.php");
  exit();
}
