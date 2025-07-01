<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Lavora con noi - IBS Lab | Carriere in Banking Solutions e Product Management</title>
  <meta name="description" content="Unisciti al team IBS Lab! Offriamo opportunità di carriera nel settore banking solutions, product management e consulenza finanziaria. Invia la tua candidatura.">
  <meta name="keywords" content="lavoro, carriere, banking solutions, product management, IBS Lab, opportunità lavoro, fintech, consulenza finanziaria, candidature"
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Lavora con noi - IBS Lab">
  <meta property="og:description" content="Unisciti al team IBS Lab! Opportunità di carriera nel settore banking solutions e product management. Invia la tua candidatura.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="it_IT">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Lavora con noi - IBS Lab">
  <meta name="twitter:description" content="Unisciti al team IBS Lab! Opportunità di carriera nel settore banking solutions e product management."
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/hero/hero1.jpg" fetchpriority="high">
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/it/head.php'; ?>
</head>
<body class="page" data-page="lavora-con-noi">
  
  <?php include INCLUDES_PATH . '/it/header.php'; ?>

  <main>
    <!-- Lavora con noi -->
    <section id="lavora-con-noi" class="section section--light" aria-labelledby="lavora-con-noi-heading">

        <h1 id="lavora-con-noi-heading" class="section__title">Lavora con noi</h1>
        
        <hr class="ibs__divider" />

        <p>Unisciti al nostro team! Invia la tua candidatura compilando il form sottostante e allegando il tuo CV. Valuteremo il tuo profilo e ti contatteremo per le opportunità più in linea con le tue competenze.</p>

        <form id="job-application-form" class="contact-form" action="<?php echo url('process-job-application.php'); ?>" method="POST" enctype="multipart/form-data" novalidate>
          
          <!-- Campo di controllo automatico -->
          <div class="form-field-extra">
            <label for="company_url">URL Aziendale</label>
            <input type="url" id="company_url" name="company_url" tabindex="-1" autocomplete="off">
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
              <label for="cv" class="form-label">Carica il tuo CV <span class="required">*</span></label>
              <div class="file-upload-wrapper">
                <input type="file" id="cv" name="cv" class="file-input" accept=".pdf" required aria-required="true">
                <label for="cv" class="file-upload-label">
                  <span class="file-upload-text">Seleziona file PDF (max 2MB)</span>
                  <span class="file-upload-button">Sfoglia</span>
                </label>
                <div class="file-upload-info">
                  <span class="file-name"></span>
                  <span class="file-size"></span>
                </div>
              </div>
              <small class="form-help">Formati accettati: PDF. Dimensione massima: 2MB</small>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label for="messaggio">Messaggio</label>
              <textarea id="messaggio" name="messaggio" class="form-textarea" rows="5" placeholder="Parlaci di te, delle tue competenze e delle tue aspirazioni professionali..."></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label class="checkbox-label">
                <input type="checkbox" id="privacy" name="privacy" required aria-required="true">
                <span class="checkbox-custom"></span>
                <span class="checkbox-text">Accetto l'<a href="<?php echo url('it/privacy-cookie-policy.php'); ?>" target="_blank" rel="noopener">informativa sulla privacy</a> e autorizzo il trattamento dei miei dati personali e del mio CV <span class="required">*</span></span>
              </label>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <button type="submit" class="form-submit">
                <span class="submit-text">Invia Candidatura</span>
                <span class="submit-loading" style="display: none;">Invio in corso...</span>
              </button>
            </div>
          </div>

          <div id="form-message" class="form-message" style="display: none;" role="alert" aria-live="polite"></div>
        </form>
        
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