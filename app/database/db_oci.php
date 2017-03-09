<?php 
// set options connection to database

$config = array(
    'username' => 'pbb',
    'password' => 'pbb',
    'tnsname'  => '127.0.0.1:1521/simpbb'
);

try {
    // instance connection
    $link = new PDO("oci:dbname=" . $config['tnsname'], $config['username'], $config['password']);
    // set error message
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ($e->getMessage());
} 

?>