<?php
session_start();


if (!isset($_SESSION['factura_finala']) && !isset($_SESSION['factura'])) {
    
    echo "<script>alert('Nu a fost găsită nicio factură generată recent.'); window.location.href='bucatarie.php';</script>";
    exit();
}


$f = isset($_SESSION['factura_finala']) ? $_SESSION['factura_finala'] : $_SESSION['factura'];


$total_afisat = isset($f['total']) ? $f['total'] : (isset($f['suma']) ? $f['suma'] : '0');
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Factură Rio Explore - Confirmare Rezervare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: sans-serif; background-color: #f8f9fa; }
        .invoice-card { 
            max-width: 700px; 
            margin: 50px auto; 
            background: #fff; 
            padding: 40px; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
            border-top: 10px solid #f5b301; 
        }
        .invoice-title { color: #f5b301; font-weight: 800; letter-spacing: 2px; }
        .table-custom thead { background-color: #fff7d1; }
        
        @media print {
            .no-print { display: none; }
            .invoice-card { box-shadow: none; border: 1px solid #eee; margin: 0; width: 100%; }
            body { background: white; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="invoice-card shadow-lg">
        <div class="text-center mb-5">
            <h1 class="invoice-title display-5">RIO EXPLORE</h1>
            <p class="text-muted fw-bold">CONFIRMARE REZERVARE EXPERIENȚĂ</p>
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <h6 class="text-muted text-uppercase small">Facturat către:</h6>
                <p class="fw-bold">Client Rio Explore<br>
                <span class="text-muted fw-normal small">Experiențe Culinare Autentice</span></p>
            </div>
            <div class="col-6 text-end">
                <h6 class="text-muted text-uppercase small">Detalii Document:</h6>
                <p><strong>Nr. Rezervare:</strong> #<?php echo $f['id']; ?><br>
                <strong>Data:</strong> <?php echo $f['data']; ?></p>
            </div>
        </div>

        <table class="table table-custom mt-4">
            <thead>
                <tr>
                    <th class="py-3">Descriere Experiență</th>
                    <th class="text-end py-3">Sumă Rezervată</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-4">
                        <span class="fw-bold">Pachet Turism Culinar Rio de Janeiro</span><br>
                        <small class="text-muted">Include participarea la activitățile selectate din programul "Rio Gourmet".</small>
                    </td>
                    <td class="text-end py-4 fw-bold"><?php echo $total_afisat; ?> RON</td>
                </tr>
            </tbody>
            <tfoot class="border-top">
                <tr>
                    <td class="text-end py-3 text-muted">Metodă Plată:</td>
                    <td class="text-end py-3 fw-bold"><?php echo $f['metoda']; ?></td>
                </tr>
                <tr>
                    <td class="text-end py-3 fw-bold text-uppercase">Total General de Plată:</td>
                    <td class="text-end py-3 fw-bold text-warning h4"><?php echo $total_afisat; ?> RON</td>
                </tr>
            </tfoot>
        </table>

        <div class="mt-5 p-3 bg-light rounded text-center border">
            <p class="mb-0 small text-muted">Vă mulțumim că ați ales <strong>Rio Explore</strong>! <br> 
            Vă rugăm să prezentați acest document la punctul de întâlnire stabilit.</p>
        </div>

        <div class="mt-5 d-flex justify-content-between no-print">
            <a href="bucatarie.php?status=confirmata" class="btn btn-outline-dark px-4 py-2 fw-bold">
                Înapoi la site
            </a>
            <button onclick="window.print()" class="btn btn-warning px-4 py-2 fw-bold shadow-sm">
                Printează Factura
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>