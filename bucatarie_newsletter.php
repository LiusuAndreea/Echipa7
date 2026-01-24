<?php
include "db_bucatarie.php";

if (isset($_POST['submit_news'])) {

    $nume = mysqli_real_escape_string($conexiune, $_POST['nume_abonat']);
    $email = mysqli_real_escape_string($conexiune, $_POST['email_abonat']);

    $sql = "INSERT INTO newsletter (nume, email) VALUES ('$nume', '$email')";

    if (mysqli_query($conexiune, $sql)) {
        echo "<script>alert('Te-ai abonat cu succes la noutățile din Rio!'); window.location.href='bucatarie.php';</script>";
    } else {
        echo "Eroare la abonare: " . mysqli_error($conexiune);
    }
}
?>