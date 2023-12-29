<?php 
session_start();
if( !isset($_SESSION['session_username'])){
    header("location: ../login.php");
    exit();
}
?>

<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-light" style="background-color: #194F99">
    <a class="navbar-brand">
      <img src="../admin/public/logo-white.png" height="70" width="255" alt="logo mrt jakarta">
    </a>
    <div class="col-auto">
      <p class="text-white"><?php 
      // echo $_SESSION['id'] 
      ?></p>
      <p class="text-white"><?php
      //  echo $_SESSION['session_username'] ?>
       </p>
      <a href="../logout.php">
        <i class="fas fa-arrow-right-from-bracket fa-2x" style="color: white"></i>
      </a>
    </div>
  </nav>
</body>

</html>
