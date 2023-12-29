<?php
session_start();
if (!isset($_SESSION['session_username'])) {
	header("location: ../../1.php");
	exit();
}
if ($_SESSION['session_role'] !== 'admin') {
	header("location: ../../1.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script>
		<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
					integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
					crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="../public/style.css">
	<title>Add Event </title>
</head>

<body>
	<?php
	include "../config/koneksi.php";
	$id_user = $_GET['id_user'];
	include "../config/koneksi.php";
	$ambildata = mysqli_query($koneksi, "
			SELECT
			u.id id_user, d.id id_departemen, i.id id_divisi, u.nama nama_user, 
			u.jabatan jabatan_user, d.nama nama_departemen, 
			i.nama nama_divisi, r.nama nama_direktorat
			FROM tbl_user u
			JOIN tbl_departemen d ON u.id_departemen=d.id
			JOIN tbl_divisi i ON u.id_divisi=i.id
			JOIN tbl_direktorat r ON u.id_direktorat=r.id
			WHERE u.id = $id_user
			");
	$data = mysqli_fetch_array($ambildata);
	?>
	<header>
		<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
			<div class="position-sticky pt-4">
				<div class="list-group list-group-flush mx-3 mt-4">
					<p class="fs-4 fw-bolder">Events</p>
					<a href="../index.php" class="list-group-item list-group-item-action py-2 ripple "
						aria-current="true">
						<span>List</span>
					</a>
					<p class="fs-4 fw-bolder">Users</p>
					<a href="../user/list_user.php" class="list-group-item list-group-item-action py-2 ripple active"
						aria-current="true">
						<span>List</span>
					</a>
					<a href="komentar.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Komentar</span>
					</a>
					<p class="fs-4 fw-bolder">Settings</p>
					<a href="../setting/departemen.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Departemen</span>
					</a>
					<a href="../setting/divisi.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Divisi</span>
					</a>
					<a href="../setting/direktorat.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Direktorat</span>
					</a>
				</div>
			</div>
		</nav>
		<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="../public/logo.png" alt="MDB Logo" height="55" loading="lazy" />
				</a>
				</ul>
				</li>
				</ul>
			</div>
		</nav>
	</header>

	<form action="proses_edit.php" method="POST" enctype="multipart/form-data">
		<main style="margin-top: 58px;">
			<div class="container pt-5">
				<h2>Edit User</h2>

				<div class="form row">
					<div class="form-group col-md-4">
						<input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
						<label for="inputEmail4" class="form-label">Nama User</label>
						<input type="text" class="form-control form-control form-control-lg" id="inputEmail3"
							name="nama_user" value="<?php echo $data['nama_user']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Jabatan</label>
						<input type="text" class="form-control form-control form-control-lg" id="inputEmail3"
							name="jabatan" value="<?php echo $data['jabatan_user']; ?>">
					</div>
					<!-- Input hidden untuk menyimpan ID user -->
					<input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
				</div>
				<p>
				<div class="form row">
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Departemen</label>
						<select class="form-select form-select-lg" aria-label="Default select example"
							name="departemen">
							<?php
							include "../config/koneksi.php";
							$queryDepartemen = mysqli_query($koneksi, "SELECT * FROM tbl_departemen") or die(mysqli_error($koneksi));
							while ($dataDepartemen = mysqli_fetch_array($queryDepartemen)) {
								$selected = ($dataDepartemen['id'] == $data['id_departemen']) ? 'selected="selected"' : '';
								echo "<option value='{$dataDepartemen['id']}' $selected>{$dataDepartemen['nama']}</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Pilih Divisi</label>
						<select class="form-select form-select-lg" aria-label="Default select example"
							name="divisi">
							<?php
							include "../config/koneksi.php";
							$queryDivisi = mysqli_query($koneksi, "SELECT * FROM tbl_divisi") or die(mysqli_error($koneksi));
							while ($dataDivisi = mysqli_fetch_array($queryDivisi)) {
								$selected = ($dataDivisi['id'] == $data['id_divisi']) ? 'selected="selected"' : '';
								echo "<option value='{$dataDivisi['id']}' $selected>{$dataDivisi['nama']}</option>";
							}
							?>
						</select>
					</div>
				</div>
				<p>

				<div class="form row">
					<div class="form-group col-md-2">
						<label for="inputEmail4" class="form-label">Plih Direktorat</label>
						c
					</div>
					<div class="container pt-4">
						<button type="submit" name="tambah" class="btn btn-primary btn-lg">Simpan </button>
					</div>

		</main>
	</form>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>
</body>

</html>