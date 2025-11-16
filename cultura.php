<?php
// Preluăm datele trimise prin formular
$nume = $_POST['nume'] ?? 'Vizitator';
$email = $_POST['email'] ?? '-';
$preparat = $_POST['preparat'] ?? '-';
$experienta = $_POST['experienta'] ?? '-';
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferințele tale – Rio de Janeiro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fffbee;
        }
        .container-box {
            max-width: 600px;
            margin-top: 80px;
        }
        .result-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.15);
        }
        .title {
            font-size: 1.9rem;
            font-weight: 700;
        }
        .highlight {
            color: #f5b301;
            font-weight: 700;
        }
        .info-item {
            margin-bottom: 12px;
            font-size: 1.1rem;
        }
        .btn-back {
            margin-top: 25px;
            background-color: #f5b301;
            font-weight: 600;
            border: none;
        }
        .btn-back:hover {
            background-color: #e3a100;
        }
    </style>
</head>

<body>

<div class="container container-box">
    <div class="result-card text-center">
        <h2 class="title mb-3">Mulțumim, <span class="highlight"><?php echo htmlspecialchars($nume); ?></span>!</h2>

        <p class="mb-4">
            Am primit preferințele tale și am pregătit o recomandare gustoasă și culturală pentru călătoria ta imaginară în Rio. 🌞
        </p>

        <div class="info-item">
            🍽️ Preparatul ales: <span class="highlight"><?php echo htmlspecialchars($preparat); ?></span>
        </div>

        <div class="info-item">
            🎭 Experiență culturală preferată: <span class="highlight"><?php echo htmlspecialchars($experienta); ?></span>
        </div>

        <?php if (!empty($email)) : ?>
        <div class="info-item">
            📧 Te putem contacta la: <span class="highlight"><?php echo htmlspecialchars($email); ?></span>
        </div>
        <?php endif; ?>

        <p class="mt-4">
            Sperăm că această mică incursiune în cultura și bucătăria braziliană ți-a făcut poftă să explorezi mai mult.  
            Rio te așteaptă cu gusturi noi, ritmuri vibrante și oameni primitori. 🌴✨
        </p>

        <a href="bucatarie.html" class="btn btn-back w-100 py-2 mt-3">⟵ Înapoi la pagină</a>
    </div>
</div>

</body>
</html>
