<?php

include "db_bucatarie.php";


if (isset($_POST['submit_news'])) {
    
    
    $nume = mysqli_real_escape_string($conexiune, $_POST['nume_abonat']);
    $email = mysqli_real_escape_string($conexiune, $_POST['email_abonat']);

    
    $sql = "INSERT INTO proiect_bucatarie.newsletter (nume, email) VALUES ('$nume', '$email')";

    
    if (mysqli_query($conexiune, $sql)) {
        
        echo "<script>
                alert('Te-ai abonat cu succes, $nume! Vei primi cele mai noi noutăți din Rio.'); 
                window.location.href='bucatarie.php';
              </script>";
    } else {
        
        echo "Eroare la înregistrare: " . mysqli_error($conexiune);
    }

    
    mysqli_close($conexiune);

} else {
    
    header("Location: bucatarie.php");
    exit();
}
?>