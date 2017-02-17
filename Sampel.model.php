<?php 
// example objek data
class Sampel {
    private $db;
    /**
     *  Set parameter koneksi ke database 
     *  @param  
     *  $link [Set konesksi ke database]
     */
    function __construct( $link ) 
    {
        $this->db = $link;
    } 
    /**
     *  Set paramater untuk menampilkan data pada table 
     *  @param 
     *  $datZona [Data zona per kecamatan]
     *  $startRow [Row awal table untuk menampilkan data]
     *  $rowPerPage [Jumalah data yang akan di tampilkan]
     */
    public function _getDataSample( $startRow, $rowPerPage, $datZona )
    {
        $zona = join($datZona, ",");
        // instance query
        $query = $this->db->prepare("SELECT * FROM (SELECT a.*, rownum rnum FROM (SELECT a.THN_PELAYANAN, a.BUNDEL_PELAYANAN, a.NO_URUT_PELAYANAN, b.NAMA_PEMOHON, b.ALAMAT_PEMOHON, b.KETERANGAN_PST, b.CATATAN_PST,
            b.STATUS_KOLEKTIF, b.TGL_TERIMA_DOKUMEN_WP, b.TGL_PERKIRAAN_SELESAI, b.NIP_PENERIMA, a.KD_PROPINSI_PEMOHON, a.KD_DATI2_PEMOHON, 
            a.KD_KECAMATAN_PEMOHON, a.KD_KELURAHAN_PEMOHON, a.KD_BLOK_PEMOHON, a.NO_URUT_PEMOHON, a.KD_JNS_OP_PEMOHON, a.KD_JNS_PELAYANAN, 
            a.THN_PAJAK_PERMOHONAN, a.STATUS_SELESAI, a.KD_SEKSI_BERKAS
            FROM PST_DETAIL a JOIN PST_PERMOHONAN b
            ON a.THN_PELAYANAN||a.BUNDEL_PELAYANAN||a.NO_URUT_PELAYANAN = b.THN_PELAYANAN||b.BUNDEL_PELAYANAN||b.NO_URUT_PELAYANAN WHERE KD_JNS_PELAYANAN IN ('01','02','03') AND KD_KECAMATAN_PEMOHON IN ($zona) ORDER BY BUNDEL_PELAYANAN ASC) a WHERE rownum <= :endrow) WHERE rnum >= :startrow");
        $query->bindParam(':startrow', $startRow);
        $endRow = $startRow + $rowPerPage - 1;
        $query->bindParam(':endrow', $endRow);
        // execute query 
        try {
            $query->execute();
        } catch (PDOException $e) {
            die ("Error message: " . $e->getMessage() . "\n");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     *  Mengambil nilai total data dalam table
     *  dengan parameter
     */
    public function _getCountRowsWhere( $datZona ) 
    {
        $zona = join($datZona, ",");
        // instance query 
        $query = $this->db->prepare("SELECT COUNT(*) FROM pst_detail a JOIN pst_permohonan b ON a.thn_pelayanan||a.bundel_pelayanan||a.no_urut_pelayanan = b.thn_pelayanan||b.bundel_pelayanan||b.no_urut_pelayanan WHERE a.kd_jns_pelayanan IN ('01','02','03') AND a.kd_kecamatan_pemohon IN ($zona)");
        // execute query 
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die ("Error message: " . $e->getMessage() . "\n");
        }
        return $query->fetchColumn();
    } 
    /**
     * 
     */
    public function _getTotalPages( $totalRows, $rowPerPage )
    {
        if ($totalRows < 1) $totalRows = 1;
        return ceil($totalRows/$rowPerPage);
    }
    /**
     * 
     */
    public function _getPageToRow( $currentPage, $rowPerPage )
    {
        $startRow = ($currentPage - 1) * $rowPerPage + 1;
        return $startRow;
    }
    /**
     * 
     */
    public function _getPagingEl( $url, $totalPages, $currentPage ) 
    {
         if($currentPage <= 0 || $currentPage > $totalPages) {
             $currentPage = 1;
         }
 
         if($currentPage > 1) {
            printf("<li><a href='$url?page=%d'>Start</a></li> \n", 1);
            printf("<li><a href='$url?page=%d'>Prev</a></li> \n", ($currentPage-1));
         }
 
         for($i = ($currentPage-3); $i <= $currentPage+3; $i++) {
            if($i < 1) continue;
            if($i > $totalPages) break;
            if($i != $currentPage) {
               printf("<li><a href='$url?page=%1\$d'>%1\$d</a></li> \n" , $i);   
            } else {
               printf("<li class='active'><a href='$url?page=%1\$d'>%1\$d</a></li> \n",$i);
            }
         }
 
         if ($currentPage < $totalPages) {
             printf( "<li><a href='$url?page=%d'>Next</a><li> \n" , ($currentPage+1));
             printf( "<li><a href='$url?page=%d'>End</a></li> \n" , $totalPages);
         }
    }
}