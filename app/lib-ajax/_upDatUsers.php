<?php 
require_once '../init.php';
$id = $_POST['id'];
$username = $_POST['user'];
$nip = $_POST['nip'];
$level = $_POST['level'];
$Users->_upDatUsers($username, $nip, $level, $id);
echo "Data pengguna berhasil di update!";
?>