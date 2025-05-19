// Carosello Hero Background
const heroImages = document.querySelectorAll('.hero__img');
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

setInterval(() => {
  current = (current + 1) % heroImages.length;
  showImage(current);
}, interval);

// Mostra la prima immagine all'avvio
showImage(current); 