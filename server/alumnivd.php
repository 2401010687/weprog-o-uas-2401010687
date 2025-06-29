<?php
include_once("konfigurasi.php");

header("Content-Type: application/json; charset=utf-8");

$sql = "SELECT 
    id_alumni, 
    nama_lengkap, 
    jenis_kelamin, 
    tanggal_lahir, 
    program_studi, 
    no_telepon, 
    alamat 
FROM alumni";

$result = mysqli_query($koneksi, $sql);

if (!$result) {
    // Kirim response JSON berisi error
    echo json_encode([
        "error" => 1,
        "message" => "Query gagal: " . mysqli_error($koneksi)
    ]);
    mysqli_close($koneksi);
    exit;
}

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_free_result($result);
mysqli_close($koneksi);

// Response JSON data tanpa error
echo json_encode([
    "error" => 0,
    "data" => $data
]);
?>
