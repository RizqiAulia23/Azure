<?php

$hostname = getenv('MYSQLHOST');
$username = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');
$dbname   = getenv('MYSQLDATABASE');
$port     = getenv('MYSQLPORT');

$conn = mysqli_connect(
    $hostname,
    $username,
    $password,
    $dbname,
    (int)$port
) or die('Gagal terhubung ke database');

?>