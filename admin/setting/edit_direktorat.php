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
<title>Edit Direktorat</title>
</head>
<body>
<header>
	<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
	  <div class="position-sticky">
		<div class="list-group list-group-flush mx-3 mt-4">
			<font>Events</font>
			<a
			  href="../index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			  <span>List</span>
			</a>
			<font>Users</font>
			<a
			href="../user/list_user.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true" >
			<span>List</span>
			</a>
			<a
			href="../user/komentar.html" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			<span>Komentar</span>
			</a>
			<font>Settings</font>
			<a
			href="departemen.html" class="list-group-item list-group-item-action py-2 ripple " aria-current="true" >
			<span>Departemen</span>
			</a>
			<a
			href="divisi.html" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			<span>Divisi</span>
			</a>
			<a
			href="direktorat.html" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true" >
			<span>Direktorat</span>
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
			alt="MDB Logo"
			height="55"
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
	<div class="container pt-4"> 
        <h2>Edit Direktorat</h2>
			<div class="row mb-3">
				<label for="validationSelect" class="col-sm-2 col-form-label">Pilih Direktorat</label>
				<div class="col-sm-10">
				<select name="user" id="pet-select" >
					<option value=""></option>
					<option value="Ulang Tahun">Ulang Tahun</option>
					<option value="Karyawan Baru">Karyawan Baru</option>
				  </select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
		  </form>
	</div>
  </main>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
  </html>