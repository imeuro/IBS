  <div class="topbar" aria-label="Selezione lingua">
    <div class="topbar__lang">
        <a href="<?php echo BASE_PATH; ?>/en/" title="Switch to English version" tabindex="0" hreflang="en"><img src="<?php echo IMAGES_PATH; ?>/uk.svg" alt="English flag" title="English" tabindex="0" width="24" height="24" loading="lazy" decoding="async"></a>
        <a href="<?php echo BASE_PATH; ?>/" title="Versión italiana" tabindex="0" hreflang="it"><img src="<?php echo IMAGES_PATH; ?>/it.svg" alt="Bandera italiana" title="Italiano" tabindex="0" width="24" height="24" loading="lazy" decoding="async"></a>
        <a class="current" href="<?php echo BASE_PATH; ?>/es/" title="Cambiar a versión en español" tabindex="0" hreflang="es"><img src="<?php echo IMAGES_PATH; ?>/es.svg" alt="Bandera española" title="Español" tabindex="0" width="24" height="24" loading="lazy" decoding="async"></a>
    </div>
  </div>
  
  <header class="header" role="banner">
    <div class="header__container">
      <h1 class="header__title"><a href="<?php echo BASE_PATH; ?>/es/"><img src="<?php echo IMAGES_PATH; ?>/IBS_logo.png" alt="Logo IBS Lab - Innovative Banking Solutions" class="header__logo" tabindex="0" width="200" height="80" fetchpriority="high" decoding="sync"></a></h1>
      
      <!-- Hamburger Button per Mobile -->
      <button class="header__hamburger" aria-label="Apri menu di navigazione" aria-expanded="false" tabindex="0">
        <img src="<?php echo IMAGES_PATH; ?>/hamb.svg" alt="Menu" class="header__hamburger-icon" width="24" height="24">
        <img src="<?php echo IMAGES_PATH; ?>/close.svg" alt="Chiudi" class="header__close-icon" width="24" height="24">
      </button>
      
      <nav class="header__nav" aria-label="Navigazione principale">
        <ul class="nav__list">
          <li class="nav__item has-submenu">
            <a href="#soluzioni" tabindex="0">soluciones</a>
            <ul class="nav__submenu">
              <li><a href="<?php echo url('es/value-proposition'); ?>" tabindex="0">Propuesta de valor</a></li>
              <li><a href="<?php echo url('es/plm-pog'); ?>" tabindex="0">PLM | POG</a></li>
            </ul>
          </li>
          <!-- <li class="nav__item">
            <a href="<?php // echo url('es/mercati'); ?>" tabindex="0">mercati</a>
          </li> -->
          <li class="nav__item has-submenu">
            <a href="#chi-siamo" tabindex="0">quiénes somos</a>
            <ul class="nav__submenu">
              <li><a href="<?php echo url('es/team'); ?>" tabindex="0">NOSOTROS</a></li>
              <li><a href="<?php echo url('es/partners'); ?>" tabindex="0">Nuestros Partners</a></li>
            </ul>
          </li>
          <li class="nav__item has-submenu">
            <a href="#contatti" tabindex="0">contactos</a>
            <ul class="nav__submenu">
              <li><a href="<?php echo url('es/contacts'); ?>" tabindex="0">Contacta con nosotros</a></li>
              <li><a href="<?php echo url('es/trabaja-con-nosotros'); ?>" tabindex="0">Trabaja con nosotros</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    
    <!-- Overlay per chiudere il menu -->
    <div class="header__overlay" aria-hidden="true"></div>
  </header>