<?php include('header.php') ?>

<?php

if (isset($_SESSION['id']) && isset($_SESSION['user'])) {

	require_once('../../connection.php');

	$id = $_GET['id'];
	$q = $koneksi->query("SELECT * FROM tb_guru, tb_users WHERE tb_guru.id_users = tb_users.id_users AND id_guru='$id'");

?>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Data Guru</h1>
	</div>

	<div class="card shadow mb-4 mt-5">
		<div class="card-body">

			<?php while ($data = $q->fetch_assoc()) { ?>
				<form action="functions.php" method="POST">

					<div class="form-group">
						<a href="addguru.php" class="btn btn-secondary right">Batal</a>
					</div>

					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" name="id_guru" value="<?= $data['id_guru']; ?>" hidden>
						<input type="text" name="nama" class="form-control" value="<?= $data['nama_guru']; ?>" required>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" value="<?= $data['username']; ?>" required>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" value="<?= $data['password']; ?>" required>
					</div>

					<div class="form-group">
						<input type="submit" name="editguru" class="btn btn-primary" value="Simpan">
					</div>

				</form>
			<?php } ?>
		</div>
	</div>

	<?php include('footer.php') ?>

<?php
} else {
	header("Location: ../auth/login.php");
	exit();
}
?>