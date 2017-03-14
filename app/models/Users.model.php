<?php 
date_default_timezone_set('Asia/Makassar');
// Get users objek
class Users {
    private $db;
    public function __construct( $link ) {
        $this->db = $link;
    }
    // insert data pengguna
    public function _insertDataUsers( $username, $password, $nip, $level, $status ) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        // instace query
        $query = $this->db->prepare("INSERT INTO pst_pengguna VALUES(user_id.nextval, :name, :pass, :u_nip, :u_level, :stat, current_date)");
        $query->bindParam(':name', $username);
        $query->bindParam(':pass', $password);
        $query->bindParam(':u_nip', $nip);
        $query->bindParam(':u_level', $level);
        $query->bindParam(':stat', $status);
        // execute query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION");
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
        $query = $this->db->prepare("SELECT * FROM pst_pengguna WHERE username NOT IN ('admin') ORDER BY id ASC");
        // execute query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERRROR CONNECTION!");
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
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
    public function _upStatUsers($status, $id) {
        $query = $this->db->prepare("UPDATE pst_pengguna SET status = :stat WHERE id = :u_id");
        $query->bindParam(':stat', $status);
        $query->bindParam(':u_id', $id);
        // execute query
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    } 
    public function _delDataUsers($id) {
        $query = $this->db->prepare("DELETE FROM pst_pengguna WHERE id = :u_id");
        $query->bindParam(':u_id', $id);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    }
    public function _upDatUsers($username, $nip, $level, $id) {
        $query = $this->db->prepare("UPDATE pst_pengguna SET username = :name, nip = :u_nip, u_level = :lvl WHERE id = :u_id");
        $query->bindParam(':name', $username);
        $query->bindParam(':u_nip', $nip);
        $query->bindParam(':lvl', $level);
        $query->bindParam(':u_id', $id);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    }
    public function _getDataUserLikeNip($nip) {
        $query = $this->db->prepare("SELECT username FROM pst_pengguna WHERE nip LIKE '%$nip%'");
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function _changePass($newpass, $id) {
        $query = $this->db->prepare("UPDATE pst_pengguna SET password = :npass WHERE id = :u_id");
        $query->bindParam(':npass', $newpass);
        $query->bindParam(':u_id', $id);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    }
    public function _addLogSession($id, $username, $timeLog) {
        $query = $this->db->prepare("INSERT INTO pst_log_session VALUES(:u_id, :name, :time, 'on')");
        $query->bindParam(':u_id', $id);
        $query->bindParam(':name', $username);
        $query->bindParam(':time', $timeLog);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    }
    public function _cekLogExists($id, $username) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM pst_log_session WHERE id = :u_id AND username = :name");
        $query->bindParam(':u_id', $id);
        $query->bindParam(':name', $username);
        try {
            $query->execute();
            $row = $query->fetchColumn();
            if ($row == 1) {
                return true;
            } else {
                return false;
            }
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    }
    public function _getDataLogSession($timeLog) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM pst_log_session WHERE time_log = :u_time");
        $query->bindParam(':u_time', $timeLog);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
        return $query;
    }
    public function _getStatusLogByName($username) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM pst_log_session WHERE username = :name");
        $query->bindParam(':name', $username);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
        return $query->fetchColumn();
    }
    public function _updateLogSession($id, $time) {
        $query = $this->db->prepare("UPDATE pst_log_session SET time_log = :u_time WHERE id = :u_id");
        $query->bindParam(':u_time', $time);
        $query->bindParam(':u_id', $id);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    }
    public function _updateLogStatus($stat, $id) {
        $query = $this->db->prepare("UPDATE pst_log_session SET status = :u_stat WHERE id = :u_id");
        $query->bindParam(':u_stat', $stat);
        $query->bindParam(':u_id', $id);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    } 
    public function _delLogByStatus($stat, $id) {
        $query = $this->db->prepare("DELETE FROM pst_log_session WHERE status = :u_stat AND id = :u_id");
        $query->bindParam(':u_stat', $stat);
        $query->bindParam(':u_id', $id);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }    
    }
    public function _delLogSession($id, $time) {
        $query = $this->db->prepare("DELETE FROM pst_log_session WHERE id = :u_id AND time_log = :u_time");
        $query->bindParam(':u_id', $id);
        $query->bindParam(':u_time', $time);
        try {
            $query->execute();
        } catch ( PDOException $e ) {
            die("INTERNAL ERROR CONNECTION!");
        }
    }
}