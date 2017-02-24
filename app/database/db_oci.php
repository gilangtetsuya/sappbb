<?php 
// set options connection to database
$config = [
    'username' => 'pbb',
    'password' => 'Makassar_2014',
    'tnsname'  => '192.168.10.212:1521/orcl'
];
// instance connection
$link = new PDO("oci:dbname=" . $config['tnsname'], $config['username'], $config['password']);
// set error message
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>