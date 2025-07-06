  <link rel="preload" href="<?php echo assetWithVersionSafe('css/style.css'); ?>" as="style">
  <link rel="stylesheet" href="<?php echo assetWithVersionSafe('css/style.css'); ?>">

  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&family=EB+Garamond:wght@400;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet"></noscript>
  
  <link rel="icon" type="image/png" href="<?php echo IMAGES_PATH; ?>/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="<?php echo IMAGES_PATH; ?>/favicon/favicon.svg" />
  <link rel="shortcut icon" href="<?php echo IMAGES_PATH; ?>/favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo IMAGES_PATH; ?>/favicon/apple-touch-icon.png" />
  <link rel="manifest" href="<?php echo url('site.webmanifest'); ?>">

  <!-- Structured Data - Organization -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "IBS Lab S.r.l.",
    "url": "https://www.ibslab.eu",
    "logo": "https://www.ibslab.eu/assets/img/IBS_logo.png",
    "description": "Soluzioni innovative per la gestione del ciclo di vita dei prodotti finanziari. Partner ufficiale di Kore Labs in Italia, Svizzera e Spagna.",
    "foundingDate": "2023",
    "legalName": "IBS Lab S.r.l.",
    "taxID": "13957350963",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Via Paolo Da Cannobio 9",
      "addressLocality": "Milano",
      "postalCode": "20122",
      "addressCountry": "IT"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "email": "info@ibslab.eu",
      "contactType": "customer service",
      "availableLanguage": ["Italian", "English", "Spanish"]
    },
    "sameAs": [
      "https://www.linkedin.com/company/ibslab"
    ],
    "makesOffer": {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Product Lifecycle Management",
        "description": "Consulenza e soluzioni per la gestione del ciclo di vita dei prodotti finanziari"
      }
    }
  }
  </script>
  
  <!-- Structured Data - WebSite -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "IBS Lab",
    "url": "https://www.ibslab.eu",
    "description": "Innovative Banking Solutions - Soluzioni per Product Lifecycle Management",
    "publisher": {
      "@type": "Organization",
      "name": "IBS Lab S.r.l."
    },
    "inLanguage": "it-IT"
  }
  </script>