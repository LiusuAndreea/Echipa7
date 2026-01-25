<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "proiect_bucatarie"; 


$conexiune = mysqli_connect($host, $user, $pass);


if (!$conexiune) {
    die("Eroare critică: Nu mă pot conecta la serverul MySQL. " . mysqli_connect_error());
}


if (!mysqli_select_db($conexiune, $db)) {
   
    die("<div style='padding:20px; border:2px solid red; background:#fff0f0; color:red; font-family:sans-serif;'>
            <strong>Eroare Bază de Date!</strong><br>
            Baza de date <code>$db</code> nu a fost găsită în phpMyAdmin.<br><br>
            <strong>Soluție:</strong> Te rugăm să imporți fișierul <code>proiect_bucatarie.sql</code> (cel urcat de Denisa) în phpMyAdmin.
         </div>");
}


mysqli_set_charset($conexiune, "utf8mb4");
?>