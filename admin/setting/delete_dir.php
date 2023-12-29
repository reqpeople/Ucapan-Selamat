<?php
include "../config/koneksi.php";
$id= $_GET["id_direktorat"];
$sql = "DELETE FROM `tbl_direktorat` WHERE id= $id";
$result = mysqli_query($koneksi, $sql);

if ($result) {
  header("Location: direktorat.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

?>
