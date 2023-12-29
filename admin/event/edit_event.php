<?php 
session_start();
if(!isset($_SESSION['session_username'])){
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
	$id = $_GET['id_event'];
	include "../config/koneksi.php";
	$ambildata = mysqli_query($koneksi, "SELECT
			e.id id_event, j.id id_jenis_event, u.id id_user, e.nama nama_event,  
			e.subtitle subtitle, e.tgl_event tgl, u.nama nama_user, e.tgl_event tgl_event,
			e.created_at created_at, e.updated_at updated_at,
			j.nama nama_jenis_event, e.status_email status_email
			FROM tbl_event e
			JOIN tbl_user u ON e.id_user=u.id
			JOIN tbl_jenis_event j ON e.id_jenis_event=j.id
			WHERE e.id = $id
			");
	$data = mysqli_fetch_array($ambildata);
	?>
	<header>
		<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
			<div class="position-sticky pt-4">
				<div class="list-group list-group-flush mx-3 mt-4">
					<p class="fs-4 fw-bolder">Events</p>
					<a href="../index.php" class="list-group-item list-group-item-action py-2 ripple active"
						aria-current="true">
						<span>List</span>
					</a>
					<p class="fs-4 fw-bolder">Users</p>
					<a href="../user/list_user.php" class="list-group-item list-group-item-action py-2 ripple "
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
	<main>
	<form action="proses_edit.php" method="POST" enctype="multipart/form-data">
		<div style="margin-top: 58px;">

			<div class="container pt-5">
				<h2>Edit Event</h2>
				<div class="form row">
					<div class="form-group col-md-4">
						<input type="hidden" name="id" value="<?php echo $row['id_event']; ?>">
						<label for="inputEmail4" class="form-label">Nama User</label>
						<input type="text" class="form-control form-control form-control-lg" id="inputEmail3"
							name="nama_user" value="<?php echo $data['nama_user']; ?>" disabled>
						<input type="hidden" class="form-control form-control form-control-lg" id="inputEmail3"
							name="status_email" value="<?php echo $data['status_email']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Judul Event</label>
						<input type="text" class="form-control form-control form-control-lg" id="inputEmail3"
							name="judul_event" value="<?php echo $data['nama_event']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Subtitle</label>
						<input type="text" class="form-control form-control form-control-lg" id="inputEmail3"
							name="subtitle_event" value="<?php echo $data['subtitle']; ?>">
					</div>
					<!-- Input hidden untuk menyimpan ID user -->
					<input type="hidden" name="id_event" value="<?php echo $data['id_event']; ?>"> 
					<input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>"> 
				</div>
			<br>
			<div class="form row">
				<div class="form-group col-md-3">
					<label for="inputEmail3" class="form-label">Tanggal</label>
					<input type="date" class="form-control form-control form-control-lg" id="inputEmail3"
						name="tgl_event" value="<?php echo $data['tgl_event']; ?>">
				</div>
				<div class="form-group col-md-3">
					<label for="inputEmail4" class="form-label"> Jenis event</label>
					<select class="form-select form-select-lg" aria-label="Default select example" name="jenis_event">

						<option value="<?php echo $data['id_jenis_event'] ?>" <?php if ($data['id_jenis_event'] == $data['id_jenis_event']) {
							   ?> selected="selected" ; <?php } ?>>
							<?php echo $data['nama_jenis_event']; ?>
							<?php
							include "../config/koneksi.php";
							$query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_event") or die(mysqli_error($koneksi));
							while ($data = mysqli_fetch_array($query)) {
								echo "<option value=$data[id]>$data[nama] </option>";
							}
							?>
						</option>
					</select>
				</div>
				<div class="container mt-4">
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