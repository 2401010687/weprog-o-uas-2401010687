<?php
    include_once("konfigurasi.php");
    $dta["error"] = '1';

    if (
        isset($_POST["txNIM"]) &&
        isset($_POST["txNAMA"]) &&
        isset($_POST["txTGL"]) &&
        isset($_POST["txJK"]) &&
        isset($_POST["txPRODI"]) &&
        isset($_POST["txTELP"]) &&
        isset($_POST["txALAMAT"])
    ) {
        $dta["error"] = '2';

        $nim    = $_POST["txNIM"];
        $nama   = $_POST["txNAMA"];
        $tgl    = $_POST["txTGL"];
        $jk     = $_POST["txJK"];
        $prodi  = $_POST["txPRODI"];
        $telp   = $_POST["txTELP"];
        $alamat = $_POST["txALAMAT"];

        $sql = "UPDATE alumni SET 
                    nama_lengkap = '$nama',
                    tanggal_lahir = '$tgl',
                    jenis_kelamin = '$jk',
                    program_studi = '$prodi',
                    no_telepon = '$telp',
                    alamat = '$alamat'
                WHERE Nim_alumni = '$nim';";

        $hasil = mysqli_query($koneksi, $sql);
        $jAfrow = mysqli_affected_rows($koneksi);

        if ($jAfrow > 0) {
            $dta["error"] = '0';
        }

        mysqli_close($koneksi);
    }

    header("Content-type: application/json");
    echo json_encode($dta);
?>
