<?php
include "../config/koneksi.php";
$id= $_GET["id_divisi"];
$sql = "DELETE FROM `tbl_divisi` WHERE id= $id";
$result = mysqli_query($koneksi, $sql);

if ($result) {
  header("Location: divisi.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

?>
