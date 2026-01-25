<?php
$conn = new mysqli("localhost", "root", "", "rio_db");

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$notificare = "";
if (isset($_POST['trimite_grant'])) {
    $nume = $conn->real_escape_string($_POST['nume']); 
    $email = $conn->real_escape_string($_POST['email']); 
    $titlu_proiect = $conn->real_escape_string($_POST['titlu_proiect']);
    $buget = $conn->real_escape_string($_POST['buget_estimat']);
    $categorie = $conn->real_escape_string($_POST['categorie']);
    
    // REZOLVARE EROARE: Verificăm dacă există cheile în $_POST înainte de a le folosi
    $detalii_echipa = isset($_POST['detalii_echipa']) ? $conn->real_escape_string($_POST['detalii_echipa']) : "Nespecificat";
    $impact = isset($_POST['impact']) ? $conn->real_escape_string($_POST['impact']) : "Nespecificat";
    $propunere = $conn->real_escape_string($_POST['propunere']);
    
    $descriere_completa = "Categorie: $categorie | Buget: $buget | Echipa: $detalii_echipa | Impact: $impact | Propunere: $propunere";
    
    $sql = "INSERT INTO inscrieri_granturi (nume_aplicant, email, proiect_vizat, descriere_propunere) 
            VALUES ('$nume', '$email', '$titlu_proiect', '$descriere_completa')";
    
    if ($conn->query($sql)) { 
        $notificare = "Dosarul pentru proiectul '$titlu_proiect' a fost depus cu succes!"; 
    }
}

$date = $conn->query("SELECT * FROM proiecte_primarie");
$proiecte = [];
while($row = $date->fetch_assoc()) { $proiecte[] = $row; }
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rio Grants - Aplicare Proiect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Proiecte.css">
    <style>
        .carousel-item img { height: 600px; object-fit: cover; filter: brightness(60%); }
        .contact-card { background: #ffffff; border-top: 10px solid #0d6efd; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); }
        .section-title { color: #0d6efd; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 25px; display: block; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px; }
        .form-label { font-weight: 600; margin-bottom: 8px; color: #34495e; }
        .main-header { margin-bottom: 50px; }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../index.php">RIO<span class="text-primary">DIGITAL</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto text-uppercase small">
                <li class="nav-item"><a class="nav-link" href="../index.php">Acasă</a></li>
                <li class="nav-item"><a class="nav-link" href="../transport.php">Transport</a></li>
                <li class="nav-item"><a class="nav-link" href="../istoric.php">Istoric</a></li>
                <li class="nav-item"><a class="nav-link active fw-bold text-primary" href="proiecte.php">Granturi</a></li>
                <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div id="rioCarousel" class="carousel slide rounded-4 overflow-hidden mb-5 shadow-lg" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach($proiecte as $index => $p): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="4000">
                <img src="<?= $p['imagine'] ?>" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block text-start mb-4">
                    <h2 class="display-4 fw-bold"><?= $p['nume'] ?></h2>
                    <p class="lead"><?= $p['descriere'] ?></p>
                    <span class="badge bg-primary fs-6">Buget de referință: <?= $p['buget'] ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="contact-card p-4 p-md-5">
                <div class="main-header text-center">
                    <h2 class="display-6 fw-bold text-dark">Propune Proiectul Tău</h2>
                    <p class="text-muted">Completează detaliile de mai jos pentru evaluare.</p>
                </div>

                <?php if($notificare): ?>
                    <div class="alert alert-success border-0 shadow-sm py-3 mb-4 text-center"><?= $notificare ?></div>
                <?php endif; ?>

                <form method="POST">
                    
                    <span class="section-title">I. Definire Proiect</span>
                    <div class="mb-4">
                        <label class="form-label fs-5">Titlul Proiectului Tău</label>
                        <input type="text" name="titlu_proiect" class="form-control form-control-lg border-2" placeholder="Introduceți numele proiectului.." required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Descrierea Detaliată a Proiectului</label>
                        <textarea name="propunere" class="form-control" rows="6" placeholder="Explicați scopul proiectului..." required></textarea>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Impact Social / Economic</label>
                            <textarea name="impact" class="form-control" rows="3" placeholder="Cine beneficiază de acest proiect?"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Echipa de Implementare</label>
                            <textarea name="detalii_echipa" class="form-control" rows="3" placeholder="Scurtă prezentare a echipei..."></textarea>
                        </div>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <label class="form-label">Categoria de Finanțare</label>
                            <select name="categorie" class="form-select">
                                <option value="Infrastructura">Infrastructură & Transport</option>
                                <option value="Cultura">Cultură & Patrimoniu</option>
                                <option value="Mediu">Sustenabilitate & Mediu</option>
                                <option value="Tehnologie">Smart City & Tehnologie</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Buget Solicitat (R$)</label>
                            <input type="text" name="buget_estimat" class="form-control" placeholder="Ex: 500.000 R$">
                        </div>
                    </div>

                    <span class="section-title">II. Date de Contact</span>
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Nume Complet Aplicant</label>
                            <input type="text" name="nume" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Adresă Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-5">
                        <button type="submit" name="trimite_grant" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg text-uppercase">
                            Trimite Dosarul de Finanțare
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
