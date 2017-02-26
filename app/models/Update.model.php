<?php 
// Update data objek
class Update {
    private $db;
    public function __construct($link) {
        $this->db = $link;
    }
    // update no urut pst
    public function _updateNourutPst ($nourut) {
        // instance query 
        $query = $this->db->prepare("UPDATE max_urut_pst SET no_urut_pelayanan = :urut");
        $query->bindParam(':urut', $nourut);
        // execute query
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("INTERNAL ERROR CONNECTION"); 
        }
    }
    // update bundel pst
    public function _updateBundelPst ($bundel) {
        // instance query
        $query = $this->db->prepare("UPDATE max_urut_pst SET bundel_pelayanan = :bundel");
        $query->bindParam(':bundel', $bundel);
        // execute query
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("INTERNAL ERROR CONNECTION"); 
        }
    }
    // update tahun pst
    public function _updateTahunPst ($tahun) {
        // instance query 
        $query = $this->db->prepare("UPDATE max_urut_pst SET thn_pelayanan = :thn");
        $query->bindParam(':thn', $tahun);
        // execute query
        try {
           $query->execute(); 
        } catch (PDOException $e) {
           die("INTERNAL ERROR CONNECTION"); 
        }
    }
}