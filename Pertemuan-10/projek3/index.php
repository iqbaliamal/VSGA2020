<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tabel Barang</title>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Menambah CSS File -->

  <link rel="stylesheet" href="vendor/fontawesome/css/all.css">
  <!-- Menambah Font Awesome -->


</head>

<body>
  <!-- Modal TAMBAH DATA -->
  <div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="input.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Merk</label>
              <input type="text" name="nama_merk" class="form-control" placeholder="Merk Printer">
            </div>

            <div class="form-group">
              <label>Warna</label>
              <input type="text" name="warna" class="form-control" placeholder="Warna">
            </div>

            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tmbhdata" class="btn btn-success">Tambah Data</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- =============================================================================================== -->

  <!-- EDIT DATA -->
  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="update.php" method="POST">
          <div class="modal-body">

            <input type="hidden" name="update_id" id="update_id">

            <div class="form-group">
              <label>Nama Merk</label>
              <input type="text" name="nama_merk" id="nama_merk" class="form-control" placeholder="Merk Printer">
            </div>

            <div class="form-group">
              <label>Warna</label>
              <input type="text" name="warna" id="warna" class="form-control" placeholder="Warna">
            </div>

            <div class="form-group">
              <label>Jumlah</label>
              <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="updatedata" class="btn btn-success">Update Data</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- =============================================================================================== -->

  <!-- DELETE DATA -->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form action="delete.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <h5> Apakah anda yakin akan menghapus data?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
            <button type="submit" name="hapusdata" class="btn btn-danger"> Hapus </button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- =============================================================================================== -->

  <div class="container">
    <h1 class="text-center mt-5 judul">TABEL DATA PRINTER</h1>
    <div class="card shadow mb-4 mt-5 ">
      <div class="card-header py-3">
        <h6 class="m-2 font-weight-bold text-primary">Tabel Data Printer</h6>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahbarang">
          Tambah Barang
        </button>
        <div id="pesan_error">
        </div>
        <div class="table-responsive">
          <?php

          require_once 'koneksi.php';

          $query = "SELECT * FROM printer";
          $query_run = mysqli_query($koneksi, $query);
          ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Merk</th>
                <th>Warna</th>
                <th>Jumlah</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php
            if ($query_run) {
              foreach ($query_run as $row) {
            ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['no']; ?></td>
                    <td><?php echo $row['nama_merk']; ?></td>
                    <td><?php echo $row['warna']; ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning editbtn"><i class="far fa-edit"></i></button>
                      <button type="button" class="btn btn-danger deletebtn"><i class="far fa-trash-alt"></i></button>
                    </td>
                  </tr>
                </tbody>
            <?php
              }
            } else {
              echo "No Record Found";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <!-- Menambah JS File -->

  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

      });
    });
  </script>

  <script>
    $(document).ready(function() {

      $('.editbtn').on('click', function() {
        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#nama_merk').val(data[1]);
        $('#warna').val(data[2]);
        $('#jumlah').val(data[3]);
      });

    });
  </script>

  <!-- Footer -->
  <footer class="mb-3">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Iqbal Ikhlasul Amal | DTS 2020</span>
      </div>
    </div>
  </footer>
</body>

</html>