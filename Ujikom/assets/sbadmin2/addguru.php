<?php include('header.php') ?>

<?php

if (isset($_SESSION['id']) && isset($_SESSION['user'])) {

  if (isset($_SESSION['role']) && $_SESSION['role'] != '1') {
    header('location:hitung.php');
    exit();
  }

  require_once '../../connection.php';

?>



  <!-- Modal TAMBAH DATA -->
  <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="functions.php" method="POST">
          <div class="modal-body">

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input type="text" name="user" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="pass" class="form-control" placeholder="Password" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tmbhguru" class="btn btn-primary">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- ======================================================================= -->

  <!-- DELETE DATA GURU -->
  <div class="modal fade" id="deleteguru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form action="functions.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <h5> Apakah anda yakin akan menghapus data?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
            <button type="submit" name="hapusguru" class="btn btn-danger"> Hapus </button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- ======================================================================================== -->

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Guru</h1>
  </div>

  <?php

  $q = $koneksi->query("SELECT * FROM tb_guru, tb_users WHERE tb_guru.id_users = tb_users.id_users ORDER BY id_guru asc");
  ?>
  <div class="card shadow mb-4 mt-5">
    <div class="card-body">
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata">
        Tambah Data
      </button>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TABEL DATA GURU</h6>
      </div>
      <div class="card-body">
        <?php if (isset($_GET['sukses'])) { ?>
          <div class="alert alert-success" role="alert">
            <?php echo $_GET['sukses'] ?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error'] ?>
          </div>
        <?php } ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Username</th>
                <th hidden>pass</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Username</th>
                <th hidden>password</th>
                <th>Action</th>
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
                  <td>
                    <a href="editguru.php?id=<?php echo $data['id_guru']; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <button type="button" class="deletebtn btn btn-danger" data-toggle="modal"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
              <?php

              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>


  <?php include('footer.php') ?>
<?php
} else {
  header("Location: ../auth/login.php");
  exit();
}
?>

<!-- SCRIPT HAPUS DATA -->
<script>
  $(document).ready(function() {
    $('.deletebtn').on('click', function() {
      $('#deleteguru').modal('show');

      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);
    });
  });
</script>