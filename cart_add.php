<?php
declare(strict_types=1);
session_start();
require __DIR__ . "/config/db.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
  header("Location: atractii-turistice.php");
  exit;
}

$stmt = $pdo->prepare("SELECT id, title, location, event_date, price_eur FROM events WHERE id = ?");
$stmt->execute([$id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
  header("Location: atractii-turistice.php");
  exit;
}

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$id])) {
  $_SESSION['cart'][$id] = [
    "id" => (int)$event["id"],
    "title" => (string)$event["title"],
    "location" => (string)$event["location"],
    "event_date" => $event["event_date"],
    "price_eur" => (float)$event["price_eur"],
    "qty" => 0
  ];
}

$_SESSION['cart'][$id]["qty"] += 1;

// Mesaj “flash”
$_SESSION['flash_success'] = "Bilet adăugat în coș: " . (string)$event["title"];

// Înapoi la pagina cu evenimente (cu anchor)
header("Location: atractii-turistice.php#evenimente");
exit;
