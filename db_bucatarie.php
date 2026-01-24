<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "proiect_bucatarie";

$conexiune = mysqli_connect($host, $user, $pass, $db);


if (!$conexiune) {
    die("Conexiune eșuată: " . mysqli_connect_error());
}
?>