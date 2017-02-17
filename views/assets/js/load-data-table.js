+ function ($) {
  
  $.ajax({
     url: "./sampel.php",
     type: "GET",
     dataType: "JSON",
     success: function (res) { 
        var no = 1;      
        $.each(res, function(key, value) {
            
        var t = $('#table-1').DataTable();
        var statusKol;
        var statusSel;
        var jnsPelayanan; 
            if (value.STATUS_KOLEKTIF == "0") {
                statusKol = "INDIVIDU";
            } 
            if (value.STATUS_KOLEKTIF == "1") {
                statusKol = "MASSAL/KOLEKTIF";
            }
            if (value.KD_JNS_PELAYANAN == "01") {
                jnsPelayanan = "pendaftaran data baru";
            }
            if (value.KD_JNS_PELAYANAN == "02") {
                jnsPelayanan = "mutasi objek/subjek";
            }
            if (value.KD_JNS_PELAYANAN == "03") {
                jnsPelayanan = "pembetulan sppt/skp/stp";
            }
            if (value.KD_JNS_PELAYANAN == "04") {
                jnsPelayanan = "pembatalan sppt/skp";
            }
            if (value.KD_JNS_PELAYANAN == "05") {
                jnsPelayanan = "salinan sppt/skp";
            }
            if (value.KD_JNS_PELAYANAN == "06") {
                jnsPelayanan = "keberatan penunjukan wajib pajak";
            }
            if (value.KD_JNS_PELAYANAN == "07") {
                jnsPelayanan = "keberatan atas pajak terhutang";
            }
            if (value.KD_JNS_PELAYANAN == "08") {
                jnsPelayanan = "pengurangan atas besarnya pajak terhutang";
            }
            if (value.KD_JNS_PELAYANAN == "09") {
                jnsPelayanan = "restitusi dan kompensasi";
            }
            if (value.KD_JNS_PELAYANAN == "10") {
                jnsPelayanan = "pengurangan denda administrasi";
            }
            if (value.KD_JNS_PELAYANAN == "11") {
                jnsPelayanan = "penentuan kembali tanggal jatuh tempo";
            }
            if (value.KD_JNS_PELAYANAN == "12") {
                jnsPelayanan = "penundaan tanggal jatuh tempo";
            }
            if (value.KD_JNS_PELAYANAN == "13") {
                jnsPelayanan = "pemberian informasi pbb";
            }
            if (value.KD_JNS_PELAYANAN == "14") {
                jnsPelayanan = "pembetulan sk keberatan";
            }
            if (value.STATUS_SELESAI == "1") {
                statusSel = "Terproses";
            } 
            if (value.STATUS_SELESAI == "0") {
                statusSel = "Tanpa keterangan";
            }

          t.row.add([
               " ",
               value.TGL_TERIMA_DOKUMEN_WP,
               " ",
               value.THN_PELAYANAN + "." + value.BUNDEL_PELAYANAN + "." + value.NO_URUT_PELAYANAN,
               " ",
               value.KD_PROPINSI_PEMOHON + "." + value.KD_DATI2_PEMOHON + "." + value.KD_KECAMATAN_PEMOHON + "." + value.KD_KELURAHAN_PEMOHON + "." + value.KD_BLOK_PEMOHON + "-" + value.NO_URUT_PEMOHON + "." + value.KD_JNS_OP_PEMOHON,
               value.NAMA_PEMOHON,
               value.ALAMAT_PEMOHON,
               '<a href="javascript:void(0)" class="btn btn-sm btn-primary"><i class="fa fa-file-text-o"></a>',
               " ",
               value.TGL_PERKIRAAN_SELESAI,
               " ",
               " ",
               value.KETERANGAN_PST,
               value.NIP_PENERIMA,
            ]).draw();
        });
     }
  });

}(jQuery);