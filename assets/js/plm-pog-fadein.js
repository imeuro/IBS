// Effetto fade-in sequenziale per le .vp-cell in #plm-pog-content
const plmPogContent = document.querySelector('#plm-pog-content');
if (plmPogContent) {
  const cells = Array.from(plmPogContent.querySelectorAll('.vp-cell'));
  let hasAnimated = false;

  const fadeInSequence = async () => {
    for (const cell of cells) {
      cell.classList.add('fade-in');
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

  observer.observe(plmPogContent);
} 