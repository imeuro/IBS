<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="en">
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
  <meta property="og:locale" content="en_US">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="IBS Lab - Innovative Banking Solutions">
  <meta name="twitter:description" content="Soluzioni innovative per la gestione del ciclo di vita dei prodotti finanziari. Partner ufficiale di Kore Labs.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/en/head.php'; ?>
</head>
<body class="page" data-page="mercati">
  
  <?php include INCLUDES_PATH . '/en/header.php'; ?>

  <main>
    <!-- Soluzioni -->
    <section id="mercati" class="section section--light" aria-labelledby="mercati-heading">

        <h1 id="mercati-heading" class="section__title">Mercati</h1>

        <hr class="ibs__divider" />

        <p>pagina in allestimento</p>
        
    </section>
  </main>
  
  <!-- Footer -->
  <?php include INCLUDES_PATH . '/en/footer.php'; ?>

  <!-- Scripts - Optimized for LCP -->
  <script src="<?php echo assetWithVersionSafe('js/script.js'); ?>" type="module" defer></script>
  
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