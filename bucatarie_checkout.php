<?php
session_start();
include "db_bucatarie.php";


if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>alert('Coșul este gol!'); window.location.href='bucatarie.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Coș de Cumpărături - Rio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: "Poppins", sans-serif; background-color: #ffffff; }
        .checkout-container { max-width: 800px; margin: 50px auto; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 10px; border-top: 5px solid #f5b301; }
        .table thead { background-color: #fff7d1; }
        .btn-rio { background-color: #f5b301; color: white; font-weight: 600; }
        .btn-rio:hover { background-color: #d49a01; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="checkout-container">
        <h2 class="text-center mb-4">Coșul tău de delicii</h2>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Produs</th>
                    <th class="text-end">Preț</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_general = 0;
                
                foreach ($_SESSION['cart'] as $id_produs) {
                    $sql = "SELECT nume, pret FROM produse WHERE id = $id_produs";
                    $rezultat = mysqli_query($conexiune, $sql);
                    if ($row = mysqli_fetch_assoc($rezultat)) {
                        echo "<tr>
                                <td>{$row['nume']}</td>
                                <td class='text-end'>{$row['pret']} RON</td>
                              </tr>";
                        $total_general += $row['pret'];
                    }
                }
                ?>
                <tr class="table-light">
                    <td class="fw-bold">TOTAL DE PLATĂ</td>
                    <td class="text-end fw-bold" style="color: #d49a01; font-size: 1.2rem;"><?php echo $total_general; ?> RON</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-5 p-4 bg-light rounded">
            <h4>Detalii Finalizare</h4>
            <form action="bucatarie_procesare_finala.php" method="POST">
                <input type="hidden" name="total_plata" value="<?php echo $total_general; ?>">
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Alege metoda de plată:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metoda_plata" value="Cash" id="plata1" checked>
                        <label class="form-check-label" for="plata1">Cash (la livrare)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metoda_plata" value="Card" id="plata2">
                        <label class="form-check-label" for="plata2">Card Online</label>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="finalizeaza_comanda" class="btn btn-rio btn-lg">
                        Finalizează Comanda & Generați Factura
                    </button>
                    <a href="bucatarie.php" class="btn btn-outline-secondary">Înapoi la Meniu</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>