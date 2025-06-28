<?php
    include_once("koneksi.php");

    $dta["error"] = '1';

    if (isset($_POST["txID"])) {
        $dta["error"] = '2';
        $id = $_POST["txID"];

        $sql = "DELETE FROM alumni WHERE id_alumni='$id';";
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
