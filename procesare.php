<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Colectăm datele din formular
    $nume = htmlspecialchars($_POST['nume']);
    $email = htmlspecialchars($_POST['email']);
    $mesaj = htmlspecialchars($_POST['mesaj']);
    $data = date("Y-m-d H:i:s"); // Adăugăm și ora la care a fost trimis

    // 2. Pregătim textul pe care îl salvăm
    // \n înseamnă "rând nou"
    $linie_text = "Data: $data | Nume: $nume | Email: $email | Mesaj: $mesaj" . PHP_EOL;

    // 3. Salvăm în fișier (FILE_APPEND înseamnă că adaugă la final, nu șterge ce era înainte)
    file_put_contents("mesaje.txt", $linie_text, FILE_APPEND);

    // 4. Afișăm confirmarea vizuală (cu Bootstrap, să arate bine)
?>
    <!DOCTYPE html>
    <html lang="ro">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Confirmare</title>
    </head>
    <body class="bg-light d-flex align-items-center vh-100">
        <div class="container text-center">
            <div class="card shadow p-5 border-0">
                <h1 class="display-4 text-success">Succes! ✅</h1>
                <p class="lead">Mulțumim, <strong><?php echo $nume; ?></strong>. Datele tale au fost înregistrate.</p>
                <hr>
                <p class="text-muted">Poți verifica fișierul <code>mesaje.txt</code> pe server pentru a vedea înregistrarea.</p>
                <a href="index.php" class="btn btn-primary mt-3">Înapoi la site</a>
            </div>
        </div>
    </body>
    </html>
<?php
} else {
    // Dacă cineva încearcă să acceseze fișierul direct, îl trimitem la index
    header("Location: index.php");
}
?>