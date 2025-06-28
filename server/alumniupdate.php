<?php
    include_once("koneksi.php");
    $dta["error"] = '1';

    if (
        isset($_POST["txID"]) &&
        isset($_POST["txNAMA_LENGKAP"]) &&
        isset($_POST["txALAMAT"]) &&
        isset($_POST["txTGL"]) &&
        isset($_POST["txJK"]) &&
        isset($_POST["txPRODI"]) &&
        isset($_POST["txTELP"])
    ) {
        $id = $_POST["txID"];
        $nama = $_POST["txNAMA_LENGKAP"];
        $alamat = $_POST["txALAMAT"];
        $tgl = $_POST["txTGL"];
        $jk = $_POST["txJK"];
        $prodi = $_POST["txPRODI"];
        $telp = $_POST["txTELP"];

        $sql = "UPDATE alumni SET 
                    nama_lengkap = '$nama',
                    alamat = '$alamat',
                    tanggal_lahir = '$tgl',
                    jenis_kelamin = '$jk',
                    program_studi = '$prodi',
                    no_telepon = '$telp'
                WHERE id_alumni = '$id';";

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
