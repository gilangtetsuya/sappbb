<?php 
require_once '../init.php';

$rows = $Users->_getAllDataUsers();

$output = array(
    "data" => array()
);

$no = 1;

foreach ($rows as $row) {
    if ($row['U_LEVEL'] == 0) {
        $level = "Administrator";
    } elseif ($row['U_LEVEL'] == 1) {
        $level = "Zona 1";
    } elseif ($row['U_LEVEL'] == 2) {
        $level = "Zona 2";
    } elseif ($row['U_LEVEL'] == 3) {
        $level = "Zona 3";
    } elseif ($row['U_LEVEL'] == 4) {
        $level = "Zona 4";
    } elseif ($row['U_LEVEL'] == 5) {
        $level = "Pelayanan";
    } else {
        $level = "";
    }
    if ($row['STATUS'] == 'e') {
        $status = '<a href="javascript:void(0)" class="btn btn-sm btn-success _stat" data-id="'.$row['ID'].'" data-status="e">Aktif</a>';
    } else {
        $status = '<a href="javascript:void(0)" class="btn btn-sm btn-danger _stat" data-id="'.$row['ID'].'" data-status="d">Nonaktif</a>';
    }
    $data = array(
        $no++,
        $row['USERNAME'],
        $row['NIP'],
        $level,
        $status,
        '<a href="javascript:void(0)" class="btn btn-sm btn-primary getdatusers" data-toggle="modal" data-target="#myModal" data-id="'.$row['ID'].'"><i class="fa fa-edit"></i></a>',
        '<a href="javascript:void(0)" class="btn btn-sm btn-danger delUsers" data-id="'.$row['ID'].'"><i class="fa fa-trash"></i></a>'
    );
    $output['data'][] = $data;
} 

echo json_encode($output);
?>