<?php
session_start();
include "db_bucatarie.php"; 

date_default_timezone_set('Europe/Bucharest');

if (isset($_POST['finalizeaza_comanda']) && !empty($_SESSION['cart'])) {
    
    $metoda = $_POST['metoda_plata'];
    $total = $_POST['total_plata'];
    $data_rezervare = date("Y-m-d H:i:s");

    
    mysqli_autocommit($conexiune, FALSE);

    $eroare = false;

    
    $metoda = mysqli_real_escape_string($conexiune, $metoda);
    $total = mysqli_real_escape_string($conexiune, $total);

    $sql = "INSERT INTO comenzi (metoda_plata, total_plata, data_comanda) 
            VALUES ('$metoda', '$total', '$data_rezervare')";
    
    $executie = mysqli_query($conexiune, $sql);

    
    if ($executie && mysqli_affected_rows($conexiune) > 0) {
        
        
        mysqli_commit($conexiune);
        
        
        $_SESSION['factura'] = [
            'id' => mysqli_insert_id($conexiune),
            'suma' => $total,
            'metoda' => $metoda,
            'data' => $data_rezervare
        ];

        
        unset($_SESSION['cart']);

        
        header("Location: bucatarie_factura.php");
        exit();

    } else {
        
        mysqli_rollback($conexiune);
        
        
        mysqli_close($conexiune);
        
        echo '<div style="margin:50px; text-align:center; font-family:sans-serif;">
                <h2 style="color:red;">Eroare de sistem!</h2>
                <p>Rezervarea ta nu a putut fi procesată. Ne cerem scuze pentru inconvenient.</p>
                <a href="bucatarie.php">Înapoi la meniu</a>
              </div>';
    }

} else {
    
    header("Location: bucatarie.php");
    exit();
}
?>