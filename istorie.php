<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istoria Rio de Janeiro - Cronologie Completă</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        body { overflow-x: hidden; scroll-behavior: smooth; }
        
        /* HEADER PARALLAX */
        .hero-history {
            height: 50vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('img/rio-hero.jpg');
            background-size: cover; background-position: center; background-attachment: fixed;
            display: flex; align-items: center; justify-content: center; color: white;
        }

        /* CARDURI ȘI IMAGINI */
        .img-box { 
            overflow: hidden; border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.15); 
            transition: 0.4s;
        }
        .img-box img { width: 100%; transition: 0.6s; }
        .img-box:hover img { transform: scale(1.08); }

        /* TABEL DESIGN */
        .table-container {
            margin-top: -50px; /* Ridicăm tabelul peste header puțin */
            background: white; border-radius: 15px;
            padding: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }

        .section-padding { padding: 100px 0; }
        .bg-custom-light { background-color: #f8f9fa; }
    </style>
</head>
<body>

<?php include "includes/navbar.php"; ?>

<header class="hero-history">
    <div class="container text-center" data-aos="fade-up">
        <h1 class="display-2 fw-bold">Istoria de Aur</h1>
        <p class="lead">Călătorește prin secolele Orașului Minunat</p>
    </div>
</header>

<main>
    <section class="container position-relative" style="z-index: 10;">
        <div class="row justify-content-center">
            <div class="col-lg-10 table-container" data-aos="zoom-in">
                <h3 class="fw-bold text-center mb-4 text-primary">Repere Istorice</h3>
                <div class="table-responsive">
                    <table class="table table-hover align-middle border-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Anul</th>
                                <th>Eveniment</th>
                                <th>Detalii pe scurt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td class="fw-bold">1502</td><td>Descoperirea Golfului</td><td>Gaspar de Lemos numește zona Rio de Janeiro.</td></tr>
                            <tr><td class="fw-bold">1763</td><td>Noua Capitală</td><td>Rio devine centrul administrativ al Braziliei.</td></tr>
                            <tr><td class="fw-bold">1808</td><td>Curtea Regală</td><td>Singura capitală europeană mutată în America.</td></tr>
                            <tr><td class="fw-bold">1931</td><td>Hristos Mântuitorul</td><td>Inaugurarea celei mai faimoase statui din lume.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding container">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <div class="img-box mb-4">
                    <img src="img/rio1.jpg" alt="Secțiunea 1">
                </div>
            </div>
            <div class="col-md-6 ps-md-5" data-aos="fade-left">
                <h2 class="display-6 fw-bold mb-3">Inceputurile Orasului</h2>
                <p class="lead">Pe data de 1 ianuarie 1502, Gaspar de Lemos a ajuns din Portugalia in Brazilia si a intrat in Baia de Guanabara, ce era locuita la acea vreme de populatiile Tamoio. A confundat golful cu gura de varsare a unui rau sau fluviu si i-a dat numele de Rio de Janeiro - raul de ianuarie. Francezii si-au facut si ei un avanpost aici in 1555 pentru comertul cu lemn si au format o alianta cu triburile Tamoio impotriva portughezilor insa au fost alungati in 1567. Triburile Tamoio au fost si ele izgonite din regiune de catre portughezi care au fondat asezarea Sao Sebastiao do Rio de Janeiro.</p>
                
            </div>
        </div>
    </section>

    <section class="section-padding bg-white shadow-sm">
        <div class="container">
            <div class="row align-items-center flex-md-row-reverse">
                <div class="col-md-6" data-aos="fade-left">
                    <div class="img-box mb-4">
                        <img src="img/rio2.jpg" alt="Secțiunea 2">
                    </div>
                </div>
                <div class="col-md-6 pe-md-5" data-aos="fade-right">
                    <h2 class="display-6 fw-bold mb-3">Rio - Capitala Regatului</h2>
                    <p class="lead">Inainte de invazia lui Napoleon in Portugalia din 1808, monarhul si curtea sa ce numara 15.000 de oameni s-au imbarcat pe vase si au pornit in voiaj spre Brazilia. Supusii de peste ocean au serbat sosirea suveranului atunci cand acesta a preluat conducerea Braziliei de la vice-regele sau. In cele din urma Dom Joao a devenit rege al Portugaliei dar datorita dragostei sale pentru Brazilia, a ramas aici si a declarat Rio, capitala noului Regat al Portugaliei, Braziliei si Algarvelor.</p>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding container">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <div class="img-box mb-4">
                    <img src="img/rio3.jpg" alt="Secțiunea 3">
                </div>
            </div>
            <div class="col-md-6 ps-md-5" data-aos="fade-left">
                <h2 class="display-6 fw-bold mb-3">Independenta Braziliei</h2>
                <p class="lead">Odata cu declararea independentei Braziliei in 1822 a venit si declinul productiei si exportului de aur. Munca si toate eforturile au fost indreptate spre un nou produs: cafeaua. Productia si comertul de cafea au dus la dezvoltarea altor ramuri cum ar fi caile ferate, necesare pentru un transport mai eficient. Caile ferate au strans legaturile dintre orase si au dus la castiguri economice sporite. Cu toate acestea in 1889, industria de cafea din Rio a suferit un puternic declin datorat eroziunii si unor probleme cu solul dar si dependentei de sclavie. De aici a pornit un declin economic semnificativ care a facut ca Rio sa piarda si din importanta politica in favoarea unor localitati ca Sao Paulo si Minas Gerais.</p>
                
            </div>
        </div>
    </section>

    <section class="section-padding bg-custom-light">
        <div class="container">
            <div class="row align-items-center flex-md-row-reverse">
                <div class="col-md-6" data-aos="fade-left">
                    <div class="img-box mb-4">
                        <img src="img/rio4.jpg" alt="Secțiunea 4">
                    </div>
                </div>
                <div class="col-md-6 pe-md-5" data-aos="fade-right">
                    <h2 class="display-6 fw-bold mb-3">Rio De Janeiro - Istoria Moderna
                    </h2>
                    <p class="lead">In zilele noastre Rio este stabil din punct de vedere financiar si si-a regasit energia creativa care a dus la dezvoltarea sa anterioara, iar proiecte majore de dezvoltare si-au gasit finantarea. A devenit un centru al serviciilor, un centru financiar si un centru al industriei usoare. Au aparut proiecte de integrare a favelelor in restul orasului prin adaugarea conditiilor minime de igiena prin instalatii sanitare si curent electric dar si scoli, spitale si centre comunitare. Au fost initiate si proiecte de restaurare a cladirilor coloniale care impreuna cu alte masuri benefice urbei au dus la atragerea de noi afaceri in oras. Viata culturala din Rio a renascut si ea iar Carnavalul din Rio este doar unul din momentele in care spiritul festiv al orasului ajunge in atentia intregii lumi.</p>

                </div>
            </div>
        </div>
    </section>

    <section class="section-padding bg-dark text-white text-center">
        <div class="container" data-aos="zoom-in">
            <h2 class="fw-bold">Abonează-te la Newsletter</h2>
            <p class="text-white-50 mb-4">Află povești noi în fiecare săptămână</p>
            <div class="row justify-content-center text-start text-dark">
                <div class="col-md-5 bg-white p-4 rounded-4 shadow">
                    <form action="procesare.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nume</label>
                            <input type="text" name="nume" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <input type="hidden" name="mesaj" value="Abonare Newsletter">
                        <button type="submit" class="btn btn-primary w-100 fw-bold">MĂ ABONEZ ACUM</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="py-4 bg-black text-white-50 text-center">
    <p class="mb-0">Proiect Rio de Janeiro &copy; 2026</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });
</script>

</body>
</html>