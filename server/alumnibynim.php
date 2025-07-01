<?php
    include_once("konfigurasi.php");
    $dta["error"] = '1';

    if (isset($_GET["nim"])) {
        $dta["error"] = '2';
        $nim = $_GET["nim"];

        $sql = "SELECT * FROM alumni WHERE Nim_alumni='$nim';";
        $hasil = mysqli_query($koneksi, $sql);

        if ($hasil && mysqli_num_rows($hasil) > 0) {
            $h = mysqli_fetch_assoc($hasil);
            $dta["isi"] = [
                'Nim_alumni'    => $h["Nim_alumni"],
                'nama_lengkap'  => $h["nama_lengkap"],
                'alamat'        => $h["alamat"],
                'tanggal_lahir' => $h["tanggal_lahir"],
                'jenis_kelamin' => $h["jenis_kelamin"],
                'program_studi' => $h["program_studi"],
                'no_telepon'    => $h["no_telepon"]
            ];
            $dta["error"] = '0';
        }
        mysqli_close($koneksi);
    }

    header("Content-type: application/json");
    echo json_encode($dta);
?>
