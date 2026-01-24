<?php include "includes/navbar.php"; ?>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}


try {
    $pdo = new PDO("mysql:host=localhost;dbname=echipa7;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Baza de date echipa7 nu a fost gasita! Verifica phpMyAdmin. Eroare: " . $e->getMessage());
}

$attractions = $pdo->query("SELECT * FROM attractions ORDER BY id ASC")->fetchAll();

$events = $pdo->query("
  SELECT id, title, event_date, location, details, image_path, price_eur
  FROM events
  ORDER BY event_date IS NULL, event_date ASC, id ASC
")->fetchAll();
?>
<!doctype html>
<html lang="ro">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atracții și evenimente turistice | Rio de Janeiro</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/atractii.css?v=<?= time() ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>


<header class="hero-banner">
  <div class="hero-bg" aria-hidden="true"></div>
  <div class="hero-overlay" aria-hidden="true"></div>

  <div class="container hero-content">
    <div class="d-inline-flex align-items-center gap-2 mb-2">
      <span class="hero-icon"></span>
      <h1 class="hero-title m-0">Atracții și evenimente turistice</h1>
    </div>

    <p class="hero-subtitle mb-0">
      Explorează cele mai emblematice destinații și experiențe din Rio de Janeiro.
    </p>
  </div>

  <div class="hero-wave" aria-hidden="true">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
      <path fill="#ffffff" d="M0,32 C240,80 480,80 720,40 C960,0 1200,0 1440,32 L1440,80 L0,80 Z"></path>
    </svg>
  </div>
</header>

<main class="container pb-5">

  <div class="row g-4 mt-3">
    <?php foreach ($attractions as $a): ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card card-attraction h-100">
          <img src="img/<?= basename($a['image_path']) ?>" alt="<?= htmlspecialchars($a['name']) ?>">
          <div class="card-body">
            <h3 class="h6 fw-semibold mb-2"><?= htmlspecialchars($a['name']) ?></h3>

            <p class="muted-small mb-3">
              <?= htmlspecialchars($a['short_desc']) ?>
            </p>

            <?php if (!empty($a['insider_tip'])): ?>
              <div class="alert alert-light border rounded-3 py-2 px-3 mb-3">
                <div class="d-flex gap-2">
                  <i class="bi bi-lightbulb"></i>
                  <div class="muted-small"><strong>Insider tip:</strong> <?= htmlspecialchars($a['insider_tip']) ?></div>
                </div>
              </div>
            <?php endif; ?>

            <div class="muted-small info-row d-grid gap-1">
              <?php if (!empty($a['area_hint'])): ?>
                <div><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($a['area_hint']) ?></div>
              <?php endif; ?>
              <?php if (!empty($a['duration_hint'])): ?>
                <div><i class="bi bi-clock"></i> <?= htmlspecialchars($a['duration_hint']) ?></div>
              <?php endif; ?>
              <div><i class="bi bi-pin-map"></i> <?= htmlspecialchars($a['address']) ?></div>
              <div><i class="bi bi-door-open"></i> <?= htmlspecialchars($a['opening_hours']) ?></div>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="section-title" id="evenimente">
    <h2 class="h5 fw-semibold mt-5">Evenimente</h2>
    <p class="muted-small mb-3"></p>
  </div>

  <div class="row g-3">
    <?php foreach ($events as $e): ?>
      <div class="col-12 col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">

          <?php if (!empty($e['image_path'])): ?>
            <?php 
              
              if (trim($e['title']) === 'Carnavalul din Rio') {
                  $imagine_finala = "img/imgcarnaval1.jpg"; 
              } else {
                  $imagine_finala = "img/" . basename($e['image_path']);
              }
            ?>
            <img 
              src="<?= $imagine_finala ?>" 
              alt="<?= htmlspecialchars($e['title']) ?>" 
              class="w-100" 
              style="height:190px;object-fit:cover;border-top-left-radius:1rem;border-top-right-radius:1rem;">
          <?php endif; ?>

          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between gap-2">
              <h3 class="h6 fw-semibold mb-1"><?= htmlspecialchars($e['title']) ?></h3>

              <?php if (!empty($e['event_date'])): ?>
                <span class="badge text-bg-light border">
                  <i class="bi bi-calendar-event"></i>
                  <?= htmlspecialchars($e['event_date']) ?>
                </span>
              <?php endif; ?>
            </div>

            <div class="muted-small mb-2">
              <i class="bi bi-geo"></i> <?= htmlspecialchars($e['location']) ?>
            </div>

            <p class="muted-small mb-0">
              <?= htmlspecialchars($e['details']) ?>
            </p>

            <div class="d-flex align-items-center justify-content-between mt-3">
              <div class="fw-semibold">
                <?= number_format((float)$e['price_eur'], 2) ?> EUR
              </div>

              <a class="btn btn-primary btn-sm" href="cart_add.php?id=<?= (int)$e['id'] ?>">
                Book
              </a>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
   
  <div class="mt-5">
      <h3 class="h6 fw-semibold mb-3">Carnaval – atmosferă din Rio</h3>

      <div class="rounded-4 overflow-hidden shadow-sm">
        <video
          class="w-100"
          id="carnivalVideo"
          controls
          muted
          loop
          playsinline
          style="max-height:420px; object-fit:cover;">
          <source src="img/carnival.mp4" type="video/mp4">
          Browserul tău nu suportă video HTML5.
        </video>
      </div>

      <p class="muted-small mt-2">
        Video – Carnavalul din Rio de Janeiro
      </p>
    </div>


 
  <section class="newsletter-wrap mt-5">

    <section class="faq-wrap mt-5 mb-4">
      <div class="faq-card">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <div>
            <h2 class="h5 fw-semibold mb-1">Întrebări frecvente</h2>
            <p class="muted-small mb-0">Câteva întrebări rapide despre călătoria către Rio de Janeiro.</p>
          </div>
          <span class="badge text-bg-light border rounded-pill px-3 py-2">
            <i class="bi bi-info-circle"></i> Info util
          </span>
        </div>

        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqH1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqC1" aria-expanded="true" aria-controls="faqC1">
                Cum ajung în centrul orașului?
              </button>
            </h2>
            <div id="faqC1" class="accordion-collapse collapse show" aria-labelledby="faqH1" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                De la aeroport, poți ajunge în centrul orașului cu taxi, transfer, autobuze sau tren (în funcție de aeroport). Pentru confort, poți folosi și aplicațiile de ridesharing.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqH2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqC2" aria-expanded="false" aria-controls="faqC2">
                Transport public
              </button>
            </h2>
            <div id="faqC2" class="accordion-collapse collapse" aria-labelledby="faqH2" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                În Rio găsești metrou, autobuze și VLT în anumite zone. Pentru deplasări turistice, combină metroul cu ridesharing, mai ales seara.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqH3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqC3" aria-expanded="false" aria-controls="faqC3">
                Sfaturi de călătorie
              </button>
            </h2>
            <div id="faqC3" class="accordion-collapse collapse" aria-labelledby="faqH3" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Ia cremă SPF, apă, bani cash pentru cheltuieli mici și folosește o borsetă/poșetă sigură. Pentru atracțiile populare, mergi dimineața pentru cozi mai mici.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqH4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqC4" aria-expanded="false" aria-controls="faqC4">
                Siguranța și sănătatea
              </button>
            </h2>
            <div id="faqC4" class="accordion-collapse collapse" aria-labelledby="faqH4" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Evită zonele izolate noaptea, nu ține telefonul la vedere în locuri aglomerate și folosește transport sigur. Hidratează-te și folosește repelent anti-țânțari când e nevoie.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faqH5">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqC5" aria-expanded="false" aria-controls="faqC5">
                Obiceiuri și etichetă locală
              </button>
            </h2>
            <div id="faqC5" class="accordion-collapse collapse" aria-labelledby="faqH5" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Localnicii sunt relaxați și prietenoși. Bacșișul e uneori inclus (verifică nota). În zonele turistice, fii atent(ă) la „oferte prea bune”.
              </div>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <h3 class="h6 fw-semibold mb-3">Companii aeriene menționate</h3>

        <div class="airlines-grid">
          <div class="airlines-col">
            <a class="airline-link" href="#" onclick="return false;">Wizz Air</a>
            <a class="airline-link" href="#" onclick="return false;">Turkish Airlines</a>
            <a class="airline-link" href="#" onclick="return false;">Aegean Airlines</a>
            <a class="airline-link" href="#" onclick="return false;">TAP (Air Portugal)</a>
            <a class="airline-link" href="#" onclick="return false;">Swiss Air</a>
          </div>

          <div class="airlines-col">
            <a class="airline-link" href="#" onclick="return false;">Ryanair</a>
            <a class="airline-link" href="#" onclick="return false;">KLM</a>
            <a class="airline-link" href="#" onclick="return false;">Air France</a>
            <a class="airline-link" href="#" onclick="return false;">Eurowings</a>
            <a class="airline-link" href="#" onclick="return false;">Air Serbia</a>
          </div>

          <div class="airlines-col">
            <a class="airline-link" href="#" onclick="return false;">Tarom</a>
            <a class="airline-link" href="#" onclick="return false;">Austrian Airlines</a>
            <a class="airline-link" href="#" onclick="return false;">Pegasus Airlines</a>
            <a class="airline-link" href="#" onclick="return false;">EasyJet</a>
            <a class="airline-link" href="#" onclick="return false;">Qatar Airways</a>
          </div>

          <div class="airlines-col">
            <a class="airline-link" href="#" onclick="return false;">Lufthansa</a>
            <a class="airline-link" href="#" onclick="return false;">LOT Polish Airlines</a>
            <a class="airline-link" href="#" onclick="return false;">Vueling Airlines</a>
            <a class="airline-link" href="#" onclick="return false;">FlyDubai</a>
            <a class="airline-link" href="#" onclick="return false;">British Airways</a>
          </div>
        </div>
      </div>
    </section>

    <div class="newsletter-card">
      <div class="newsletter-media" aria-hidden="true"></div>

      <div class="newsletter-content">
        <h2>Descoperă minunea călătoriilor în fiecare săptămână</h2>
        <p>
          Primește inspirație personalizată pentru călătorii, cele mai recente trucuri de
          călătorie și oferte exclusive direct în căsuța ta poștală.
        </p>

        <form class="newsletter-form" action="#" method="post" onsubmit="return false;">
          <div class="newsletter-input">
            <input type="email" name="email" placeholder="E-mail" required>
            <span class="newsletter-icon" aria-hidden="true">
              <i class="bi bi-envelope"></i>
            </span>
          </div>

          <button class="newsletter-btn" type="submit">Înscrie-te</button>
        </form>

        <small class="newsletter-note">Nu facem spam. Te poți dezabona oricând.</small>
      </div>
    </div>

  </section>

</main>
<footer class="site-footer mt-5">
  <div class="container py-5">
    <div class="row g-4 align-items-start">
      <div class="col-12 col-lg-5">
        <div class="footer-brand">
          <div class="footer-logo">Rio de Janeiro</div>
          <p class="footer-muted mb-3">
            Idei de călătorie, atracții și evenimente — într-un singur loc.
          </p>

          <div class="footer-social d-flex gap-2">
            <a class="footer-pill" href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a class="footer-pill" href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a class="footer-pill" href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3">
        <h6 class="footer-title">Linkuri rapide</h6>
        <ul class="footer-links">
          <li><a href="atractii-turistice.php">Atracții</a></li>
          <li><a href="atractii-turistice.php#evenimente">Evenimente</a></li>
          <li><a href="cart.php">Coș</a></li>
        </ul>
      </div>

      <div class="col-6 col-lg-4">
        <h6 class="footer-title">Contact</h6>
        <div class="footer-contact">
          <div><i class="bi bi-telephone"></i> 031 631 1770</div>
          <div><i class="bi bi-envelope"></i> <a href="mailto:riodejaneiro@gmail.com">riodejaneiro@gmail.com</a></div>
          <div><i class="bi bi-clock"></i> Luni – Sâmbătă 09:00 – 17:00</div>
        </div>
      </div>
    </div>

    <hr class="footer-sep">

    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 footer-bottom">
      <div>© <?= date('Y') ?> Echipa7 • Toate drepturile rezervate.</div>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
(() => {
  const root = document.documentElement;
  let current = 0;
  let target = 0;

  function animate() {
    current += (target - current) * 0.08;
    root.style.setProperty('--heroParallax', (-current) + 'px');
    root.style.setProperty('--heroOpacity', Math.max(1 - current / 520, 0.6));
    requestAnimationFrame(animate);
  }

  window.addEventListener('scroll', () => {
    target = Math.min(window.scrollY * 0.65, 420);
  });

  animate();
})();
</script>
