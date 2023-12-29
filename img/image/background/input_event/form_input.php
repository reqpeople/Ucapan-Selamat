<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Event</title>
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
                <h2 class="text-center">Input Event</h2>
                <form method="post" action="input.php" enctype="multipart/form-data">

                <div class="form-group">
                        <label for="tanggal">Tanggal :</label>
                        <input type="date" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                        <label for="judul">Judul :</label>
                        <input type="text" id="judul" name="judul" required>
                </div>
                <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                        <label for="foto">Foto :</label>
                        <input type="file" id="foto" name="foto" accept="img/*" required>
                </div>
                <div class="form-group">
                        <label for="kategori">Kategori :</label>
                        <select id="kategori" name="kategori" required>
                            <option value="Ulang Tahun">Ulang Tahun</option>
                            <option value="Onboard">Onboard</option>
                            <option value="Resign">Resign</option>
                            <option value="Duka Cita">Duka Cita</option>
                            <option value="Kelahiran">Kelahiran</option>
                        </select>
                </div>
                        <input type="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>