<?php
require_once __DIR__ . "/config.php";

/* Date din formular */
$nume = $_POST['nume'] ?? '';
$email = $_POST['email'] ?? '';
$data_plecare = $_POST['data_plecare'] ?? '';
$mesaj = $_POST['mesaj'] ?? '';

/* Date setate automat din butonul Rezervă */
$cazare = $_POST['cazare'] ?? '';
$pret = $_POST['pret'] ?? 0;

/* Siguranță: dacă nu e selectată cazare */
if ($cazare === '' || $pret == 0) {
    die("Eroare: nu a fost selectată nicio cazare.");
}

/* Salvare în baza de date */
$stmt = $conn->prepare("
    INSERT INTO rezervari
    (nume, email, cazare, pret, data_plecare, mesaj)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "sssiss",
    $nume,
    $email,
    $cazare,
    $pret,
    $data_plecare,
    $mesaj
);

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8">
<title>Confirmare rezervare</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card shadow border-0">
<div class="card-body p-4 text-center">

<h2 class="text-success mb-3">✔ Rezervare trimisă cu succes</h2>

<p>
Mulțumim, <strong><?= htmlspecialchars($nume) ?></strong>!  
Te vom contacta în cel mai scurt timp.
</p>

<hr>

<h5 class="mb-3">📋 Detalii rezervare</h5>

<ul class="list-group text-start mb-4">
<li class="list-group-item">
<strong>Email:</strong> <?= htmlspecialchars($email) ?>
</li>

<li class="list-group-item">
<strong>Cazare:</strong> <?= htmlspecialchars($cazare) ?>
</li>

<li class="list-group-item">
<strong>Preț:</strong>
<span class="fw-bold text-success">
<?= $pret ?> € / noapte
</span>
</li>

<li class="list-group-item">
<strong>Dată plecare:</strong>
<?= htmlspecialchars($data_plecare) ?>
</li>

<?php if (!empty($mesaj)): ?>
<li class="list-group-item">
<strong>Mesaj:</strong><br>
<?= htmlspecialchars($mesaj) ?>
</li>
<?php endif; ?>
</ul>

<a href="transport.php" class="btn btn-warning">
⬅ Înapoi la ofertă
</a>

</div>
</div>

</div>
</div>
</div>

</body>
</html>
