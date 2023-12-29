<?php
session_start();
if (!isset($_SESSION['session_username'])) {
	header("location: ../../1.php");
	exit();
}
if ($_SESSION['session_role'] !== 'admin') {
	header("location: ../../1	.php");
	exit(); 	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="../public/style.css">
	<title>List User</title>
</head>

<body>
	<header>
		<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
			<div class="position-sticky pt-4	">
				<div class="list-group list-group-flush mx-3 mt-4">
					<p class="fs-4 fw-bolder">Events</p>
					<a href="../index.php" class="list-group-item list-group-item-action py-2 ripple "
						aria-current="true">
						<span>List</span>
					</a>
					<p class="fs-4 fw-bolder">Users</p>
					<a href="list_user.php" class="list-group-item list-group-item-action py-2 ripple active "
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
						<a href="../setting/direktorat.php" class="list-group-item list-group-item-action py-2 ripple"
							aria-current="true">
							<span>Direktorat</span>
						</a>
						<a href="../../logout.php" class="list-group-item list-group-item-action py-2 ripple"
							aria-current="true">
							<span>Log Out</span>
						</a>
					</a>

				</div>
			</div>
		</nav>
		<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand"
					href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjYoobbuLaCAxUboGMGHcEyCQgQFnoECAUQAQ&url=https%3A%2F%2Fjakartamrt.co.id%2Fid&usg=AOvVaw1Y-6D7hC4SiOhaL4du1V7g&opi=89978449">
					<img src="../public/logo.png" height="55" alt="MRT " loading="lazy" />
				</a>
			</div>
		</nav>
	</header>
	<main style="margin-top: 58px;">
		<div class="container pt-5">
			<h2>List User</h2>

			<a href="add_user.php">
				<!-- <i class="bi bi-person-plus-fill fa-4x"></i> -->
				<button type="submit" class="btn btn-primary"> Tambah User</button></a>

			<p>
			<table class="table caption-top border table-hover">
				<thead>
					<tr>
						<input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
						<th scope="col" class="fw-bold">Foto Profil</th>
						<th scope="col" class="fw-bold">Nama User</th>
						<th scope="col" class="fw-bold">Jabatan</th>
						<th scope="col" class="fw-bold">Departemen</th>
						<th scope="col" class="fw-bold">Divisi</th>
						<th scope="col" class="fw-bold">Direktorat</th>
						<th scope="col" class="fw-bold">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include "../config/koneksi.php";

					$ambildata = mysqli_query($koneksi, "SELECT 
			
			u.id id_user, u.foto foto_user, 
	 		u.nama nama, u.jabatan jabatan_user, 
	 		d.nama nama_departemen, i.nama nama_divisi,r.nama nama_direktorat 
			FROM `tbl_user` u
			JOIN tbl_departemen d ON u.id_departemen = d.id
			JOIN tbl_divisi i ON u.id_divisi = i.id
			JOIN tbl_direktorat r ON u.id_direktorat=r.id	
			ORDER BY id_user DESC	
	 	");

					while ($tampil = mysqli_fetch_array($ambildata)) { ?>

						<tr>
							<td><img src="../img/poto_profil/<?php echo $tampil['foto_user']; ?>" width='100' height='100'>
							</td>
							<td><a href="edit_user.php?id_user=<?php echo $tampil["id_user"] ?>">
									<?= $tampil['nama'] ?>
								</a></td>
							<td>
								<?= $tampil['jabatan_user'] ?>
							</td>
							<td>
								<?= $tampil['nama_departemen'] ?>
							</td>
							<td>
								<?= $tampil['nama_divisi'] ?>
							</td>
							<td>
								<?= $tampil['nama_direktorat'] ?>
							</td>
							<td>
								<button type="submit" class="btn btn-danger" data-bs-toggle="modal"
									data-bs-target="#deleteModal_<?php echo $tampil["id_user"] ?>" value=<?php echo $tampil["id_user"] ?>>
									<i class="fa-solid fa-trash fs-6"></i>
								</button>

								<div class="modal fade" id="deleteModal_<?php echo $tampil['id_user'] ?>"
									data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
									aria-labelledby="deleteModalLabel" aria-hidden="true">
									<!-- Sisanya dari kode modal Anda tetap sama -->
									<div class="modal-dialog  modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-body">
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body ">
												<h4>Anda akan menghapus User:</h4>
												<h5>
													<?php
													echo $tampil['nama'] ?>
												</h5>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary"
													data-bs-dismiss="modal">Kembali</button>
												<a href="delete.php?id_user=<?php echo $tampil['id_user'] ?>"
													class="link-primary">
													<button class="btn btn-danger">Hapus</button>
												</a>

											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				<tbody>
			</table>
		</div>
	</main>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>
</body>

</html>