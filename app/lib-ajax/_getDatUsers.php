<?php 
require_once '../init.php';
$id = $_GET['id'];
$row = $Users->_getDataUsersById($id);

$data = array(
    "username" => $row['USERNAME'],
    "nip" => $row['NIP'],
    "level" => $row['U_LEVEL'] 
);

echo json_encode($data);
?>