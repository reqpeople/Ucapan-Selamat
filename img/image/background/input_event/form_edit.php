<?php 
   $host = "localhost";
   $username = "root";
   $password = "";
   $database = "crud";

   // Membuat koneksi ke database
   $conn = mysqli_connect($host, $username, $password, $database);
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM list WHERE id_laporan = $id";

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
    session_start();

    if($_SESSION['level']==""){
        header("location: ../gagal.php?pesan=gagal");
    }else if($_SESSION['level'] == "karyawan"){
        header("location: ../gagal.php?pesan=gagal");
    }
    ?>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="text-center">Edit Event</h2>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id_laporan'];?>">
                        <label for="tanggal">Tanggal :</label>
                        <input type="date" name="tanggal" value="<?php echo $row['tanggal'];?>">
                    </div>
                    <div class="form-group">   
                        <label for="judul">Judul :</label>
                        <input type="text" name="judul" value="<?php echo $row['judul'];?>">
                    </div> 
                    <div class="form-group">   
                        <label for="nama">Nama :</label>
                        <input type="text" name="nama" value="<?php echo $row['nama'];?>">
                    </div>
                    <div class="form-group">    
                        <label for="foto">Foto :<?php echo $row['foto']; ?></label>
                        <img src="../posting/<?php echo $row['foto']; ?>">
                        <input type="file" name="foto" id="foto" accept="img/*" value="<?php echo $row['foto'];?>">
                    </div>
                    <div class="form-group">    
                        <label for="kategori">Kategori :</label>
                        <select id="kategori" name="kategori" value="<?php echo $row['kategori'];?>">
                            <option value="Ulang Tahun">Ulang Tahun</option>
                            <option value="Onboard">Onboard</option>
                            <option value="Resign">Resign</option>
                            <option value="Duka Cita">Duka Cita</option>
                            <option value="Kelahiran">Kelahiran</option>
                        </select>
                    </div>    
                    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>