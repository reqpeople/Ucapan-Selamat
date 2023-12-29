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
$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Menyimpan data pengaduan ke database
$sql = "INSERT INTO login (nama, email, username, password, level) VALUES ('$nama', '$email', '$username', '$password', 'karyawan')";

if (mysqli_query($conn, $sql)) {
    header('location: form_login.php');
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}

// Men

//utup koneksi database
mysqli_close($conn);

?>