<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Privacy Policy - IBS Lab S.r.l.</title>
  <meta name="description" content="Informativa sulla privacy di IBS Lab S.r.l. Scopri come trattiamo i tuoi dati personali in conformità al GDPR.">
  <meta name="keywords" content="privacy policy, GDPR, IBS Lab, trattamento dati personali">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Privacy Policy - IBS Lab S.r.l.">
  <meta property="og:description" content="Informativa sulla privacy di IBS Lab S.r.l.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="it_IT">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Privacy Policy - IBS Lab S.r.l.">
  <meta name="twitter:description" content="Informativa sulla privacy di IBS Lab S.r.l.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/en/head.php'; ?>
</head>
<body class="page" data-page="privacy-policy">
  
  <?php include INCLUDES_PATH . '/en/header.php'; ?>

  <main>
    <section id="privacy-policy" class="section section--light" aria-labelledby="privacy-policy-heading">
      <h1 id="privacy-policy-heading" class="section__title">INFORMATIVA SULLA PRIVACY</h1>

      <hr class="ibs__divider" />
      
      <p><strong>Titolare del trattamento:</strong> IBSlab S.r.l.<br>
      <strong>Sede legale:</strong> Via Paolo Da Cannobio 9 - 20122 Milano<br>
      <strong>Email:</strong> info@ibslab.eu<br>
      <!-- <strong>PEC:</strong> info@ibslab.eu</p> -->

      <h2>1. FINALITÀ DEL TRATTAMENTO</h2>
      <p>I tuoi dati personali vengono trattati per le seguenti finalità:</p>

      <h3>a) Richieste di contatto</h3>
      <ul class="section__list">
        <li><strong>Finalità:</strong> Rispondere alle richieste di informazioni e contatti tramite il modulo presente sul sito</li>
        <li><strong>Base giuridica:</strong> Consenso dell'interessato (art. 6, par. 1, lett. a GDPR)</li>
        <li><strong>Dati trattati:</strong> Nome, cognome, email, messaggio e altri dati volontariamente forniti</li>
      </ul>

      <h3>b) Candidature spontanee</h3>
      <ul class="section__list">
        <li><strong>Finalità:</strong> Gestione delle candidature per posizioni lavorative, valutazione del profilo professionale</li>
        <li><strong>Base giuridica:</strong> Consenso dell'interessato per l'invio della candidatura (art. 6, par. 1, lett. a GDPR)</li>
        <li><strong>Dati trattati:</strong> Nome, cognome, email, curriculum vitae e altri dati contenuti nei documenti inviati</li>
      </ul>

      <h2>2. MODALITÀ DI TRATTAMENTO</h2>
      <p>I dati personali sono trattati con strumenti informatici e/o telematici, con modalità organizzative e logiche strettamente correlate alle finalità indicate. Vengono applicate misure di sicurezza adeguate per prevenire la perdita, l'uso illecito o non corretto dei dati.</p>

      <h2>3. CONSERVAZIONE DEI DATI</h2>
      <ul class="section__list">
        <li><strong>Richieste di contatto:</strong> I dati vengono conservati per il tempo necessario a evadere la richiesta e comunque non oltre 24 mesi</li>
        <li><strong>Candidature:</strong> I dati vengono conservati per un periodo massimo di 2 anni dalla ricezione, salvo diversa comunicazione da parte dell'interessato</li>
      </ul>

      <h2>4. COMUNICAZIONE E DIFFUSIONE</h2>
      <p>I dati personali non saranno diffusi e potranno essere comunicati esclusivamente a:</p>
      <ul class="section__list">
        <li>Soggetti autorizzati al trattamento per finalità di assistenza e manutenzione del sistema informatico</li>
        <li>Consulenti e professionisti, in qualità di responsabili del trattamento</li>
        <li>Autorità competenti per adempimenti di legge</li>
      </ul>

      <h2>5. DIRITTI DELL'INTERESSATO</h2>
      <p>Ai sensi degli artt. 15-22 del GDPR, hai il diritto di:</p>
      <ul class="section__list">
        <li>Accedere ai tuoi dati personali</li>
        <li>Rettificare dati inesatti o integrarli</li>
        <li>Cancellare i dati (diritto all'oblio)</li>
        <li>Limitare il trattamento</li>
        <li>Portabilità dei dati</li>
        <li>Opporti al trattamento</li>
        <li>Revocare il consenso in qualsiasi momento</li>
      </ul>
      <p>Per esercitare i tuoi diritti, contattaci all'indirizzo: info@ibslab.eu</p>

      <h2>6. MODIFICHE ALLA PRIVACY POLICY</h2>
      <p>Questa informativa può essere aggiornata periodicamente. Ti invitiamo a consultare regolarmente questa pagina per essere sempre informato su come trattiamo i tuoi dati.</p>

      <h2>7. CONTATTI</h2>
      <p>Per qualsiasi domanda relativa a questa Privacy Policy, contattaci:</p>
      <ul class="section__list">
        <li><strong>Email:</strong> info@ibslab.eu</li>
        <li><strong>Indirizzo:</strong> Via Paolo Da Cannobio 9 - 20122 Milano</li>
      </ul>

      <p><strong>Ultimo aggiornamento:</strong> 30 giugno 2025</p>
    </section>
  </main>
  
  <!-- Footer -->
  <?php include INCLUDES_PATH . '/en/footer.php'; ?>

  <!-- Scripts - Optimized for LCP -->
  <script src="<?php echo JS_PATH; ?>/script.js" type="module" defer></script>
</body>
</html> 