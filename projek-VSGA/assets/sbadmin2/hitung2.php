<?php
include('header.php');
if (isset($_SESSION['id']) && isset($_SESSION['user'])) {
  if ($_SESSION['kelas'] == 2 || $_SESSION['role'] == 1) {
?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Operasi Hitung</h1>
    </div>

    <div class="card shadow mb-4 mt-5">
      <div class="card-body">
        <h5>Hitung Deret Fibonaci</h5>
        <form action="" method="get">
          <div class="form-inline">
            Nilai Ke-n <input type="number" class="form-control col-sm-2 m-4" name="n" placeholder="Max 100" required>
            <input type="submit" class="btn btn-primary mr-2" value="Generate">
            <input type="button" class="btn btn-warning ml-2" value="Reset" onClick="location.href='hitung2.php'">
          </div>
        </form>
        <hr>
        <?php

        $deret[1] = 0;
        $deret[2] = 1;

        $n = isset($_GET['n']) ? $_GET['n'] : '1';

        if ($n >= 2 and $n <= 100) {
          $hasil = "$deret[1], $deret[2]";
          for ($i = 3; $i <= $n; $i++) {
            $x = $i - 1;
            $y = $i - 2;

            $deret[$i] = $deret[$x] + $deret[$y];
            $hasil .= ", $deret[$i]";
          }
          echo " <div class='alert alert-success' role='alert'>Deret Bilangan Fibonacci 1 - $n <br> $hasil</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>Nilai n harus diantara 2 s/d 100</div>";
        }
        ?>

        <hr>
        <br>
        <br>
      </div>
    </div>

  <?php
  } else {
    header('location:hitung.php');
    exit();
  }
  include('footer.php');
  ?>
<?php
} else {
  header("Location: ../auth/login.php");
  exit();
}
?>