<?php
require_once __DIR__ . "/config.php";

/* Date din formular */
$nume = $_POST['nume'] ?? '';
$email = $_POST['email'] ?? '';
$data_start = $_POST['data_start'] ?? '';
$data_end = $_POST['data_end'] ?? '';
$mesaj = $_POST['mesaj'] ?? '';

/* Date din butonul Rezervă */
$cazare = $_POST['cazare'] ?? '';
$pret = $_POST['pret'] ?? 0;

if ($cazare === '' || $pret == 0) {
    die("Eroare: nu a fost selectată nicio cazare.");
}

/* Calcul număr nopți */
$start = new DateTime($data_start);
$end = new DateTime($data_end);
$zile = $start->diff($end)->days;

if ($zile <= 0) {
    die("Eroare: data de check-out trebuie să fie după check-in.");
}

/* Salvare în DB */
$stmt = $conn->prepare("
    INSERT INTO rezervari
    (nume, email, cazare, pret, data_start, data_end, mesaj)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "sssisss",
    $nume,
    $email,
    $cazare,
    $pret,
    $data_start,
    $data_end,
    $mesaj
);

$stmt->execute();

/* Date factură */
$factura_nr = "INV-" . date("Ymd") . "-" . rand(1000,9999);
$data_factura = date("d.m.Y");
$total = $pret * $zile;
?>
<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8">
<title>Factură rezervare</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.invoice-box {
  background: #ffffff;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.invoice-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.invoice-title {
  font-size: 28px;
  font-weight: 700;
}
.invoice-details p {
  margin: 0;
}
.table th {
  background: #f5f5f5;
}
.total {
  font-size: 20px;
  font-weight: 700;
}
@media print {
  .no-print {
    display: none;
  }
}
</style>
</head>

<body class="bg-light">

<div class="container py-5">
  <div class="invoice-box">

    <!-- HEADER -->
    <div class="invoice-header mb-4">
      <div>
        <div class="invoice-title">FACTURĂ</div>
        <div class="invoice-details">
          <p><strong>Nr. factură:</strong> <?= $factura_nr ?></p>
          <p><strong>Data:</strong> <?= $data_factura ?></p>
        </div>
      </div>

      <div class="text-end">
        <strong>Rio Travel</strong><br>
        Transport & Cazare<br>
        contact@rio-travel.ro<br>
        +40 700 000 000
      </div>
    </div>

    <hr>

    <!-- CLIENT -->
    <div class="row mb-4">
      <div class="col-md-6">
        <h6>Facturat către:</h6>
        <p>
          <strong><?= htmlspecialchars($nume) ?></strong><br>
          <?= htmlspecialchars($email) ?><br>
          <strong>Perioadă:</strong>
          <?= htmlspecialchars($data_start) ?> → <?= htmlspecialchars($data_end) ?>
        </p>
      </div>
    </div>

    <!-- TABEL -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Descriere</th>
          <th class="text-center">Cantitate</th>
          <th class="text-end">Preț / noapte</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <?= htmlspecialchars($cazare) ?><br>
            <small class="text-muted">
              <?= $data_start ?> → <?= $data_end ?>
            </small>
          </td>
          <td class="text-center"><?= $zile ?> nopți</td>
          <td class="text-end"><?= $pret ?> €</td>
        </tr>
      </tbody>
    </table>

    <!-- TOTAL -->
    <div class="text-end mt-3">
      <p class="total">
        Total de plată: <?= $total ?> €
      </p>
    </div>

    <!-- MESAJ -->
    <?php if (!empty($mesaj)): ?>
    <div class="mt-4">
      <strong>Mesaj client:</strong>
      <p><?= htmlspecialchars($mesaj) ?></p>
    </div>
    <?php endif; ?>

    <hr>

    <p class="text-muted">
      Aceasta este o factură informativă. Plata se va efectua conform instrucțiunilor primite pe email.
    </p>

    <!-- BUTOANE -->
    <div class="d-flex justify-content-between no-print mt-4">
      <a href="transport.php" class="btn btn-outline-secondary">
        ⬅ Înapoi
      </a>

      <button onclick="window.print()" class="btn btn-success">
        🖨 Printează factura
      </button>
    </div>

  </div>
</div>

</body>
</html>
