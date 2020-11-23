<?php include('header.php') ?>

<?php

if (isset($_SESSION['id']) && isset($_SESSION['user'])) {

  if ($_SESSION['kelas'] == 1 || $_SESSION['role'] == 1) {

?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Operasi Hitung</h1>
    </div>

    <!-- BANGUN RUANG BALOK -->
    <div class="row">
      <div class="col-sm-6">
        <div class="card shadow mb-4 mt-5">
          <div class="card-body">
            <h5>Hitung Bangun Ruang Balok (VOLUME BALOK)</h5>
            <form action="" method="POST" enctype="multipart/form-data">
              <table>
                <tr>
                  <td><label for="panjang">Panjang</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="panjang" id="panjang" required></td>
                </tr>
                <tr>
                  <td><label for="lebar">Lebar</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="lebar" id="lebar" required></td>
                </tr>
                <tr>
                  <td><label for="tinggi">Tinggi</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="tinggi" id="tinggi" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" class="btn btn-primary ml-3 mb-2" name="hitungbalok" value="Hitung"></td>
                </tr>
              </table>
            </form>
            <?php
            if (isset($_POST['hitungbalok'])) {
              $panjang    = $_POST['panjang'];
              $lebar      = $_POST['lebar'];
              $tinggi     = $_POST['tinggi'];

              // menghitung volume balok
              $volume_balok    = $panjang * $lebar * $tinggi;

              echo "<div class='alert alert-success' role='alert'>";
              echo "Hasil hitung volume Balok adalah sebagai berikut:<br />";
              echo "Diketahui;<br />";
              echo "Panjang = $panjang<br />";
              echo "Lebar = $lebar<br />";
              echo "Tinggi = $tinggi<br />";
              echo "Maka volume balok sama dengan [ $panjang x $lebar x $tinggi ] = $volume_balok";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
      <!-- END OF BALOK -->

      <!-- BANGUN RUANG KUBUS -->
      <div class="col-sm-6">
        <div class="card shadow mb-4 mt-5">
          <div class="card-body">
            <h5>Hitung Bangun Ruang Kubus (VOLUME KUBUS)</h5>
            <form action="" method="POST" enctype="multipart/form-data">
              <table>
                <tr>
                  <td><label for="sisi">Sisi</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="sisi" id="sisi" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" class="btn btn-primary ml-3 mb-2" name="hitungkubus" value="Hitung"></td>
                </tr>
              </table>
            </form>
            <?php
            if (isset($_POST['hitungkubus'])) {
              $sisi    = $_POST['sisi'];

              // menghitung volume balok
              $volume_kubus    = $sisi * $sisi * $sisi;

              echo "<div class='alert alert-success' role='alert'>";
              echo "Hasil hitung volume Kubus adalah sebagai berikut:<br />";
              echo "Diketahui;<br />";
              echo "Sisi = $sisi<br />";
              echo "Maka volume Kubus sama dengan [ $sisi x $sisi x $sisi ] = $volume_kubus";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF KUBUS -->

    <!-- BANGUN RUANG TABUNG -->
    <div class="row">
      <div class="col-sm-6">
        <div class="card shadow mb-4 mt-5">
          <div class="card-body">
            <h5>Hitung Bangun Ruang Tabung (VOLUME TABUNG)</h5>
            <form action="" method="POST" enctype="multipart/form-data">
              <table>
                <tr>
                  <td><label for="jari">Jari - Jari</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="jari" id="jari" required></td>
                </tr>
                <tr>
                  <td><label for="tinggi">Tinggi</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="tinggi" id="tinggi" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" class="btn btn-primary ml-3 mb-2" name="hitungtabung" value="Hitung"></td>
                </tr>
              </table>
            </form>
            <?php
            if (isset($_POST['hitungtabung'])) {
              $jari   = $_POST['jari'];
              $tinggi = $_POST['tinggi'];
              $phi = 22 / 7;

              // menghitung volume balok
              $volume_tabung    = $phi * $jari * $jari * $tinggi;

              echo "<div class='alert alert-success' role='alert'>";
              echo "Hasil hitung volume balok adalah sebagai berikut:<br />";
              echo "Diketahui;<br />";
              echo "Phi = $phi<br />";
              echo "Jari - Jari = $jari<br />";
              echo "Tinggi = $tinggi<br />";
              echo "Maka volume balok sama dengan [ $phi x $jari x $jari x $tinggi ] = $volume_tabung";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
      <!-- END OF TABUNG -->

      <!-- BANGUN RUANG PRISMA -->
      <div class="col-sm-6">
        <div class="card shadow mb-4 mt-5">
          <div class="card-body">
            <h5>Hitung Bangun Ruang Prisma (VOLUME PRISMA)</h5>
            <form action="" method="POST" enctype="multipart/form-data">
              <table>
                <tr>
                  <td><label for="L_alas">Luas alas</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="L_alas" id="L_alas" required></td>
                </tr>
                <tr>
                  <td><label for="tinggi">Tinggi</label></td>
                  <td><input type="text" class="form-control ml-3 mb-2" name="tinggi" id="tinggi" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" class="btn btn-primary ml-3 mb-2" name="hitungprisma" value="Hitung"></td>
                </tr>
              </table>
            </form>
            <?php
            if (isset($_POST['hitungprisma'])) {
              $la    = $_POST['L_alas'];
              $tinggi     = $_POST['tinggi'];

              // menghitung volume balok
              $volume_prisma    = $la * $tinggi;

              echo "<div class='alert alert-success' role='alert'>";
              echo "Hasil hitung volume Prisma adalah sebagai berikut:<br />";
              echo "Diketahui;<br />";
              echo "Luas Alas = $la<br />";
              echo "Tinggi = $tinggi<br />";
              echo "Maka volume balok sama dengan [ $la x $tinggi ] = $volume_prisma";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF PRISMA -->

    <?php include('footer.php') ?>

<?php
  } else {
    header('location:hitung2.php');
    exit();
  }
} else {
  header("Location: ../auth/login.php");
  exit();
}
?>