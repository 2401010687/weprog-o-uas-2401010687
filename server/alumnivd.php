<?php
global $koneksi;
include_once("koneksi.php");

// Query ambil data alumni, pastikan nama tabel sesuai di database kamu
$sql = "SELECT id_alumni, nama_lengkap, alamat, tanggal_lahir, jenis_kelamin, program_studi, no_telepon FROM alumni;";

$ps = mysqli_query($koneksi, $sql);

$h = []; 
if ($ps) {
    while ($res = mysqli_fetch_assoc($ps)) {
        $h[] = array(
            "id_alumni"     => $res["id_alumni"],
            "nama_lengkap"  => $res["nama_lengkap"],
            "alamat"        => $res["alamat"],
            "tanggal_lahir" => $res["tanggal_lahir"],
            "jenis_kelamin" => $res["jenis_kelamin"],
            "program_studi" => $res["program_studi"],
            "no_telepon"    => $res["no_telepon"]
        );
    }
} 
header("Content-type: application/json");
echo json_encode($h);
?>
