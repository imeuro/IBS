<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>IBS Lab - Innovative Banking Solutions | Consulenza Finanziaria e Product Management</title>
  <meta name="description" content="IBS Lab offre soluzioni innovative per la gestione del ciclo di vita dei prodotti finanziari. Partner ufficiale di Kore Labs in Italia, Svizzera e Spagna per Product Lifecycle Management.">
  <meta name="keywords" content="banking solutions, product management, POG, product oversight governance, kore labs, consulenza finanziaria, lifecycle management, compliance bancaria">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="IBS Lab - Innovative Banking Solutions">
  <meta property="og:description" content="Soluzioni innovative per la gestione del ciclo di vita dei prodotti finanziari. Partner ufficiale di Kore Labs per Product Lifecycle Management.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="it_IT">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="IBS Lab - Innovative Banking Solutions">
  <meta name="twitter:description" content="Soluzioni innovative per la gestione del ciclo di vita dei prodotti finanziari. Partner ufficiale di Kore Labs.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/hero/hero1.jpg" fetchpriority="high">
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/it/head.php'; ?>
</head>
<body class="page" data-page="value-proposition">
  
  <?php include INCLUDES_PATH . '/it/header.php'; ?>

  <main>
    <!-- Soluzioni -->
    <section id="value-proposition" class="section section--light" aria-labelledby="value-proposition-heading">
      <h1 id="value-proposition-heading" class="section__title">VALUE PROPOSITION</h1>

      <hr class="ibs__divider" />
      
      <p>
      La gestione del ciclo di vita del prodotto in ambito finanziario è altamente regolamentata ma la gestione è spesso manuale ed inefficiente, con dati diffusi in differenti repository. 
      </p>
    </section>

    <section id="value-proposition-content" class="section section--light" aria-labelledby="value-proposition-list-content">
      <div class="value-proposition-graphic" aria-label="Rappresentazione grafica dei rischi, processi e soluzioni">
        <!-- Colonna sinistra: Rischi e Processi -->
        <div class="vp-col vp-col--left value-proposition-graphic__col">
          <div class="vp-cell">
            <!-- Placeholder SVG icona rischio -->
            <span class="vp-icon" aria-label="Attenzione" tabindex="0">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
            </span>
            <div class="vp-text">
              <strong>ALTO RISCHIO DI SANZIONI</strong>
              <span class="vp-desc">e danni alla reputazione in caso di evidenze non soddisfacenti</span>
            </div>
          </div>
          <div class="vp-cell">
            <!-- Placeholder SVG icona processi lenti -->
            <span class="vp-icon" aria-label="Processi lenti" tabindex="0">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
            </span>
            <div class="vp-text">
              <strong>PROCESSI LENTI</strong>
              <span class="vp-desc">gestione manuale e tempi di commercializzazione più lunghi</span>
            </div>
          </div>
        </div>
        <!-- Linea di collegamento -->
        <div class="vp-col vp-col--connector value-proposition-graphic__col" aria-hidden="true">
          <svg class="vp-connector-svg" width="40" height="120" viewBox="0 0 40 120" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <!-- Linea verticale centrale -->
            <line x1="20" y1="10" x2="20" y2="110" stroke="#fff" stroke-width="1"/>
            <!-- Ramo orizzontale superiore -->
            <line x1="20" y1="10" x2="0" y2="10" stroke="#fff" stroke-width="1"/>
            <!-- Ramo orizzontale inferiore -->
            <line x1="20" y1="110" x2="0" y2="110" stroke="#fff" stroke-width="1"/>
            <!-- Ramo orizzontale centrale verso destra -->
            <line x1="20" y1="60" x2="40" y2="60" stroke="#fff" stroke-width="1"/>
          </svg>
        </div>
        <!-- Colonna centrale: Testo -->
        <div class="vp-col vp-col--center value-proposition-graphic__col">
          <div class="vp-main-text">
            ricerca di <strong>soluzioni digitali, modulari e configurabili</strong> per gestire e monitorare i prodotti in <strong>un ambiente controllato e integrato</strong> con una visione <strong>end-to-end</strong>
          </div>
        </div>
        <!-- Colonna destra: Cloud di parole -->
        <div class="vp-col vp-col--right value-proposition-graphic__col">
          <img src="<?php echo IMAGES_PATH; ?>/value-prop-cloud.png" alt="Cloud di parole: Product Lifecycle Management, strategy, workflow, data, process, service, PLM, Management, ecc." class="vp-cloud-img" loading="lazy">
        </div>
      </div>
    </section>
      

    <section id="value-proposition-closing" class="section section--light" aria-labelledby="value-proposition-list-closing">
      <ul class="section__list">
        <li><strong>Offriamo soluzioni innovative al problema complesso della gestione del ciclo di vita dei prodotti finanziaria</strong></li>
        <li><strong>Aiutiamo i nostri clienti a ridefinire digitalmente il modo in cui gestiscono i loro prodotti e servizi</strong></li>
        <li>Forniamo strumenti moderni per garantire ai professionisti impegnati in ogni aspetto del <strong>product management</strong> e della <strong>Product Oversight and Governance (POG)</strong>
          <ul class="section__list">
            <li><strong>tracciabilità completa e trasparente</strong></li>
            <li><strong>governo dinamico della conformità</strong></li>
            <li><strong>business intelligence avanzata</strong></li> 
          </ul>
        </li>
      </ul>


        
    </section>
  </main>
  
  <!-- Footer -->
  <?php include INCLUDES_PATH . '/it/footer.php'; ?>

  <!-- Scripts - Optimized for LCP -->
  <script src="<?php echo JS_PATH; ?>/script.js" type="module" defer></script>
  
  <!-- Google Analytics - Non-blocking -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-3CC61R12ZY"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-3CC61R12ZY');
  </script>
</body>
</html> 