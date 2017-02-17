<?php 
//  Membuat objek pagination ke data tabel 
class Paginate {
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
     * Nilai total halaman data tabel
     */
    public function _getTotalPages( $totalRows, $rowPerPage )
    {
        if ($totalRows < 1) $totalRows = 1;
        return ceil($totalRows/$rowPerPage);
    }
    /**
     * Jumlah total data yang di tampilkan setiap halaman
     */
    public function _getPageToRow( $currentPage, $rowPerPage )
    {
        $startRow = ($currentPage - 1) * $rowPerPage + 1;
        return $startRow;
    }
    /**
     * Membuat elemen html pagination
     */
    public function _getPagingEl( $url, $curl, $totalPages, $currentPage ) 
    {
         if($currentPage <= 0 || $currentPage > $totalPages) {
             $currentPage = 1;
         }
 
         if($currentPage > 1) {
            printf("<li><a href='$url?$curl&page=%d'>Start</a></li> \n", 1);
            printf("<li><a href='$url?$curl&page=%d'>Prev</a></li> \n", ($currentPage-1));
         }
 
         for($i = ($currentPage-3); $i <= $currentPage+3; $i++) {
            if($i < 1) continue;
            if($i > $totalPages) break;
            if($i != $currentPage) {
               printf("<li><a href='$url?$curl&page=%1\$d'>%1\$d</a></li> \n" , $i);   
            } else {
               printf("<li class='active'><a href='$url?$curl&page=%1\$d'>%1\$d</a></li> \n",$i);
            }
         }
 
         if ($currentPage < $totalPages) {
             printf( "<li><a href='$url?$curl&page=%d'>Next</a><li> \n" , ($currentPage+1));
             printf( "<li><a href='$url?$curl&page=%d'>End</a></li> \n" , $totalPages);
         }
    } 
}