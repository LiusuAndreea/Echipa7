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
 <link rel="stylesheet" href="transport.css">
</head>

<body>

<?php include __DIR__ . "/includes/navbar.php"; ?>

<!-- HERO -->
<section class="flight-animation">
  <div class="location left">
    <strong>RO</strong>
    <span>București</span>
  </div>

  <div class="flight-path">
    <svg viewBox="0 0 800 200" class="flight-svg">
      <path id="flightCurve" d="M50 140 Q400 30 750 140" />
    </svg>

    <div class="plane">✈️</div>
  </div>

  <div class="location right">
    <strong>BR</strong>
    <span>Rio de Janeiro</span>
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

         <section class="airlines">
        <h2>✈️ Companii aeriene recomandate</h2>

            <a href="https://www.lufthansa.com" target="_blank" class="airline-card lufthansa">
            <div class="airline-header">
            <span class="airline-name">Lufthansa</span>
            </div>
            <p class="route">Via Frankfurt / München</p>
            <p class="details">Servicii excelente • 16–18h • 1 escală</p>
        </a>


        <a href="https://www.turkishairlines.com" target="_blank" class="airline-card turkish">
            <div class="airline-header">
            <span class="airline-name">Turkish Airlines</span>
            </div>
            <p class="route">Via Istanbul</p>
            <p class="details">Cel mai bun raport calitate/preț • 18–19h</p>
        </a>

        <a href="https://www.flytap.com" target="_blank"class="airline-card tap">
            <div class="airline-header">
            <span class="airline-name">TAP Air Portugal</span>
            </div>
            <p class="route">Via Lisabona</p>
            <p class="details">Zboruri frecvente spre Brazilia • 15–16h</p>
        </a>

        <a href="https://www.airfrance.com" target="_blank"class="airline-card airfrance">
            <div class="airline-header">
            <span class="airline-name">Air France / KLM</span>
            </div>
            <p class="route">Via Paris / Amsterdam</p>
            <p class="details">Confort & profesionalism • 16–18h</p>
        </a>
        </section>


<section class="local-transport-soft">
  <div class="container">

    <div class="transport-header">
      <span class="transport-icon">🚌</span>
      <h3>Transport Local în Rio</h3>
      <p>
        Descoperă opțiunile de transport disponibile pentru a te deplasa cu ușurință prin Rio de Janeiro
      </p>
    </div>

    <div class="transport-tabs-soft">
      <button class="tab-soft active" data-tab="metro">🚇 Metrou</button>
      <button class="tab-soft" data-tab="bus">🚌 Autobuze</button>
      <button class="tab-soft" data-tab="taxi">🚕 Taxi & Uber</button>
      <button class="tab-soft" data-tab="airport">✈️ Aeroport</button>
    </div>

    <div class="transport-box active" id="metro">
      <p class="box-title">Metrou</p>
      <p>
        Rapid, sigur și potrivit pentru turiști. Conectează principalele zone turistice din Rio.
      </p>
    </div>

    <div class="transport-box" id="bus">
      <p class="box-title">Autobuze</p>
      <p>
        Rețea extinsă în tot orașul. BRT este cea mai eficientă opțiune pentru distanțe mari.
      </p>
    </div>

    <div class="transport-box" id="taxi">
      <p class="box-title">Taxi & Uber</p>
      <p>
        Confort maxim și flexibilitate. Uber este foarte popular și sigur pentru turiști.
      </p>
    </div>

    <div class="transport-box" id="airport">
      <p class="box-title">Aeroporturi</p>

      <p><strong>Aeroportul Galeão (GIG)</strong><br>
      Aeroport internațional principal</p>

      <p><strong>BRT</strong> – cea mai economică opțiune (~60 min)</p>
      <p><strong>Taxi / Uber</strong> – 30–50 min, preț fix</p>
      <p><strong>Transfer privat</strong> – confort maxim</p>

      <p><strong>Santos Dumont (SDU)</strong><br>
      Zboruri interne, poziție centrală</p>
    </div>

  </div>
</section>




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
<div class="stars">★★★★★</div>
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
<h2>Rezervare cazare</h2>
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
  <label class="form-label">Preț cazare (€ / noapte)</label>
  <input class="form-control"
         id="pretAfisat"
         readonly>
</div>

<div class="row g-4">

  <div class="col-md-6">
    <label class="form-label">Nume complet</label>
    <input class="form-control" name="nume" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input class="form-control" type="email" name="email" required>
  </div>

  <div class="col-md-3">
    <label class="form-label">Check-in</label>
    <input class="form-control" type="date" name="data_start" required>
  </div>

  <div class="col-md-3">
    <label class="form-label">Check-out</label>
    <input class="form-control" type="date" name="data_end" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Mesaj (opțional)</label>
    <textarea class="form-control" name="mesaj" rows="3"></textarea>
  </div>

  <div class="col-12">
    <button class="btn btn-warning w-100 btn-lg">
      Trimite rezervarea
    </button>

  </div>

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

document.querySelectorAll(".tab-soft").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelectorAll(".tab-soft").forEach(b => b.classList.remove("active"));
    document.querySelectorAll(".transport-box").forEach(c => c.classList.remove("active"));

    btn.classList.add("active");
    document.getElementById(btn.dataset.tab).classList.add("active");
  });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
