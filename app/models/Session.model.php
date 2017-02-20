<?php 
// Create session users
class Session {
    // instance session 
    function _loggedId() {
        return (isset($_SESSION['user_sap']) && !empty($_SESSION['user_sap'])) ? true : false;
    }
    
    public function _loginProtect() {
        if ($this->_loggedId() === false) {
            echo '<script>alert("Maaf, silahkan login untuk masuk ke menu utama!");document.location="../"</script>';
            exit();
        }
    }

    public function _logoutProtect() {
        if ($this->_loggedId() === false) {
            header("Location: views/");
            exit();
        } 
    }
}