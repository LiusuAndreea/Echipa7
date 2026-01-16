const galleryItems = document.querySelectorAll('.gallery-item img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.querySelector('.lightbox-img');
const closeBtn = document.querySelector('.lightbox .close');
const prevBtn = document.querySelector('.lightbox .prev');
const nextBtn = document.querySelector('.lightbox .next');
const counter = document.querySelector('.lightbox .counter');

let currentIndex = 0;

// Deschidere lightbox
function showLightbox(index) {
    currentIndex = index;
    lightboxImg.src = galleryItems[currentIndex].src;
    counter.textContent = `${currentIndex + 1} / ${galleryItems.length}`;
    lightbox.classList.add('show');
}

// Inchidere lightbox
function closeLightbox() {
    lightbox.classList.remove('show');
}

// Navigare
function prevImage() {
    currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
    showLightbox(currentIndex);
}

function nextImage() {
    currentIndex = (currentIndex + 1) % galleryItems.length;
    showLightbox(currentIndex);
}

// Click pe poza
galleryItems.forEach((img, i) => {
    img.addEventListener('click', () => showLightbox(i));
});

// Event listeners
closeBtn.addEventListener('click', closeLightbox);
prevBtn.addEventListener('click', prevImage);
nextBtn.addEventListener('click', nextImage);

// Click in afara pozei
lightbox.addEventListener('click', e => {
    if (e.target === lightbox) closeLightbox();
});

// Navigare cu tastatura
document.addEventListener('keydown', e => {
    if (!lightbox.classList.contains('show')) return;
    if (e.key === 'ArrowLeft') prevImage();
    if (e.key === 'ArrowRight') nextImage();
    if (e.key === 'Escape') closeLightbox();
});
