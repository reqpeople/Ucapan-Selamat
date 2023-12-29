<?php

$conn = new PDO("mysql:host=localhost;dbname=db_event", "root", ""); 
 
$truncate_table_query = "TRUNCATE TABLE tbl_komentar"; 
$stmt = $conn->prepare($truncate_table_query); 
$stmt->execute(); 

?>