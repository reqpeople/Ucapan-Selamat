        <?php
        // Konfigurasi koneksi ke database
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "crud";

        // Membuat koneksi ke database
        $conn = mysqli_connect($host, $username, $password, $database);

        // Memeriksa koneksi
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        if (isset($_GET['id'])) {
            $id_laporan = $_GET['id'];

            // Menghapus data pengaduan dari database berdasarkan ID
            $sql = "DELETE FROM list WHERE id_laporan = '$id_laporan'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("location: list_event.php");
            } else {
                echo "Terjadi kesalahan dalam menghapus data pengaduan: " . mysqli_error($conn);
            }
        } else {
            echo "ID pengaduan tidak ditemukan.";
        }

        // Menutup koneksi database
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>