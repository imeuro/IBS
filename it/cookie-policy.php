<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Cookie Policy - IBS Lab S.r.l.</title>
  <meta name="description" content="Cookie policy di IBS Lab S.r.l. Scopri quali cookie utilizziamo e come gestirli.">
  <meta name="keywords" content="cookie policy, cookie, IBS Lab, gestione cookie">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Cookie Policy - IBS Lab S.r.l.">
  <meta property="og:description" content="Cookie policy di IBS Lab S.r.l. Scopri quali cookie utilizziamo e come gestirli.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="it_IT">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Cookie Policy - IBS Lab S.r.l.">
  <meta name="twitter:description" content="Cookie policy di IBS Lab S.r.l. Scopri quali cookie utilizziamo e come gestirli.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/it/head.php'; ?>
</head>
<body class="page" data-page="cookie-policy">
  
  <?php include INCLUDES_PATH . '/it/header.php'; ?>

  <main>
    <section id="cookie-policy" class="section section--light" aria-labelledby="cookie-policy-heading">
      <h1 id="cookie-policy-heading" class="section__title">COOKIE POLICY</h1>

      <hr class="ibs__divider" />
      
      <h2>Cosa sono i cookie</h2>
      <p>I cookie sono piccoli file di testo che i siti visitati inviano al terminale dell'utente, dove vengono memorizzati per essere poi ritrasmessi agli stessi siti alla visita successiva.</p>

      <h2>Cookie utilizzati su questo sito</h2>

      <h3>Cookie tecnici (non richiedono consenso)</h3>
      <ul class="section__list">
        <li><strong>Cookie di sessione:</strong> Necessari per il funzionamento del sito</li>
        <li><strong>Cookie di sicurezza:</strong> Per garantire la sicurezza durante la navigazione</li>
      </ul>

      <h3>Cookie di profilazione e marketing (richiedono consenso)</h3>
      <ul class="section__list">
        <li><strong>Google Analytics:</strong> Per analizzare le statistiche di utilizzo del sito in forma anonima</li>
        <li><strong>ID cookie:</strong> G-3CC61R12ZY</li>
        <li><strong>Finalità:</strong> Comprendere come gli utenti utilizzano il sito per migliorarne le funzionalità</li>
        <li><strong>Durata:</strong> 26 mesi</li>
        <li><strong>Titolare:</strong> Google LLC</li>
        <li><strong>Privacy Policy:</strong> <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">https://policies.google.com/privacy</a></li>
      </ul>

      <h2>Gestione dei cookie</h2>
      <p>Puoi gestire le tue preferenze sui cookie:</p>
      <ul class="section__list">
        <li><strong>Accettando:</strong> I cookie verranno installati per migliorare la tua esperienza di navigazione</li>
        <li><strong>Rifiutando:</strong> Solo i cookie tecnici necessari verranno utilizzati</li>
        <li><strong>Tramite browser:</strong> Puoi modificare le impostazioni del tuo browser per accettare/rifiutare i cookie</li>
      </ul>

      <h2>Come disabilitare i cookie</h2>
      <p>Puoi disabilitare i cookie direttamente dal tuo browser:</p>
      <ul class="section__list">
        <li><strong>Chrome:</strong> Impostazioni > Privacy e sicurezza > Cookie</li>
        <li><strong>Firefox:</strong> Opzioni > Privacy e sicurezza > Cookie e dati dei siti web</li>
        <li><strong>Safari:</strong> Preferenze > Privacy > Cookie e dati dei siti web</li>
        <li><strong>Edge:</strong> Impostazioni > Cookie e autorizzazioni sito</li>
      </ul>

      <p><strong>Ultimo aggiornamento:</strong> 30 giugno 2025</p>
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