<?php
include_once("konfigurasi.php");
$dta = ["error" => 1];

if (isset($_POST["txID"])) {
    $dta["error"] = 2;

    $id_alumni     = $_POST["txID"];
    $nama_lengkap  = $_POST["txNAMA_LENGKAP"];
    $tgl_lahir     = $_POST["txTGL"];
    $jenis_kelamin = $_POST["txJK"];
    $program_studi = $_POST["txPRODI"];
    $no_telepon    = $_POST["txTELP"];
    $alamat        = $_POST["txALAMAT"];

    // Pastikan data sudah divalidasi dan disanitasi dengan benar (minimal mysqli_real_escape_string)
    $id_alumni     = mysqli_real_escape_string($koneksi, $id_alumni);
    $nama_lengkap  = mysqli_real_escape_string($koneksi, $nama_lengkap);
    $tgl_lahir     = mysqli_real_escape_string($koneksi, $tgl_lahir);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $jenis_kelamin);
    $program_studi = mysqli_real_escape_string($koneksi, $program_studi);
    $no_telepon    = mysqli_real_escape_string($koneksi, $no_telepon);
    $alamat        = mysqli_real_escape_string($koneksi, $alamat);

    $sql = "UPDATE alumni SET
                nama_lengkap = '$nama_lengkap',
                tanggal_lahir = '$tgl_lahir',
                jenis_kelamin = '$jenis_kelamin',
                program_studi = '$program_studi',
                no_telepon = '$no_telepon',
                alamat = '$alamat'
            WHERE id_alumni = '$id_alumni'";

    $hasil = mysqli_query($koneksi, $sql);
    $jAfrow = mysqli_affected_rows($koneksi);

    if ($hasil && $jAfrow > 0) {
        $dta["error"] = 0;
    }

    mysqli_close($koneksi);
}

header("Content-type: application/json");
echo json_encode($dta);
