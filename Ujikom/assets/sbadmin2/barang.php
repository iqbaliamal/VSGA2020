  <?php

  include("header.php");
  include("../../connection.php");
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
        <form action="fungsi.php" method="POST">
          <div class="modal-body">

            <div class="form-group">
              <label>Kode Barang</label>
              <input type="text" name="kd_barang" class="form-control" placeholder="Nama Barang" required>
            </div>

            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
            </div>

            <div class="form-group">
              <label>Harga Jual</label>
              <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual" required>
            </div>

            <div class="form-group">
              <label>Harga Beli</label>
              <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" required>
            </div>

            <div class="form-group">
              <label>Satuan</label>
              <input type="number" name="satuan" class="form-control" placeholder="Harga Beli" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tmbh_barang" class="btn btn-primary">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- ======================================================================= -->

  <!-- DELETE DATA -->
  <div class="modal fade" id="delete_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form action="fungsi.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <h5> Apakah anda yakin akan menghapus barang?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
            <button type="submit" name="hapus_barang" class="btn btn-danger"> Hapus </button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- ======================================================================================== -->

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
  </div>

  <?php

  $q = $koneksi->query("SELECT * FROM tb_barang ORDER BY kd_barang asc");
  ?>
  <div class="card shadow mb-4 mt-5">
    <div class="card-body">
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata">
        Tambah Data
      </button>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TABEL DATA BARANG</h6>
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
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Satuan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Satuan</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php

              $no = 1;
              while ($data = $q->fetch_assoc()) {

              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kd_barang']; ?></td>
                  <td><?= $data['nama_barang']; ?></td>
                  <td><?= $data['harga_jual']; ?></td>
                  <td><?= $data['harga_beli']; ?></td>
                  <td><?= $data['satuan']; ?></td>
                  <td>
                    <a href="edit_barang.php?kd_barang=<?php echo $data['kd_barang']; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
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

  <!-- SCRIPT HAPUS DATA -->
  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#delete_barang').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[1]);
      });
    });
  </script>