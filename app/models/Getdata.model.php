<?php 
// Get Data Objek 
class Getdata {
    private $db;
    public function __construct($link) {
       $this->db = $link;
    }
    public function _getMaxNop ($prov, $dati2, $kec, $kel, $blok) {
       $query = $this->db->prepare("SELECT MAX(no_urut) AS maxurut FROM sppt WHERE kd_propinsi = :kd_prov AND kd_dati2 = :kd_dati2 AND kd_kecamatan = :kd_kec AND kd_kelurahan = :kd_kel AND kd_blok = :kd_blok");
       $query->bindParam(':kd_prov', $prov);
       $query->bindParam(':kd_dati2', $dati2);
       $query->bindParam(':kd_kec', $kec);
       $query->bindParam(':kd_kel', $kel);
       $query->bindParam(':kd_blok', $blok);
       // instance query
       try {
          $query->execute();
       } catch (PDOException $e) {
          die("Error message: " . $e->getMessage() . "\n");       
       }
       return $query->fetch(PDO::FETCH_ASSOC);
    }
    // cek data data njop
    public function cek_data_njop ($data) {
        $kd_prov = $data['kd_prov'];
        $kd_dati2 = $data['kd_dati2'];
        $kd_kec = $data['kd_kec'];
        $kd_kel = $data['kd_kel'];
        $kd_blok = $data['kd_blok'];
        $no_urut = $data['no_urut'];
        $kd_jns_op = $data['kd_jns_op'];
        $thn_pajak_sppt = $data['thn_pajak'];
        // instance query 
        $query = $this->db->prepare("SELECT * FROM sppt a JOIN dat_objek_pajak b ON a.kd_propinsi||a.kd_dati2||a.kd_kecamatan||a.kd_kelurahan||a.kd_blok||a.no_urut||a.kd_jns_op = b.subjek_pajak_id JOIN dat_subjek_pajak c ON b.subjek_pajak_id = c.subjek_pajak_id WHERE a.kd_propinsi = :prov AND a.kd_dati2 = :dati2 AND a.kd_kecamatan = :kec AND a.kd_kelurahan = :kel AND a.kd_blok = :blok AND a.no_urut = :urut AND a.kd_jns_op = :jns_op AND a.thn_pajak_sppt = :thn_pajak");
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':thn_pajak', $thn_pajak_sppt);
        // execute query 
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error message: " . $e->getMessage() . "\n");
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // cek data op bersama 
    public function cek_op_bersama ($data) {
        $kd_prov = $data['kd_prov'];
        $kd_dati2 = $data['kd_dati2'];
        $kd_kec = $data['kd_kec'];
        $kd_kel = $data['kd_kel'];
        $kd_blok = $data['kd_blok'];
        $no_urut = $data['no_urut'];
        $kd_jns_op = $data['kd_jns_op'];
        $thn_pajak_sppt = $data['thn_pajak'];
        // instance query 
        $query = $this->db->prepare("SELECT nvl(kd_kls_tanah,0) AS op_kls_tanah, nvl(kd_kls_bng,0) AS op_kls_bng, nvl(luas_bumi_beban_sppt,0) AS l_bumi_op, nvl(luas_bng_beban_sppt,0) AS l_bng_op, nvl(njop_bumi_beban_sppt,0) AS njop_bumi_op, nvl(njop_bng_beban_sppt,0) AS njop_bng_op FROM sppt_op_bersama WHERE kd_propinsi = :prov AND kd_dati2 = :dati2 AND kd_kecamatan = :kec AND kd_kelurahan = :kel AND kd_blok = :blok AND no_urut = :urut AND kd_jns_op = :jns_op AND thn_pajak_sppt = :thn_pajak");
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':thn_pajak', $thn_pajak_sppt);
        // execute query 
        try {
          $query->execute();
        } catch(PDOException $e) {
          die("Error message: " . $e->getMessage() . "\n");
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Cek jumlah denda 
    public function jumlah_denda ($data) {
        $kd_prov = $data['kd_prov'];
        $kd_dati2 = $data['kd_dati2'];
        $kd_kec = $data['kd_kec'];
        $kd_kel = $data['kd_kel'];
        $kd_blok = $data['kd_blok'];
        $no_urut = $data['no_urut'];
        $kd_jns_op = $data['kd_jns_op'];
        $thn_pajak_sppt = $data['thn_pajak'];
        // instance query
        $query = $this->db->prepare("SELECT nvl(sum(denda_sppt),0) AS denda, nvl(sum(jml_sppt_yg_dibayar),0) AS jml_sppt FROM pembayaran_sppt WHERE kd_propinsi = :prov AND kd_dati2 = :dati2 AND kd_kecamatan = :kec AND kd_kelurahan = :kel AND kd_blok = :blok AND no_urut = :urut AND kd_jns_op = :jns_op AND thn_pajak_sppt = :thn_pajak");
        $query->bindParam(':prov', $kd_prov);
        $query->bindParam(':dati2', $kd_dati2);
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        $query->bindParam(':blok', $kd_blok);
        $query->bindParam(':urut', $no_urut);
        $query->bindParam(':jns_op', $kd_jns_op);
        $query->bindParam(':thn_pajak', $thn_pajak_sppt);
        // execute query 
        try {
          $query->execute();
        } catch(PDOException $e) {
          die("Error message: " . $e->getMessage() . "\n");
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Get referensi jenis pelayanan
    public function _getRefPelayanan () {
        // instance query
        $query = $this->db->prepare("SELECT * FROM ref_jns_pelayanan ORDER BY kd_jns_pelayanan");
        // execute query
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("Error message: " . $e->getMessage() . "\n"); 
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get max no urut pelayanan
    public function _getMaxUrutPst () {
        // instance query 
        $query = $this->db->prepare("SELECT * FROM max_urut_pst");
        // execute query
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("Error message: " . $e->getMessage() . "\n"); 
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Get data kecamatan
    public function _getRefKecamatan ($kd_kec) {
        // instance query 
        $query = $this->db->prepare("SELECT kd_kecamatan, nm_kecamatan FROM ref_kecamatan WHERE kd_kecamatan = :kec");
        $query->bindParam(':kec', $kd_kec);
        // execute query
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("Error message: " . $e->getMessage() . "\n"); 
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Get data kelurahan
    public function _getRefKelurahan ($kd_kec, $kd_kel) {
        // instance query
        $query = $this->db->prepare("SELECT nm_kelurahan FROM ref_kelurahan WHERE kd_kecamatan = :kec AND kd_kelurahan = :kel");
        $query->bindParam(':kec', $kd_kec);
        $query->bindParam(':kel', $kd_kel);
        // execute query
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("Error message: " . $e->getMessage() . "\n"); 
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Get data seksi penerima berkas
    public function _getRefSeksiPenerima($kdSeksi) {
        // instance query
        $query = $this->db->prepare("SELECT nm_seksi FROM ref_seksi WHERE kd_seksi = :kd_seksi");
        $query->bindParam(':kd_seksi', $kdSeksi);
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("Error message: " . $e->getMessage() . "\n"); 
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    } 
    // Get data berkas masuk by zona
    public function _dataBerkasMasukByZona($startRow, $rowPerPage, $dat_zona) {
        $zona = join($dat_zona, ',');
        $query = $this->db->prepare("SELECT * FROM (SELECT a.*, rownum rnum FROM (SELECT a.thn_pelayanan, a.bundel_pelayanan, a.no_urut_pelayanan, b.nama_pemohon, b.alamat_pemohon, b.keterangan_pst, b.catatan_pst, b.status_kolektif, b.tgl_terima_dokumen_wp, b.tgl_perkiraan_selesai, b.nip_penerima, a.kd_propinsi_pemohon, a.kd_dati2_pemohon, a.kd_kecamatan_pemohon, a.kd_kelurahan_pemohon, a.kd_blok_pemohon, a.no_urut_pemohon, a.kd_jns_op_pemohon, a.kd_jns_pelayanan, a.thn_pajak_permohonan, a.status_selesai, a.kd_seksi_berkas FROM pst_detail a JOIN pst_permohonan b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.kd_jns_pelayanan IN ('01','02','03') AND a.kd_kecamatan_pemohon IN ($zona) ORDER BY a.thn_pelayanan ASC) a WHERE rownum <= :endrow) WHERE rnum >= :startrow");
        $query->bindParam(':startrow', $startRow);
        $endRow = $startRow + $rowPerPage - 1;
        $query->bindParam(':endrow', $endRow);
        // execute query
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get data berkas masuk by tanggal selesai
    public function _dataBerkasMasukByTglSelesai($dat_zona, $thn) {
        $dat_zona = join($dat_zona, ',');
        $query = $this->db->prepare("SELECT * FROM pst_permohonan a JOIN pst_detail b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.tgl_perkiraan_selesai >= current_date AND a.thn_pelayanan = :tahun AND b.kd_kecamatan_pemohon IN ($dat_zona) ORDER BY a.bundel_pelayanan ASC");
        $query->bindParam(':tahun', $thn);
        // execute query
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get data berkas masuk by nomor pelayanan 
    public function _dataBerkasByNoPelayanan($thn, $bundel, $urut) {
        $query = $this->db->prepare("SELECT * FROM pst_permohonan a JOIN pst_detail b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.thn_pelayanan = :tahun AND a.bundel_pelayanan = :bundel_p AND a.no_urut_pelayanan = :urut_p");
        $query->bindParam(':tahun', $thn);
        $query->bindParam(':bundel_p', $bundel);
        $query->bindParam(':urut_p', $urut);
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Get data lampiran berkas permohonan
    public function _getDataLampiran($no_pelayanan_pst) {
        $query = $this->db->prepare("SELECT * FROM pst_lampiran WHERE thn_pelayanan||'.'||bundel_pelayanan||'.'||no_urut_pelayanan = :no_pelayanan");
        $query->bindParam(':no_pelayanan', $no_pelayanan_pst);
        // execute query
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Get data berkas like nama pemohon
    public function _getDataBerkasByNama($nama_pemohon) {
        $query = $this->db->prepare("SELECT * FROM pst_permohonan a JOIN pst_detail b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.nama_pemohon LIKE '%$nama_pemohon%'");
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get data berkas like nomor peleyanan
    public function _getDataBerkasByNoPelayanan($thn, $bundel, $urut) {
        $query = $this->db->prepare("SELECT * FROM pst_permohonan a JOIN pst_detail b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.thn_pelayanan LIKE '$thn%' AND a.bundel_pelayanan LIKE '$bundel%' AND a.no_urut_pelayanan LIKE '$urut%'");
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get data berksa like NOP
    public function _getDataBerkasByNop($nop) {
        $query = $this->db->prepare("SELECT * FROM pst_permohonan a JOIN pst_detail b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE b.kd_propinsi_pemohon||b.kd_dati2_pemohon||b.kd_kecamatan_pemohon||b.kd_kelurahan_pemohon||b.kd_blok_pemohon||b.no_urut_pemohon||b.kd_jns_op_pemohon LIKE '%$nop%'");
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get data berkas like tanggal masuk berkas
    public function _getDataBerkasByTglMasuk($tgl1, $tgl2) {
        $query = $this->db->prepare("SELECT * FROM pst_permohonan a JOIN pst_detail b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.tgl_terima_dokumen_wp >= to_date(:tgl_1, 'DD-MM-YYYY') AND a.tgl_terima_dokumen_wp <= to_date(:tgl_2, 'DD-MM-YYYY')");
        $query->bindParam(':tgl_1', $tgl1);
        $query->bindParam(':tgl_2', $tgl2);
        try {
           $query->execute();
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get total berkas permohonan
    public function _getAllDataBerkasMasuk () {
        $query = $this->db->prepare("SELECT * FROM pst_detail a JOIN pst_permohonan b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan");
        // execute query
        try {
           $query->execute(); 
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get data berkas by status 
    public function _getDataBerkasByStatus ($status) {
        $query = $this->db->prepare("SELECT * FROM pst_detail a JOIN pst_permohonan b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.status_selesai = :stat");
        $query->bindParam(':stat', $status);
        // execute query
        try {
           $query->execute(); 
        } catch(PDOException $e) {
           die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get data berkas by bulan
    public function _getDataBerkasByBulan ($datZona, $fromDate, $toDate, $thn) {
        $zona = join($datZona, ',');
        $query = $this->db->prepare("SELECT * FROM pst_detail a JOIN pst_permohonan b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.kd_kecamatan_pemohon in ($zona) and
            b.tgl_terima_dokumen_wp >= to_date(:f_date, 'DD/MM/YYYY') and b.tgl_terima_dokumen_wp <= to_date(:t_date, 'DD/MM/YYYY') 
            and a.thn_pelayanan = :tahun");
        $query->bindParam(':f_date', $fromDate);
        $query->bindParam(':t_date', $toDate);
        $query->bindParam(':tahun', $thn);
        // instance query 
        try {
            $query->execute();
        } catch(PDOException $e) {
            die("Error connection: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>