<?php

$hostname = $_ENV['MYSQLHOST'];
$username = $_ENV['MYSQLUSER'];
$password = $_ENV['MYSQLPASSWORD'];
$dbname   = $_ENV['MYSQLDATABASE'];

$conn = mysqli_connect(
    $hostname,
    $username,
    $password,
    $dbname
) or die('Gagal terhubung ke database');

?>