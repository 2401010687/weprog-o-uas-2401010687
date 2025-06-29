function caridata() {
    let params = new URLSearchParams(window.location.search);
    let id_alumni = params.get("id_alumni");  // Sesuaikan nama param URL, misal "id_alumni"

    let urltarget = "server/alumnibyalumniid.php"; // Ganti ke API yang sesuai untuk data alumni
    let dta = `id_alumni=${encodeURIComponent(id_alumni)}`;

    $.ajax({
        url: urltarget,
        type: 'GET',
        dataType: 'json',
        data: dta,
        success: function(dt) {
            if (dt.error === 0 && dt.isi) {
                $("#txID").val(dt.isi.id_alumni);
                $("#txNAMA_LENGKAP").val(dt.isi.nama_lengkap);
                $("#txTGL").val(dt.isi.tanggal_lahir);
                $("#txJK").val(dt.isi.jenis_kelamin);
                $("#txPRODI").val(dt.isi.program_studi);
                $("#txTELP").val(dt.isi.no_telepon);
                $("#txALAMAT").val(dt.isi.alamat);
            } else {
                $("#gagal").show().text("Data alumni tidak ditemukan.");
            }
        },
        error: function() {
            $("#gagal").show().text("Gagal mengambil data dari server.");
        }
    });
}
