<!DOCTYPE html>
<html>
<head>
    <title>loginpage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="user/style/style.css">
</head>
<body>
    <div class="window">
        <span class="h1">Daftar Akun</span>
        <form action="register.php" method="POST" class="was-validated">      
            <input type="text" class="mt-4 form-control" placeholder="Masukkan nama" name="nama" required>
            <input type="text" class="mt-4 form-control" placeholder="Masukkan username" name="username" required>
            <input type="email" class="mt-4 form-control" placeholder="Masukkan email" name="email" required>
            <input type="password" class="mt-4 form-control" placeholder="Massukkan password" name="password" required>
            <input type="submit" class="mb-2 mt-4 btn btn-light mt-2" value="Daftar">
            <small>Sudah memiliki akun? <a href="form_login.php" class="text-warning">Masuk</a></small>
        </form>
    </div>
</body>
</html>