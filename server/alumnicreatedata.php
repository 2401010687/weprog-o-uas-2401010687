<?php
include_once("konfigurasi.php");
$hsl = ["error" => 1,  ];

if (
    isset($_POST["txID"]) &&
    isset($_POST["txNAMA_LENGKAP"]) &&
    isset($_POST["txTGL"]) &&
    isset($_POST["txJK"]) &&
    isset($_POST["txPRODI"]) &&
    isset($_POST["txTELP"]) &&
    isset($_POST["txALAMAT"])
) {
    $id_alumni      = mysqli_real_escape_string($koneksi, $_POST["txID"]);
    $nama_lengkap   = mysqli_real_escape_string($koneksi, $_POST["txNAMA_LENGKAP"]);
    $tanggal_lahir  = mysqli_real_escape_string($koneksi, $_POST["txTGL"]);
    $jenis_kelamin  = mysqli_real_escape_string($koneksi, $_POST["txJK"]);
    $program_studi  = mysqli_real_escape_string($koneksi, $_POST["txPRODI"]);
    $no_telepon     = mysqli_real_escape_string($koneksi, $_POST["txTELP"]);
    $alamat         = mysqli_real_escape_string($koneksi, $_POST["txALAMAT"]);

    $sql = "UPDATE alumni SET
                nama_lengkap = '$nama_lengkap',
                tanggal_lahir = '$tanggal_lahir',
                jenis_kelamin = '$jenis_kelamin',
                program_studi = '$program_studi',
                no_telepon = '$no_telepon',
                alamat = '$alamat'
            WHERE id_alumni = '$id_alumni'";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil && mysqli_affected_rows($koneksi) > 0) {
        $hsl["error"] = 0;
        $hsl["message"] = "Data berhasil diubah";
    } else {
        $hsl["message"] = "Gagal mengubah data atau tidak ada perubahan";
    }
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($hsl);
?>
