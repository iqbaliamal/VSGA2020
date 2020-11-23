<?php
include('header.php');

include('../../connection.php');

$no_faktur = $_GET['no_faktur'];
$query = $koneksi->query("SELECT * FROM tb_penjualan WHERE no_faktur='$no_faktur'");
$select = $koneksi->query("SELECT * FROM tb_barang");
$assoc = $select->fetch_all();
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Data Transaksi</h1>
</div>

<div class="card shadow mb-4 mt-5">
  <div class="card-body">

    <?php while ($data = $query->fetch_assoc()) { ?>
      <form action="fungsi.php" method="POST">

        <div class="form-group">
          <a href="penjualan.php" class="btn btn-secondary right">Batal</a>
        </div>

        <input type="text" name="no_faktur" class="form-control" placeholder="Nama Konsumen" value="<?= $data['no_faktur']; ?>" hidden>
        <div class="form-group">
          <label>Nama Konsumen</label>
          <input type="text" name="nama_konsumen" class="form-control" placeholder="Nama Konsumen" value="<?= $data['nama_konsumen']; ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Kode Barang</label>
          <select name="kd_barang" class="form-control" id="exampleFormControlSelect1">
            <?php
            foreach ($assoc as $key => $value) {
            ?>
              <option value="<?= $value[0]; ?>"><?= $value[0]; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?= $data['jumlah']; ?>" required>
        </div>

        <div class=" form-group">
          <label>Harga Satuan</label>
          <input type="number" name="harga_satuan" class="form-control" placeholder="Harga Satuan" value="<?= $data['harga_satuan']; ?>" required>
        </div>

        <div class="form-group">
          <input type="submit" name="edit_transaksi" class="btn btn-primary" value="Simpan">
        </div>

      </form>
    <?php } ?>
  </div>
</div>

<?php include('footer.php') ?>