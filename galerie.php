<?php
// === CONEXIUNE BAZA DE DATE (XAMPP) ===
$conn = new mysqli("localhost", "root", "", "rio_booking");

if ($conn->connect_error) {
    die("Eroare conexiune DB");
}

// === SETARE DIRECTOR UPLOAD (CALE ABSOLUTĂ) ===
$uploadDir = __DIR__ . "/img/galerie/";

// creează folderul dacă nu există
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// === UPLOAD POZE ===
if (isset($_POST['upload'])) {

    foreach ($_FILES['poze']['name'] as $i => $name) {

        if ($_FILES['poze']['error'][$i] === 0) {

            $tmp = $_FILES['poze']['tmp_name'][$i];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            // validare extensie
            if (!in_array($ext, ["jpg", "jpeg", "png", "webp"])) {
                continue;
            }

            $fileName = uniqid("img_") . "." . $ext;
            $target = $uploadDir . $fileName;

            if (move_uploaded_file($tmp, $target)) {
                $stmt = $conn->prepare("INSERT INTO galerie (imagine) VALUES (?)");
                $stmt->bind_param("s", $fileName);
                $stmt->execute();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Rio de Janeiro</title>
    <link rel="stylesheet" href="galerie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<h1>GALERIE</h1>

<div class="gallery">
    <?php
    for ($i = 1; $i <= 29; $i++) {
        echo '
        <div class="gallery-item">
            <img src="img/galerie'.$i.'.jpg" alt="Galerie '.$i.'">
        </div>';
    }
    ?>
</div>

<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <span class="prev">&#10094;</span>
    <span class="next">&#10095;</span>
    <img class="lightbox-img" src="" alt="">
    <div class="counter"></div>
</div>

<!-- ===== FORMULAR UPLOAD ===== -->
<div class="container my-5">
    <h3>📸 Adaugă poze din vacanță</h3>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="poze[]" class="form-control mb-3" multiple required>
        <button type="submit" name="upload" class="btn btn-success">
            Încarcă pozele
        </button>
    </form>
</div>
<!-- =========================== -->

<script src="galerie.js"></script>
</body>
</html>
