function caridata() {
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
    let idAlumni = urlParams.get("id");  // Mengambil parameter id, bukan nim

    let urltarget = "http://localhost/pertemuan14/server/alumnyid.php";
    let dta = `id=${idAlumni}`;

    $.ajax({
        url: urltarget,
        type: 'GET',
        dataType: 'json',
        data: dta,
        success: function(dt) {
            if(dt.error === '0') {
                $("#txID").val(dt["isi"]["id_alumni"]);
                $("#txNAMA_LENGKAP").val(dt["isi"]["nama_lengkap"]);
                $("#txTGL").val(dt["isi"]["tanggal_lahir"]);
                $("#txALAMAT").val(dt["isi"]["alamat"]);
                $("#txPRODI").val(dt["isi"]["program_studi"]);
                $("#txTELP").val(dt["isi"]["no_telepon"]);

                // Set pilihan jenis kelamin sesuai nilai
                let jkVal = dt["isi"]["jenis_kelamin"];
                if (jkVal === "Laki-laki") {
                    $("#txJK").val("Laki-laki");
                } else if (jkVal === "Perempuan") {
                    $("#txJK").val("Perempuan");
                } else {
                    $("#txJK").prop("selectedIndex", 0);
                }
            } else {
                $("#gagal").show();
            }
        },
        error: function() {
            $("#gagal").show();
        }
    });
}
