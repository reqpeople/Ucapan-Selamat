<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styleadmin.css">
    
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
        <h2>List Event</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php
            // Konfigurasi koneksi ke database
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "db_event";

            // Membuat koneksi ke database
            $conn = mysqli_connect($host, $username, $password, $database);

            // Memeriksa koneksi
            if (!$conn) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            // Mengambil data pengaduan dari database
            $sql = "SELECT * FROM tbl_event";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_laporan'] . "</td>";
                    echo "<td>" . $row['tanggal'] . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td><img src='../posting/" . $row['foto'] . "' width='100' height='100'></td>";
                    echo "<td>" . $row['kategori'] . "</td>";
                    echo "<td><a href='form_edit.php?id=" . $row['id_laporan'] . "' class='btn btn-warning'>Edit</a>";
                    echo "<a href='hapus.php?id=" . $row['id_laporan'] . "' class='btn btn-danger'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data pengaduan.</td></tr>";
            }

            // Menutup koneksi database
            mysqli_close($conn);
            ?>
            </thread>
        </table> 
        <a href='form_input.php' class="btn btn-primary">Tambah Data</a>
        <a href='../login/logout.php' class="btn btn-secondary">Logout</a>
        </div>
    </div>
    </div>
</body>
</html>