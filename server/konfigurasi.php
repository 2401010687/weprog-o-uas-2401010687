<?php
    // Konstanta konfigurasi database
    define("DBHOST", "localhost");
    define("DBUSERNAME", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "dt_alumi"); // diganti dari 'mahasiswa' menjadi 'alumni'
    define("DBPORT", "3306");

    // Koneksi ke database
    global $koneksi;
    $koneksi = mysqli_connect(DBHOST, DBUSERNAME, DBPASSWORD, DBNAME, DBPORT);

    // Cek koneksi
    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
?>
