<?php
session_start();
include "db_bucatarie.php";


date_default_timezone_set('Europe/Bucharest');

if (isset($_POST['finalizeaza_comanda']) && !empty($_SESSION['cart'])) {
    
    $metoda = $_POST['metoda_plata'];
    $total = $_POST['total_plata'];
    $data_comanda = date("Y-m-d H:i:s");

    
    mysqli_autocommit($conexiune, FALSE);

    $eroare = false;

    
    $sql = "INSERT INTO comenzi (metoda_plata, total_plata, data_comanda) 
            VALUES ('$metoda', '$total', '$data_comanda')";
    
    if (mysqli_query($conexiune, $sql)) {
        
        
        if (mysqli_affected_rows($conexiune) <= 0) {
            $eroare = true;
        }
        
    } else {
        $eroare = true;
    }

    
    if (!$eroare) {
        
        mysqli_commit($conexiune);
        
        
        $_SESSION['detalii_factura'] = [
            'nr_comanda' => mysqli_insert_id($conexiune),
            'total' => $total,
            'metoda' => $metoda,
            'data' => $data_comanda
        ];

       
        unset($_SESSION['cart']);

       
        header("Location: bucatarie_factura.php");
        exit();

    } else {
       
        mysqli_rollback($conexiune);
        
        echo "<div style='color:red; text-align:center; margin-top:50px;'>
                <h3>Eroare de sistem!</h3>
                <p>Comanda dumneavoastră nu a putut fi procesată din cauza unei erori tehnice.</p>
                <a href='bucatarie.php'>Înapoi la meniu</a>
              </div>";
    }

   
    mysqli_close($conexiune);

} else {
    header("Location: bucatarie.php");
    exit();
}
?>