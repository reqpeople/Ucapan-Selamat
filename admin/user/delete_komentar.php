<?php
  include "../config/koneksi.php";
  $id= $_GET["id_komentar"];
  $sql = "DELETE FROM `tbl_komentar` WHERE id= $id";
  $result = mysqli_query($koneksi, $sql);

  if ($result) {
    header("Location: komentar.php");
    echo "<div class='alert alert-danger' role='alert'>
    <strong>Data Berhasil di HAPUS</strong>
  </div>";
  } else {
    echo "Failed: " . mysqli_error($conn);
  }

  ?>
