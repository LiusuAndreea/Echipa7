<?php
$conn = new mysqli("localhost", "root", "", "rio_booking");

if ($conn->connect_error) {
    die("Eroare conexiune DB: " . $conn->connect_error);
}
?>
