<?php

$host ="localhost";
$user ="root";
$pass ="";
$bd ="tcc_final";

$mysqli = new mysqli($host,$user,$pass,$bd);
mysqli_set_charset($mysqli, "utf8mb4");

if ($mysqli->connect_error) {
    echo "Connect faliled" . $mysqli->connect_error;
    exit();
}

?>