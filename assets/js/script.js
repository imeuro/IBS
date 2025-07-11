import initHamburgerMenu from './hamburger-menu.js';

// Inizializza il menu hamburger
initHamburgerMenu();

// Funzione helper per import sicuri
const safeImport = async (modulePath) => {
  try {
    await import(modulePath);
  } catch (error) {
    console.warn(`Impossibile caricare il modulo ${modulePath}:`, error);
  }
};

// Importa il fade-in sequenziale solo su plm-pog.php & partners.php
if (document.body.dataset.page === 'plm-pog' || document.body.dataset.page === 'partners') {
  safeImport('./plm-pog-fadein.js');
}

// Importa il fade-in sequenziale solo su value-proposition.php
if (document.body.dataset.page === 'value-proposition') {
  safeImport('./value-proposition-fadein.js');
}

// Importa il form di contatto solo su contacts.php
if (document.body.dataset.page === 'contacts') {
  safeImport('./contact-form.js');
}

// Importa il form candidature solo su lavora-con-noi.php
if (document.body.dataset.page === 'lavora-con-noi') {
  safeImport('./job-application-form.js');
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