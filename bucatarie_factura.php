<?php
session_start();


if (!isset($_SESSION['detalii_factura'])) {
    header("Location: bucatarie.php");
    exit();
}

$f = $_SESSION['detalii_factura'];
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Factură Rio Explore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: "Poppins", sans-serif; background-color: #f8f9fa; }
        .invoice-box { 
            max-width: 700px; 
            margin: 50px auto; 
            background: #fff; 
            padding: 40px; 
            border-radius: 10px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.1); 
            border-top: 8px solid #f5b301;
        }
        .invoice-header { border-bottom: 2px solid #eee; padding-bottom: 20px; margin-bottom: 20px; }
        .total-amount { font-size: 1.5rem; color: #f5b301; font-weight: bold; }
        @media print {
            .no-print { display: none; }
            .invoice-box { box-shadow: none; border: none; margin: 0; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="invoice-box">
        <div class="invoice-header text-center">
            <h1 class="fw-bold" style="color: #f5b301;">RIO EXPLORE</h1>
            <p class="text-muted">Ghidul tău culinar în inima Braziliei</p>
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <h5 class="fw-bold text-uppercase">Factură către:</h5>
                <p>Client Rio Explore<br>
                Destinație: Bucătăria Tradițională</p>
            </div>
            <div class="col-6 text-end">
                <h5 class="fw-bold text-uppercase">Detalii Factură:</h5>
                <p><strong>Nr. Comandă:</strong> #<?php echo $f['nr_comanda']; ?><br>
                <strong>Data:</strong> <?php echo $f['data']; ?></p>
            </div>
        </div>

        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>Descriere Serviciu / Produs</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Comandă Meniu Gastronomic Rio (Sesiune)</td>
                    <td class="text-end"><?php echo $f['total']; ?> RON</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-end">Metodă Plată:</th>
                    <th class="text-end"><?php echo $f['metoda']; ?></th>
                </tr>
                <tr>
                    <th class="text-end text-uppercase">Total General:</th>
                    <th class="text-end total-amount"><?php echo $f['total']; ?> RON</th>
                </tr>
            </tfoot>
        </table>

        <div class="mt-5 text-center">
            <p class="small text-muted italic">Vă mulțumim pentru că ați ales experiența culinară Rio de Janeiro! <br> Această factură a fost generată automat și este validă fără semnătură.</p>
        </div>

        <div class="mt-4 no-print d-flex justify-content-between">
            <a href="bucatarie.php" class="btn btn-outline-secondary">Înapoi la site</a>
            <button onclick="window.print()" class="btn btn-warning fw-bold text-white">
                <i class="fa-solid fa-print"></i> Printează Factura
            </button>
        </div>
    </div>
</div>

<?php 

?>

</body>
</html>