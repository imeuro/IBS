<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>IBS Lab - Compliance Finanziaria | Supporto normativo EMIR, MiFID, POG, SFTR</title>
  <meta name="description" content="IBS Lab offre supporto operativo e consulenza sulla compliance finanziaria: normative europee e americane, Compliance Framework integrato, Compliance HUB, gestione anomalie e QA.">
  <meta name="keywords" content="compliance finanziaria, EMIR, MiFID, POG, SFTR, MAR, DFA, compliance framework, Compliance HUB, normative bancarie, consulenza regolamentare">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl('it/compliance-finanziaria'); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl('it/compliance-finanziaria'); ?>">
  <meta property="og:title" content="IBS Lab - Compliance Finanziaria">
  <meta property="og:description" content="Supporto operativo e consulenza sulle normative europee ed americane. Compliance Framework integrato per l'intero ciclo di vita della compliance.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="it_IT">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl('it/compliance-finanziaria'); ?>">
  <meta name="twitter:title" content="IBS Lab - Compliance Finanziaria">
  <meta name="twitter:description" content="Supporto operativo e consulenza sulle normative europee ed americane. Compliance Framework integrato.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/it/head.php'; ?>
</head>
<body class="page" data-page="compliance-finanziaria">
  
  <?php include INCLUDES_PATH . '/it/header.php'; ?>

  <main>
    <section id="compliance-finanziaria" class="section section--light" aria-labelledby="compliance-finanziaria-heading">
      <h1 id="compliance-finanziaria-heading" class="section__title">Compliance Finanziaria</h1>

      <hr class="ibs__divider" />
      
      <p>Forniamo supporto operativo e consulenza specifica sulle normative europee ed americane, con un modello di Compliance Framework integrato che copre l'intero ciclo di vita della compliance normativa.</p>

      <ul class="section__list">
        <li>
          <strong class="section__list-title">Supporto normativo europeo e americano</strong>
          <p>Forniamo supporto operativo e consulenza specifica sulle normative europee ed americane — EMIR, MiFID, POG, SFTR, MAR, DFA, …</p>
        </li>
        <li>
          <strong class="section__list-title">Compliance Framework integrato</strong>
          <p>Offriamo un modello operativo di <strong>COMPLIANCE FRAMEWORK</strong> integrato, capace di gestire simultaneamente le diverse direttive attraverso un'architettura centralizzata.</p>
        </li>
        <li>
          <strong class="section__list-title">Ciclo di vita della compliance</strong>
          <p>Il <strong>COMPLIANCE FRAMEWORK</strong> copre l'intero ciclo di vita delle compliance normative attraverso:</p>
          <ul class="section__list section__list--nested">
            <li>la Soluzione Tecnologica/Funzionale (Compliance HUB);</li>
            <li>la Gestione giornaliera delle anomalie e la Due Diligence periodica del Sistema (AM);</li>
            <li>l'Analisi Qualitativa del lavoro svolto (QA);</li>
            <li>gli Algoritmi proprietari basati sull'Intelligenza Artificiale (AI).</li>
          </ul>
        </li>
      </ul>
    </section>
  </main>
  
  <!-- Footer -->
  <?php include INCLUDES_PATH . '/it/footer.php'; ?>

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
