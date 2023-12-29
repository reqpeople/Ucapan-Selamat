<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "db_event";

$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi 
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$nama_user = $_POST['nama_user'];
$jabatan = $_POST['jabatan'];
$departemen = $_POST['departemen'];
$divisi = $_POST['divisi'];
$direktorat = $_POST['direktorat'];
$foto = $_FILES['foto']['name'];

// Mengupload file foto
$target_dir = "../img/poto_profil/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

// Menyimpan data pengaduan ke database
$sql = "INSERT INTO  tbl_user (nama, jabatan, id_departemen, id_divisi, id_direktorat, foto) VALUES ('$nama_user', '$jabatan', '$departemen', '$divisi', '$direktorat','$foto')";

if (mysqli_query($koneksi, $sql)) {
    header('location: list_user.php');
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}

// Men

//utup koneksi database
mysqli_close($conn);

?>
