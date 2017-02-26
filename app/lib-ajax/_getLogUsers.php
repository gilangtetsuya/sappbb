<?php
require_once '../init.php';
$rows = $Users->_getAllDataLogUsers();
$output = array(
    "data" => array()
);
foreach ($rows as $row) {
    $data = array(
        $row['ID'],
        $row['IP'],
        $row['BROWSER'],
        $row['TIME_LOG'],
        $row['LOG']
    );
    $output['data'][] = $data;
}
echo json_encode($output);
?>