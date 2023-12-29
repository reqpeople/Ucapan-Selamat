<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">	
<title>Add User</title>
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
			href="list_user.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true" >
			<span>List</span>
			</a>
			<a
			href="komentar.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			<span>Komentar</span>
			</a>
			<font>Settings</font>
			<a
			href="../setting/departemen.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			<span>Departemen</span>
			</a>
			<a
			href="../setting/divisi.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
			<span>Divisi</span>
			</a>
			<a
			href="../setting/direktorat.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
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
			src="logo.png"
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
  <form action="" method="POST">
  <main style="margin-top: 58px;">

	<div class="container pt-5"> 
		<h2>Add Users</h2>
		<br>
		<br>
		<br>
			<div class="row mb-3">
			  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="inputEmail3" name="nama">
			  </div>
			</div>
			
			<div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" name="jabatan">
                </div>
              </div>
			<div class="row mb-3">
				<label for="validationSelect" class="col-sm-2 col-form-label">Pilih Departemen</label>
				<div class="col-sm-10">
				<select name="id_departemen" class="form-select">
					<option></option>
					<?php 
					include "../config/koneksi.php";
					$query =mysqli_query($koneksi,"SELECT * FROM tbl_departemen") or die (mysqli_error($koneksi));
					while($data=mysqli_fetch_array($query)){
						echo"<option value=$data[id]>$data[nama] </option>";
					}
					?>
				  </select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="validationSelect" class="col-sm-2 col-form-label">Pilih Divisi</label>
				<div class="col-sm-10">
				<select name="id_divisi" class="form-select" >
					<option></option>
					<?php 
					include "../config/koneksi.php";
					$query =mysqli_query($koneksi,"SELECT * FROM tbl_divisi ") or die (mysqli_error($koneksi));
					while($data=mysqli_fetch_array($query)){
						echo"<option value=$data[id]>$data[nama] </option>";
					}
					?>
				  </select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="validationSelect" class="col-sm-2 col-form-label">Pilih Direktorat</label>
				<div class="col-sm-10">
				<select name="id_direktorat" class="form-select" >
				<option></option>
					<?php 
					include "../config/koneksi.php";
					$query =mysqli_query($koneksi,"SELECT * FROM tbl_direktorat ") or die (mysqli_error($koneksi));
					while($data=mysqli_fetch_array($query)){
						echo"<option value=$data[id]>$data[nama] </option>";
					}
					?>
				  </select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
		</div>
		  </form>
	</div>
  </main>
  </form>
  <?php 
  include "../config/koneksi.php";
  if(isset($_POST['tambah'])){
	mysqli_query($koneksi,"insert into tbl_user set
	nama = '$_POST[nama]',
	jabatan = '$_POST[jabatan]',
	id_departemen ='$_POST[id_departemen]',
	id_divisi ='$_POST[id_divisi]',
	id_direktorat ='$_POST[id_direktorat]'");

	echo "data Berhasil di simpan";
  }
 ?>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
  </html>