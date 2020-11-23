<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tabel Data Mahasiswa</title>

  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Menambah CSS File -->

  <link rel="stylesheet" href="vendor/fontawesome/css/all.css">
  <!-- Menambah Font Awesome -->


</head>

<body>
  <!-- Modal TAMBAH DATA -->
  <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="input.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>NIM</label>
              <input type="text" name="nim" class="form-control" placeholder="NIM" required>
            </div>

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <div class="jk">
                <input type="radio" name="jk" class="jk" id="lk" value="L" checked>
                <label for="lk">L</label>
              </div>
              <div class="jk">
                <input type="radio" name="jk" class=" jk" id="pr" value="P">
                <label for="pr">P</label>
              </div>
            </div>

            <div class="form-group">
              <label>Jurusan</label>
              <select name="jurusan" class="form-control" required>
                <option value="Tekniknologi Informasi">Tekniknologi Informasi</option>
                <option value="Produksi Pertanian">Produksi Pertanian</option>
                <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                <option value="Kesehatan">Kesehatan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" rows="5" placeholder="Alamat" required></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tmbhdata" class="btn btn-success">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- =============================================================================================== -->

  <!-- EDIT DATA -->
  <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <div>
              <input type="hidden" name="update_id" id="update_id">

              <label>NIM</label>
              <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM">
            </div>

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <input type="text" name="jk" id="jk" class="form-control" placeholder="Jenis Kelamin" maxlength="1">
            </div>

            <div class="form-group">
              <label>Jurusan</label>
              <select name="jurusan" id="jurusan" class="form-control">
                <option value="Tekniknologi Informasi">Tekniknologi Informasi</option>
                <option value="Produksi Pertanian">Produksi Pertanian</option>
                <option value="Manajemen Agribisnis">Manajemen Agribisnis</option>
                <option value="Kesehatan">Kesehatan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat"></textarea>
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
  <div class="modal fade" id="deletedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <h1 class="text-center mt-5 judul">TABEL DATA MAHASISWA</h1>
    <div class="card shadow mb-4 mt-5 ">
      <div class="card-header py-3">
        <h6 class="m-2 font-weight-bold text-primary">Tabel Data Mahasiswa</h6>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata">
          + Tambah Data
        </button>
        <div id="pesan_error">
        </div>
        <div class="table-responsive">
          <?php

          require_once 'koneksi.php';

          $query = "SELECT * FROM mahasiswa";
          $query_run = mysqli_query($koneksi, $query);
          ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th hidden>id</th>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php
            $no = 1;
            if ($query_run) {
              foreach ($query_run as $row) {

            ?>
                <tbody>
                  <tr>
                    <td hidden><?php echo $row['id_mhs']; ?></td>
                    <td><?php echo $no; ?></td>
                    <td class="upper"><?php echo $row['nim']; ?></td>
                    <td class="upper"><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                    <td class="camel"><?php echo $row['alamat']; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning editbtn"><i class="far fa-edit"></i></button>
                      <button type="button" class="btn btn-danger deletebtn"><i class="far fa-trash-alt"></i></button>
                    </td>
                  </tr>
                </tbody>
            <?php
                $no++;
              }
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

  <!-- SCRIPT HAPUS DATA -->
  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#deletedata').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

      });
    });
  </script>

  <!-- SCRIPT EDIT DATA -->
  <script>
    $(document).ready(function() {

      $('.editbtn').on('click', function() {
        $('#editdata').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#nim').val(data[2]);
        $('#nama').val(data[3]);
        $('#jk').val(data[4]);
        $('#jurusan').val(data[5]);
        $('#alamat').val(data[6]);
      });

    });
  </script>

  <!-- Footer -->
  <footer style="height: 50px;">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Iqbal Ikhlasul Amal | DTS 2020</span>
      </div>
    </div>
  </footer>
</body>

</html>