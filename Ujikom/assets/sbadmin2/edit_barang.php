<?php
include('header.php');

include('../../connection.php');

$kd_barang = $_GET['kd_barang'];
$query = $koneksi->query("SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'");

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Data Barang</h1>
</div>

<div class="card shadow mb-4 mt-5">
  <div class="card-body">

    <?php while ($data = $query->fetch_assoc()) { ?>
      <form action="fungsi.php" method="POST">

        <div class="form-group">
          <a href="barang.php" class="btn btn-secondary right">Batal</a>
        </div>

        <div class="form-group">
          <input type="text" name="kd_barang" class="form-control" placeholder="Nama Barang" value="<?= $data['kd_barang']; ?>" hidden>
        </div>

        <div class="form-group">
          <label>Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $data['nama_barang']; ?>" required>
        </div>

        <div class="form-group">
          <label>Harga Jual</label>
          <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual" value="<?= $data['harga_jual']; ?>" required>
        </div>

        <div class="form-group">
          <label>Harga Beli</label>
          <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?= $data['harga_beli']; ?>" required>
        </div>

        <div class="form-group">
          <label>Satuan</label>
          <input type="number" name="satuan" class="form-control" placeholder="Harga Beli" value="<?= $data['satuan']; ?>" required>
        </div>

        <div class="form-group">
          <input type="submit" name="edit_barang" class="btn btn-primary" value="Simpan">
        </div>

      </form>
    <?php } ?>
  </div>
</div>

<?php include('footer.php') ?>