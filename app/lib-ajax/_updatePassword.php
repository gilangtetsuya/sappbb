<?php 
require_once '../init.php';
$newpass = password_hash($_GET['newpass'], PASSWORD_DEFAULT);
$oldpass = $_GET['oldpass'];
$user = $Users->_getDataUsersById($_SESSION['user_sap']);
if (password_verify($oldpass, $user['PASSWORD'])) {
    $Users->_changePass($newpass, $_SESSION['user_sap']);
    $res = "Password berhasil di ubah!";
} else {
    $res = "Password lama yang anda masukkan salah!";
}

echo $res;
?>