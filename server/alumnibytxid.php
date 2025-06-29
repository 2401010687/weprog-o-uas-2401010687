<?php
include_once("konfigurasi.php");
$dta = ["error" => 1];

if (isset($_GET["id_alumni"])) {
    $id = $_GET["id_alumni"];

    $sql = "SELECT * FROM alumni WHERE id_alumni = '$id';";
    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $h = mysqli_fetch_assoc($hasil);
        $dta["isi"] = [
            "ID_ALUMNI"     => $h["id_alumni"],
            "NAMA_LENGKAP"  => $h["nama_lengkap"],
            "TGL_LAHIR"     => $h["tanggal_lahir"],
            "JENIS_KELAMIN" => $h["jenis_kelamin"],
            "PROGRAM_STUDI" => $h["program_studi"],
            "NO_TELEPON"    => $h["no_telepon"],
            "ALAMAT"        => $h["alamat"],
        ];
        $dta["error"] = 0;
    }
    mysqli_close($koneksi);
}

header("Content-Type: application/json");
echo json_encode($dta);
?>
