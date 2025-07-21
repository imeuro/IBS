<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Política de Cookies - IBS Lab S.r.l.</title>
  <meta name="description" content="Política de cookies de IBS Lab S.r.l. Descubre qué cookies utilizamos y cómo gestionarlas.">
  <meta name="keywords" content="política de cookies, cookies, IBS Lab, gestión cookies">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Política de Cookies - IBS Lab S.r.l.">
  <meta property="og:description" content="Política de cookies de IBS Lab S.r.l. Descubre qué cookies utilizamos y cómo gestionarlas.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="es_ES">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Política de Cookies - IBS Lab S.r.l.">
  <meta name="twitter:description" content="Política de cookies de IBS Lab S.r.l. Descubre qué cookies utilizamos y cómo gestionarlas.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/es/head.php'; ?>
</head>
<body class="page" data-page="cookie-policy">
  
  <?php include INCLUDES_PATH . '/es/header.php'; ?>

  <main>
    <section id="cookie-policy" class="section section--light" aria-labelledby="cookie-policy-heading">
      <h1 id="cookie-policy-heading" class="section__title">POLÍTICA DE COOKIES</h1>

      <hr class="ibs__divider" />
      
      <h2>Qué son las cookies</h2>
      <p>Las cookies son pequeños archivos de texto que los sitios visitados envían al terminal del usuario, donde se memorizan para ser luego retransmitidos a los mismos sitios en la visita sucesiva.</p>

      <h2>Cookies utilizadas en este sitio</h2>

      <h3>Cookies técnicas (no requieren consentimiento)</h3>
      <ul class="section__list">
        <li><strong>Cookies de sesión:</strong> Necesarias para el funcionamiento del sitio</li>
        <li><strong>Cookies de seguridad:</strong> Para garantizar la seguridad durante la navegación</li>
      </ul>

      <h3>Cookies de perfilación y marketing (requieren consentimiento)</h3>
      <ul class="section__list">
        <li><strong>Google Analytics:</strong> Para analizar las estadísticas de utilización del sitio en forma anónima</li>
        <li><strong>ID cookie:</strong> G-3CC61R12ZY</li>
        <li><strong>Finalidad:</strong> Comprender cómo los usuarios utilizan el sitio para mejorar sus funcionalidades</li>
        <li><strong>Duración:</strong> 26 meses</li>
        <li><strong>Titular:</strong> Google LLC</li>
        <li><strong>Política de Privacidad:</strong> <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">https://policies.google.com/privacy</a></li>
      </ul>

      <h2>Gestión de las cookies</h2>
      <p>Puedes gestionar tus preferencias sobre las cookies:</p>
      <ul class="section__list">
        <li><strong>Aceptando:</strong> Las cookies serán instaladas para mejorar tu experiencia de navegación</li>
        <li><strong>Rechazando:</strong> Solo las cookies técnicas necesarias serán utilizadas</li>
        <li><strong>A través del navegador:</strong> Puedes modificar las configuraciones de tu navegador para aceptar/rechazar las cookies</li>
      </ul>

      <h2>Cómo deshabilitar las cookies</h2>
      <p>Puedes deshabilitar las cookies directamente desde tu navegador:</p>
      <ul class="section__list">
        <li><strong>Chrome:</strong> Configuración > Privacidad y seguridad > Cookies</li>
        <li><strong>Firefox:</strong> Opciones > Privacidad y seguridad > Cookies y datos de sitios web</li>
        <li><strong>Safari:</strong> Preferencias > Privacidad > Cookies y datos de sitios web</li>
        <li><strong>Edge:</strong> Configuración > Cookies y autorizaciones sitio</li>
      </ul>

      <p><strong>Última actualización:</strong> 30 junio 2025</p>
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