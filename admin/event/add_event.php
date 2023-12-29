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
?>
<!DOCTYPE html>
<html lang="en">
<script>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
				crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

<link rel="stylesheet" href="../public/style.css">
<title>Add Event </title>
</head>

<body>
	<header>
		<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
			<div class="position-sticky pt-4">
				<div class="list-group list-group-flush mx-3 mt-4">
					<p class="fs-4 fw-bolder">Events</p>
					<a href="../index.php" class="list-group-item list-group-item-action py-2 ripple active	"
						aria-current="true">
						<span>List</span>
					</a>
					<p class="fs-4 fw-bolder">Users</p>
					<a href="../user/list_user.php" class="list-group-item list-group-item-action py-2 ripple "
						aria-current="true">
						<span>List</span>
					</a>
					<a href="komentar.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Komentar</span>
					</a>
					<p class="fs-4 fw-bolder">Settings</p>
					<a href="../setting/departemen.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Departemen</span>
					</a>
					<a href="../setting/divisi.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Divisi</span>
					</a>
					<a href="../setting/direktorat.php" class="list-group-item list-group-item-action py-2 ripple"
						aria-current="true">
						<span>Direktorat</span>
					</a>
				</div>
			</div>
		</nav>
		<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="../public/logo.png" alt="MDB Logo" height="55" loading="lazy" />
				</a>
				</ul>
				</li>
				</ul>
			</div>
		</nav>
	</header>
	<form action="" method="POST">
		<main style="margin-top: 58px;">
			<div class="container pt-5">
				<h2>Add Events</h2>

				<div class="form row">
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Judul event</label>
						<input type="text" class="form-control form-control form-control-lg" id="inputEmail3"
							name="judulevent" placeholder="Masukkan Judul Event">
					</div>
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Subtitle event</label>
						<input type="text" class="form-control form-control form-control-lg" id="inputEmail3"
							name="subtitle" placeholder="Masukkan Judul Event">
					</div>
					<div class="form-group col-md-3">
						<label for="validationSelect" class="form-label ">Pilih Judul Event</label>
						<select class="form-select form-select-lg" aria-label="Default select example" name="id_event">
							<option></option>
							<?php
							include "../config/koneksi.php";
							$query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_event") or die(mysqli_error($koneksi));
							while ($data = mysqli_fetch_array($query)) {
								echo "<option value=$data[id]>$data[nama] </option>";
							}
							?>
						</select>
					</div>
				</div>
				<p>
				<div class="form row">
					<div class="form-group col-md-4">
						<label for="inputEmail4" class="form-label">Nama User</label>
						<select class="form-select form-select-lg" aria-label="Default select example" name="id_user">
							<option></option>
							<?php
							include "../config/koneksi.php";
							$query = mysqli_query($koneksi, "SELECT * FROM tbl_user") or die(mysqli_error($koneksi));
							while ($data = mysqli_fetch_array($query)) {
								echo "<option value=$data[id]>$data[nama] </option>";
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="inputEmail4" class="form-label">Tanggal </label>
						<input type="Date" class="form-control form-control-lg" name="tgl">
					</div>
				</div>
				<div class="col-auto">
					<br>
					<div class="container">
						<button type="submit" name="tambah" class="btn btn-primary btn-lg">Tambah</button>
					</div>
				</div>
				<?php
				include "../config/koneksi.php";
				if (isset($_POST['tambah'])) {
					mysqli_query($koneksi, "INSERT INTO tbl_event set
					nama = '$_POST[judulevent]',
					subtitle = '$_POST[subtitle]',
					id_user ='$_POST[id_user]',
					id_jenis_event ='$_POST[id_event]',
					tgl_event = '$_POST[tgl]'	
					");
					echo "<div class='container pt-5'> 
					<a href='../index.php'>
							<div class='alert alert-success' role='alert'>
								<strong>Berhasil Menambah Data</strong> 
								Kembali ke list event untuk melihat data yang baru di tambahkan
							</div>
							</a>
						</div>";
				}		
				// Mendapatkan ID event yang baru saja dimasukkan
				$id_event = mysqli_insert_id($koneksi); 

				// Buat link berdasarkan ID event
				$link_event = "http://localhost/event/user/detil.php?id=$id_event";

				// Update kolom link_event di tabel tbl_event
				$updateLinkQuery = "UPDATE tbl_event SET link = '$link_event' WHERE id = $id_event";
				mysqli_query($koneksi, $updateLinkQuery);
				
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


// require '../phpailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';



// include "../config/koneksi.php";
// if (isset($_POST['tambah'])) {
//     // Insert data event
//     mysqli_query($koneksi, "INSERT INTO tbl_event SET
//         nama = '$_POST[judulevent]',
//         subtitle = '$_POST[subtitle]',
//         id_user ='$_POST[id_user]',
//         id_jenis_event ='$_POST[id_event]',
//         tgl_event = '$_POST[tgl]'
//     ");

//     // Mendapatkan ID event yang baru saja dimasukkan
//     $id_event = mysqli_insert_id($koneksi);

//     // Buat link berdasarkan ID event
//     $link_event = "http://localhost/event/detil.php?id=$id_event";

//     // Update kolom link_event di tabel tbl_event
//     $updateLinkQuery = "UPDATE tbl_event SET link = '$link_event' WHERE id = $id_event";
//     mysqli_query($koneksi, $updateLinkQuery);

//     // Mengambil informasi untuk mengirim email

//     date_default_timezone_set("asia/jakarta");
//     $tanggalSaatIni = date("Y-m-d");

//     $sql = "SELECT
//         e.id id_event, u.id id_user, e.nama nama_event, u.nama nama_user, j.id id_jenis_event, j.nama jenis_event, u.id id_user,
//         e.tgl_event tgl_event, e.subtitle subtitle_event, e.link link_event, u.foto foto_user, u.jabatan jabatan_user
//         FROM tbl_event e
//         JOIN tbl_user u ON e.id_user=u.id
//         JOIN tbl_jenis_event j ON e.id_jenis_event=j.id 
//         WHERE e.id = $id_event";

//     $result = mysqli_query($koneksi, $sql);

//     while ($row = mysqli_fetch_array($result)) {
//         $ide = $row['id_jenis_event'];
//         $id_user = $row['id_user'];
//         $tanggal = $row['tgl_event'];
//         $judul = $row['nama_event'];
//         $subjudul = $row['subtitle_event'];
//         $nama = $row['nama_user'];
//         $foto = $row['foto_user'];
//         $jabatan = $row['jabatan_user'];
//         $link = $row['link_event'];
//     }

//     // Pemeriksaan apakah query menghasilkan hasil
//     if ($tanggal) {
//         echo "tanggal acara dari database : $tanggal<br>";
//         echo "tanggal saat ini: $tanggalSaatIni<br>";
//         if ($tanggal == $tanggalSaatIni) {
        
//             // set gambar berdasrkan id_event
//             $imageData = array(
//               1 => 'ultah.jpg',
//               2 => 'karyawan baru.jpg',
//               3 => 'resign.jpg',
//               4 => 'rip.jpg',
//               5 => 'born.jpg');
//             function getImagePathById($id, $imageData) {
//                return isset($imageData[$id]) ? $imageData[$id] : null;
//              }
//         $idEvent = $ide;
//         $gambar = getImagePathById($idEvent, $imageData);
        
//         $bgColor = array(
//             1 => '#ABB1CF',
//             2 => '#d9ddda',
//             3 => '#D6BD9F',
//             4 => '#571513',
//             5 => '#CFB596');
//             function getColorPathById($id, $bgColor) {
//               return isset($bgColor[$id]) ? $bgColor[$id] : null;
//             }
//         $idColor = $ide;
//         $color = getColorPathById($idColor, $bgColor);
//             $MsgHTML = '<html>
//             <head>
//                 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
//             </head>
//             <body>
//                 <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
//                     <tbody>
//                     <tr style="vertical-align: top">
//                       <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">          
//                   <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
//                     <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
//                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
            
            
//                       <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:7px;font-family:sans-serif;" align="left">
                          
//                   <table width="100%" cellpadding="0" cellspacing="0" border="0">
//                     <tr>
//                       <td style="padding-right: 0px;padding-left: 0px;" align="center">
//                         <a href="https://jakartamrt.co.id" target="_blank">
//                         </a>                 <img align="center" border="0" src="cid:logo" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 26%;max-width: 152.36px;" width="152.36"/>  
        
//                       </td>
//                     </tr>
//                   </table>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
            
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 0px 5px;font-family:sans-serif;" align="left">
                          
//                   <table width="100%" cellpadding="0" cellspacing="0" border="0">
//                     <tr>
//                       <td style="padding-right: 0px;padding-left: 0px;" align="center">
//                          <img align="center" border="0" src="cid:header" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 600px;" width="600"/>  
//                         </a>
//                       </td>
//                     </tr>
//                   </table>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
            
            
            
            
//                   <div class="u-row-container" style="padding: 0px 10px;background-3: transparent">
//                     <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: '.$color.';">
//                       <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
            
//                         <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
//                             <div style="height: 100%;width: 100% !important;">
//                             <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
            
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:16px 20px 8px;font-family:sans-serif;" align="left">
                          
//                     <div style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: center; word-wrap: break-word;">
//                        <p style="font-size: 14px; line-height: 120%;"><span style="color: #236fa1; line-height: 16.8px;"><strong><span style="font-size: 48px; line-height: 57.6px; font-family: Raleway, sans-serif;">'.$judul.'</span></strong></span></p>  
//                     </div>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
            
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:sans-serif;" align="left">
                          
//                     <div style="font-size: 14px; color: #ffffff; line-xx`height: 130%; text-align: center; word-wrap: break-word;">
//                        <p style="font-size: 14px; line-height: 130%;"><span style="font-size: 16px; line-height: 20.8px; color: #000000;">'.$judul.'</span></p>  
//                     </div>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
                  
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:22px 0px 0px;font-family:sans-serif;" align="left">
                          
//                   <table width="100%" cellpadding="0" cellspacing="0" border="0">
//                     <tr>
//                       <td style="padding-right: 0px;padding-left: 0px;" align="center">
                        
//                          <img align="center" border="0" src="cid:foto" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 53%;max-width: 318px;" width="318"/>  
                        
//                       </td>
//                     </tr>
//                   </table>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
                  
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px 0px;font-family:sans-serif;" align="left">
                          
//                     <div style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: center; word-wrap: break-word;">
//                        <p style="font-size: 14px; line-height: 120%;"><span style="color: #236fa1; line-height: 16.8px;"><strong><span style="font-size: 30px; line-height: 36px;">'.$nama.'</span></strong></span></p>  
//                     </div>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
                  
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 20px 10px;font-family:sans-serif;" align="left">
                          
//                     <div style="font-size: 14px; color: #e34c1e; line-height: 130%; text-align: center; word-wrap: break-word;">
//                        <p style="line-height: 130%;"><strong><span style="font-size: 14px; line-height: 18.2px; color: #3598db;">'.$jabatan.'</span></strong></p>  
                   
//                     </div>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
                  
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px 0px;font-family:sans-serif;" align="left">
                          
//                     <div style="font-size: 14px; color: #ffffff; line-height: 100%; text-align: center; word-wrap: break-word;">
//                        <p style="font-size: 14px; line-height: 100%;"><span style="font-size: 16px; line-height: 16px; color: #000000;">'.$subjudul.'</span></p>  
//                     </div>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
            
//                   <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                     <tbody>
//                       <tr>
//                         <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px 25px;font-family:sans-serif;" align="left">
                          
//                   <div align="center">
//                       <a href="'.$link.'" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFF; background-color: #2dc26b; border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;border-top-width: 0px; border-top-style: solid; border-left-width: 0px; border-left-style: solid; border-right-width: 0px; border-right-style: solid; border-bottom-width: 0px; border-bottom-style: solid;font-size: 14px;">
//                         <span style="display:block;padding:13px 22px;line-height:120%;"><span style="font-size: 24px; line-height: 28.8px;">click me</span></span>
//                       </a>
//                   </div>
                  
//                         </td>
//                       </tr>
//                     </tbody>
//                   </table>
            
            
//                    </div>
//                  </div>
//                 </div>
            
//                 </div>
//             </div>
//             </div>
            
            
            
//                     <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
//                         <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
//                           <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
            
//                       <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
//                         <div style="background-color: #f3f3f3;height: 100%;width: 100% !important;">
//                           <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                        
//                       <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
//                         <tbody>
//                           <tr>
//                             <td style="overflow-wrap:break-word;word-break:break-word;padding:20px;font-family:sans-serif;" align="left">
                              
//                         <div style="font-size: 14px; color: #9c9c9c; line-height: 160%; text-align: center; word-wrap: break-word;">
//                           <p style="font-size: 14px; line-height: 160%;">We hope you have the happiest of birthdays!</p>
//                       <p style="font-size: 14px; line-height: 160%;"> </p>
//                       <p style="line-height: 160%; font-size: 14px;">Here’s to you,</p>
//                       <p style="line-height: 160%; font-size: 14px;">The Your Company Team</p>
//                         </div>
                      
//                             </td>
//                           </tr>
//                         </tbody>
//                       </table>
                    
//                     </div>
//                         </div>
//                       </div>
//                           </div>
//                         </div>
//                         </div>
            
            
//                     </div>
//                 </div>
//                 </div>
                
//                   </td>
//                 </tr>
//                 </tbody>
//                 </table>
//             </body>
//             </html>';;
        
//             $queryEmails = "SELECT email FROM tbl_user";
//             $resultEmails = mysqli_query($koneksi, $queryEmails);
        
//             // Simpan alamat email dalam array  
//             $emails = array();
//             while ($rowEmails = mysqli_fetch_assoc($resultEmails)) {
//             $emails[] = $rowEmails['email'];
//             } 
//             $mail = new PHPMailer(true);
        
//               function sendEventEmail($emails, $mail, $MsgHTML, $foto, $ide, $gambar)
//               {
//                 $mail->SMTPDebug  = 2;                                      //Enable verbose debug output
//                 $mail->isSMTP();                                            //Send using SMTP
//                 $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
//                 $mail->SMTPAuth   =  true;                                  //Enable SMTP    authentication
//                 $mail->Username   = 'muhammadandi140705@gmail.com';         //SMTP username
//                 $mail->Password   = 'gvzqyfwbvtsojwob';                     //SMTP password
//                 $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
//                 $mail->Port = 587;
//                 $mail ->SMTPDebug;
//                   // Loop untuk mengirim email ke setiap alamat
//                     foreach ($emails as $email) {
//                        // Set email penerima
//                   $mail->clearAddresses();
//                   $mail->addAddress($email);
        
//                   // Content
//                   $mail->isHTML(true);
//                   $mail->AltBody = '';
//                   $mail->Subject = 'Event Notification';
//                   $mail->Body = "$MsgHTML";
        
                  
        
//                   //embed image untuk logo
//                   $image = 'img/bg/logo-mrt.png';
//                   $mail->addEmbeddedImage($image, 'logo', $foto);                          
//                   //embed image untuk foto
//                   $image = 'img/poto_profil/'.$foto.'';
//                   $mail->addEmbeddedImage($image, 'foto', $foto);                          
                  
//                   //embed image untuk background
//                   $header = 'img/bg/'.$gambar.'';
//                   $mail->addEmbeddedImage($header, 'header', $ide); 
//                         // Kirim email
//                         $mail->send();
//                     }
//                   }
           
//         try {
//             // ... (kode email dan pengiriman seperti sebelumnya)

//             // Panggil fungsi sendEventEmail
//             sendEventEmail($emails, $mail, $MsgHTML, $foto, $ide, $gambar);

//             // Perbarui status email menjadi 'Sudah Dikirim' setelah berhasil dikirim
//             $UpdateStatusQuery = "UPDATE tbl_event SET status_email = 'Sudah Dikirim' WHERE id = $id_event";

//             if (mysqli_query($koneksi, $UpdateStatusQuery)) {
//                 echo "Status email berhasil diupdate";
//             } else {
//                 echo "Error updating status: " . mysqli_error($koneksi);
//             }

//             echo 'Email berhasil dikirim';
//         } catch (Exception $e) {
//             echo "Email gagal terkirim. Mailer Error: {$mail->ErrorInfo}";
//         }
//     } else {
//         // Tanggal acara tidak sesuai dengan tanggal saat ini, tidak ada tindakan atau berikan umpan balik sesuai kebutuhan
//         echo "Hari ini bukan tanggal acara, tidak ada email yang dikirim.";
//     }
// }
// }
				?>
		</main>
	</form>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>
</body>

</html>