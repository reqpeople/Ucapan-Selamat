<?php
include("../config/koneksi.php");
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
$komentar = $_POST['komentar'];
$id_event = $_POST['id_event'];
$id_user = $_POST['id_user']; 
$sql = "INSERT INTO tbl_komentar (isi_komentar, id_event, id_user) VALUES ('$komentar','$id_event','$id_user')";
if (mysqli_query($koneksi, $sql)) {
    $sql = "SELECT * FROM tbl_komentar";
    header('location: detil.php?id='.$id_event);
} else {
    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}
mysqli_close($koneksi);

include("../config/koneksi.php");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);
// $id_event = $_POST['id_event'];

// // Default, ambil id_user dari sesi
// $id_user = $_SESSION['session_id'];

// // Jika "Ingat Aku" diaktifkan, cek cookie
// if (isset($_POST['ingataku']) && $_POST['ingataku'] == '1') {
//     // Cek apakah cookie id_user ada
//     if (isset($_COOKIE['cookie_id'])) {
//         $id_user_cookie = $_COOKIE['cookie_id'];

//         // Set id_user sesuai nilai dari cookie jika tidak kosong
//         $id_user = !empty($id_user_cookie) ? $id_user_cookie : $id_user;
//     }
// }

// $sql = "INSERT INTO tbl_komentar (isi_komentar, id_event, id_user) VALUES ('$komentar', '$id_event', '$id_user')";

// if (mysqli_query($koneksi, $sql)) {
//     header("location: detil.php?id=".$id_event);
// } else {
//     echo "Terjadi kesalahan: " . mysqli_error($koneksi);
// }

// mysqli_close($koneksi);


?>