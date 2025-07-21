// Riga 1: Struttura messaggi multilingua
const messages = {
  'it': {
    'required_fields': 'Compila tutti i campi obbligatori e carica un CV valido.',
    'email_invalid': 'Inserisci un indirizzo email valido.',
    'phone_invalid': 'Inserisci un numero di telefono valido.',
    'cv_select': 'Seleziona un file CV.',
    'cv_pdf_format': 'Il CV deve essere in formato PDF.',
    'cv_too_large': 'Il file CV è troppo grande. Dimensione massima: 2MB.',
    'connection_error': 'Errore di connessione. Verifica la tua connessione e riprova.',
    'generic_error': 'Si è verificato un errore. Riprova più tardi.',
    'form_not_found': 'Form candidatura lavoro non trovato nella pagina'
  },
  'en': {
    'required_fields': 'Fill in all required fields and upload a valid CV.',
    'email_invalid': 'Please enter a valid email address.',
    'phone_invalid': 'Please enter a valid phone number.',
    'cv_select': 'Please select a CV file.',
    'cv_pdf_format': 'The CV must be in PDF format.',
    'cv_too_large': 'The CV file is too large. Maximum size: 2MB.',
    'connection_error': 'Connection error. Check your connection and try again.',
    'generic_error': 'An error occurred. Please try again later.',
    'form_not_found': 'Job application form not found on the page'
  },
  'es': {
    'required_fields': 'Completa todos los campos obligatorios y sube un CV válido.',
    'email_invalid': 'Por favor, introduce una dirección de correo electrónico válida.',
    'phone_invalid': 'Por favor, introduce un número de teléfono válido.',
    'cv_select': 'Por favor, selecciona un archivo de CV.',
    'cv_pdf_format': 'El CV debe estar en formato PDF.',
    'cv_too_large': 'El archivo de CV es demasiado grande. Tamaño máximo: 2MB.',
    'connection_error': 'Error de conexión. Verifica tu conexión e inténtalo de nuevo.',
    'generic_error': 'Se produjo un error. Por favor, inténtalo de nuevo más tarde.',
    'form_not_found': 'Formulario de candidatura de trabajo no encontrado en la página'
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

// Validazione e gestione form candidature lavorative
const jobApplicationForm = document.getElementById('job-application-form');
if (jobApplicationForm) {
  const submitButton = jobApplicationForm.querySelector('.form-submit');
  const submitText = jobApplicationForm.querySelector('.submit-text');
  const submitLoading = jobApplicationForm.querySelector('.submit-loading');
  const messageContainer = document.getElementById('form-message');
  const fileInput = document.getElementById('cv');
  const fileUploadLabel = document.querySelector('.file-upload-label');
  const fileNameSpan = document.querySelector('.file-name');
  const fileSizeSpan = document.querySelector('.file-size');

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

  // Validazione file CV
  const validateCVFile = (file) => {
    const errors = [];
    const maxSize = 2 * 1024 * 1024; // 2MB
    
    if (!file) {
      errors.push(getMessage('cv_select'));
      return errors;
    }
    
    // Verifica estensione
    const fileName = file.name.toLowerCase();
    if (!fileName.endsWith('.pdf')) {
      errors.push(getMessage('cv_pdf_format'));
    }
    
    // Verifica dimensione
    if (file.size > maxSize) {
      errors.push(getMessage('cv_too_large'));
    }
    
    return errors;
  };

  // Formatta dimensione file
  const formatFileSize = (bytes) => {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
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

  // Gestione upload file
  fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    
    if (file) {
      const errors = validateCVFile(file);
      
      if (errors.length === 0) {
        // File valido - mostra informazioni
        fileNameSpan.textContent = file.name;
        fileSizeSpan.textContent = formatFileSize(file.size);
        fileUploadLabel.classList.add('file-selected');
        fileInput.classList.remove('error');
      } else {
        // File non valido - mostra errore
        fileNameSpan.textContent = '';
        fileSizeSpan.textContent = '';
        fileUploadLabel.classList.remove('file-selected');
        fileInput.classList.add('error');
        fileInput.value = ''; // Reset del campo
        showMessage(errors.join(' '), 'error');
      }
    } else {
      // Nessun file selezionato
      fileNameSpan.textContent = '';
      fileSizeSpan.textContent = '';
      fileUploadLabel.classList.remove('file-selected');
    }
  });

  // Gestione preferenze di contatto
  const radioButtons = jobApplicationForm.querySelectorAll('input[name="preferenza_contatto"]');
  const emailField = document.getElementById('email');
  const telefonoField = document.getElementById('telefono');
  const emailLabel = emailField.previousElementSibling;
  const telefonoLabel = telefonoField.previousElementSibling;

  const updateFieldRequirements = () => {
    const selectedPreference = jobApplicationForm.querySelector('input[name="preferenza_contatto"]:checked')?.value;
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
  const inputs = jobApplicationForm.querySelectorAll('.form-input, .form-textarea');
  inputs.forEach(input => {
    // Ignora il campo di controllo automatico
    if (input.name === 'company_url') return;
    
    input.addEventListener('input', () => {
      input.classList.remove('error');
    });
  });

  // Gestione submit
  jobApplicationForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    hideMessage();

    // Validazione campi obbligatori
    const formData = new FormData(jobApplicationForm);
    const nome = formData.get('nome')?.trim();
    const cognome = formData.get('cognome')?.trim();
    const email = formData.get('email')?.trim();
    const telefono = formData.get('telefono')?.trim();
    const privacy = formData.get('privacy');
    const preferenzaContatto = formData.get('preferenza_contatto');
    const cvFile = fileInput.files[0];

    // Reset errori visivi
    inputs.forEach(input => input.classList.remove('error'));
    fileInput.classList.remove('error');
    
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
    if (!privacy) {
      document.getElementById('privacy').focus();
      hasErrors = true;
    }

    // Controlla CV obbligatorio
    const cvErrors = validateCVFile(cvFile);
    if (cvErrors.length > 0) {
      fileInput.classList.add('error');
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
      const response = await fetch(jobApplicationForm.action, {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        showMessage(result.message, 'success');
        jobApplicationForm.reset();
        // Reset file upload display
        fileNameSpan.textContent = '';
        fileSizeSpan.textContent = '';
        fileUploadLabel.classList.remove('file-selected');
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
} 