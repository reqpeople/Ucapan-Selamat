    <?php

    session_start();
    // Koneksi ke database MySQL
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $nama_db = "db_event" ;
    $koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

    // Variabel untuk menangani pesan kesalahan dan informasi pengguna
    $err = "";
    $username = "";
    $ingataku = "";

    //Query untuk mengambil link 
    $sqlLink = "SELECT * FROM tbl_event WHERE id";
    $result = mysqli_query($koneksi, $sqlLink);
    while ($row = mysqli_fetch_array($result)) {
    $link = $row['link'];
    }

    // Pengecekan apakah cookie untuk pengguna tersimpan
    if (isset($_COOKIE['cookie_username'])) {
        $cookie_username = $_COOKIE['cookie_username'];
        $cookie_id = $_COOKIE['cookie_id'];

        // Memeriksa apakah informasi cookie valid
        $sql1 = "SELECT * FROM tbl_user WHERE username = '$cookie_username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if ($r1 && $r1['username'] == $cookie_username) {
            // Jika valid, inisialisasi sesi berdasarkan informasi cookie
            $_SESSION['session_username'] = $cookie_username;
            $_SESSION['session_id'] = $cookie_id;
            $_SESSION['session_role'] = isset($r1['level']) ? $r1['level'] : null; // Pastikan ini di-set dengan benar
        }
    }

    // Jika sesi pengguna sudah ada, arahkan ke halaman sesuai dengan level
    if (isset($_SESSION['session_username']) && isset($_SESSION['session_id'])) {
        if ($_SESSION['session_role'] == 'admin') {
            header("location: admin/index.php");
            exit();
        } elseif ($_SESSION['session_role'] == 'karyawan') {
            header("location:$link");
            exit();
        }
    }

    // Jika formulir login dikirim
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ingataku = isset($_POST['ingataku']);

        // Validasi formulir login
        if ($username == '' or $password == '') {
            // Jika username atau password kosong
            $err = "Silakan masukkan username dan juga password.";
        } else {
            // Memeriksa username dalam database
            $sql1 = "SELECT * FROM tbl_user WHERE username = '$username'";
            $q1 = mysqli_query($koneksi, $sql1);
            $r1 = mysqli_fetch_array($q1);

            // Jika pengguna tidak ditemukan
            if (!$r1 || $r1['username'] == '') {
                $err = "Username <b>$username</b> tidak tersedia.";
            } elseif ($r1['password'] != md5($password)) {
                // Jika password tidak cocok dengan yang disimpan di database
                $err = "Password yang anda masukkan salah.";
            }

            // Jika tidak ada kesalahan dalam validasi formulir
            if (empty($err)) {

                // Set session dan cookie
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = md5($password);
                $_SESSION['session_role'] = isset($r1['level']) ? $r1['level'] : null;
                $_SESSION['session_id'] = $id;
                $_SESSION['id'] = $r1['id'];


                // Jika "Ingat Aku" di klik, set cookie
                if ($ingataku) {
                    $cookie_name = "cookie_id";
                    $cookie_value = $r1['id'];
                    $cookie_time = time() + (60 * 60 * 24 * 30);
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                    $cookie_name = "cookie_username";
                    $cookie_value = $username;
                    $cookie_time = time() + (60 * 60 * 24 * 30);
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");
                }
                // Arahkan ke halaman sesuai dengan level
                if ($_SESSION['session_role'] == 'admin') {
                    header("location: admin/index.php");
                } elseif ($_SESSION['session_role'] == 'karyawan') {
                    header("location:$link");
                }
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="logo.png" rel="icon">
        <link rel="icon" href="logo.ong" type=“image/x-icon”>
        <link rel="shortcut icon" href="logo.png" type=“image/x-icon”>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/style/style.css">
    </head>

    <body>
        <div class="window">
            <span class="h1">Silahkan Login</span>
            <?php if ($err) { ?>
                <p class="text text-danger">
                    <?php echo $err ?>
                </p>
            <?php } ?>
            <form id="loginform" action="" method="post" role="form">

                <input id="login-username" type="text" class="mt-2 form-control" name="username"
                    value="<?php echo $username ?>" placeholder="username">
                <input id="login-password" type="password" class="mt-2 form-control" name="password" placeholder="password">
                <label class="mb-2 mt-2" >
                    <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php if ($ingataku == '1')
                        echo "checked" ?>> Ingat aku
                    </label>
                <input type="submit" name="login" class="mb-2 btn btn-light mt-2" value="Login">
                    <br>
                    <!-- <small>Belum memiliki akun? <a href="form_register.php" class="text-warning">Daftar</a></small> -->
                </form>
            </div>
        </body>

        </html>