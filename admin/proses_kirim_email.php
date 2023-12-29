<?php
    //ini wajib dipanggil paling atas
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //ini sesuaikan foldernya ke file 3 ini
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    // Konfigurasi koneksi ke database1                                                                                           
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_event";

    // Membuat koneksi ke database
    $conn = mysqli_connect($host, $username, $password, $database);

    $id_event = $_GET['id_event'];
    $sql = "SELECT
          e.id id_event, u.id id_user, e.nama nama_event, u.nama nama_user, j.id id_jenis_event, j.nama jenis_event,	u.id id_user,
          e.tgl_event tgl_event, e.subtitle subtitle_event, e.link link_event, u.foto foto_user, u.jabatan jabatan_user
          FROM tbl_event e
          JOIN tbl_user u ON e.id_user=u.id
          JOIN tbl_jenis_event j ON e.id_jenis_event=j.id 
          WHERE e.id = $id_event";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
      $ide = $row['id_jenis_event'];
      $id_user = $row['id_user'];
      $tanggal = $row['tgl_event'];
      $judul = $row['nama_event'];
      $subjudul = $row['subtitle_event'];
      $nama = $row['nama_user'];
      $foto = $row['foto_user'];
      $jabatan = $row['jabatan_user'];
      $link = $row['link_event'];
    }

    // set gambar berdasrkan id_event
    $imageData = array(
      1 => 'ultah.jpg',
      2 => 'karyawan baru.jpg',
      3 => 'resign.jpg',
      4 => 'rip.jpg',
      5 => 'born.jpg');
    function getImagePathById($id, $imageData) {
       return isset($imageData[$id]) ? $imageData[$id] : null;
     }
$idEvent = $ide;
$gambar = getImagePathById($idEvent, $imageData);

$bgColor = array(
    1 => '#ABB1CF',
    2 => '#d9ddda',
    3 => '#D6BD9F',
    4 => '#571513',
    5 => '#CFB596');
    function getColorPathById($id, $bgColor) {
      return isset($bgColor[$id]) ? $bgColor[$id] : null;
    }
$idColor = $ide;
$color = getColorPathById($idColor, $bgColor);
    $MsgHTML = '<html> 
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
            <tbody>
            <tr style="vertical-align: top">
              <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">          
          <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">s
              <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:7px;font-family:sans-serif;" align="left">
                  
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="padding-right: 0px;padding-left: 0px;" align="center">
                <a href="https://jakartamrt.co.id" target="_blank">
                </a>                 <img align="center" border="0" src="cid:logo" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 26%;max-width: 152.36px;" width="152.36"/>  

              </td>
            </tr>
          </table>
          
                </td>
              </tr>
            </tbody>
          </table>
    
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 0px 5px;font-family:sans-serif;" align="left">
                  
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="padding-right: 0px;padding-left: 0px;" align="center">
                 <img align="center" border="0" src="cid:header" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 600px;" width="600"/>  
                </a>
              </td>
            </tr>
          </table>
          
                </td>
              </tr>
            </tbody>
          </table>
    
    
    
    
          <div class="u-row-container" style="padding: 0px 10px;background-3: transparent">
            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: '.$color.';">
              <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
    
                <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                    <div style="height: 100%;width: 100% !important;">
                    <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
    
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:16px 20px 8px;font-family:sans-serif;" align="left">
                  
            <div style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: center; word-wrap: break-word;">
               <p style="font-size: 14px; line-height: 120%;"><span style="color: #236fa1; line-height: 16.8px;"><strong><span style="font-size: 48px; line-height: 57.6px; font-family: Raleway, sans-serif;">'.$judul.'</span></strong></span></p>  
            </div>
          
                </td>
              </tr>
            </tbody>
          </table>
    
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px;font-family:sans-serif;" align="left">
                  
            <div style="font-size: 14px; color: #ffffff; line-xx`height: 130%; text-align: center; word-wrap: break-word;">
               <p style="font-size: 14px; line-height: 130%;"><span style="font-size: 16px; line-height: 20.8px; color: #000000;">'.$judul.'</span></p>  
            </div>
          
                </td>
              </tr>
            </tbody>
          </table>
          
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:22px 0px 0px;font-family:sans-serif;" align="left">
                  
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="padding-right: 0px;padding-left: 0px;" align="center">
                
                 <img align="center" border="0" src="cid:foto" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 53%;max-width: 318px;" width="318"/>  
                
              </td>
            </tr>
          </table>
          
                </td>
              </tr>
            </tbody>
          </table>
          
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px 0px;font-family:sans-serif;" align="left">
                  
            <div style="font-size: 14px; color: #ffffff; line-height: 120%; text-align: center; word-wrap: break-word;">
               <p style="font-size: 14px; line-height: 120%;"><span style="color: #236fa1; line-height: 16.8px;"><strong><span style="font-size: 30px; line-height: 36px;">'.$nama.'</span></strong></span></p>  
            </div>
          
                </td>
              </tr>
            </tbody>
          </table>
          
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 20px 10px;font-family:sans-serif;" align="left">
                  
            <div style="font-size: 14px; color: #e34c1e; line-height: 130%; text-align: center; word-wrap: break-word;">
               <p style="line-height: 130%;"><strong><span style="font-size: 14px; line-height: 18.2px; color: #3598db;">'.$jabatan.'</span></strong></p>  
           
            </div>
          
                </td>
              </tr>
            </tbody>
          </table>
          
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px 0px;font-family:sans-serif;" align="left">
                  
            <div style="font-size: 14px; color: #ffffff; line-height: 100%; text-align: center; word-wrap: break-word;">
               <p style="font-size: 14px; line-height: 100%;"><span style="font-size: 16px; line-height: 16px; color: #000000;">'.$subjudul.'</span></p>  
            </div>
          
                </td>
              </tr>
            </tbody>
          </table>
    
          <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px 25px;font-family:sans-serif;" align="left">
                  
          <div align="center">
              <a href="'.$link.'" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFF; background-color: #2dc26b; border-radius: 10px;-webkit-border-radius: 10px; -moz-border-radius: 10px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;border-top-width: 0px; border-top-style: solid; border-left-width: 0px; border-left-style: solid; border-right-width: 0px; border-right-style: solid; border-bottom-width: 0px; border-bottom-style: solid;font-size: 14px;">
                <span style="display:block;padding:13px 22px;line-height:120%;"><span style="font-size: 24px; line-height: 28.8px;">click me</span></span>
              </a>
          </div>
          
                </td>
              </tr>
            </tbody>
          </table>
    
    
           </div>
         </div>
        </div>
    
        </div>
    </div>
    </div>
    
    
    
            <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                  <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
    
              <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: #f3f3f3;height: 100%;width: 100% !important;">
                  <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                
              <table style="font-family:sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                <tbody>
                  <tr>
                    <td style="overflow-wrap:break-word;word-break:break-word;padding:20px;font-family:sans-serif;" align="left">
                      
                <div style="font-size: 14px; color: #9c9c9c; line-height: 160%; text-align: center; word-wrap: break-word;">
                  <p style="font-size: 14px; line-height: 160%;">We hope you have the happiest of birthdays!</p>
              <p style="font-size: 14px; line-height: 160%;"> </p>
              <p style="line-height: 160%; font-size: 14px;">Here’s to you,</p>
              <p style="line-height: 160%; font-size: 14px;">The Your Company Team</p>
                </div>
              
                    </td>
                  </tr>
                </tbody>
              </table>
            
            </div>
                </div>
              </div>
                  </div>
                </div>
                </div>
    
    
            </div>
        </div>
        </div>
        
          </td>
        </tr>
        </tbody>
        </table>
    </body>
    </html>';

    $queryEmails = "SELECT email FROM tbl_user";
    $resultEmails = mysqli_query($conn, $queryEmails);

    // Simpan alamat email dalam array  
    $emails = array();
    while ($rowEmails = mysqli_fetch_assoc($resultEmails)) {
    $emails[] = $rowEmails['email'];
    }

    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug  = 2;                                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
      $mail->SMTPAuth   =  true;                                  //Enable SMTP    authentication
      $mail->Username   = 'muhammadandi140705@gmail.com';         //SMTP username
      $mail->Password   = 'gvzqyfwbvtsojwob';                     //SMTP password
      $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
      $mail->Port = 587;                                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        // Loop untuk mengirim email ke setiap alamat
        foreach ($emails as $email) {
          // Set email penerima
          $mail->clearAddresses();
          $mail->addAddress($email);

          // Content
          $mail->isHTML(true);
          $mail->AltBody = '';
          $mail->Subject = 'Event Notification';
          $mail->Body = "$MsgHTML";


          //embed image untuk logo
          $image = 'img/bg/logo-mrt.png';
          $mail->addEmbeddedImage($image, 'logo', $foto);                          
          
          //embed image untuk foto
          $image = 'img/poto_profil/'.$foto.'';
          $mail->addEmbeddedImage($image, 'foto', $foto);                          
          
          //embed image untuk background
          $header = 'img/bg/'.$gambar.'';
          $mail->addEmbeddedImage($header, 'header', $ide);  
         
          // Kirim email
          $mail->send();
      }

      $id_event = $_GET['id_event'];
      $UpdateStatusQuery = "UPDATE tbl_event SET status_email = 'Sudah Dikirim' WHERE id = $id_event";
      
      if(mysqli_query($conn,$UpdateStatusQuery)){
        echo"Status email berhasil di update";
      }else{
        echo "Error updating status: ".mysqli_error($conn);
      }

      echo 'Email berhasil di kirim ';
  } catch (Exception $e) {
      echo "Email gagal terkirim. Mailer Error: {$mail->ErrorInfo}";
  }

  // Redirect ke halaman index.php
  echo "<script>alert('Email berhasil terkirim!');window.location='index.php';</script>";

?>