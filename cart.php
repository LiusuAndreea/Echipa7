<?php
declare(strict_types=1);
session_start();

$cart = $_SESSION['cart'] ?? [];
$total = 0.0;
foreach ($cart as $item) {
  $total += $item["price_eur"] * $item["qty"];
}
?>
<!doctype html>
<html lang="ro">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coș bilete | Rio de Janeiro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php if (file_exists(__DIR__ . "/partials/navbar.php")) include __DIR__ . "/partials/navbar.php"; ?>

<div class="container py-4">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h4 m-0">Coș bilete</h1>
    <a class="btn btn-outline-secondary btn-sm" href="atractii-turistice.php">Înapoi la evenimente</a>
  </div>

  <?php if (!$cart): ?>
    <div class="alert alert-light border">Coșul este gol.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Eveniment</th>
            <th>Data</th>
            <th>Locație</th>
            <th class="text-end">Preț</th>
            <th class="text-end">Cant.</th>
            <th class="text-end">Subtotal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $item): 
          $sub = $item["price_eur"] * $item["qty"];
        ?>
          <tr>
            <td class="fw-semibold"><?= htmlspecialchars($item["title"]) ?></td>
            <td><?= htmlspecialchars((string)($item["event_date"] ?? "-")) ?></td>
            <td><?= htmlspecialchars($item["location"]) ?></td>
            <td class="text-end"><?= number_format($item["price_eur"], 2) ?> EUR</td>
            <td class="text-end"><?= (int)$item["qty"] ?></td>
            <td class="text-end"><?= number_format($sub, 2) ?> EUR</td>
            <td class="text-end">
              <a class="btn btn-outline-danger btn-sm"
                 href="cart_remove.php?id=<?= urlencode((string)$item["id"]) ?>">
                 Șterge
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-between align-items-center">
      <a class="btn btn-outline-secondary" href="cart_clear.php">Golește coșul</a>
      <div class="text-end">
        <div class="h5 m-0">Total: <?= number_format($total, 2) ?> EUR</div>
        <a class="btn btn-primary mt-2" href="checkout.php">Finalizează</a>
      </div>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
