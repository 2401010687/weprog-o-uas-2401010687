<?php
    include_once("konfigurasi.php");
    global $koneksi;

    $sql = "SELECT Nim_alumni, nama_lengkap, alamat, tanggal_lahir, jenis_kelamin, program_studi, no_telepon FROM alumni;";
    $ps = mysqli_query($koneksi, $sql);

    $h = []; // inisialisasi array hasil

    while ($res = mysqli_fetch_assoc($ps)) {
        $h[] = array(
            "Nim_alumni"     => $res["Nim_alumni"],
            "nama_lengkap"   => $res["nama_lengkap"],
            "alamat"         => $res["alamat"],
            "tanggal_lahir"  => $res["tanggal_lahir"],
            "jenis_kelamin"  => $res["jenis_kelamin"],
            "program_studi"  => $res["program_studi"],
            "no_telepon"     => $res["no_telepon"]
        );
    }

    header("Content-type: application/json");
    echo json_encode($h);
?>
