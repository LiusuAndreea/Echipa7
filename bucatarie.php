<?php 
session_start(); 
include "db_bucatarie.php"; 

include "includes/navbar.php"; 


$mesaj_notificare = "";
$clasa_alerta = "alert-success";

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'succes') {
        $mesaj_notificare = "Experiența a fost adăugată în coș! 🛒";
    } elseif ($_GET['status'] == 'confirmata') {
        $mesaj_notificare = "✅ Rezervarea ta a fost confirmată cu succes! Poți vedea factura în subsolul paginii.";
        $clasa_alerta = "alert-primary";
    }
}


if (isset($_POST['voteaza'])) {
    $nume_p = mysqli_real_escape_string($conexiune, $_POST['preparat']);
    mysqli_query($conexiune, "UPDATE sondaj_rio SET voturi = voturi + 1 WHERE preparat = '$nume_p'");
    header("Location: bucatarie.php#sondaj"); 
    exit();
}


$query_sondaj = mysqli_query($conexiune, "SELECT * FROM sondaj_rio");
$labels = []; $valori = [];
while($v = mysqli_fetch_assoc($query_sondaj)) {
    $labels[] = $v['preparat'];
    $valori[] = $v['voturi'];
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Rio de Janeiro - Evenimente și Gastronomie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background-color: #fffdf5; 
            color: #333; 
            padding-top: 80px; 
        }
        .hero { 
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('img/img1.jpg');
            background-size: cover; background-position: center;
            height: 400px; display: flex; align-items: center; justify-content: center;
            color: white; text-align: center;
        }
        .section-title { font-weight: 800; font-size: 2.2rem; text-align: center; margin: 50px 0 30px; color: #f5b301; }
        .event-card { background: white; border-radius: 15px; padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; align-items: center; }
        .event-icon { background: #f5b301; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 20px; font-size: 1.5rem; }
        .card-rio { border: none; border-radius: 12px; background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: 0.3s; cursor: pointer; }
        .card-rio:hover { transform: translateY(-5px); }
        .card-rio img { height: 180px; object-fit: cover; border-radius: 12px 12px 0 0; }
        .sondaj-container { background: #fff; border: 2px solid #f5b301; border-radius: 20px; padding: 30px; }
        .btn-vot { background-color: #f5b301; color: white; border: none; width: 100%; margin-bottom: 8px; padding: 10px; font-weight: 700; border-radius: 8px; }
        .footer-nav { background: #333; color: white; padding: 40px 0; margin-top: 60px; }
    </style>
</head>
<body>

<div class="hero">
    <h1 class="display-3 fw-bold">Cultură & Bucătărie în <span style="color:#f5b301">Rio de Janeiro</span></h1>
</div>

<div class="container">
    <?php if($mesaj_notificare): ?>
        <div class="alert <?php echo $clasa_alerta; ?> alert-dismissible fade show mt-3 text-center fw-bold shadow-sm" role="alert">
            <?php echo $mesaj_notificare; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <h2 class="section-title">Evenimente de neratat</h2>
    <div class="row align-items-center mb-5">
        <div class="col-md-7">
            <div class="event-card">
                <div class="event-icon">🎭</div>
                <div>
                    <h5 class="fw-bold mb-1">Carnavalul din Rio</h5>
                    <p class="mb-0 small text-muted">Are loc în februarie, cu parade spectaculoase pe Sambódromo. Este momentul în care întregul oraș vibrează sub pașii de samba.</p>
                </div>
            </div>
            <div class="event-card">
                <div class="event-icon">🎆</div>
                <div>
                    <h5 class="fw-bold mb-1">Reveillon pe plajă</h5>
                    <p class="mb-0 small text-muted">O petrecere uriașă de Revelion pe Copacabana, unde milioane de oameni îmbrăcați în alb celebrează cu artificii și concerte pe nisip.</p>
                </div>
            </div>
            <div class="event-card">
                <div class="event-icon">🎷</div>
                <div>
                    <h5 class="fw-bold mb-1">Festivaluri Bossa Nova</h5>
                    <p class="mb-0 small text-muted">Evenimente de jazz brazilian desfășurate în grădini publice și baruri istorice pe tot parcursul anului.</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 text-center">
            <img src="img/imgcarnaval.jpg" alt="Evenimente" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px;">
        </div>
    </div>

    <h2 class="section-title">Preparate de neratat</h2>
    <div class="row">
        <?php
        $preparate = [
            ["Feijoada", "img/img_Feijoada.jpg", "3 ore", "Fasole neagră, carne de porc și vită, usturoi, ceapă, foi de dafin."],
            ["Pão de queijo", "img/img_Pãodequeijo.jpg", "45 min", "Făină de tapioca, brânză rasă, ouă, lapte și ulei."],
            ["Coxinha", "img/img_Coxinha.jpg", "1h 20 min", "Pui mărunțit, brânză cremă Catupiry, aluat de grâu, pesmet."],
            ["Brigadeiro", "img/img_Brigadeiro.webp", "30 min", "Lapte condensat, cacao, unt, ornamente de ciocolată."],
            ["Açaí", "img/img_acai.jpg", "10 min", "Pulpă de fructe Açaí congelată, guarana, banane și granola."],
            ["Caipirinha", "img/img_Caipirinha.webp", "5 min", "Cachaça, lămâie verde, zahăr alb, gheață zdrobită."]
        ];
        foreach($preparate as $idx => $p):
        ?>
        <div class="col-md-4 mb-4">
            <div class="card-rio" data-bs-toggle="modal" data-bs-target="#modal<?php echo $idx; ?>">
                <img src="<?php echo $p[1]; ?>" class="w-100" alt="preparat">
                <div class="p-3 text-center">
                    <h5 class="fw-bold text-warning mb-0"><?php echo $p[0]; ?></h5>
                    <small class="text-muted">Click pentru rețetă</small>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal<?php echo $idx; ?>" tabindex="-1">
            <div class="modal-dialog"><div class="modal-content">
                <div class="modal-header"><h5><?php echo $p[0]; ?></h5></div>
                <div class="modal-body">
                    <p><strong>Ingrediente:</strong> <?php echo $p[3]; ?></p>
                    <p><strong>Timp:</strong> <?php echo $p[2]; ?></p>
                </div>
            </div></div>
        </div>
        <?php endforeach; ?>
    </div>

    <h2 class="section-title">Experiențe Culinare</h2>
    <div class="row">
        <?php
        $q = mysqli_query($conexiune, "SELECT * FROM produse");
        while($exp = mysqli_fetch_assoc($q)):
        ?>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                <img src="<?php echo $exp['imagine']; ?>" class="card-img-top" style="height:200px; object-fit:cover;" alt="experienta">
                <div class="card-body">
                    <h5 class="fw-bold"><?php echo $exp['nume']; ?></h5>
                    <p class="text-muted small"><?php echo substr($exp['descriere'], 0, 100); ?>...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 fw-bold mb-0"><?php echo $exp['pret']; ?> RON</span>
                        <a href="bucatarie_cart_logic.php?action=add&id=<?php echo $exp['id']; ?>" class="btn btn-warning fw-bold rounded-pill px-4">Adaugă</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <div id="sondaj" class="sondaj-container my-5">
        <div class="row align-items-center">
            <div class="col-md-5">
                <h3 class="fw-bold mb-4">Sondaj Culinar</h3>
                <form method="POST">
                    <button name="voteaza" value="FEIJOADA" class="btn-vot">FEIJOADA</button>
                    <button name="voteaza" value="COXINHA" class="btn-vot" style="background:#eee; color:#333;">COXINHA</button>
                    <button name="voteaza" value="BRIGADEIRO" class="btn-vot">BRIGADEIRO</button>
                    <button name="voteaza" value="AÇAÍ" class="btn-vot" style="background:#eee; color:#333;">AÇAÍ</button>
                    <input type="hidden" name="preparat" id="preparat_val">
                </form>
            </div>
            <div class="col-md-7"><canvas id="rioChart"></canvas></div>
        </div>
    </div>
</div>

<footer class="footer-nav">
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold mb-3 text-warning">Administrare</h5>
                <ul class="list-unstyled">
                    <li><a href="bucatarie_checkout.php" class="text-white text-decoration-none">🛒 Vezi Coș & Rezervă</a></li>
                    <li><a href="bucatarie_factura.php" class="text-white text-decoration-none">📄 Vezi ultima factură (Descarcă/Printează)</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <h5 class="fw-bold mb-3 text-warning">Abonează-te la Noutăți</h5>
                <form action="bucatarie_newsletter.php" method="POST" class="row g-2">
                    <div class="col-md-5"><input type="text" name="nume_abonat" class="form-control" placeholder="Numele tău" required></div>
                    <div class="col-md-5"><input type="email" name="email_abonat" class="form-control" placeholder="Email-ul tău" required></div>
                    <div class="col-md-2"><button type="submit" name="submit_news" class="btn btn-warning fw-bold w-100">OK</button></div>
                </form>
            </div>
        </div>
    </div>
</footer>

<script>
const ctx = document.getElementById('rioChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Voturi (%)',
            data: <?php echo json_encode($valori); ?>,
            backgroundColor: '#f5b301'
        }]
    },
    options: { indexAxis: 'y' }
});

document.querySelectorAll('.btn-vot').forEach(btn => {
    btn.onclick = function() { document.getElementById('preparat_val').value = this.value; };
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>