<?php
require_once '../init.php';

$username = $_POST['user'];
$password = $_POST['pass'];
$nip = $_POST['nip'];
$level = $_POST['level'];
$status = $_POST['status'];

if ($Users->_usersExists($username) === false && !empty($username)) {
    echo '<div class="alert alert-danger">Maaf username '.$username.' telah terdaftar sebelumnya!</div>';
} else {
    $Users->_insertDataUsers( $username, $password, $nip, $level, $status );
    echo '<div class="alert alert-success">Data pengguna berhasil di tambahkan!</div>';
}

?>