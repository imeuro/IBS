// Riga 1: Struttura messaggi multilingua
const messages = {
  'it': {
    'required_fields': 'Compila tutti i campi obbligatori.',
    'email_invalid': 'Inserisci un indirizzo email valido.',
    'phone_invalid': 'Inserisci un numero di telefono valido.',
    'connection_error': 'Errore di connessione. Verifica la tua connessione e riprova.',
    'generic_error': 'Si è verificato un errore. Riprova più tardi.',
    'form_not_found': 'Form di contatto non trovato nella pagina'
  },
  'en': {
    'required_fields': 'Fill in all required fields.',
    'email_invalid': 'Please enter a valid email address.',
    'phone_invalid': 'Please enter a valid phone number.',
    'connection_error': 'Connection error. Check your connection and try again.',
    'generic_error': 'An error occurred. Please try again later.',
    'form_not_found': 'Contact form not found on the page'
  },
  'es': {
    'required_fields': 'Completa todos los campos obligatorios.',
    'email_invalid': 'Por favor, introduce una dirección de correo electrónico válida.',
    'phone_invalid': 'Por favor, introduce un número de teléfono válido.',
    'connection_error': 'Error de conexión. Verifica tu conexión e inténtalo de nuevo.',
    'generic_error': 'Se produjo un error. Por favor, inténtalo de nuevo más tarde.',
    'form_not_found': 'Formulario de contacto no encontrado en la página'
  }
};

// Riga 50: Funzione per determinare la lingua corrente
const getCurrentLanguage = () => {
  // Prova a prendere la lingua dal campo hidden lang
  const langField = document.querySelector('input[name="lang"]');
  if (langField && langField.value && messages[langField.value]) {
    return langField.value;
  }
  
  // Fallback: determina dalla URL
  const path = window.location.pathname;
  if (path.startsWith('/en/')) return 'en';
  if (path.startsWith('/es/')) return 'es';
  
  // Default: italiano
  return 'it';
};

// Riga 70: Funzione per ottenere messaggio nella lingua corrente
const getMessage = (key) => {
  const lang = getCurrentLanguage();
  return messages[lang]?.[key] || messages['it'][key] || key;
};

// Validazione e gestione form di contatto
const initContactForm = () => {
  const contactForm = document.getElementById('contact-form');
  if (!contactForm) {
    console.warn(getMessage('form_not_found'));
    return;
  }

  const submitButton = contactForm.querySelector('.form-submit');
  const submitText = contactForm.querySelector('.submit-text');
  const submitLoading = contactForm.querySelector('.submit-loading');
  const messageContainer = document.getElementById('form-message');

  // Validazione email
  const validateEmail = (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  };

  // Validazione telefono (formato italiano e internazionale)
  const validatePhone = (phone) => {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,20}$/;
    return phoneRegex.test(phone.trim());
  };

  // Mostra messaggio
  const showMessage = (text, type) => {
    messageContainer.textContent = text;
    messageContainer.className = `form-message ${type}`;
    messageContainer.style.display = 'block';
    messageContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  };

  // Nasconde messaggio
  const hideMessage = () => {
    messageContainer.style.display = 'none';
  };

  // Gestione preferenze di contatto
  const radioButtons = contactForm.querySelectorAll('input[name="preferenza_contatto"]');
  const emailField = document.getElementById('email');
  const telefonoField = document.getElementById('telefono');
  const emailLabel = emailField.previousElementSibling;
  const telefonoLabel = telefonoField.previousElementSibling;

  const updateFieldRequirements = () => {
    const selectedPreference = contactForm.querySelector('input[name="preferenza_contatto"]:checked')?.value;
    const emailGroup = emailField.closest('.form-group');
    const telefonoGroup = telefonoField.closest('.form-group');
    
    if (selectedPreference === 'email') {
      // Solo email richiesta - mostra email, nascondi telefono
      emailField.setAttribute('required', 'true');
      telefonoField.removeAttribute('required');
      emailLabel.innerHTML = 'Email <span class="required">*</span>';
      telefonoLabel.innerHTML = 'Telefono';
      
      emailGroup.style.display = 'flex';
      telefonoGroup.style.display = 'none';
      telefonoField.value = ''; // Pulisce il campo nascosto
      
    } else if (selectedPreference === 'telefono') {
      // Solo telefono richiesto - mostra telefono, nascondi email
      telefonoField.setAttribute('required', 'true');
      emailField.removeAttribute('required');
      telefonoLabel.innerHTML = 'Telefono <span class="required">*</span>';
      emailLabel.innerHTML = 'Email';
      
      telefonoGroup.style.display = 'flex';
      emailGroup.style.display = 'none';
      emailField.value = ''; // Pulisce il campo nascosto
      
    } else {
      // Entrambi richiesti - mostra entrambi
      emailField.setAttribute('required', 'true');
      telefonoField.setAttribute('required', 'true');
      emailLabel.innerHTML = 'Email <span class="required">*</span>';
      telefonoLabel.innerHTML = 'Telefono <span class="required">*</span>';
      
      emailGroup.style.display = 'flex';
      telefonoGroup.style.display = 'flex';
    }
    
    // Rimuovi eventuali errori dai campi nascosti
    emailField.classList.remove('error');
    telefonoField.classList.remove('error');
  };

  // Ascolta cambiamenti nei radio button
  radioButtons.forEach(radio => {
    radio.addEventListener('change', updateFieldRequirements);
  });

  // Inizializza i requisiti dei campi
  updateFieldRequirements();

  // Rimuove errori quando l'utente inizia a digitare
  const inputs = contactForm.querySelectorAll('.form-input, .form-textarea');
  inputs.forEach(input => {
    // Ignora il campo di controllo automatico
    if (input.name === 'company_url') return;
    
    input.addEventListener('input', () => {
      input.classList.remove('error');
    });
  });

  // Gestione submit
  contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    hideMessage();

    // Validazione campi obbligatori
    const formData = new FormData(contactForm);
    const nome = formData.get('nome')?.trim();
    const cognome = formData.get('cognome')?.trim();
    const email = formData.get('email')?.trim();
    const telefono = formData.get('telefono')?.trim();
    const messaggio = formData.get('messaggio')?.trim();
    const privacy = formData.get('privacy');
    const preferenzaContatto = formData.get('preferenza_contatto');

    // Reset errori visivi
    inputs.forEach(input => input.classList.remove('error'));
    
    let hasErrors = false;

    // Controlla campi sempre obbligatori
    if (!nome) {
      document.getElementById('nome').classList.add('error');
      hasErrors = true;
    }
    if (!cognome) {
      document.getElementById('cognome').classList.add('error');
      hasErrors = true;
    }
    if (!messaggio) {
      document.getElementById('messaggio').classList.add('error');
      hasErrors = true;
    }
    if (!privacy) {
      document.getElementById('privacy').focus();
      hasErrors = true;
    }

    // Controlla campi in base alla preferenza di contatto
    if (preferenzaContatto === 'email' || preferenzaContatto === 'entrambi') {
      if (!email) {
        document.getElementById('email').classList.add('error');
        hasErrors = true;
      }
    }
    if (preferenzaContatto === 'telefono' || preferenzaContatto === 'entrambi') {
      if (!telefono) {
        document.getElementById('telefono').classList.add('error');
        hasErrors = true;
      }
    }

    if (hasErrors) {
      showMessage(getMessage('required_fields'), 'error');
      return;
    }

    // Validazione formato email (se fornita)
    if (email && !validateEmail(email)) {
      document.getElementById('email').classList.add('error');
      showMessage(getMessage('email_invalid'), 'error');
      return;
    }

    // Validazione formato telefono (se fornito)
    if (telefono && !validatePhone(telefono)) {
      document.getElementById('telefono').classList.add('error');
      showMessage(getMessage('phone_invalid'), 'error');
      return;
    }

    // Disabilita submit
    submitButton.disabled = true;
    submitText.style.display = 'none';
    submitLoading.style.display = 'inline';

    try {
      const response = await fetch(contactForm.action, {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        showMessage(result.message, 'success');
        contactForm.reset();
        updateFieldRequirements(); // Ripristina i requisiti dopo il reset
      } else {
        showMessage(result.message || getMessage('generic_error'), 'error');
      }
    } catch (error) {
      showMessage(getMessage('connection_error'), 'error');
    } finally {
      // Riabilita submit
      submitButton.disabled = false;
      submitText.style.display = 'inline';
      submitLoading.style.display = 'none';
    }
  });
};

// Inizializza quando il DOM è pronto
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initContactForm);
} else {
  initContactForm();
} 