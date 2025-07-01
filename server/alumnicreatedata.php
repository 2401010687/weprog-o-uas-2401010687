<?php
    include_once("konfigurasi.php");

    $hsl["error"] = 1;

    if (
        isset($_POST["txNIM"]) &&
        isset($_POST["txNAMA"]) &&
        isset($_POST["txJK"]) &&
        isset($_POST["txTGL"]) &&
        isset($_POST["txPRODI"]) &&
        isset($_POST["txTELP"]) &&
        isset($_POST["txALAMAT"])
    ) {
        $nim    = $_POST["txNIM"];
        $nama   = $_POST["txNAMA"];
        $jk     = $_POST["txJK"];
        $tgl    = $_POST["txTGL"];
        $prodi  = $_POST["txPRODI"];
        $telp   = $_POST["txTELP"];
        $alamat = $_POST["txALAMAT"];

        $sql = "INSERT INTO alumni (Nim_alumni, nama_lengkap, jenis_kelamin, tanggal_lahir, program_studi, no_telepon, alamat) 
                VALUES ('$nim', '$nama', '$jk', '$tgl', '$prodi', '$telp', '$alamat');";

        $hsl["sql"] = $sql;

        $hasil = mysqli_query($koneksi, $sql);
        $hsl["affectedrows"] = mysqli_affected_rows($koneksi);

        if ($hasil) {
            $hsl["error"] = 0;
        }
    }

    header("Content-type: application/json; charset=utf-8");
    echo json_encode($hsl);
?>
