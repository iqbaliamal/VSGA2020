<?php include('header.php') ?>
<?php

if (isset($_SESSION['id']) && isset($_SESSION['user'])) {

?>
  <?php

  if (isset($_SESSION['role']) && $_SESSION['role'] != '1') {
    header('location:hitung.php');
    exit();
  }
  ?>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Materi</h1>
  </div>


  <?php include('footer.php') ?>
<?php
} else {
  header("Location: ../auth/login.php");
  exit();
}
?>