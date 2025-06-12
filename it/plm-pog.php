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
<body class="page" data-page="plm-pog">
  
  <?php include INCLUDES_PATH . '/it/header.php'; ?>

  <main>
    <!-- Soluzioni -->
    <section id="plm-pog" class="section section--light" aria-labelledby="plm-pog-heading">
      <h1 id="plm-pog-heading" class="section__title">Product Lifecycle Management &<br> Product Oversight Governance</h1>
      <div class="section__partner">
            <a href="https://korelabs.co/" target="_blank" rel="noopener noreferrer" title="Visita il sito di Kore Labs"><img src="<?php echo IMAGES_PATH; ?>/kore_logo.svg" alt="Logo Kore Labs - Partner tecnologico" class="section__partner-logo" width="150" height="60" loading="lazy" decoding="async"></a>
          
            <p>
            Come <strong>partner di riferimento di <a href="https://korelabs.co/" target="_blank" rel="noopener noreferrer" title="Kore Labs - Product Lifecycle Management">KORElabs</a></strong> ed esperti della piattaforma <strong><a href="https://korelabs.co/koreprm/" target="_blank" rel="noopener noreferrer" title="KorePRM - Product Lifecycle Management">KorePRM®</a> per la gestione del ciclo di vita dei prodotti (Product Lifecycle Management)</strong>, ci offriamo per le attività di configurazione e migrazione, ponendo particolare attenzione all’ottimizzazione dei tempi di realizzo e dell’investimento economico
            </p>
        </div>
        



        
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