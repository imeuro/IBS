<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Cookie Policy - IBS Lab S.r.l.</title>
  <meta name="description" content="Cookie policy of IBS Lab S.r.l. Discover which cookies we use and how to manage them.">
  <meta name="keywords" content="cookie policy, cookies, IBS Lab, cookie management">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Cookie Policy - IBS Lab S.r.l.">
  <meta property="og:description" content="Cookie policy of IBS Lab S.r.l. Discover which cookies we use and how to manage them.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="en_US">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Cookie Policy - IBS Lab S.r.l.">
  <meta name="twitter:description" content="Cookie policy of IBS Lab S.r.l. Discover which cookies we use and how to manage them.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/en/head.php'; ?>
</head>
<body class="page" data-page="cookie-policy">
  
  <?php include INCLUDES_PATH . '/en/header.php'; ?>

  <main>
    <section id="cookie-policy" class="section section--light" aria-labelledby="cookie-policy-heading">
      <h1 id="cookie-policy-heading" class="section__title">COOKIE POLICY</h1>

      <hr class="ibs__divider" />
      
      <h2>What are cookies</h2>
      <p>Cookies are small text files that sites you visit send to your terminal, where they are stored and then retransmitted to the same sites on your next visit.</p>

      <h2>Cookies used on this site</h2>

      <h3>Technical cookies (do not require consent)</h3>
      <ul class="section__list">
        <li><strong>Session cookies:</strong> Necessary for the operation of the site</li>
        <li><strong>Security cookies:</strong> To ensure security while browsing</li>
      </ul>

      <h3>Profiling and marketing cookies (require consent)</h3>
      <ul class="section__list">
        <li><strong>Google Analytics:</strong> To analyse site usage statistics anonymously</li>
        <li><strong>Cookie ID:</strong> G-3CC61R12ZY</li>
        <li><strong>Purpose:</strong> To understand how users use the site to improve functionality</li>
        <li><strong>Duration:</strong> 26 months</li>
        <li><strong>Owner:</strong> Google LLC</li>
        <li><strong>Privacy Policy:</strong> <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">https://policies.google.com/privacy</a></li>
      </ul>

      <h2>Managing cookies</h2>
      <p>You can manage your cookie preferences:</p>
      <ul class="section__list">
        <li><strong>Accepting:</strong> Cookies will be installed to improve your browsing experience</li>
        <li><strong>Rejecting:</strong> Only necessary technical cookies will be used</li>
        <li><strong>Via browser:</strong> You can change your browser settings to accept/reject cookies</li>
      </ul>

      <h2>How to disable cookies</h2>
      <p>You can disable cookies directly from your browser:</p>
      <ul class="section__list">
        <li><strong>Chrome:</strong> Settings > Privacy and Security > Cookies</li>
        <li><strong>Firefox:</strong> Options > Privacy and security > Cookies and website data</li>
        <li><strong>Safari:</strong> Preferences > Privacy > Cookies and website data</li>
        <li><strong>Edge:</strong> Settings > Cookies and site permissions</li>
      </ul>

      <p><strong>Last update:</strong> June 30th, 2025</p>
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