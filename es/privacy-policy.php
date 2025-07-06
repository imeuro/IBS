<!DOCTYPE html>
<?php require_once __DIR__ . '/../config.php'; ?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO Meta Tags -->
  <title>Política de Privacidad - IBS Lab S.r.l.</title>
  <meta name="description" content="Política de privacidad de IBS Lab S.r.l. Descubre cómo tratamos tus datos personales en conformidad con el GDPR.">
  <meta name="keywords" content="política de privacidad, GDPR, IBS Lab, tratamiento datos personales">
  <meta name="author" content="IBS Lab S.r.l.">
  <meta name="robots" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo absoluteUrl(); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo absoluteUrl(); ?>">
  <meta property="og:title" content="Política de Privacidad - IBS Lab S.r.l.">
  <meta property="og:description" content="Política de privacidad de IBS Lab S.r.l.">
  <meta property="og:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  <meta property="og:site_name" content="IBS Lab">
  <meta property="og:locale" content="es_ES">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo absoluteUrl(); ?>">
  <meta name="twitter:title" content="Política de Privacidad - IBS Lab S.r.l.">
  <meta name="twitter:description" content="Política de privacidad de IBS Lab S.r.l.">
  <meta name="twitter:image" content="<?php echo absoluteUrl(IMAGES_PATH . '/IBS_logo.png'); ?>">
  
  <link rel="preload" as="image" href="<?php echo IMAGES_PATH; ?>/IBS_logo.png" fetchpriority="high">
  <?php include INCLUDES_PATH . '/es/head.php'; ?>
</head>
<body class="page" data-page="privacy-policy">
  
  <?php include INCLUDES_PATH . '/es/header.php'; ?>

  <main>
    <section id="privacy-policy" class="section section--light" aria-labelledby="privacy-policy-heading">
      <h1 id="privacy-policy-heading" class="section__title">POLÍTICA DE PRIVACIDAD</h1>

      <hr class="ibs__divider" />
      
      <p><strong>Titular del tratamiento:</strong> IBSlab S.r.l.<br>
      <strong>Sede legal:</strong> Via Paolo Da Cannobio 9 - 20122 Milano<br>
      <strong>Email:</strong> info@ibslab.eu<br>
      <!-- <strong>PEC:</strong> info@ibslab.eu</p> -->

      <h2>1. FINALIDADES DEL TRATAMIENTO</h2>
      <p>Tus datos personales son tratados para las siguientes finalidades:</p>

      <h3>a) Solicitudes de contacto</h3>
      <ul class="section__list">
        <li><strong>Finalidad:</strong> Responder a las solicitudes de información y contactos a través del formulario presente en el sitio</li>
        <li><strong>Base jurídica:</strong> Consentimiento del interesado (art. 6, par. 1, letra a GDPR)</li>
        <li><strong>Datos tratados:</strong> Nombre, apellido, email, mensaje y otros datos voluntariamente proporcionados</li>
      </ul>

      <h3>b) Candidaturas espontáneas</h3>
      <ul class="section__list">
        <li><strong>Finalidad:</strong> Gestión de candidaturas para posiciones laborales, evaluación del perfil profesional</li>
        <li><strong>Base jurídica:</strong> Consentimiento del interesado para el envío de la candidatura (art. 6, par. 1, letra a GDPR)</li>
        <li><strong>Datos tratados:</strong> Nombre, apellido, email, curriculum vitae y otros datos contenidos en los documentos enviados</li>
      </ul>

      <h2>2. MODALIDADES DE TRATAMIENTO</h2>
      <p>Los datos personales son tratados con instrumentos informáticos y/o telemáticos, con modalidades organizativas y lógicas estrictamente correlacionadas a las finalidades indicadas. Se aplican medidas de seguridad adecuadas para prevenir la pérdida, el uso ilícito o incorrecto de los datos.</p>

      <h2>3. CONSERVACIÓN DE LOS DATOS</h2>
      <ul class="section__list">
        <li><strong>Solicitudes de contacto:</strong> Los datos se conservan por el tiempo necesario para evadir la solicitud y en cualquier caso no más de 24 meses</li>
        <li><strong>Candidaturas:</strong> Los datos se conservan por un período máximo de 2 años desde la recepción, salvo diferente comunicación por parte del interesado</li>
      </ul>

      <h2>4. COMUNICACIÓN Y DIFUSIÓN</h2>
      <p>Los datos personales no serán difundidos y podrán ser comunicados exclusivamente a:</p>
      <ul class="section__list">
        <li>Sujetos autorizados al tratamiento para finalidades de asistencia y mantenimiento del sistema informático</li>
        <li>Consultores y profesionales, en calidad de responsables del tratamiento</li>
        <li>Autoridades competentes para cumplimientos de ley</li>
      </ul>

      <h2>5. DERECHOS DEL INTERESADO</h2>
      <p>Según los arts. 15-22 del GDPR, tienes derecho a:</p>
      <ul class="section__list">
        <li>Acceder a tus datos personales</li>
        <li>Rectificar datos inexactos o integrarlos</li>
        <li>Cancelar los datos (derecho al olvido)</li>
        <li>Limitar el tratamiento</li>
        <li>Portabilidad de los datos</li>
        <li>Oponerte al tratamiento</li>
        <li>Revocar el consentimiento en cualquier momento</li>
      </ul>
      <p>Para ejercer tus derechos, contáctanos a la dirección: info@ibslab.eu</p>

      <h2>6. MODIFICACIONES A LA POLÍTICA DE PRIVACIDAD</h2>
      <p>Esta política puede ser actualizada periódicamente. Te invitamos a consultar regularmente esta página para estar siempre informado sobre cómo tratamos tus datos.</p>

      <h2>7. CONTACTOS</h2>
      <p>Para cualquier pregunta relativa a esta Política de Privacidad, contáctanos:</p>
      <ul class="section__list">
        <li><strong>Email:</strong> info@ibslab.eu</li>
        <li><strong>Dirección:</strong> Via Paolo Da Cannobio 9 - 20122 Milano</li>
      </ul>

      <p><strong>Última actualización:</strong> 30 junio 2025</p>
    </section>
  </main>
  
  <!-- Footer -->
  <?php include INCLUDES_PATH . '/es/footer.php'; ?>

  <!-- Scripts - Optimized for LCP -->
  <script src="<?php echo JS_PATH; ?>/script.js" type="module" defer></script>
</body>
</html> 