import initHamburgerMenu from './hamburger-menu.js';

// Inizializza il menu hamburger
initHamburgerMenu();

// Importa il fade-in sequenziale solo su plm-pog.php
if (document.body.dataset.page === 'plm-pog') {
  import('./plm-pog-fadein.js');
}
// Importa il fade-in sequenziale solo su value-proposition.php
if (document.body.dataset.page === 'value-proposition') {
  import('./value-proposition-fadein.js');
}

// Carosello Hero Background
const heroImages = document.querySelectorAll('.hero__img');
const heroQuotes = document.querySelectorAll('.hero__single-quote');
let current = 0;
const interval = 5000;

const showImage = (idx) => {
  heroImages.forEach((img, i) => {
    if (i === idx) {
      img.classList.add('is-active');
      img.setAttribute('aria-hidden', 'false');
    } else {
      img.classList.remove('is-active');
      img.setAttribute('aria-hidden', 'true');
    }
  });
};

const showQuote = (idx) => {
  if (!heroQuotes.length) return;
  heroQuotes.forEach((q, i) => {
    if (i === idx) {
      q.classList.add('is-active');
    } else {
      q.classList.remove('is-active');
    }
  });
};

const updateHeroCarousel = () => {
  current = (current + 1) % heroImages.length;
  showImage(current);
  showQuote(current);
};

setInterval(updateHeroCarousel, interval);

// Mostra la prima immagine e la prima frase all'avvio
showImage(current);
showQuote(current); 