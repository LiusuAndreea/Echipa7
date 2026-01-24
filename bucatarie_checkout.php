<?php
session_start();

include "db_bucatarie.php";


if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>alert('Coșul tău este gol! Alege o experiență din Rio.'); window.location.href='bucatarie.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Finalizare Rezervare - Rio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: sans-serif; background-color: #fcfcfc; padding-top: 50px; }
        .checkout-box { 
            max-width: 750px; 
            margin: auto; 
            background: white; 
            padding: 40px; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            border-top: 6px solid #f5b301; 
        }
        .total-price { font-size: 1.6rem; font-weight: 800; color: #f5b301; }
    </style>
</head>
<body>

<div class="container">
    <div class="checkout-box">
        <h2 class="text-center mb-4 fw-bold text-uppercase">Rezumat Rezervare</h2>
        
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Experiența Selectată</th>
                    <th class="text-end">Preț</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_general = 0;
                
                foreach ($_SESSION['cart'] as $id_produs) {
                    
                    $id_produs = mysqli_real_escape_string($conexiune, $id_produs);
                    
                   
                    $sql = "SELECT nume, pret FROM produse WHERE id = $id_produs";
                    $rezultat = mysqli_query($conexiune, $sql);
                    
                    if ($row = mysqli_fetch_assoc($rezultat)) {
                        echo "<tr>
                                <td class='fw-bold text-dark'>{$row['nume']}</td>
                                <td class='text-end fw-bold'>{$row['pret']} RON</td>
                              </tr>";
                        $total_general += $row['pret'];
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="border-top">
                    <td class="text-end fw-bold pt-3">TOTAL GENERAL:</td>
                    <td class="text-end pt-3 total-price"><?php echo $total_general; ?> RON</td>
                </tr>
            </tfoot>
        </table>

        <div class="mt-5 p-4 bg-light rounded shadow-sm border">
            <h5 class="mb-3 fw-bold">Detalii Rezervare</h5>
            <form action="bucatarie_procesare_finala.php" method="POST">
                <input type="hidden" name="total_plata" value="<?php echo $total_general; ?>">
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Alege modalitatea de plată:</label>
                    <select name="metoda_plata" class="form-select border-warning shadow-sm" required>
                        <option value="Cash">Cash la punctul de întâlnire (Rio)</option>
                        <option value="Card">Card Online (Tranzacție Securizată)</option>
                    </select>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <a href="bucatarie.php" class="btn btn-outline-secondary w-100 py-2">Înapoi la meniu</a>
                    </div>
                    <div class="col-md-6 mb-2">
                        <button type="submit" name="finalizeaza_comanda" class="btn btn-warning w-100 py-2 fw-bold text-uppercase">
                            Confirmă Rezervarea
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>