<?php
 $host = "localhost";
 $username = "root";
 $password = "";
 $database = "crud";

 $conn = mysqli_connect($host, $username, $password, $database);

$id_laporan = $_POST['id'];
$tanggal = $_POST['tanggal'];
$judul = $_POST['judul'];
$nama = $_POST['nama'];
$foto = $_FILES['foto']['name'];
$kategori = $_POST['kategori'];

if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../posting/'.$nama_gambar_baru);

$query = "UPDATE list SET tanggal = '$tanggal', judul = '$judul', nama = '$nama', foto = '$foto', kategori = '$kategori' WHERE id_laporan = '$id_laporan'";

if($conn->query($query)) {
    header("location: list_event.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
 }
    }
}
?>