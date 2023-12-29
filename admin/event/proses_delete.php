<?php
include "../config/koneksi.php";
$id = $_GET['id_event'];
$sql = "DELETE FROM `tbl_event` WHERE id = $id";
$result = mysqli_query($koneksi, $sql);

$sql2 = "DELETE FROM `tbl_komentar` WHERE id_event = $id";
$result2 = mysqli_query($koneksi, $sql2);

if ($result && $result2) {
  header("Location: ../index.php?msg=Data deleted successfully");
  echo "<div class='alert alert-danger' role='alert'>
  <strong>Data Berhasil di HAPUS</strong>
</div>";
} else {
  echo "Failed: " . mysqli_error($conn);
}
