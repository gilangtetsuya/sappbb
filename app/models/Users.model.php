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
    // cek users status 
    public function _cekStatus( $username ) {
        $query = $this->db->prepare("SELECT status FROM pst_pengguna WHERE username = :name");
        $query->bindParam(':name', $username);
        // execute query
        try {
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $status = $data['STATUS'];
            if ($status == 'd') {
                return true;
            } else {
                return false;
            }
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!");
        }
    }
    // cek login users 
    public function _cekLogin( $username, $password ) {
        // instance query
        $query = $this->db->prepare("SELECT id, password FROM pst_pengguna WHERE username = :name");
        $query->bindParam(':name', $username);
        // execute query
        try {
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $pass = $data['PASSWORD'];
            $myid = $data['ID'];
            if (password_verify($password, $pass)) {
                return $myid;
            } else {
                return false;
            }
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!");
        }
    }
    // insert data log users
    public function _logUsers( $id, $log ) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $time = date('d-m-Y h:i:s');
        // instance query
        $query = $this->db->prepare("INSERT INTO pst_log_pengguna VALUES(:id, :ip, :browser, :log_time, :log)");
        $query->bindParam(':id', $id);
        $query->bindParam(':ip', $ip);
        $query->bindParam(':browser', $browser);
        $query->bindParam(':log_time', $time);
        $query->bindParam(':log', $log);
        // execute query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!");
        }
    }
    // get data users by id
    public function _getDataUsersById( $id ) {
        $query = $this->db->prepare("SELECT * FROM pst_pengguna WHERE id = :u_id");
        $query->bindParam(':u_id', $id);
        // execute query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!"); 
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // get all data users 
    public function _getAllDataUsers() {
        $query = $this->db->prepare("SELECT * FROM pst_pengguna ORDER BY id ASC");
        // execute query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!");
        }
        return $query->fetchAll(PDO::FETCH_BOTH);
    } 
    // get all data log users
    public function _getAllDataLogUsers() {
        $query = $this->db->prepare("SELECT * FROM pst_log_pengguna");
        // instance query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}