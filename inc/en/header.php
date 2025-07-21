  <div class="topbar" aria-label="Selezione lingua">
    <div class="topbar__lang">
        <a class="current" href="<?php echo BASE_PATH; ?>/en/" title="Switch to English version" tabindex="0" hreflang="en"><img src="<?php echo IMAGES_PATH; ?>/uk.svg" alt="English flag" title="English" tabindex="0" width="24" height="24" loading="lazy" decoding="async"></a>
        <a href="<?php echo BASE_PATH; ?>/" title="Cambia a versione italiana" tabindex="0" hreflang="it"><img src="<?php echo IMAGES_PATH; ?>/it.svg" alt="Bandiera italiana" title="Italiano" tabindex="0" width="24" height="24" loading="lazy" decoding="async"></a>
        <a href="<?php echo BASE_PATH; ?>/es/" title="Cambiar a versión en español" tabindex="0" hreflang="es"><img src="<?php echo IMAGES_PATH; ?>/es.svg" alt="Bandera española" title="Español" tabindex="0" width="24" height="24" loading="lazy" decoding="async"></a>
    </div>
  </div>
  
  <header class="header" role="banner">
    <div class="header__container">
      <h1 class="header__title"><a href="<?php echo BASE_PATH; ?>/en/"><img src="<?php echo IMAGES_PATH; ?>/IBS_logo.png" alt="Logo IBS Lab - Innovative Banking Solutions" class="header__logo" tabindex="0" width="200" height="80" fetchpriority="high" decoding="sync"></a></h1>
      
      <!-- Hamburger Button per Mobile -->
      <button class="header__hamburger" aria-label="Apri menu di navigazione" aria-expanded="false" tabindex="0">
        <img src="<?php echo IMAGES_PATH; ?>/hamb.svg" alt="Menu" class="header__hamburger-icon" width="24" height="24">
        <img src="<?php echo IMAGES_PATH; ?>/close.svg" alt="Chiudi" class="header__close-icon" width="24" height="24">
      </button>
      
      <nav class="header__nav" aria-label="Navigazione principale">
        <ul class="nav__list">
          <li class="nav__item has-submenu">
            <a href="#solutions" tabindex="0">Solutions</a>
            <ul class="nav__submenu">
              <li><a href="<?php echo url('en/value-proposition'); ?>" tabindex="0">Value Proposition</a></li>
              <li><a href="<?php echo url('en/plm-pog'); ?>" tabindex="0">PLM | POG</a></li>
            </ul>
          </li>
          <!-- <li class="nav__item">
            <a href="<?php // echo url('en/mercati'); ?>" tabindex="0">mercati</a>
          </li> -->
          <li class="nav__item has-submenu">
            <a href="#chi-siamo" tabindex="0">About</a>
            <ul class="nav__submenu">
              <li><a href="<?php echo url('en/team'); ?>" tabindex="0">Us</a></li>
              <li><a href="<?php echo url('en/partners'); ?>" tabindex="0">Our Partners</a></li>
            </ul>
          </li>
          <li class="nav__item has-submenu">
            <a href="#contatti" tabindex="0">Contacts</a>
            <ul class="nav__submenu">
              <li><a href="<?php echo url('en/contacts'); ?>" tabindex="0">Contact us</a></li>
              <li><a href="<?php echo url('en/work-with-us'); ?>" tabindex="0">Work with us</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    
    <!-- Overlay per chiudere il menu -->
    <div class="header__overlay" aria-hidden="true"></div>
  </header>