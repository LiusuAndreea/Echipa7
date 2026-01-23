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

<script src="galerie.js"></script>
</body>
</html>
