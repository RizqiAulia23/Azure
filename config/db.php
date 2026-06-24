<?php

$hostname = getenv('MYSQLHOST') ? getenv('MYSQLHOST') : '127.0.0.1';
$username = getenv('MYSQLUSER') ? getenv('MYSQLUSER') : 'root';
$password = getenv('MYSQLPASSWORD') !== false ? getenv('MYSQLPASSWORD') : '';
$dbname   = getenv('MYSQLDATABASE') ? getenv('MYSQLDATABASE') : 'azure';
$port     = getenv('MYSQLPORT') ? getenv('MYSQLPORT') : '3306';

$conn = mysqli_connect(
    $hostname,
    $username,
    $password,
    $dbname,
    (int)$port
) or die('Gagal terhubung ke database');

?>