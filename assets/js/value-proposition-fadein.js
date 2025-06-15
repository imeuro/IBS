// Effetto fade-in sequenziale per le colonne della value proposition
const vpGraphic = document.querySelector('.value-proposition-graphic');
if (vpGraphic) {
  const cols = Array.from(vpGraphic.querySelectorAll('.value-proposition-graphic__col'));
  let hasAnimated = false;

  const fadeInSequence = async () => {
    for (const col of cols) {
      col.classList.add('fade-in');
      await new Promise(resolve => setTimeout(resolve, 300));
    }
  };

  const observer = new window.IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !hasAnimated) {
        hasAnimated = true;
        fadeInSequence();
        obs.disconnect();
      }
    });
  }, {
    threshold: 0.2
  });

  observer.observe(vpGraphic);
} 