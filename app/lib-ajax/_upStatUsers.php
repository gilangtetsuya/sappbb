<?php
require_once '../init.php';
$id = $_GET['id'];
$status = $_GET['status'];
$Users->_upStatUsers($status, $id);
echo "done";
?>