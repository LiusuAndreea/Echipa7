document.addEventListener('DOMContentLoaded', function() {
    // 1. Confirmare în consolă că scriptul rulează
    console.log("Pagina 'Proiecte Rio' a fost încărcată cu succes!");

    // 2. Efect vizual pentru cardurile din slider (zoom la hover)
    const carouselImages = document.querySelectorAll('.carousel-item img');
    carouselImages.forEach(img => {
        img.addEventListener('mouseenter', () => {
            img.style.transform = 'scale(1.05)';
            img.style.transition = 'transform 0.5s ease';
        });
        img.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
        });
    });

    // 3. Validare simplă pentru formular
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const emailInput = document.querySelector('input[type="email"]');
            const numeInput = document.querySelector('input[name="nume"]');

            if (numeInput.value.length < 3) {
                alert("Te rugăm să introduci un nume valid (minim 3 caractere).");
                event.preventDefault(); // Oprește trimiterea dacă numele e prea scurt
            } else {
                console.log("Formularul se trimite către server...");
            }
        });
    }
});