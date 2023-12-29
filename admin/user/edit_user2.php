<?php
session_start();
if (!isset($_SESSION['session_username'])) {
    header("location: ../../1.php");
    exit();
}
if ($_SESSION['session_role'] !== 'admin') {
    header("location: ../../1.php");
    exit();
}

include "../config/koneksi.php";
$id = $_GET['id_user'];
$ambildata = mysqli_query($koneksi, "
    SELECT
    u.id id_user, d.id id_departemen, i.id id_divisi, u.nama nama_user, 
    u.jabatan jabatan_user, d.nama nama_departemen, 
    i.nama nama_divisi, r.nama nama_direktorat
    FROM tbl_user u
    JOIN tbl_departemen d ON u.id_departemen=d.id
    JOIN tbl_divisi i ON u.id_divisi=i.id
    JOIN tbl_direktorat r ON u.id_direktorat=r.id
    WHERE u.id = $id
");
$data = mysqli_fetch_array($ambildata);
?>

<!-- ... (HTML structure remains the same) ... -->

<form action="proses_edit.php" method="POST" enctype="multipart/form-data">
    <main style="margin-top: 58px;">
        <div class="container pt-5">
            <h2>Edit User</h2>

            <!-- ... (Existing form fields remain the same) ... -->

            <div class="form row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4" class="form-label">Pilih Direktorat</label>
                    <select class="form-select form-select-lg" aria-label="Default select example" name="direktorat">
                        <?php
                        $queryDirektorat = mysqli_query($koneksi, "SELECT * FROM tbl_direktorat") or die(mysqli_error($koneksi));
                        while ($dataDirektorat = mysqli_fetch_array($queryDirektorat)) {
                            $selected = ($dataDirektorat['id'] == $data['id_direktorat']) ? 'selected="selected"' : '';
                            echo "<option value='{$dataDirektorat['id']}' $selected>{$dataDirektorat['nama']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="container pt-4">
                    <button type="submit" name="simpan" class="btn btn-primary btn-lg">Simpan </button>
                </div>
            </div>
        </div>
    </main>
</form>

<!-- ... (Remaining script tags and closing tags) ... -->