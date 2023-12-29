<?php
include "../config/koneksi.php";
$id= $_GET["id_departemen"];
$sql = "DELETE FROM `tbl_departemen` WHERE id= $id";
$result = mysqli_query($koneksi, $sql);

if ($result) {
  header("Location: departemen.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

?>

