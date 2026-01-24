<?php

session_start();


if (isset($_GET['action']) && $_GET['action'] == "add" && isset($_GET['id'])) {
    
   
    $id_produs = $_GET['id'];

    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

  
    array_push($_SESSION['cart'], $id_produs);

    
    header("Location: bucatarie.php");
    exit(); 

} else {
   
    header("Location: bucatarie.php");
    exit();
}
?>