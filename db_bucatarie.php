<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "proiect_bucatarie"; 


$conexiune = mysqli_connect($host, $user, $pass);

if (!$conexiune) {
    die("Eroare critică: Nu mă pot conecta la serverul MySQL.");
}


mysqli_select_db($conexiune, $db);

mysqli_set_charset($conexiune, "utf8mb4");
?>