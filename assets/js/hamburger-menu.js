/**
 * Hamburger Menu JavaScript
 * Gestisce il menu mobile responsive con sottomenu
 */

// Selettori degli elementi
const hamburgerBtn = document.querySelector('.header__hamburger');
const nav = document.querySelector('.header__nav');
const overlay = document.querySelector('.header__overlay');
const submenuItems = document.querySelectorAll('.nav__item.has-submenu');
const body = document.body;

// Verifica che tutti gli elementi necessari esistano
if (!hamburgerBtn || !nav || !overlay) {
  console.warn('Hamburger menu: elementi necessari non trovati');
}

// Stato del menu
let isMenuOpen = false;

/**
 * Toggle del menu hamburger
 */
const toggleMenu = () => {
  isMenuOpen = !isMenuOpen;
  
  if (isMenuOpen) {
    openMenu();
  } else {
    closeMenu();
  }
};

/**
 * Apertura del menu
 */
const openMenu = () => {
  nav.classList.add('is-open');
  overlay.classList.add('is-active');
  hamburgerBtn.setAttribute('aria-expanded', 'true');
  hamburgerBtn.setAttribute('aria-label', 'Chiudi menu di navigazione');
  
  // Impedisce lo scroll del body
  body.style.overflow = 'hidden';
  
  // Focus management
  const firstLink = nav.querySelector('a');
  if (firstLink) {
    setTimeout(() => firstLink.focus(), 300);
  }
};

/**
 * Chiusura del menu
 */
const closeMenu = () => {
  nav.classList.remove('is-open');
  overlay.classList.remove('is-active');
  hamburgerBtn.setAttribute('aria-expanded', 'false');
  hamburgerBtn.setAttribute('aria-label', 'Apri menu di navigazione');
  
  // Ripristina lo scroll del body
  body.style.overflow = '';
  
  // Chiude tutti i sottomenu aperti
  submenuItems.forEach(item => {
    item.classList.remove('is-expanded');
  });
  
  isMenuOpen = false;
};

/**
 * Toggle del sottomenu
 */
const toggleSubmenu = (submenuItem) => {
  const isExpanded = submenuItem.classList.contains('is-expanded');
  
  // Chiude tutti gli altri sottomenu
  submenuItems.forEach(item => {
    if (item !== submenuItem) {
      item.classList.remove('is-expanded');
    }
  });
  
  // Toggle del sottomenu corrente
  if (isExpanded) {
    submenuItem.classList.remove('is-expanded');
  } else {
    submenuItem.classList.add('is-expanded');
  }
};

/**
 * Gestione dei click sui link con sottomenu
 */
const handleSubmenuClick = (e) => {
  // Solo su mobile
  if (window.innerWidth >= 1000) return;
  
  const submenuItem = e.target.closest('.nav__item.has-submenu');
  if (!submenuItem) return;
  
  e.preventDefault();
  toggleSubmenu(submenuItem);
};

/**
 * Chiusura del menu con tasto Escape
 */
const handleEscapeKey = (e) => {
  if (e.key === 'Escape' && isMenuOpen) {
    closeMenu();
    hamburgerBtn.focus();
  }
};

/**
 * Gestione del ridimensionamento della finestra
 */
const handleResize = () => {
  if (window.innerWidth >= 1000 && isMenuOpen) {
    closeMenu();
  }
};

// Touch events per una migliore UX mobile
let touchStartX = 0;
let touchEndX = 0;

const handleTouchStart = (e) => {
  touchStartX = e.changedTouches[0].screenX;
};

const handleTouchEnd = (e) => {
  touchEndX = e.changedTouches[0].screenX;
  handleSwipe();
};

const handleSwipe = () => {
  const swipeThreshold = 50;
  const swipeDistance = touchStartX - touchEndX;
  
  // Swipe verso destra per chiudere il menu
  if (swipeDistance < -swipeThreshold && isMenuOpen) {
    closeMenu();
  }
};

/**
 * Inizializza il menu hamburger
 */
const initHamburgerMenu = () => {
  // Event listeners
  hamburgerBtn.addEventListener('click', toggleMenu);
  overlay.addEventListener('click', closeMenu);
  document.addEventListener('keydown', handleEscapeKey);
  window.addEventListener('resize', handleResize);

  // Click sui link con sottomenu (solo mobile)
  submenuItems.forEach(item => {
    const link = item.querySelector('a');
    if (link) {
      link.addEventListener('click', handleSubmenuClick);
    }
  });

  // Click sui link del sottomenu - chiude il menu
  const submenuLinks = document.querySelectorAll('.nav__submenu a');
  submenuLinks.forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth < 1000) {
        setTimeout(closeMenu, 150);
      }
    });
  });

  // Inizializzazione touch events
  nav.addEventListener('touchstart', handleTouchStart, { passive: true });
  nav.addEventListener('touchend', handleTouchEnd, { passive: true });
};

// Esporta la funzione di inizializzazione
export default initHamburgerMenu; 