<?php 
require_once '../app/init.php';
$Users->_logUsers($_SESSION['user_sap'], "logout ke sistem");
session_destroy();
header('location: ../');
?>