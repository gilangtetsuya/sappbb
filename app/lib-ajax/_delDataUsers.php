<?php 
require_once '../init.php';
$id = $_GET['id'];
$Users->_delDataUsers($id);
?>