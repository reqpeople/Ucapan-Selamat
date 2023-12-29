<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_event");
    if(mysqli_connect_error()){
        echo"koneksi gagal".mysqli_connect_error();
    }
?>