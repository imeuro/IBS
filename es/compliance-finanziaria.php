<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>IBS Lab - Cumplimiento Financiero | Soporte normativo EMIR, MiFID, POG, SFTR</title>
  <meta name="description" content="IBS Lab ofrece soporte operativo y consultoría en cumplimiento financiero: normativas europeas y americanas, Compliance Framework integrado, Compliance HUB, gestión de anomalías y QA.">
  <meta name="keywords" content="cumplimiento financiero, EMIR, MiFID, POG, SFTR, MAR, DFA, compliance framework, Compliance HUB, normativa bancaria, consultoría regulatoria">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl('es/compliance-finanziaria'); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl('es/compliance-finanziaria'); ?>">
  <meta property="og:title" content="IBS Lab - Cumplimiento Financiero">
  <meta property="og:description" content="Soporte operativo y consultoría sobre normativas europeas y americanas. Compliance Framework integrado para todo el ciclo de vida del cumplimiento.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="es_ES">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl('es/compliance-finanziaria'); ?>">
  <meta name="twitter:title" content="IBS Lab - Cumplimiento Financiero">
  <meta name="twitter:description" content="Soporte operativo y consultoría sobre normativas europeas y americanas. Compliance Framework integrado.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/es/head.php'; ?>
</head>
<body class="page" data-page="compliance-finanziaria">
  
  <?php include INCLUDES_PATH . '/es/header.php'; ?>

  <main>
    <section id="compliance-finanziaria" class="section section--light" aria-labelledby="compliance-finanziaria-heading">
      <h1 id="compliance-finanziaria-heading" class="section__title">Cumplimiento Financiero</h1>

      <hr class="ibs__divider" />
      
      <p>Ofrecemos soporte operativo y consultoría específica sobre normativas europeas y americanas, con un modelo de Compliance Framework integrado que cubre todo el ciclo de vida del cumplimiento normativo.</p>

      <ul class="section__list">
        <li>
          <strong class="section__list-title">Soporte normativo europeo y americano</strong>
          <p>Ofrecemos soporte operativo y consultoría específica sobre normativas europeas y americanas — EMIR, MiFID, POG, SFTR, MAR, DFA, …</p>
        </li>
        <li>
          <strong class="section__list-title">Compliance Framework integrado</strong>
          <p>Ofrecemos un modelo operativo de <strong>COMPLIANCE FRAMEWORK</strong> integrado, capaz de gestionar simultáneamente las distintas directivas a través de una arquitectura centralizada.</p>
        </li>
        <li>
          <strong class="section__list-title">Ciclo de vida del cumplimiento</strong>
          <p>El <strong>COMPLIANCE FRAMEWORK</strong> cubre todo el ciclo de vida del cumplimiento normativo a través de:</p>
          <ul class="section__list section__list--nested">
            <li>la Solución Tecnológica/Funcional (Compliance HUB);</li>
            <li>la Gestión diaria de anomalías y la Due Diligence periódica del Sistema (AM);</li>
            <li>el Análisis Cualitativo del trabajo realizado (QA);</li>
            <li>los Algoritmos propietarios basados en Inteligencia Artificial (AI).</li>
          </ul>
        </li>
      </ul>
    </section>
  </main>
  
  <!-- Footer -->
  <?php include INCLUDES_PATH . '/es/footer.php'; ?>

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
