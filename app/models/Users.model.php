<?php 
// Get users objek
class Users {
    private $db;
    public function __construct( $link ) {
        $this->db = $link;
    }
    // insert data pengguna
    public function _insertDataUsers( $username, $password, $nip, $level, $status ) {
        $options = [
            "cost" => 12,    
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $time = date('d-m-Y');
        // instace query
        $query = $this->db->prepare("INSERT INTO pst_pengguna (id, username, password, nip, u_level, status, created) VALUES(user_id.nextval, :user, :pass, :nip, :level, :stat, :create)");
        $query->bindParam(':user', $username);
        $query->bindParam(':pass', $password);
        $query->bindParam(':nip', $nip);
        $query->bindParam(':level', $level);
        $query->bindParam(':stat', $status);
        $query->bindParam(':create', $time);
        // execute query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!");
        }
    }
    // cek users exists 
    public function _usersExists( $username ) {
        // instance query
        $query = $this->db->prepare("SELECT COUNT(*) FROM pst_pengguna WHERE username = :name");
        $query->bindParam(':name', $username);
        // execute query
        try {
            $query->execute();
            $row = $query->fetchColumn();
            if ($row == 0) {
                return true;
            } else {
                return false;
            }
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!");
        }
    }
}