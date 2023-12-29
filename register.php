<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "db_event";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "INSERT INTO tbl_user (nama, username, email, password, level) VALUES ('$nama', '$username', '$email', '$password', 'karyawan')";

if (mysqli_query($conn, $sql)) {
    header('location: form_login.php');
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}
mysqli_close($conn);
?>