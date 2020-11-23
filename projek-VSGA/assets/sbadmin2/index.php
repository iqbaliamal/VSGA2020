<?php include('header.php') ?>
<?php

if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
  if (isset($_SESSION['role']) && $_SESSION['role'] != '1') {
    header('location:hitung.php');
    exit();
  }

  require_once '../../connection.php';
  $q = $koneksi->query("SELECT * FROM tb_guru, tb_users WHERE tb_guru.id_users = tb_users.id_users ORDER BY id_guru desc");

  $qr = $koneksi->query("SELECT * FROM tb_siswa, tb_users, tb_kelas WHERE tb_siswa.id_users = tb_users.id_users AND tb_siswa.id_kelas = tb_kelas.id_kelas ORDER BY id_siswa desc");

?>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- ROW TOTAL -->
  <div class="row">
    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Total Guru</div>
              <?php
              $dataguru = $koneksi->query("SELECT * FROM tb_guru");
              $jumlahguru = mysqli_num_rows($dataguru);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahguru; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
              <?php
              $datasiswa = $koneksi->query("SELECT * FROM tb_siswa");
              $jumlahsiswa = mysqli_num_rows($datasiswa);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahsiswa; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
              <?php
              $datausers = $koneksi->query("SELECT * FROM tb_users");
              $jumlahusers = mysqli_num_rows($datausers);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahusers; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Total Kelas</div>
              <?php
              $datakelas = $koneksi->query("SELECT * FROM tb_kelas");
              $jumlahkelas = mysqli_num_rows($datakelas);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahkelas; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Total Pelajaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-1">
                        <div class="text-ss font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
  </div>
  <!-- END ROW TOTAL -->

  <!-- DataTales ARTIKEL -->
  <!-- <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">MATERI PEMBELAJARAN</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> -->
  <!-- END OF DATATABLE ARTIKEL -->

  <!-- DataTales GURU -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">GURU</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th hidden>id</th>
              <th>NO</th>
              <th>Nama</th>
              <th>Username</th>
              <th hidden>pass</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th hidden>id</th>
              <th>NO</th>
              <th>Nama</th>
              <th>Username</th>
              <th hidden>password</th>
            </tr>
          </tfoot>
          <tbody>
            <?php

            $no = 1;
            while ($data = $q->fetch_assoc()) {

            ?>
              <tr>
                <td hidden><?= $data['id_guru']; ?></td>
                <td><?= $no++ ?></td>
                <td><?= $data['nama_guru']; ?></td>
                <td><?= $data['username']; ?></td>
                <td hidden><?= $data['password']; ?></td>
              </tr>
            <?php

            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- END OF DATATABLE USER -->



  <!-- DataTales SISWA -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">SISWA</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th hidden>id</th>
              <th>NO</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Username</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th hidden>id</th>
              <th>NO</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Username</th>
            </tr>
          </tfoot>
          <tbody>
            <?php

            $no = 1;
            while ($data = $qr->fetch_assoc()) {

            ?>
              <tr>
                <td hidden><?= $data['id_siswa']; ?></td>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_siswa']; ?></td>
                <td><?= $data['kelas']; ?></td>
                <td><?= $data['username']; ?></td>
              </tr>
            <?php

            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- END OF DATATABLE SISWA -->


  <?php include('footer.php') ?>
<?php
} else {
  header("Location: ../auth/login.php");
  exit();
}
?>