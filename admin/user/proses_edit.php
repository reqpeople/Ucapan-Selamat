  <?php
  include "../config/koneksi.php";
  // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_user = $_POST['id_user'];
  $nama_user = $_POST['nama_user'];
  $jabatan_user = $_POST['jabatan'];
  $departemen = $_POST['departemen'];
  $divisi = $_POST['divisi'];
  $direktorat = $_POST['direktorat'];

  $query = "UPDATE tbl_user SET nama = '$nama_user', 
      jabatan = '$jabatan_user', 
      id_departemen ='$departemen', 
      id_divisi = '$divisi',
      id_direktorat = '$direktorat' WHERE id = '$id_user'";
  if ($koneksi->query($query) === TRUE) {
    header("location: list_user.php");
  } else {
    echo "Error updating record: " . $koneksi->error;
  }
  $koneksi->close();
  ?>
  <?= $id_user ?>
  <?= $nama_user ?>
  <?= $jabatan_user ?>
  <?= $departemen ?>
  <?= $divisi ?>
  <?= $direktorat ?>