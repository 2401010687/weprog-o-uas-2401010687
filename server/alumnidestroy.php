<?php
include_once("konfigurasi.php");

$dta = ["error" => 1,];

if (isset($_POST["txID"])) {
    // Ambil dan escape data untuk keamanan
    $id = mysqli_real_escape_string($koneksi, $_POST["txID"]);

    // Query hapus data alumni berdasarkan id_alumni
    $sql = "DELETE FROM alumni WHERE id_alumni = '$id'";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil) {
        if (mysqli_affected_rows($koneksi) > 0) {
            $dta["error"] = 0;  // Berhasil hapus
            $dta["message"] = "Data berhasil dihapus";
        } else {
            $dta["message"] = "Data dengan ID tersebut tidak ditemukan.";
        }
    } else {
        $dta["message"] = "Kesalahan query: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);

header("Content-Type: application/json; charset=utf-8");
echo json_encode($dta);
?>
