<?php
require_once __DIR__ . "/config.php";
?>
<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Transport & Cazare – Rio de Janeiro</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: "Poppins", sans-serif;
    background-color: #ffffff;
    color: #333;
    margin: 0;
    padding: 0;
}

main {
    padding-top: 80px;
}

.hero {
    position: relative;
    height: 55vh;
    min-height: 400px;
    max-height: 600px;

    background-image: url("/Echipa7/img/cazare.jpg");
    background-size: cover;
    background-position: center 70%;
    background-repeat: no-repeat;

    display: flex;
    align-items: flex-start;
    justify-content: center;

    padding-top: 90px; /* EXACT înălțimea navbarului */
    text-align: center;
    color: white;

    margin: 0; /* IMPORTANT */
}


.stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    gap: 20px;
    margin-top: 40px;
}
.stat {
    background: #fff7d1;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
}
.transport-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
}
.card {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.12);
}
.cazare-img {
    height: 180px;
    object-fit: cover;
}
.booking-form {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
}
section {
    margin-top: 80px;
}
/* ================= TRANSPORT ================= */

.stats-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 24px;
    max-width: 1200px;
    margin: 0 auto 70px auto;
}

.stat-card {
    background: #fff7d1;
    padding: 25px 20px;
    border-radius: 14px;
    text-align: center;
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
}

.stat-card .icon {
    font-size: 30px;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 14px;
    color: #666;
}

.stat-value {
    font-size: 22px;
    font-weight: 700;
}

.stat-details {
    font-size: 13px;
    color: #888;
}

/* AIRLINES + TIPS */
.grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.airlines ul {
    list-style: none;
    padding-left: 0;
}

.airlines li {
    background: #fff;
    padding: 18px;
    border-radius: 12px;
    margin-bottom: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.airlines .tip {
    font-size: 13px;
    color: #777;
}

/* TIPS */
.tips .card {
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
}

/* LAYOVER */
.layover-comparison {
    max-width: 1200px;
    margin: 80px auto 0 auto;
}

.layover-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px,1fr));
    gap: 20px;
}

.layover-box {
    background: #fff;
    padding: 20px;
    border-radius: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .grid-2 {
        grid-template-columns: 1fr;
    }
}

</style>
</head>

<body>

<?php include __DIR__ . "/includes/navbar.php"; ?>

<!-- HERO -->
<section class="hero">
<div class="container">
<h1 class="fw-bold">Transport & Cazare</h1>
<p class="mt-3">Soluții simple și clare pentru călătoria ta în Rio de Janeiro</p>
<a href="#cazari" class="btn btn-warning btn-lg mt-3">Vezi cazări</a>
</div>
</section>
<section class="space">
    <p></p>
</section>
  <section class="stats-cards">
            <div class="stat-card">
                <span class="icon">🕑</span>
                <div class="stat-label">Durata Zborului</div>
                <div class="stat-value">14-18 ore</div>
                <div class="stat-details">Cu 1-2 escale</div>
            </div>
            <div class="stat-card">
                <span class="icon">📍</span>
                <div class="stat-label">Distanță</div>
                <div class="stat-value">~10,500 km</div>
                <div class="stat-details">București - Rio</div>
            </div>
            <div class="stat-card">
                <span class="icon">💶</span>
                <div class="stat-label">Preț Mediu</div>
                <div class="stat-value">€600-1200</div>
                <div class="stat-details">Dus-întors</div>
            </div>
            <div class="stat-card">
                <span class="icon">📅</span>
                <div class="stat-label">Cel Mai Bun Sezon</div>
                <div class="stat-value">Apr-Oct</div>
                <div class="stat-details">Perioada mai bună</div>
            </div>
        </section>

       
        <div class="grid-2">
            <section class="airlines">
                <h3>🛩️ Companii Aeriene Populare</h3>
                <p class="airports">Zboruri din București (OTP) către Rio de Janeiro (GIG)</p>
                <ul>
                    <li><b>Lufthansa</b><br>Via Frankfurt sau München – Servicii excelente<br><span class="tip">Durată: 16-18h cu o escală</span></li>
                    <li><b>Turkish Airlines</b><br>Via Istanbul – Raport calitate/preț foarte bun<br><span class="tip">Durată: 18-19h cu o escală</span></li>
                    <li><b>TAP Air Portugal</b><br>Via Lisabona – Zboruri frecvente spre Brazilia<br><span class="tip">Durată: 15-16h cu o escală</span></li>
                    <li><b>Air France / KLM</b><br>Via Paris sau Amsterdam – Confort și profesionalism<br><span class="tip">Durată: 16-18h cu o escală</span></li>
                </ul>
            </section>
            <section class="tips">
                <h3>🌍 Sfaturi pentru Rezervare & Călătorie</h3>
                <div class="card orange">
                    <b>🕓 Când să rezervi</b>
                    <ul>
                        <li>Rezervă cu 2-3 luni înainte pentru prețuri mai bune</li>
                        <li>Evită perioada Carnavalului (feb-mai) – prețuri mai ridicate</li>
                        <li>Caută oferte pe Skyscanner, Google Flights, Momondo</li>
                    </ul>
                </div>
                <div class="card green">
                    <b>✅ Documente necesare</b>
                    <ul>
                        <li>Pașaport valabil min. 6 luni</li>
                        <li>NU e nevoie de viză pentru turiști (max 90 zile)</li>
                        <li>Asigură-te că ai toate rezervările confirmate</li>
                    </ul>
                </div>
                <div class="card yellow">
                    <b>⏰ Diferența de fus orar</b>
                    <ul>
                        <li>Rio este cu 4-5 ore în urmă față de România (variază în funcție de ora de vară)</li>
                    </ul>
                </div>
            </section>
        </div>


<main class="container">

<!-- CAZARI -->
<section id="cazari">
<div class="text-center mb-5">
<h2>Cazări recomandate</h2>
</div>

<div class="row g-4">
<?php
$rez = $conn->query("SELECT * FROM cazari LIMIT 4");
$startImg = 1;
while ($c = $rez->fetch_assoc()):
$carouselId = "carousel".$c['id'];
?>
<div class="col-md-6 col-lg-3">
<div class="card h-100">

<div id="<?= $carouselId ?>" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
<?php for($i=0;$i<5;$i++): ?>
<div class="carousel-item <?= $i==0?'active':'' ?>">
<img src="/Echipa7/img/cazare<?= $startImg+$i ?>.jpeg"
     class="d-block w-100 cazare-img">
</div>
<?php endfor; ?>
</div>
</div>

<div class="card-body text-center">
<h5><?= htmlspecialchars($c['nume']) ?></h5>
<p class="fw-bold text-success"><?= $c['pret'] ?> € / noapte</p>

<button
    type="button"
    class="btn btn-warning w-100"
    onclick="selecteazaCazare('<?= htmlspecialchars($c['nume']) ?>', <?= $c['pret'] ?>)">
    Rezervă
</button>
</div>

</div>
</div>
<?php
$startImg += 5;
endwhile;
?>
</div>
</section>

<!-- FORMULAR -->
<section id="rezervare">
<div class="text-center mb-4">
<h2>Rezervare zbor & cazare</h2>
<p>Completează formularul și te contactăm rapid</p>
</div>

<form action="confirmare.php"
      method="POST"
      class="booking-form row g-3"
      id="rezervareForm">

<!-- DATE AUTOMATE -->
<input type="hidden" name="cazare" id="inputCazare">
<input type="hidden" name="pret" id="inputPret">

<!-- PREȚ VIZIBIL -->
<div class="col-md-6">
    <input class="form-control"
           id="pretAfisat"
           placeholder="Preț cazare (€ / noapte)"
           readonly>
</div>

<div class="col-md-6">
<input class="form-control" name="nume" placeholder="Nume complet" required>
</div>

<div class="col-md-6">
<input class="form-control" type="email" name="email" placeholder="Email" required>
</div>

<div class="col-md-6">
<input class="form-control" type="date" name="data_plecare" required>
</div>

<div class="col-12">
<textarea class="form-control" name="mesaj" placeholder="Mesaj opțional"></textarea>
</div>

<div class="col-12">
<button class="btn btn-warning w-100">Trimite rezervarea</button>
</div>

</form>
</section>

</main>

<footer class="text-center py-4">
<small>© 2026 Rio de Janeiro</small>
</footer>

<script>
function selecteazaCazare(nume, pret) {
    document.getElementById("rezervare")
        .scrollIntoView({ behavior: "smooth" });

    document.getElementById("inputCazare").value = nume;
    document.getElementById("inputPret").value = pret;
    document.getElementById("pretAfisat").value = pret + " € / noapte";
}

document.getElementById("rezervareForm")
.addEventListener("submit", function(e) {
    if (document.getElementById("inputCazare").value === "") {
        e.preventDefault();
        alert("Selectează o cazare folosind butonul «Rezervă».");
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
