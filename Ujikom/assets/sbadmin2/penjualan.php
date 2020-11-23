<?php

include("header.php");
include("../../connection.php");
?>

<!-- DELETE DATA -->
<div class="modal fade" id="delete_transaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="fungsi.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="delete_id" id="delete_id">
          <h5> Apakah anda yakin akan menghapus Transaksi?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
          <button type="submit" name="hapus_transaksi" class="btn btn-danger"> Hapus </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ======================================================================================== -->


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Transaksi Barang</h1>
</div>

<?php

$query = $koneksi->query("SELECT * FROM tb_barang");
?>

<form action="fungsi.php" method="POST">
  <div class="modal-body">

    <div class="form-group">
      <label>Tanggal Faktur</label>
      <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
    </div>

    <div class="form-group">
      <label>Nama Konsumen</label>
      <input type="text" name="nama_konsumen" class="form-control" placeholder="Nama Konsumen" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Kode Barang</label>
      <select name="kd_barang" class="form-control" id="exampleFormControlSelect1">
        <?php

        while ($data = $query->fetch_assoc()) {

        ?>
          <option value="<?= $data['kd_barang']; ?>"><?= $data['kd_barang']; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
    </div>

    <div class="form-group">
      <label>Harga Satuan</label>
      <input type="number" name="harga_satuan" class="form-control" placeholder="Harga Satuan" required>
    </div>

  </div>

  <div class="modal-footer">
    <button type="submit" name="tmbh_transaksi" class="btn btn-primary">Tambah</button>
  </div>

</form>

<?php

$q = $koneksi->query("SELECT * FROM tb_penjualan ORDER BY no_faktur asc");
?>
<div class="card shadow mb-4 mt-5">
  <div class="card-body">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">TABEL DATA TRANSAKSI</h6>
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
                <th>No Faktur</th>
                <th>Tanggal Faktur</th>
                <th>Nama konsumen</th>
                <th>Kode Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Harga Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>No Faktur</th>
                <th>Tanggal Faktur</th>
                <th>Nama konsumen</th>
                <th>Kode Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Harga Total</th>
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
                  <td><?= $data['no_faktur']; ?></td>
                  <td><?= $data['tanggal_faktur']; ?></td>
                  <td><?= $data['nama_konsumen']; ?></td>
                  <td><?= $data['kd_barang']; ?></td>
                  <td><?= $data['jumlah']; ?></td>
                  <td><?= $data['harga_satuan']; ?></td>
                  <td><?= $data['harga_total']; ?></td>
                  <td>
                    <a href="edit_penjualan.php?no_faktur=<?php echo $data['no_faktur']; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
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
      $('#delete_transaksi').modal('show');

      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[1]);
    });
  });
</script>