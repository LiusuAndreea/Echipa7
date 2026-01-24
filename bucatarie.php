<?php 
session_start(); 

include "db_bucatarie.php"; 


if (file_exists("includes/navbar.php")) {
    include "includes/navbar.php"; 
} else {
    echo "<div class='alert alert-warning text-center mt-5'>Navbar-ul colegilor nu a fost găsit. Verifică folderul 'includes'.</div>";
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rio - Bucătărie și Cultură</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    
    <style>
       
        body { font-family: "Poppins", sans-serif; background-color: #ffffff; padding-top: 80px; }
        
        .hero-rio { background-color: white; padding: 100px 0; text-align: center; border-bottom: 3px solid #f5b301; }
        
        .food-card { border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.12); border-radius: 10px; transition: transform 0.25s ease; margin-bottom: 25px; }
        .food-card:hover { transform: scale(1.03); }
        
        .btn-rio { background-color: #f5b301; color: white; border: none; font-weight: 600; }
        .btn-rio:hover { background-color: #d49a01; color: white; }
        
        .fun-facts { background-color: #fff7d1; padding: 50px 0; border-radius: 15px; margin-top: 50px; }
        
        .badge-tag { background-color: #fff7d1; color: #333; padding: 5px 10px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; }
        
       
        .cart-float { position: fixed; bottom: 20px; right: 20px; z-index: 1000; }
    </style>
</head>
<body>

<section class="hero-rio">
    <div class="container">
        <h1 class="display-4 fw-bold">Gustul și Spiritul <span style="color: #f5b301;">Rio</span></h1>
        <p class="lead">Proiect PI - O incursiune în gastronomia braziliană.</p>
    </div>
</section>

<div class="container mt-5">
    
    <div id="rioCarousel" class="carousel slide shadow mb-5" data-bs-ride="carousel">
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?w=1200&h=400&fit=crop" class="d-block w-100" alt="Rio View">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fw-bold">Rio de Janeiro</h5>
                    <p>Orașul unde muntele întâlnește marea.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1599307767316-776533bb941c?w=1200&h=400&fit=crop" class="d-block w-100" alt="Bucatarie">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fw-bold">Gastronomie Autentică</h5>
                    <p>Savurează aromele tradiționale braziliene.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#rioCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#rioCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <h2 class="text-center mb-5 fw-bold">Meniul Carioca</h2>
    <div class="row">
        <?php
        
        $sql = "SELECT * FROM produse";
        $rezultat = mysqli_query($conexiune, $sql);
        
        if (mysqli_num_rows($rezultat) > 0) {
            while($row = mysqli_fetch_assoc($rezultat)) {
        ?>
        <div class="col-md-4">
            <div class="card food-card h-100 text-center p-3">
                <div class="text-start"><span class="badge-tag">Rio Classic</span></div>
                <div class="card-body">
                    <h5 class="card-title fw-bold mt-2"><?php echo $row['nume']; ?></h5>
                    <p class="card-text text-muted"><?php echo $row['descriere']; ?></p>
                    <h4 class="fw-bold" style="color: #f5b301;"><?php echo $row['pret']; ?> RON</h4>
                    
                    <hr>
                    
                    <button class="btn btn-outline-secondary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#info<?php echo $row['id']; ?>">
                        <i class="fa-solid fa-circle-info"></i> Detalii Rețetă
                    </button>
                    
                    <a href="bucatarie_cart_logic.php?action=add&id=<?php echo $row['id']; ?>" class="btn btn-rio w-100">
                        <i class="fa-solid fa-cart-plus"></i> Adaugă în coș
                    </a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="info<?php echo $row['id']; ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold"><?php echo $row['nume']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-start">
                        <p><strong>Origine:</strong> Rio de Janeiro, Brazilia</p>
                        <p><strong>Ingrediente:</strong> Selecție premium de produse locale carioca.</p>
                        <p><strong>Timp de preparare:</strong> 30 - 60 minute.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Închide</button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            }
        } else {
            echo "<p class='text-center'>Nu sunt produse disponibile în baza de date.</p>";
        }
        ?>
    </div>

    <div class="fun-facts text-center">
        <h3><i class="fa-solid fa-envelope-open-text"></i> Vrei rețete de la chefii din Rio?</h3>
        <p>Abonează-te la newsletter-ul nostru culinar!</p>
        <form action="bucatarie_newsletter.php" method="POST" class="row g-3 justify-content-center mt-3">
            <div class="col-md-3">
                <input type="text" name="nume_abonat" class="form-control" placeholder="Numele tău" required>
            </div>
            <div class="col-md-3">
                <input type="email" name="email_abonat" class="form-control" placeholder="Email-ul tău" required>
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit_news" class="btn btn-dark w-100">Mă abonez</button>
            </div>
        </form>
    </div>

</div>

<div class="cart-float">
    <a href="bucatarie_checkout.php" class="btn btn-warning shadow-lg btn-lg fw-bold p-3">
        🛒 Vezi Coșul (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)
    </a>
</div>

<footer class="bg-white py-5 mt-5 text-center border-top">
    <p class="text-muted">&copy; 2026 Proiect Rio - Gastronomie și Cultură. Toate drepturile rezervate.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>