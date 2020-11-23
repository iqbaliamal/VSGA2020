<?php

if (isset($_SESSION['id']) && isset($_SESSION['user'])) {

?>
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-text mx-3">VSGA - WEB DEV</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php if ($_SESSION['role'] == 1) { ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>




      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Interface
      </div> -->

      <!-- Nav Item  -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="addmateri.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Add Materi</span></a>
      </li> -->


      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <div class="sidebar-heading">
        Utilities
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Utilities:</h6>
            <a class="collapse-item" href="addsiswa.php">Data Siswa</a>
            <a class="collapse-item" href="addguru.php">Data Guru</a>
          </div>
        </div>
      </li>


    <?php }
    if ($_SESSION['role'] == 1 || $_SESSION['kelas'] == 1) { ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item  -->
      <li class="nav-item">
        <a class="nav-link" href="hitung.php">
          <i class="fas fa-calculator"></i>
          <span>Hitung Volume</span></a>
      </li>
    <?php } ?>

    <?php if ($_SESSION['role'] == 1 || $_SESSION['kelas'] == 2) { ?>
      <!-- Nav Item  -->
      <li class="nav-item">
        <a class="nav-link" href="hitung2.php">
          <i class="fas fa-calculator"></i>
          <span>Hitung Fibonaci</span></a>
      </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
<?php
} else {
  header("Location: ../auth/login.php");
  exit();
}
?>