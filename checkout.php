<?php
declare(strict_types=1);
session_start();

$cart = $_SESSION['cart'] ?? [];
if (!$cart) {
  header("Location: cart.php");
  exit;
}

$total = 0.0;
foreach ($cart as $item) {
  $total += ((float)$item["price_eur"]) * ((int)$item["qty"]);
}

// golim coșul
unset($_SESSION['cart']);
?>
<!doctype html>
<html lang="ro">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirmare rezervare | Rio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php if (file_exists(__DIR__ . "/partials/navbar.php")) include __DIR__ . "/partials/navbar.php"; ?>

<div class="container py-5">
  <div class="alert alert-success">
    <h1 class="h4 mb-1">Rezervare confirmată ✅</h1>
    <div>Biletele au fost rezervate. Coșul a fost golit.</div>
  </div>

  <div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">
      <h2 class="h6 fw-semibold mb-3">Sumar bilete</h2>

      <ul class="list-group list-group-flush">
        <?php foreach ($cart as $item): ?>
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <div class="fw-semibold"><?= htmlspecialchars($item["title"]) ?></div>
              <div class="text-secondary small">
                <?= htmlspecialchars((string)($item["event_date"] ?? "-")) ?> · <?= htmlspecialchars($item["location"]) ?>
              </div>
            </div>
            <div class="text-end">
              <div><?= (int)$item["qty"] ?> x <?= number_format((float)$item["price_eur"], 2) ?> EUR</div>
              <div class="fw-semibold"><?= number_format(((float)$item["price_eur"]*(int)$item["qty"]), 2) ?> EUR</div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="d-flex justify-content-end mt-3">
        <div class="h5 m-0">Total: <?= number_format($total, 2) ?> EUR</div>
      </div>
    </div>
  </div>

  <div class="mt-4 d-flex gap-2">
    <a class="btn btn-primary" href="atractii-turistice.php#evenimente">Înapoi la evenimente</a>
    <a class="btn btn-outline-secondary" href="cart.php">Vezi coșul</a>
  </div>
</div>
</body>
</html>
