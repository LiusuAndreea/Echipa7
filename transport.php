<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $departure = htmlspecialchars($_POST["departure"]);
    $persons = htmlspecialchars($_POST["persons"]);
    $message = htmlspecialchars($_POST["message"]);

    $timestamp = date("Y-m-d H:i:s");
    $linie = "$timestamp | $name | $email | $departure | $persons | $message" . PHP_EOL;
    file_put_contents("cereri.txt", $linie, FILE_APPEND);

 
    header("Location: transport.html?sent=1");
    exit;
}
?>
