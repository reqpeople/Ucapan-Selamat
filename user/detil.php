    <?php
    include("../public/style/navbar.php");

    include("../config/koneksi.php");

    $url = "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $parts = parse_url($escaped_url);
    $path_parts = explode('=', $parts['query']);
    $id_event = $path_parts[1];
    // print $id_event;


    $ambildata = mysqli_query($koneksi, "SELECT
        e.id id_event, u.id id_user, u.jabatan jabatan_user, e.nama nama_event,
        u.nama nama_user, j.nama jenis_event, u.foto foto_user,
        e.tgl_event tgl_event, e.created_at created_at_event,
        e.updated_at updated_at_event, j.bg bg_event
        FROM tbl_event e
        JOIN tbl_user u ON e.id_user = u.id
        JOIN tbl_jenis_event j ON e.id_jenis_event = j.id
        WHERE e.id = $id_event");


    $event_found = mysqli_num_rows($ambildata) > 0;

    if ($event_found) {
        $tampil = mysqli_fetch_array($ambildata);
        ?>
    <body style="background-image: url('../img/image/background/<?php echo $tampil["bg_event"]; ?>')" >
            <div class="container mt-2 mb-5">
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column bg-white col-md-8">
                        <div class="align-items-center text-center comment-top  border-bottom">
                            <br><b><?php echo $tampil["nama_event"]; ?></b></br>
                            <br>
                            <div class='profile-image-center '>
                                <img src="../admin/img/poto_profil/<?php echo $tampil["foto_user"]; ?>"
                                    class="img-fluid img-responsive rounded-circle text-center mr-2" width="30%">
                                </div></br>
                            <p><?php echo $tampil["nama_user"]; ?></p>
                            <p><?php echo $tampil["jabatan_user"]; ?></p>
                        </div>
                        <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                            <form action="komen.php" method="post" class="form-inline">
                            <div class="grid gap-2">
                                <input type="text" class="form-control p-2 g-col-6" id="kome   ntar" name="komentar"
                                    placeholder="Add comment" required>
                                <input type="hidden" class="form-control" id="id_user" name="id_user"
                                    value="<?php echo $_SESSION["session_id"] ?>">
                                <input type="hidden" class="form-control" id="id_user" name="id_user"
                                    value="<?php
                                     // error_reporting(0); 
                                    echo $_SESSION["id"] 
                                    ?>">    
                                <input type="hidden" class="form-control" id="id_event" name="id_event"
                                    value="<?php echo $id_event ?>">
                                <button type="submit" name="kirim" value="<?php $_SESSION["session_id"] ?>"
                                    id="button-addon2" class="btn btn-success btn-lg p-2 g-col-6">Comment</button>
                            </div>

                            </form>
                        </div>

                        <?php
                        $ambilkomentar = mysqli_query($koneksi, "SELECT 
                            k.id id_komentar, k.id_user id_user, k.created_at created_at,
                            k.isi_komentar isi_komentar, u.nama nama_user, u.foto foto, u.username username
                            FROM tbl_komentar k
                            JOIN tbl_user u ON k.id_user=u.id
                            WHERE k.id_event = $id_event
                            ORDER BY id_komentar DESC");

                        while ($tampilkomentar = mysqli_fetch_array($ambilkomentar)) { ?>
                            <div class='container mt-5 mb-5 p2 px-4'>
                                <div class="d-flex flex-start">
                                    <img class="rounded-circle shadow-1-strong me-3" src="../admin/img/poto_profil/<?php echo $tampilkomentar['foto']; ?>"
                                        alt="avatar" width="45" height="45" />
                                    <div class="row">
                                        <h6>
                                            <?php echo $tampilkomentar["username"] ?>
                                            <small class="text-muted ml-2">
                                                <?php echo date('l, d F y', strtotime($tampilkomentar['created_at'])); ?>
                                            </small>
                                        </h6>
                                        <p class="text">
                                            <?php echo $tampilkomentar["isi_komentar"] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </body>
    <?php
    } else {
        // Tampilkan pesan bahwa event tidak ditemukan
        echo "<p class='text-center fs-1 fw-bold'>Id Event: ".$id_event." tidak temukan </p>";

    }

    include("../public/style/footer.php");
    ?>
    </html>
    