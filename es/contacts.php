<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="es">
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
  <meta property="og:locale" content="es_ES">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="IBS Lab - Innovative Banking Solutions">
  <meta name="twitter:description" content="Soluzioni innovative per la gestione del ciclo di vita dei prodotti finanziari. Partner ufficiale di Kore Labs.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/es/head.php'; ?>
</head>
<body class="page" data-page="contacts">
  
  <?php include INCLUDES_PATH . '/es/header.php'; ?>

  <main>
    <!-- Soluzioni -->
    <section id="contacts" class="section section--light" aria-labelledby="contacts-heading">

        <h1 id="contacts-heading" class="section__title">Contattaci</h1>
        
        <hr class="ibs__divider" />

        <p>Hai domande sui nostri servizi o vuoi saperne di più su come possiamo aiutarti? Compila il form sottostante e ti risponderemo al più presto.</p>

        <p class="form-note"><span class="required">*</span> I campi contrassegnati da asterisco sono obbligatori</p>

        <form id="contact-form" class="contact-form" action="<?php echo url('process-contact.php'); ?>" method="POST" novalidate>
          
          <!-- Campo di controllo automatico -->
          <div class="form-field-extra">
            <label for="company_url">URL Aziendale</label>
            <input type="url" id="company_url" name="company_url" tabindex="-1" autocomplete="off">
          </div>
          
          <div class="form-row">
            <div class="form-group">
              <label for="azienda">Azienda</label>
              <input type="text" id="azienda" name="azienda" class="form-input">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="nome">Nome <span class="required">*</span></label>
              <input type="text" id="nome" name="nome" class="form-input" required aria-required="true">
            </div>
            <div class="form-group">
              <label for="cognome">Cognome <span class="required">*</span></label>
              <input type="text" id="cognome" name="cognome" class="form-input" required aria-required="true">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label class="form-label">Preferenza di contatto <span class="required">*</span></label>
              <div class="radio-group">
                <label class="radio-label">
                  <input type="radio" name="preferenza_contatto" value="email" class="radio-input">
                  <span class="radio-custom"></span>
                  <span class="radio-text">Solo email</span>
                </label>
                <label class="radio-label">
                  <input type="radio" name="preferenza_contatto" value="telefono" class="radio-input">
                  <span class="radio-custom"></span>
                  <span class="radio-text">Solo telefono</span>
                </label>
                <label class="radio-label">
                  <input type="radio" name="preferenza_contatto" value="entrambi" class="radio-input" checked>
                  <span class="radio-custom"></span>
                  <span class="radio-text">Entrambi</span>
                </label>
              </div>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group">
              <label for="email">Email <span class="required">*</span></label>
              <input type="email" id="email" name="email" class="form-input" required aria-required="true">
            </div>
            <div class="form-group">
              <label for="telefono">Telefono <span class="required">*</span></label>
              <input type="tel" id="telefono" name="telefono" class="form-input" required aria-required="true">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="nazione">Nazione</label>
              <input type="text" id="nazione" name="nazione" class="form-input">
            </div>
            <div class="form-group">
              <label for="citta">Città</label>
              <input type="text" id="citta" name="citta" class="form-input">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label for="messaggio">Messaggio <span class="required">*</span></label>
              <textarea id="messaggio" name="messaggio" class="form-textarea" rows="5" required aria-required="true" placeholder="Descrivi la tua richiesta..."></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label class="checkbox-label">
                <input type="checkbox" id="privacy" name="privacy" required aria-required="true">
                <span class="checkbox-custom"></span>
                <span class="checkbox-text">Accetto l'<a href="<?php echo url('it/privacy-cookie-policy.php'); ?>" target="_blank" rel="noopener">informativa sulla privacy</a> e autorizzo il trattamento dei miei dati personali <span class="required">*</span></span>
              </label>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <button type="submit" class="form-submit">
                <span class="submit-text">Invia Messaggio</span>
                <span class="submit-loading" style="display: none;">Invio in corso...</span>
              </button>
            </div>
          </div>

          <div id="form-message" class="form-message" style="display: none;" role="alert" aria-live="polite"></div>
        </form>
        
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