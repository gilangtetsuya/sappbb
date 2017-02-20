<?php 
require_once '../init.php';

$username = addslashes(strip_tags(trim($_POST['user'])));
$password = addslashes(strip_tags(trim($_POST['pass'])));

$login = $Users->_cekLogin($username, $password);

if ($login) {
   
}

?>