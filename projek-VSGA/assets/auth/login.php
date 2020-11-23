<?php

require_once '../../connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi E-Learning</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
  <!-- CSS KU -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="../../vendor/fontawesome/css/all.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <span>user : admin , pass : admin</span>
            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error'] ?>
              </div>
            <?php } ?>
            <div class="alert alert-success" role="alert" id="sukses" hidden>
              Data Berhasil Ditambahkan!
            </div>

            <form class="form-signin" action="user.php" method="POST">
              <div class="form-label-group">
                <input type="text" id="inputUser" name="username" class="form-control" placeholder="Username" autofocus>
                <label for="inputUser">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>