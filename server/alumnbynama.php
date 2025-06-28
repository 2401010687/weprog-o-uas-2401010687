<?php
    include_once("koneksi.php");
    $dta["error"] = '1';

    if (isset($_GET["id"])) {
        $dta["error"] = '2';
        $id = $_GET["id"];

        $sql = "SELECT * FROM alumi WHERE id_alumni='$id';";
        $hasil = mysqli_query($koneksi, $sql);
        $jAfrow = mysqli_num_rows($hasil);

        if ($jAfrow > 0) {
            $h = mysqli_fetch_assoc($hasil);
            $dta["isi"] = [
                'id_alumni'      => $h["id_alumni"],
                'nama_lengkap'   => $h["nama_lengkap"],
                'tanggal_lahir'  => $h["tanggal_lahir"],
                'jenis_kelamin'  => $h["jenis_kelamin"],
                'program_studi'  => $h["program_studi"],
                'no_telepon'     => $h["no_telepon"],
                'alamat'         => $h["alamat"]
            ];
            $dta["error"] = '0';
        }

        mysqli_close($koneksi);
    }

    header("Content-type: application/json");
    echo json_encode($dta);
?>
