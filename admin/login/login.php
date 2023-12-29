<?php

session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "crud";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username' and password='$password'");
$pengacak = "JSCNJWNUVRV0286348HF";
$cek = mysqli_num_rows($login);

if(md5($pengacak.md5($password).$pengacak) == ($cek > 0)){
    $data = mysqli_fetch_assoc($login);

    if($data['level']=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level']= "admin";
        header("location: ../input_event/list_event.php");
    }else if($data['level']=="karyawan"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "karyawan";
        header("location: ../index.php");
    }else{
        header("location: index.php?pesan=gagal");
    }
}else{
    header("location: index.php?pesan=gagal");
}

?>