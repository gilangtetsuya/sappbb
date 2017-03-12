<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// Create session users
class Session extends Users {
    // instance session 
    function _loggedId() {
        return (isset($_SESSION['user_sap']) && !empty($_SESSION['user_sap'])) ? true : false;
    }
    
    public function _loginProtect() {
        if ($this->_loggedId() === false) {
            echo '<script>alert("Maaf, silahkan login untuk masuk ke menu utama!");document.location="../";</script>';
            exit();
        }
    }

    public function _logoutProtect() {
        if ($this->_loggedId() === true) {
            header("Location: views/");
            exit();
        } 
    }

    public function _loginLimitTime() {
        $time = time();
        $timeLimit = $_SESSION['limit_time'] + (60 * 60);
        if ($time > $timeLimit) {
            $this->_delLogSession($_SESSION['user_sap'], $_SESSION['user_time']);
            $this->_logUsers($_SESSION['user_sap'], "logout ke sistem");
            session_destroy();
            echo '<script>alert("Session anda telah berakhir, silahkan login kembali!");document.location="../";</script>';
        } else {
            $_SESSION['limit_time'] = $time;
            $this->_updateLogSession($_SESSION['user_sap'], $_SESSION['user_time']);
        }
    }

    public function _loginExists() {
        $this->_logUsers($_SESSION['user_sap'], "logout ke sistem");
        session_destroy();
        echo '<script>alert("Seseorang sedang login dengan akun ini!");document.location="../";</script>'; 
        exit();
    }
}