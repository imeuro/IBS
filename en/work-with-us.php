<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Work with us - IBS Lab | Careers in Banking Solutions and Product Management</title>
  <meta name="description" content="Join the IBS Lab team! We offer career opportunities in banking solutions, product management and financial consulting. Send your application.">
  <meta name="keywords" content="jobs, careers, banking solutions, product management, IBS Lab, job opportunities, fintech, financial consulting, applications">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Work with us - IBS Lab">
  <meta property="og:description" content="Join the IBS Lab team! Career opportunities in banking solutions and product management. Send your application.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="en_US">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Work with us - IBS Lab">
  <meta name="twitter:description" content="Join the IBS Lab team! Career opportunities in banking solutions and product management.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/en/head.php'; ?>
</head>
<body class="page" data-page="lavora-con-noi">
  
  <?php include INCLUDES_PATH . '/en/header.php'; ?>

  <main>
    <!-- Lavora con noi -->
    <section id="lavora-con-noi" class="section section--light" aria-labelledby="lavora-con-noi-heading">

        <h1 id="lavora-con-noi-heading" class="section__title">Work with us</h1>
        
        <hr class="ibs__divider" />

        <p>Join our team! Send your application by filling out the form below and attaching your CV. We will evaluate your profile and contact you for opportunities that best match your skills.</p>

        <p class="form-note"><span class="required">*</span> Fields marked with an asterisk are required</p>

        <form id="job-application-form" class="contact-form" action="<?php echo url('process-job-application.php'); ?>" method="POST" enctype="multipart/form-data" novalidate>
          
          <!-- Campo di controllo automatico -->
          <div class="form-field-extra">
            <label for="company_url">Company URL</label>
            <input type="url" id="company_url" name="company_url" tabindex="-1" autocomplete="off">
          </div>
          
          <div class="form-row">
            <div class="form-group">
              <label for="nome">First Name <span class="required">*</span></label>
              <input type="text" id="nome" name="nome" class="form-input" required aria-required="true">
            </div>
            <div class="form-group">
              <label for="cognome">Last Name <span class="required">*</span></label>
              <input type="text" id="cognome" name="cognome" class="form-input" required aria-required="true">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label class="form-label">Contact Preference <span class="required">*</span></label>
              <div class="radio-group">
                <label class="radio-label">
                  <input type="radio" name="preferenza_contatto" value="email" class="radio-input">
                  <span class="radio-custom"></span>
                  <span class="radio-text">Email only</span>
                </label>
                <label class="radio-label">
                  <input type="radio" name="preferenza_contatto" value="telefono" class="radio-input">
                  <span class="radio-custom"></span>
                  <span class="radio-text">Phone only</span>
                </label>
                <label class="radio-label">
                  <input type="radio" name="preferenza_contatto" value="entrambi" class="radio-input" checked>
                  <span class="radio-custom"></span>
                  <span class="radio-text">Both</span>
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
              <label for="telefono">Phone <span class="required">*</span></label>
              <input type="tel" id="telefono" name="telefono" class="form-input" required aria-required="true">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="nazione">Country</label>
              <input type="text" id="nazione" name="nazione" class="form-input">
            </div>
            <div class="form-group">
              <label for="citta">City</label>
              <input type="text" id="citta" name="citta" class="form-input">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label for="cv" class="form-label">Upload your CV <span class="required">*</span></label>
              <div class="file-upload-wrapper">
                <input type="file" id="cv" name="cv" class="file-input" accept=".pdf" required aria-required="true">
                <label for="cv" class="file-upload-label">
                  <span class="file-upload-text">Select PDF file (max 2MB)</span>
                  <span class="file-upload-button">Browse</span>
                </label>
                <div class="file-upload-info">
                  <span class="file-name"></span>
                  <span class="file-size"></span>
                </div>
              </div>
              <small class="form-help">Accepted formats: PDF. Maximum size: 2MB</small>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label for="messaggio">Message</label>
              <textarea id="messaggio" name="messaggio" class="form-textarea" rows="5" placeholder="Tell us about yourself, your skills and your professional aspirations..."></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <label class="checkbox-label">
                <input type="checkbox" id="privacy" name="privacy" required aria-required="true">
                <span class="checkbox-custom"></span>
                <span class="checkbox-text">I accept the <a href="<?php echo url('en/privacy-policy.php'); ?>" target="_blank" rel="noopener">privacy policy</a> and authorize the processing of my personal data and CV <span class="required">*</span></span>
              </label>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group form-group--full">
              <button type="submit" class="form-submit">
                <span class="submit-text">Send Application</span>
                <span class="submit-loading" style="display: none;">Sending...</span>
              </button>
            </div>
          </div>

          <div id="form-message" class="form-message" style="display: none;" role="alert" aria-live="polite"></div>
        </form>
        
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