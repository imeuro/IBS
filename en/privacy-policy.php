<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Privacy Policy - IBS Lab S.r.l.</title>
  <meta name="description" content="Privacy policy of IBS Lab S.r.l. Discover how we process your personal data in compliance with GDPR.">
  <meta name="keywords" content="privacy policy, GDPR, IBS Lab, personal data processing">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Privacy Policy - IBS Lab S.r.l.">
  <meta property="og:description" content="Privacy policy of IBS Lab S.r.l.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="en_US">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Privacy Policy - IBS Lab S.r.l.">
  <meta name="twitter:description" content="Privacy policy of IBS Lab S.r.l.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/en/head.php'; ?>
</head>
<body class="page" data-page="privacy-policy">
  
  <?php include INCLUDES_PATH . '/en/header.php'; ?>

  <main>
    <section id="privacy-policy" class="section section--light" aria-labelledby="privacy-policy-heading">
      <h1 id="privacy-policy-heading" class="section__title">PRIVACY POLICY</h1>

      <hr class="ibs__divider" />
      
      <p><strong>Data Controller:</strong> IBSlab S.r.l.<br>
      <strong>Registered office:</strong> Via Paolo Da Cannobio 9 - 20122 Milan<br>
      <strong>Email:</strong> info@ibslab.eu<br>
      <!-- <strong>PEC:</strong> info@ibslab.eu</p> -->

      <h2>1. PURPOSE OF PROCESSING</h2>
      <p>Your personal data is processed for the following purposes:</p>

      <h3>a) Contact requests</h3>
      <ul class="section__list">
        <li><strong>Purpose:</strong> Responding to requests for information and contact via the form on the website</li>
        <li><strong>Legal basis:</strong> Consent of the data subject (Art. 6(1)(a) GDPR)</li>
        <li><strong>Data processed:</strong> First name, last name, email, message and other data voluntarily provided</li>
      </ul>

      <h3>b) Unsolicited applications</h3>
      <ul class="section__list">
        <li><strong>Purpose:</strong> Management of applications for job positions, evaluation of professional profile</li>
        <li><strong>Legal basis:</strong> Consent of the data subject for sending the application (art. 6, par. 1, lett. a GDPR)</li>
        <li><strong>Data processed:</strong> First name, last name, email, curriculum vitae and other data contained in the documents sent</li>
      </ul>

      <h2>2. PROCESSING METHODS</h2>
      <p>Personal data are processed by computer and/or telematic means, with organisational methods and logic strictly related to the purposes indicated. Appropriate security measures are applied to prevent loss, illicit or incorrect use of the data.</p>

      <h2>3. DATA RETENTION</h2>
      <ul class="section__list">
        <li><strong>Contact requests:</strong> Data are kept for the time necessary to process the request and in any case no longer than 24 months</li>
        <li><strong>Applications:</strong> Data is retained for a maximum period of 2 years after receipt, unless otherwise notified by the data subject</li>
      </ul>

      <h2>4. COMMUNICATION AND DISSEMINATION</h2>
      <p>Personal data shall not be disseminated and may only be communicated to:</p>
      <ul class="section__list">
        <li>Persons authorised to process data for the purposes of assistance and maintenance of the computer system</li>
        <li>Consultants and professionals, in their capacity as data processors</li>
        <li>Competent authorities for compliance with the law</li>
      </ul>

      <h2>5. RIGHTS OF THE INTERESTED PARTY</h2>
      <p>Pursuant to Articles 15-22 of the GDPR, you have the right to:</p>
      <ul class="section__list">
        <li>Access your personal data</li>
        <li>Rectify inaccurate data or supplement them</li>
        <li>Delete data (right to be forgotten)</li>
        <li>Restrict processing</li>
        <li>Data portability</li>
        <li>Object to processing</li>
        <li>Withdraw consent at any time</li>
      </ul>
      <p>To exercise your rights, please contact us at: info@ibslab.eu</p>

      <h2>6. CHANGES TO THE PRIVACY POLICY</h2>
      <p>This policy may be updated periodically. We encourage you to check this page regularly to stay informed about how we treat your data.</p>

      <h2>7. CONTACT</h2>
      <p>If you have any questions regarding this Privacy Policy, please contact us:</p>
      <ul class="section__list">
        <li><strong>Email:</strong> info@ibslab.eu</li>
        <li><strong>Address:</strong> Via Paolo Da Cannobio 9 - 20122 Milan</li>
      </ul>

      <p><strong>Last updated:</strong> 30 June 2025</p>
    </section>
  </main>
  
  <!-- Footer -->
  <?php include INCLUDES_PATH . '/en/footer.php'; ?>

  <!-- Scripts - Optimized for LCP -->
  <script src="<?php echo assetWithVersionSafe('js/script.js'); ?>" type="module" defer></script>
</body>
</html> 