<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "crud";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi 
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengambil data dari form
$tanggal = $_POST['tanggal'];
$judul = $_POST['judul'];
$nama = $_POST['nama'];
$foto = $_FILES['foto']['name'];
$kategori = $_POST['kategori'];

// Mengupload file foto
$target_dir = "../posting/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

// Menyimpan data pengaduan ke database
$sql = "INSERT INTO  list (tanggal, judul, nama, foto, kategori) VALUES ('$tanggal', '$judul', '$nama', '$foto', '$kategori')";

if (mysqli_query($conn, $sql)) {
    header('location: list_event.php');
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}

// Men

//utup koneksi database
mysqli_close($conn);

?>