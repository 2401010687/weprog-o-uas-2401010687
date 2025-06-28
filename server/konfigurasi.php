<?php
// Konfigurasi koneksi database
define("DBHOST", "localhost");
define("DBUSERNAME", "root");
define("DBPASSWORD", "");
define("DBNAME", "alumni"); // Pastikan database ini memuat tabel `alumni`
define("DBPORT", "3306");

// Membuat koneksi
$koneksi = mysqli_connect(DBHOST, DBUSERNAME, DBPASSWORD, DBNAME, DBPORT);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
