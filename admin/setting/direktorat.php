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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
  rel="stylesheet"
/>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
	<link rel="stylesheet" href="../public/style.css">	
<title>Divisi</title>
</head>
<body>
<header>
	<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
	  <div class="position-sticky pt-4">
		<div class="list-group list-group-flush mx-3 mt-4">
			<p class="fs-4 fw-bolder">Events</p>
			<a
			  href="../index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			  <span>List</span>
			</a>
			<p class="fs-4 fw-bolder">Users</p>
			<a
			href="../user/list_user.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true" >
			<span>List</span>
			</a>
			<a
			href="../user/komentar.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true" >
			<span>Komentar</span>
			</a>
			<p class="fs-4 fw-bolder">Settings</p>
			<a
			href="departemen.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			<span>Departemen</span>
			</a>
			<a
			href="divisi.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true" >
			<span>Divisi</span>
			</a>
			<a
			href="direktorat.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true" >
			<span>Direktorat</span>
			</a>
			<a href="../../logout.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Log Out</span>
					</a>
		  
		
		</div>
	  </div>
	</nav>
	<!-- Sidebar -->
  
	<!-- Navbar -->
	<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
	  <!-- Container wrapper -->
	  <div class="container-fluid">
		<a class="navbar-brand" href="#">
		  <img
			src="../public/logo.png"
			height="55"
			alt="MDB Logo"
			loading="lazy"
		  />
		</a>
			</ul>
		  </li>
		</ul>
	  </div>
	</nav>
  </header>
  <main style="margin-top: 58px;">
    
	<div class="container pt-5"> 
        <h2>Setting Direktorat</h2>
        <a href="add_direktorat.php"><button type="submit" class="btn btn-primary">Tambah Direktorat</button></a>
        <p>

        </p>
		<table class="table caption-top border">
            <thead>
			  <tr>
				<th scope="col" class="fw-bold">Direktorat</th>
				<th scope="col" class="fw-bold">Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
			include "../config/koneksi.php";
			$ambildata = mysqli_query($koneksi,"SELECT * FROM tbl_direktorat WHERE id");
			while($tampil = mysqli_fetch_array($ambildata)){ 
			?>
				<td ><a href="edit_direktorat.php?id_direktorat=<?php echo $tampil["id"]?>"><?= $tampil['nama'] ?></td>
				<td>
				<button type="submit" class="btn btn-danger" data-bs-toggle="modal"
									data-bs-target="#deleteModal_<?php echo $tampil["id"] ?>" value=id_divisi<?php echo $tampil["id"] ?>>
									<i class="fa-solid fa-trash fs-6"></i>
								</button>

								<div class="modal fade" id="deleteModal_<?php echo $tampil['id'] ?>"
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
												<h4>Anda akan menghapus Direktorat:</h4>
												<h5>
												<?= $tampil["nama"] ?>
												</h5>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary"
													data-bs-dismiss="modal">Kembali</button>
												<a href="delete_dir.php?id_direktorat=<?php echo $tampil['id'] ?>"
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
		  </table>
	</div>
  </main>
  
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
  </html>