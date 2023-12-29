<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location: ../1.php");
    exit();
}
if ($_SESSION['session_role'] !== 'admin') {
    header("location: ../detil.php?id=.$id_event");
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="public/style.css">
	<title>List Event</title>
	<link href="logo.png" rel="icon">
	<link rel="icon" href="../logo.ong" type=“image/x-icon”>
	<link rel="shortcut icon" href="logo.png" type=“image/x-icon”>
</head>

<body>
	
	<header>
		<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white	">
			<div class="position-sticky pt-4">
				<div class="list-group list-group-flush mx-3 mt-4">
					<p class="fs-4 fw-bolder">Events</p>
					<a href="index.php" class="list-group-item list-grup-item-action  py-2 ripple active"
						aria-current="true"><span>List</span>
					</a>
					<p class="fs-4 fw-bolder">Users</p>
					<a href="user/list_user.php" class="list-group-item list-group-item-action py-2 ripple "
						aria-current="true">
						<span>List</span>
					</a>
					<a href="user/komentar.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Komentar</span>
					</a>
					<p class="fs-4 fw-bolder">Settings</p>
					<a href="setting/departemen.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Departemen</span>
					</a>
					<a href="setting/divisi.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Divisi</span>
						<a href="setting/direktorat.php" class="list-group-item list-group-item-action py-2 ripple"
							aria-current="true">
							<span>Direktorat</span></a>
						<a href="../logout.php" class="list-group-item list-group-item-action py-2 ripple"
							aria-current="true">
							<div class="form-popup">
								<span>Log Out</span>
							</div>
						</a>
				</div>
			</div>
		</nav>

		<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
		<div class="container-fluid">
    <a class="navbar-brand"
        href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjYoobbuLaCAxUboGMGHcEyCQgQFnoECAUQAQ&url=https%3A%2F%2Fjakartamrt.co.id%2Fid&usg=AOvVaw1Y-6D7hC4SiOhaL4du1V7g&opi=89978449">
        <img src="public/logo.png" height="55" alt="MRT " loading="lazy" />
    </a>
</div>
		</nav>
	</header>
	<main style="margin-top: 58px;">
		<div class="container pt-5">
			<h2>List Event</h2>
			<a href="event/add_event.php"><button type="submit" class="btn btn-primary">Tambah Event</button></a>
			<p>
			<table class="table caption-top border table-hover	">
				<thead>
					<tr>
						<th scope="col">Nama User</th>
						<th scope="col">Jenis Event</th>
						<th scope="col">Judul Event</th>
						<th scope="col">Subtitle</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Created At</th>
						<th scope="col">Status</th>
						<th scope="col">Link</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php	
					include "config/koneksi.php";
					$ambildata = mysqli_query($koneksi, "SELECT
			e.id id_event, u.id id_user, e.nama nama_event, u.nama nama_user, j.nama jenis_event,
			e.tgl_event tgl_event, e.created_at created_at_event,	
			e.updated_at updated_at_event, e.subtitle subtitle_event, e.link link_event,
			e.status_email status_email 
			FROM tbl_event e
			JOIN tbl_user u ON e.id_user=u.id
			JOIN tbl_jenis_event j ON e.id_jenis_event=j.id 
			ORDER BY id_event DESC	
			");

					while ($tampil = mysqli_fetch_array($ambildata)) { ?>
						<tr>
							<td><a href="event/edit_event.php?id_event=<?php echo $tampil['id_event'] ?>">
									<?= $tampil['nama_user'] ?>
								</a></td>
							<td>
								<?= $tampil['jenis_event'] ?>
							</td>
							<td>
								<?= $tampil['nama_event'] ?>
							</td>
							<td>
								<?= $tampil['subtitle_event'] ?>
							</td>
							<td>
								<?= $tampil['tgl_event'] ?>
							</td>
							<td>
								<?= $tampil['created_at_event'] ?>
							</td>
							<td>
								<?= $tampil['status_email'] ?>
							</td>
							<td>
								<?= $tampil['link_event'] ?>
							</td>
							<td>
							<a href="proses_kirim_email.php?id_event=<?php echo $tampil['id_event'] ?>">
									<button type="submit" class="btn btn-success">
										<i class="far fa-envelope fs-6"></i>
									</button>
								</a>
								<p></p>
													<p></p>
								<button type="submit" class="btn btn-danger" data-bs-toggle="modal"
									data-bs-target="#staticBackdrop" >
									<i class="fa-solid fa-trash fs-6"></i> </button>

								<!-- Modal -->
								<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
									data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
									aria-hidden="true">
									<div class="modal-dialog  modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-body">
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body ">
												<h4>Anda akan menghapus Event:</h4>
												<h5>
													<input type="hidden" name="id"
														value="<?php echo $tampil['id_event']; ?>">
													<?= $tampil["nama_user"] ?>,
													<?= $tampil['nama_event'] ?>
												</h5>
											</div>

				<!-- <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
					aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
					
				</button> -->
											<div class="modal-footer">
												<button type="button" class="btn btn-primary"
													data-bs-dismiss="modal">Kembali</button>
												<a href="event/delete.php?id_event=<?php echo $tampil["id_event"] ?>"
													class="link-primary">
													<button class="btn btn-danger" type="submit"
														name="delete">Hapus</button>
												</a>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</main>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>

</body>

</html>