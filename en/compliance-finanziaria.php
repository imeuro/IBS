<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>IBS Lab - Financial Compliance | EMIR, MiFID, POG, SFTR Regulatory Support</title>
  <meta name="description" content="IBS Lab provides operational support and consulting on financial compliance: European and American regulations, integrated Compliance Framework, Compliance HUB, anomaly management and QA.">
  <meta name="keywords" content="financial compliance, EMIR, MiFID, POG, SFTR, MAR, DFA, compliance framework, Compliance HUB, banking regulations, regulatory consulting">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl('en/compliance-finanziaria'); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl('en/compliance-finanziaria'); ?>">
  <meta property="og:title" content="IBS Lab - Financial Compliance">
  <meta property="og:description" content="Operational support and consulting on European and American regulations. Integrated Compliance Framework for the full compliance lifecycle.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="en_US">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl('en/compliance-finanziaria'); ?>">
  <meta name="twitter:title" content="IBS Lab - Financial Compliance">
  <meta name="twitter:description" content="Operational support and consulting on European and American regulations. Integrated Compliance Framework.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/en/head.php'; ?>
</head>
<body class="page" data-page="compliance-finanziaria">
  
  <?php include INCLUDES_PATH . '/en/header.php'; ?>

  <main>
    <section id="compliance-finanziaria" class="section section--light" aria-labelledby="compliance-finanziaria-heading">
      <h1 id="compliance-finanziaria-heading" class="section__title">Financial Compliance</h1>

      <hr class="ibs__divider" />
      
      <p>We provide operational support and specific consulting on European and American regulations, with an integrated Compliance Framework model that covers the full regulatory compliance lifecycle.</p>

      <ul class="section__list">
        <li>
          <strong class="section__list-title">European and American regulatory support</strong>
          <p>We provide operational support and specific consulting on European and American regulations — EMIR, MiFID, POG, SFTR, MAR, DFA, …</p>
        </li>
        <li>
          <strong class="section__list-title">Integrated Compliance Framework</strong>
          <p>We offer an integrated operational <strong>COMPLIANCE FRAMEWORK</strong> model, capable of simultaneously managing different directives through a centralised architecture.</p>
        </li>
        <li>
          <strong class="section__list-title">Compliance lifecycle</strong>
          <p>The <strong>COMPLIANCE FRAMEWORK</strong> covers the full lifecycle of regulatory compliance through:</p>
          <ul class="section__list section__list--nested">
            <li>the Technological/Functional Solution (Compliance HUB);</li>
            <li>daily anomaly management and periodic System Due Diligence (AM);</li>
            <li>Qualitative Analysis of work performed (QA);</li>
            <li>proprietary algorithms based on Artificial Intelligence (AI).</li>
          </ul>
        </li>
      </ul>
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
