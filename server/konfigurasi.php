<?php
define("DBHOST", "localhost");
define("DBUSERNAME", "root");
define("DBPASSWORD", "");
define("DBNAME", "dt_alumi");  // pastikan ini sama dengan nama database kamu
define("DBPORT", 3306);         // angka, bukan string

global $koneksi;
$koneksi = mysqli_connect(DBHOST, DBUSERNAME, DBPASSWORD, DBNAME, DBPORT);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
