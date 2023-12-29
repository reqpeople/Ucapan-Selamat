<?php
include "../config/koneksi.php";

$id_event = $_POST['id_event'];
$nama_user = $_POST['nama_user'];
$id_user = $_POST['id_user'];
$nama_event = $_POST['judul_event'];
$subtitle_event = $_POST['subtitle_event'];
$tgl_event = $_POST['tgl_event'];
$jenis_event = $_POST['jenis_event'];

$query = "UPDATE tbl_event SET 
     id_user = '$id_user',
     nama = '$nama_event',
     subtitle = '$subtitle_event',
     tgl_event = '$tgl_event',
     id_jenis_event = '$jenis_event', 
     status_email= default
     WHERE id = '$id_event'";

$result = mysqli_query($koneksi, $query);

if ($result === TRUE) {
  header("location: ../index.php");
  echo "<div class='container pt-5'> 
  <div class='alert alert-success' role='alert'>
  <strong>Berhasil Menambah Data</strong> Kembali ke list event untuk melihat data yang baru di tambahkan
</div></div>";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}



mysqli_close($koneksi);
?>
