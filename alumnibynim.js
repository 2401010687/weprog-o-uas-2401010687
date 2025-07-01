function caridata() {
    let query = window.location.search;
    let params = new URLSearchParams(query);
    let nima = params.get("nim");

    let urltarget = "server/alumnibynim.php";
    let dta = `nim=${nima}`;

    $.ajax({
        url: urltarget,
        type: 'GET',
        dataType: 'json',
        data: dta,
        success: function(dt) {
            $("#txNIM").val(dt["isi"]["Nim_alumni"]);
            $("#txNAMA").val(dt["isi"]["nama_lengkap"]);
            $("#txTGL").val(dt["isi"]["tanggal_lahir"]);
            $("#txALAMAT").val(dt["isi"]["alamat"]);
            $("#txPRODI").val(dt["isi"]["program_studi"]);
            $("#txTELP").val(dt["isi"]["no_telepon"]);
            
            let jkel = dt["isi"]["jenis_kelamin"];
            $("#txJK").val(jkel); // langsung cocokkan value enum: "Laki-laki" atau "Perempuan"
        },
        error: function() {
            $("#gagal").show().text("Gagal memuat data.");
        }
    });
}
