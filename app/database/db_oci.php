<?php 
// set options connection to database
$config = [
    'username' => 'pbb',
    'password' => 'pbb',
    'tnsname'  => '127.0.0.1:1521/orcl'
];
// instance connection
$link = new PDO("oci:dbname=" . $config['tnsname'], $config['username'], $config['password']);
// set error message
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>