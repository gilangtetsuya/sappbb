<?php 
// Insert data objek
class Insert {
    private $db;
    public function __construct($link) {
        $this->db = $link;
    }
    // insert to table pst_permohonan
    public function _isiPstPermohonan ($data) {
        $thn_pelayanan = $data['thn_pelayanan'];
        $bundel_pelayanan = $data['bundel_pelayanan'];
        $no_urut_pelayanan = $data['no_urut_pelayanan'];
        $no_srt_permohonan = $data['no_srt_permohonan'];
        $tgl_srt_permohonan = $data['tgl_srt_permohonan'];
        $nama_wp = $data['nm_wp'];
        $letak_op = $data['letak_op'];
        $ket_pst = $data['ket_pst'];
        $cat_pst = $data['cat_pst'];
        $status_kolektif = $data['stat_kol'];
        $tgl_terima_dok = $data['tgl_terima_dok'];
        $tgl_selesai_dok = $data['tgl_selesai_dok'];
        $nip_penerima = $data['nip_penerima'];
         if ($status_kolektif == '' || $status_kolektif == null) {
            $status_kolektif = "";
         }
        // instance query 
        $query = $this->db->prepare("INSERT INTO pst_permohonan (
                                     kd_kanwil,
                                     kd_kantor,
                                     thn_pelayanan,
                                     bundel_pelayanan,
                                     no_urut_pelayanan,
                                     no_srt_permohonan,
                                     tgl_surat_permohonan,
                                     nama_pemohon,
                                     alamat_pemohon,
                                     keterangan_pst,
                                     catatan_pst,
                                     status_kolektif,
                                     tgl_terima_dokumen_wp,
                                     tgl_perkiraan_selesai,
                                     nip_penerima) VALUES(
                                     '01',
                                     '01',
                                     :thn_p,
                                     :bundel_p,
                                     :no_urut_p,
                                     :no_srt_p,
                                     to_date(:tgl_srt_p, 'DD/MM/YYYY'),
                                     :nm_wp,
                                     :letak_wp,
                                     :ket_p,
                                     :cat_p,
                                     :stat_kol,
                                     to_date(:tgl_terima, 'DD/MM/YYYY'),
                                     to_date(:tgl_selesai, 'DD/MM/YYYY'),
                                     :nip_p)");
        $query->bindParam(':thn_p', $thn_pelayanan);
        $query->bindParam(':bundel_p', $bundel_pelayanan);
        $query->bindParam(':no_urut_p', $no_urut_pelayanan);
        $query->bindParam(':no_srt_p', $no_srt_permohonan);
        $query->bindParam(':tgl_srt_p', $tgl_srt_permohonan);
        $query->bindParam(':nm_wp', $nama_wp);
        $query->bindParam(':letak_wp', $letak_op);
        $query->bindParam(':ket_p', $ket_pst);
        $query->bindParam(':cat_p', $cat_pst);
        $query->bindParam(':stat_kol', $status_kolektif);
        $query->bindParam(':tgl_terima', $tgl_terima_dok);
        $query->bindParam(':tgl_selesai', $tgl_selesai_dok);
        $query->bindParam(':nip_p', $nip_penerima);
        // execute query
        try {
            $query->execute();
        } catch (PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
    }
    // insert to table pst_lampiran
    public function _isiPstLampiran ($data) {
        $thn_pelayanan = $data['thn_pelayanan'];
        $bundel_pelayanan = $data['bundel_pelayanan'];
        $no_urut_pelayanan = $data['no_urut_pelayanan'];
        $l_permohonan = $data['l_permohonan'];
        $l_surat_kuasa = $data['l_surat_kuasa'];
        $l_ktp_wp = $data['l_ktp_wp'];
        $l_sertifikat_tanah = $data['l_sertifikat_tanah'];
        $l_sppt = $data['l_sppt'];
        $l_imb = $data['l_imb'];
        $l_akte_jual_beli = $data['l_akte_jual_beli'];
        $l_sk_pensiun = $data['l_sk_pensiun'];
        $l_sppt_stts = $data['l_sppt_stts'];
        $l_stts = $data['l_stts'];
        $l_sk_pengurangan = $data['l_sk_pengurangan'];
        $l_sk_keberatan = $data['l_sk_keberatan'];
        $l_skkp_pbb = $data['l_skkp_pbb'];
        $l_spmkp_pbb = $data['l_spmkp_pbb'];
        $l_lain_lain = $data['l_lain_lain'];
        $l_sket_tanah = $data['l_sket_tanah'];
        $l_sket_lurah = $data['l_sket_lurah'];
        $l_npwpd = $data['l_npwpd'];
        $l_penghasilan = $data['l_penghasilan'];
        $l_cagar = $data['l_cagar'];
        // instance query
        $query = $this->db->prepare("INSERT INTO pst_lampiran (
                                     kd_kanwil,
                                     kd_kantor,
                                     thn_pelayanan,
                                     bundel_pelayanan,
                                     no_urut_pelayanan,
                                     l_permohonan,
                                     l_surat_kuasa,
                                     l_ktp_wp,
                                     l_sertifikat_tanah,
                                     l_sppt,
                                     l_imb,
                                     l_akte_jual_beli,
                                     l_sk_pensiun,
                                     l_sppt_stts,
                                     l_stts,
                                     l_sk_pengurangan,
                                     l_sk_keberatan,
                                     l_skkp_pbb,
                                     l_spmkp_pbb,
                                     l_lain_lain,
                                     l_sket_tanah,
                                     l_sket_lurah,
                                     l_npwpd,
                                     l_penghasilan,
                                     l_cagar) VALUES (
                                     '01',
                                     '01',
                                     :thn_p,
                                     :bundel_p,
                                     :no_urut_p,
                                     nvl(:l_per, 0),
                                     nvl(:l_sur_k, 0),
                                     nvl(:l_ktp, 0),
                                     nvl(:l_s_t, 0),
                                     nvl(:l_s, 0),
                                     nvl(:l_i, 0),
                                     nvl(:l_a_j_b, 0),
                                     nvl(:l_s_p, 0),
                                     nvl(:l_s_s, 0),
                                     nvl(:l_ss, 0),
                                     nvl(:l_sk_p, 0),
                                     nvl(:l_sk_k, 0),
                                     nvl(:l_sk_pbb, 0),
                                     nvl(:l_sp_pbb, 0),
                                     nvl(:l_l_l, 0),
                                     nvl(:l_sket, 0),
                                     nvl(:l_skel, 0),
                                     nvl(:l_n, 0),
                                     nvl(:l_peng, 0),
                                     nvl(:l_cag, 0))"); 
        $query->bindParam(':thn_p', $thn_pelayanan);
        $query->bindParam(':bundel_p', $bundel_pelayanan);
        $query->bindParam(':no_urut_p', $no_urut_pelayanan);
        $query->bindParam(':l_per', $l_permohonan);
        $query->bindParam(':l_sur_k', $l_surat_kuasa);
        $query->bindParam(':l_ktp', $l_ktp_wp);
        $query->bindParam(':l_s_t', $l_sertifikat_tanah);
        $query->bindParam(':l_s', $l_sppt);
        $query->bindParam(':l_i', $l_imb);
        $query->bindParam(':l_a_j_b', $l_akte_jual_beli);
        $query->bindParam(':l_s_p', $l_sk_pensiun);
        $query->bindParam(':l_s_s', $l_sppt_stts);
        $query->bindParam(':l_ss', $l_stts);
        $query->bindParam(':l_sk_p', $l_sk_pengurangan);
        $query->bindParam(':l_sk_k', $l_sk_keberatan);
        $query->bindParam(':l_sk_pbb', $l_skkp_pbb);
        $query->bindParam(':l_sp_pbb', $l_spmkp_pbb);
        $query->bindParam(':l_l_l', $l_lain_lain);
        $query->bindParam(':l_sket', $l_sket_tanah);
        $query->bindParam(':l_skel', $l_sket_lurah);
        $query->bindParam(':l_n', $l_npwpd);
        $query->bindParam(':l_peng', $l_penghasilan);
        $query->bindParam(':l_cag', $l_cagar);
        // execute query
        try {
            $query->execute();
        } catch (PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
    }
    // insert to table pst_detail
    public function _isiPstDetail ($data) {
        $thn_pelayanan = $data['thn_pelayanan'];
        $bundel_pelayanan = $data['bundel_pelayanan'];
        $no_urut_pelayanan = $data['no_urut_pelayanan'];
        $kd_prov = $data['kd_prov'];
        $kd_dati2 = $data['kd_dati2'];
        $kd_kec = $data['kd_kec'];
        $kd_kel = $data['kd_kel'];
        $kd_blok = $data['kd_blok'];
        $no_urut = $data['no_urut'];
        $kd_jns_op = $data['kd_jns_op'];
        $kd_jns_pelayanan = $data['kd_jns_pelayanan'];
        $thn_pajak = $data['thn_pajak'];
        if ($thn_pajak > $thn_pelayanan) {
            $status_selesai = 2;
        } else {
            $status_selesai = 0;
        }
        // instance query
        $query = $this->db->prepare("INSERT INTO pst_detail (
                                     kd_kanwil,
                                     kd_kantor,
                                     thn_pelayanan,
                                     bundel_pelayanan,
                                     no_urut_pelayanan,
                                     kd_propinsi_pemohon,
                                     kd_dati2_pemohon,
                                     kd_kecamatan_pemohon,
                                     kd_kelurahan_pemohon,
                                     kd_blok_pemohon,
                                     no_urut_pemohon,
                                     kd_jns_op_pemohon,
                                     kd_jns_pelayanan,
                                     thn_pajak_permohonan,
                                     status_selesai,
                                     tgl_selesai,
                                     kd_seksi_berkas) VALUES (
                                     '01',
                                     '01',
                                     :thn_p,
                                     :bundel_p,
                                     :no_urut_p,
                                     :prov,
                                     :dati2,
                                     :kec,
                                     :kel,
                                     :blok,
                                     :urut,
                                     :jns_op,
                                     :jns_pelayanan,
                                     :thn_pajak_p,
                                     :stat_selesai,
                                     to_date(to_char(SYSDATE,'DD/MM/YYYY'),'DD/MM/YYYY'),
                                     '40')");
        $query->bindParam(':thn_p', $thn_pelayanan);
        $query->bindParam(':bundel_p', $bundel_pelayanan);
        $query->bindParam(':no_urut_p', $no_urut_pelayanan);
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':jns_pelayanan', $kd_jns_pelayanan);
        $query->bindParam(':thn_pajak_p', $thn_pajak);
        $query->bindParam(':stat_selesai', $status_selesai);
        // execute query 
        try {
            $query->execute();
        } catch (PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
    }
    // insert to table pst_data_op_baru
    public function _isiPstDataOpBaru ($data) {
        $thn_pelayanan = $data['thn_pelayanan'];
        $bundel_pelayanan = $data['bundel_pelayanan'];
        $no_urut_pelayanan = $data['no_urut_pelayanan'];
        $kd_prov = $data['kd_prov'];
        $kd_dati2 = $data['kd_dati2'];
        $kd_kec = $data['kd_kec'];
        $kd_kel = $data['kd_kel'];
        $kd_blok = $data['kd_blok'];
        $no_urut = $data['no_urut'];
        $kd_jns_op = $data['kd_jns_op'];
        $nama_wp = $data['nm_wp'];
        $letak_op = $data['letak_op'];
        if ($nama_wp == '') {
            $nama_wp = 'WAJIB PAJAK';
        } 
        if ($letak_op == '') {
            $letak_op = 'LETAK WAJIB PAJAK';
        }
        // instance query 
        $query = $this->db->prepare("INSERT INTO pst_data_op_baru (
                                     kd_kanwil,
                                     kd_kantor,
                                     thn_pelayanan,
                                     bundel_pelayanan,
                                     no_urut_pelayanan,
                                     kd_propinsi_pemohon,
                                     kd_dati2_pemohon,
                                     kd_kecamatan_pemohon,
                                     kd_kelurahan_pemohon,
                                     kd_blok_pemohon,
                                     no_urut_pemohon,
                                     kd_jns_op_pemohon,
                                     nama_wp_baru,
                                     letak_op_baru) VALUES(
                                     '01',
                                     '01',
                                     :thn_p,
                                     :bundel_p,
                                     :no_urut_p,
                                     :prov,
                                     :dati2,
                                     :kec,
                                     :kel,
                                     :blok,
                                     :urut,
                                     :jns_op,
                                     :nm_wp,
                                     :letak_wp)");
        $query->bindParam(':thn_p', $thn_pelayanan);
        $query->bindParam(':bundel_p', $bundel_pelayanan);
        $query->bindParam(':no_urut_p', $no_urut_pelayanan);
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':nm_wp', $nama_wp);
        $query->bindParam(':letak_wp', $letak_op);
        // execute query
        try {
            $query->execute();
        } catch (PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
    }
    // insert to table pst_permohonan_pengurangan
    public function _isiPstPermohonanPengurangan ($data) {
        $thn_pelayanan = $data['thn_pelayanan'];
        $bundel_pelayanan = $data['bundel_pelayanan'];
        $no_urut_pelayanan = $data['no_urut_pelayanan'];
        $kd_prov = $data['kd_prov'];
        $kd_dati2 = $data['kd_dati2'];
        $kd_kec = $data['kd_kec'];
        $kd_kel = $data['kd_kel'];
        $kd_blok = $data['kd_blok'];
        $no_urut = $data['no_urut'];
        $kd_jns_op = $data['kd_jns_op'];
        $p_jns_pengurangan = $data['jns_pengurangan'];
        $p_pct_pengurangan = $data['pct_permohonan_pengurangan'];
         if ($p_jns_pengurangan == '') {
            $p_jns_pengurangan = '2';
         }
         if ($p_pct_pengurangan == '') {
            $p_pct_pengurangan = '75';
         } 
        // instnce query 
        $query = $this->db->prepare("INSERT INTO pst_permohonan_pengurangan (
                                     kd_kanwil,
                                     kd_kantor,
                                     thn_pelayanan,
                                     bundel_pelayanan,
                                     no_urut_pelayanan,
                                     kd_propinsi_pemohon,
                                     kd_dati2_pemohon,
                                     kd_kecamatan_pemohon,
                                     kd_kelurahan_pemohon,
                                     kd_blok_pemohon,
                                     no_urut_pemohon,
                                     kd_jns_op_pemohon,
                                     jns_pengurangan,
                                     pct_permohonan_pengurangan) VALUES(
                                     '01',
                                     '01',
                                     :thn_p,
                                     :bundel_p,
                                     :no_urut_p,
                                     :prov,
                                     :dati2,
                                     :kec,
                                     :kel,
                                     :blok,
                                     :urut,
                                     :jns_op,
                                     :j_pengurangan,
                                     :pct_pengurangan)");
        $query->bindParam(':thn_p', $thn_pelayanan);
        $query->bindParam(':bundel_p', $bundel_pelayanan);
        $query->bindParam(':no_urut_p', $no_urut_pelayanan);
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':j_pengurangan', $p_jns_pengurangan);
        $query->bindParam(':pct_pengurangan', $p_pct_pengurangan);
        // execute query
        try {
            $query->execute();
        } catch (PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
    }
    // select data objek pajak for insert to table temp_data_op
    public function select_data_objek_pajak($kd_prov, $kd_dati2, $kd_kec, $kd_kel, $kd_blok, $no_urut, $kd_jns_op) {
        // instance query 
        $query = $this->db->prepare("SELECT jalan_op,
                                            blok_kav_no_op,
                                            rw_op,
                                            rt_op,
                                            subjek_pajak_id
                                     FROM dat_objek_pajak WHERE 
                                     kd_propinsi = :prov AND
                                     kd_dati2 = :dati2 AND
                                     kd_kecamatan = :kec AND
                                     kd_kelurahan = :kel AND
                                     kd_blok = :blok AND
                                     no_urut = :urut AND
                                     kd_jns_op = :jns_op");
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        // execute query 
        try {
            $query->execute();
        } catch (PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // select data from sppt for insert to table temp_data_op
    public function select_data_sppt($kd_prov, $kd_dati2, $kd_kec, $kd_kel, $kd_blok, $no_urut, $kd_jns_op, $thn_pajak) {
        // instance query 
        $query = $this->db->prepare("SELECT 
                                      siklus_sppt,
                                      nm_wp_sppt,
                                      jln_wp_sppt,
                                      blok_kav_no_wp_sppt,
                                      rw_wp_sppt,
                                      rt_wp_sppt,
                                      kelurahan_wp_sppt,
                                      kota_wp_sppt,
                                      kd_pos_wp_sppt,
                                      npwp_sppt,
                                      kd_kls_tanah,
                                      thn_awal_kls_tanah,
                                      kd_kls_bng,
                                      thn_awal_kls_bng,
                                      luas_bumi_sppt,
                                      luas_bng_sppt,
                                      njop_bumi_sppt,
                                      njop_bng_sppt,
                                      njop_sppt,
                                      njoptkp_sppt,
                                      pbb_terhutang_sppt,
                                      faktor_pengurang_sppt,
                                      pbb_yg_harus_dibayar_sppt,
                                      tgl_jatuh_tempo_sppt
                                     FROM sppt WHERE 
                                      kd_propinsi = :prov AND
                                      kd_dati2 = :dati2 AND
                                      kd_kecamatan = :kec AND
                                      kd_kelurahan = :kel AND
                                      kd_blok = :blok AND
                                      no_urut = :urut AND
                                      kd_jns_op = :jns_op AND
                                      thn_pajak_sppt = :thn_pajak_p");
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':thn_pajak_p', $thn_pajak);
        // execute query
        try {
            $query->execute();
        } catch (PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetch(PDO::FETCH_ASSOC); 
    }
    // Insert data to temp data op
    public function _isiTempDataOp ($data) { 
        $thn_pelayanan = $data['thn_pelayanan'];
        $bundel_pelayanan = $data['bundel_pelayanan'];
        $no_urut_pelayanan = $data['no_urut_pelayanan'];
        $kd_prov = $data['kd_prov'];
        $kd_dati2 = $data['kd_dati2'];
        $kd_kec = $data['kd_kec'];
        $kd_kel = $data['kd_kel'];
        $kd_blok = $data['kd_blok'];
        $no_urut = $data['no_urut'];
        $kd_jns_op = $data['kd_jns_op'];
        $thn_pajak = $data['thn_pajak'];
        $kd_jns_pelayanan = $data['kd_jns_pelayanan'];
        $denda = '0';
        if ($kd_jns_pelayanan == '03'):
            $tmp_jns_data = '1';
         elseif($kd_jns_pelayanan == '04'): 
            $tmp_jns_data = '3';
         elseif($kd_jns_pelayanan == '06'): 
            $tmp_jns_data = '0';
         elseif($kd_jns_pelayanan == '07'): 
            $tmp_jns_data = '0';
         elseif($kd_jns_pelayanan == '08'): 
            $tmp_jns_data = '2';
         elseif($kd_jns_pelayanan == '10'): 
            $tmp_jns_data = '2';
         elseif($kd_jns_pelayanan == '14'):
            $tmp_jns_data = '0';
        endif;
        // mengambil data dari table dat_objek_pajak
        $dat_obj_pajak = $this->select_data_objek_pajak($kd_prov, $kd_dati2, $kd_kec, $kd_kel, $kd_blok, $no_urut, $kd_jns_op);
        $v_jln_op = $dat_obj_pajak['JALAN_OP'];
        $v_blok_kav_no_op = $dat_obj_pajak['BLOK_KAV_NO_OP'];
        $v_rw_op = $dat_obj_pajak['RW_OP'];
        $v_rt_op = $dat_obj_pajak['RT_OP'];
        $v_subjek_pajak_id = $dat_obj_pajak['SUBJEK_PAJAK_ID'];
        // mengambil data dari table sppt
        $sppt = $this->select_data_sppt($kd_prov, $kd_dati2, $kd_kec, $kd_kel, $kd_blok, $no_urut, $kd_jns_op, $thn_pajak);
        $v_siklus_sppt = $sppt['SIKLUS_SPPT'];
        $v_nm_wp_sppt = $sppt['NM_WP_SPPT'];
        $v_jln_wp_sppt = $sppt['JLN_WP_SPPT'];
        $v_blok_kav_no_wp_sppt = $sppt['BLOK_KAV_NO_WP_SPPT'];
        $v_rw_wp_sppt = $sppt['RW_WP_SPPT'];
        $v_rt_wp_sppt = $sppt['RT_WP_SPPT'];
        $v_kel_wp_sppt = $sppt['KELURAHAN_WP_SPPT'];
        $v_kota_wp_sppt = $sppt['KOTA_WP_SPPT'];
        $v_kd_pos_wp_sppt = $sppt['KD_POS_WP_SPPT'];
        $v_npwp_sppt = $sppt['NPWP_SPPT'];
        $v_kd_kls_tanah = $sppt['KD_KLS_TANAH'];
        $v_thn_awal_kls_tanah = $sppt['THN_AWAL_KLS_TANAH'];
        $v_kd_kls_bng = $sppt['KD_KLS_BNG'];
        $v_thn_awal_kls_bng = $sppt['THN_AWAL_KSL_BNG'];
        $v_luas_bumi_sppt = $sppt['LUAS_BUMI_SPPT'];
        $v_luas_bng_sppt = $sppt['LUAS_BNG_SPPT'];
        $v_njop_bumi_sppt = $sppt['NJOP_BUMI_SPPT'];
        $v_njop_bng_sppt = $sppt['NJOP_BNG_SPPT'];
        $v_njop_sppt = $sppt['NJOP_SPPT'];
        $v_njoptkp_sppt = $sppt['NJOPTKP_SPPT'];
        $v_pbb_terhutang_sppt = $sppt['PBB_TERHUTANG_SPPT'];
        $v_faktor_pengurang_sppt = $sppt['FAKTOR_PENGURANG_SPPT'];
        $v_pbb_yg_harus_dibayar_sppt = $sppt['PBB_YG_HARUS_DIBAYAR_SPPT'];
        $v_tgl_jatuh_tempo_sppt = $sppt['TGL_JATUH_TEMPO_SPPT'];
        // instance query
        $query = $this->db->prepare("INSERT INTO TEMP_DATA_OP (KD_KANWIL, KD_KANTOR, 
   THN_PELAYANAN, BUNDEL_PELAYANAN, NO_URUT_PELAYANAN,
     KD_PROPINSI_PEMOHON, KD_DATI2_PEMOHON, KD_KECAMATAN_PEMOHON, 
     KD_KELURAHAN_PEMOHON, KD_BLOK_PEMOHON, NO_URUT_PEMOHON, 
     KD_JNS_OP_PEMOHON, TEMP_JNS_DATA, TEMP_SIKLUS_SPPT, 
     TEMP_NM_WP, TEMP_JALAN_OP, TEMP_BLOK_KAV_NO_OP, 
     TEMP_RW_OP, TEMP_RT_OP, TEMP_JALAN_WP, TEMP_BLOK_KAV_NO_WP, 
     TEMP_RW_WP, TEMP_RT_WP, TEMP_KELURAHAN_WP, TEMP_KOTA_WP, 
     TEMP_KD_POS_WP, TEMP_NPWP, TEMP_SUBJEK_PAJAK_ID, 
     KD_KLS_TANAH, THN_AWAL_KLS_TANAH, KD_KLS_BNG, 
     THN_AWAL_KLS_BNG, TEMP_LUAS_BUMI, TEMP_LUAS_BANGUNAN,
     TEMP_NJOP_BUMI, TEMP_NJOP_BANGUNAN, TEMP_NJOP, 
     TEMP_NJOPTKP, TEMP_PBB_TERHUTANG, 
     TEMP_BESAR_DENDA, TEMP_FAKTOR_PENGURANG, 
     TEMP_PBB_YG_HARUS_DIBAYAR, TEMP_TGL_JATUH_TEMPO) VALUES ('01', '01', :thn_p, :bundel_p, :no_urut_p, :prov, :dati2, :kec, :kel, :blok, :urut, :jns_op, :t_jns_data, :siklus_sppt, :nm_wp_sppt, :jalan_op, :blok_kav_no_op, :rw_op, :rt_op, :jln_wp_sppt, :blok_kav_no_wp_sppt, :rw_wp_sppt, :rt_wp_sppt, :kel_wp_sppt, :kota_wp_sppt, :kd_pos_wp_sppt, :npwp_sppt, :subjek_pajak_id, :kd_kls_tanah, :thn_awal_kls_tanah, :kd_kls_bng, :thn_awal_kls_bng, :luas_bumi_sppt, :luas_bng_sppt, :njop_bumi_sppt, :njop_bng_sppt, :njop_sppt, :njoptkp_sppt, :pbb_terhutang_sppt, :besar_denda, :faktor_pengurang_sppt, :pbb_yg_harus_dibayar_sppt, :tgl_jatuh_tempo_sppt)");
        $query->bindParam(':thn_p', $thn_pelayanan);
        $query->bindParam(':bundel_p', $bundel_pelayanan);
        $query->bindParam(':no_urut_p', $no_urut_pelayanan);
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':t_jns_data', $tmp_jns_data);
        $query->bindParam(':siklus_sppt', $v_siklus_sppt);
        $query->bindParam(':nm_wp_sppt', $v_nm_wp_sppt);
        $query->bindParam(':jalan_op', $v_jln_op);
        $query->bindParam(':blok_kav_no_op', $v_blok_kav_no_op);
        $query->bindParam(':rw_op', $v_rw_op);
        $query->bindParam(':rt_op', $v_rt_op);
        $query->bindParam(':jln_wp_sppt', $v_jln_wp_sppt);
        $query->bindParam(':blok_kav_no_wp_sppt', $v_blok_kav_no_wp_sppt);
        $query->bindParam(':rw_wp_sppt', $v_rw_wp_sppt);
        $query->bindParam(':rt_wp_sppt', $v_rt_wp_sppt);
        $query->bindParam(':kel_wp_sppt', $v_kel_wp_sppt);
        $query->bindParam(':kota_wp_sppt', $v_kota_wp_sppt);
        $query->bindParam(':kd_pos_wp_sppt', $v_kd_pos_wp_sppt);
        $query->bindParam(':npwp_sppt', $v_npwp_sppt);
        $query->bindParam(':subjek_pajak_id', $v_subjek_pajak_id);
        $query->bindParam(':kd_kls_tanah', $v_kd_kls_tanah);
        $query->bindParam(':thn_awal_kls_tanah', $v_thn_awal_kls_tanah);
        $query->bindParam(':kd_kls_bng', $v_kd_kls_bng);
        $query->bindParam(':thn_awal_kls_bng', $v_thn_awal_kls_bng);
        $query->bindParam(':luas_bumi_sppt', $v_luas_bumi_sppt);
        $query->bindParam(':luas_bng_sppt', $v_luas_bng_sppt);
        $query->bindParam(':njop_bumi_sppt', $v_njop_bumi_sppt);
        $query->bindParam(':njop_bng_sppt', $v_njop_bng_sppt);
        $query->bindParam(':njop_sppt', $v_njop_sppt);
        $query->bindParam(':njoptkp_sppt', $v_njoptkp_sppt);
        $query->bindParam(':pbb_terhutang_sppt', $v_pbb_terhutang_sppt);
        $query->bindParam(':besar_denda', $denda);
        $query->bindParam(':faktor_pengurang_sppt', $v_faktor_pengurang_sppt);
        $query->bindParam(':pbb_yg_harus_dibayar_sppt', $v_pbb_yg_harus_dibayar_sppt);
        $query->bindParam(':tgl_jatuh_tempo_sppt', $v_tgl_jatuh_tempo_sppt);
        // execute query 
        try {
            $query->execute(); 
        } catch(PDOExcpetion $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
    }
}