<?php
include_once("koneksi.php");

$hsl["error"] = 1;

if (
    isset($_POST["txNAMA_LENGKAP"]) &&
    isset($_POST["txTGL"]) &&
    isset($_POST["txJK"]) &&
    isset($_POST["txPRODI"]) &&
    isset($_POST["txTELP"]) &&
    isset($_POST["txALAMAT"])
) {
    $NAMA_LENGKAP = mysqli_real_escape_string($koneksi, $_POST["txNAMA_LENGKAP"]);
    $TGL = mysqli_real_escape_string($koneksi, $_POST["txTGL"]);
    $JK = mysqli_real_escape_string($koneksi, $_POST["txJK"]);
    $PRODI = mysqli_real_escape_string($koneksi, $_POST["txPRODI"]);
    $TELP = mysqli_real_escape_string($koneksi, $_POST["txTELP"]);
    $ALAMAT = mysqli_real_escape_string($koneksi, $_POST["txALAMAT"]);

    $sql = "INSERT INTO alumni (nama_lengkap, tanggal_lahir, jenis_kelamin, program_studi, no_telepon, alamat)
            VALUES ('$NAMA_LENGKAP', '$TGL', '$JK', '$PRODI', '$TELP', '$ALAMAT');";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil) {
        $hsl["error"] = 0;
    } else {
        $hsl["error"] = 1;
        $hsl["mysqli_error"] = mysqli_error($koneksi);
    }
} else {
    $hsl["error"] = 1;
    $hsl["message"] = "Data POST tidak lengkap";
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($hsl);
?>
