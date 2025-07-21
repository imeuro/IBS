<?php
require_once __DIR__ . '/config.php';

// Debug: Abilita error reporting per identificare problemi
if (DEVELOPMENT_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Configurazione email per candidature
define('JOB_EMAIL_TO', 'daniela.connizzoli@ibslab.eu'); // Email destinatario per candidature
// define('JOB_EMAIL_TO', 'hello@meuro.dev'); // Email destinatario per candidature
define('JOB_EMAIL_FROM', 'noreply@ibslab.eu'); // Email mittente
define('JOB_EMAIL_SUBJECT', 'ibslab.eu - Nuova candidatura dal sito web');

// Configurazione upload
define('UPLOAD_MAX_SIZE', 5 * 1024 * 1024); // 5MB in bytes
define('UPLOAD_ALLOWED_TYPES', ['application/pdf']);
define('UPLOAD_DIR', __DIR__ . '/uploads/cv/');

// Debug: Log configurazione
if (DEVELOPMENT_MODE) {
    error_log("Job application - UPLOAD_DIR: " . UPLOAD_DIR);
    error_log("Job application - Directory exists: " . (is_dir(UPLOAD_DIR) ? 'yes' : 'no'));
    error_log("Job application - Directory writable: " . (is_writable(UPLOAD_DIR) ? 'yes' : 'no'));
}

// Headers per JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Verifica metodo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Metodo non consentito']);
    exit;
}

// Funzione di sanitizzazione
function sanitizeInput($data) {
    return trim(strip_tags(htmlspecialchars($data, ENT_QUOTES, 'UTF-8')));
}

// Funzione di validazione email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Funzione di validazione telefono
function validatePhone($phone) {
    $cleaned = preg_replace('/[^\d\+]/', '', $phone);
    return strlen($cleaned) >= 8 && strlen($cleaned) <= 20;
}

// Funzione per validare file CV
function validateCVFile($file) {
    $errors = [];
    
    // Verifica che il file sia stato caricato
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        switch ($file['error'] ?? UPLOAD_ERR_NO_FILE) {
            case UPLOAD_ERR_NO_FILE:
                $errors[] = 'Nessun file CV caricato.';
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $errors[] = 'Il file CV è troppo grande. Dimensione massima: 5MB.';
                break;
            default:
                $errors[] = 'Errore durante il caricamento del CV.';
                break;
        }
        return $errors;
    }
    
    // Verifica dimensione
    if ($file['size'] > UPLOAD_MAX_SIZE) {
        $errors[] = 'Il file CV è troppo grande. Dimensione massima: 5MB.';
    }
    
    // Verifica tipo MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mimeType, UPLOAD_ALLOWED_TYPES)) {
        $errors[] = 'Formato file non valido. Sono accettati solo file PDF.';
    }
    
    // Verifica estensione file
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if ($fileExtension !== 'pdf') {
        $errors[] = 'Estensione file non valida. Sono accettati solo file PDF.';
    }
    
    return $errors;
}

// Funzione per generare nome file sicuro
function generateSafeFileName($originalName, $prefix = '') {
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $timestamp = date('Y-m-d_H-i-s');
    $random = bin2hex(random_bytes(8));
    return $prefix . $timestamp . '_' . $random . '.' . $extension;
}

// Riga 20: Inserimento struttura messaggi multilingua
$messages = [
    'success' => [
        'it' => 'Candidatura inviata con successo! Grazie per il tuo interesse. Ti contatteremo al più presto.',
        'en' => 'Application sent successfully! Thank you for your interest. We will contact you soon.',
        'es' => '¡Solicitud enviada con éxito! Gracias por tu interés. Nos pondremos en contacto contigo pronto.'
    ],
    'required_fields' => [
        'it' => 'Tutti i campi obbligatori devono essere compilati.',
        'en' => 'All required fields must be filled in.',
        'es' => 'Todos los campos obligatorios deben ser completados.'
    ],
    'email_required' => [
        'it' => "L'indirizzo email è obbligatorio per la preferenza selezionata.",
        'en' => 'Email address is required for the selected preference.',
        'es' => 'La dirección de correo electrónico es obligatoria para la preferencia seleccionada.'
    ],
    'email_invalid' => [
        'it' => 'Indirizzo email non valido.',
        'en' => 'Invalid email address.',
        'es' => 'Dirección de correo electrónico no válida.'
    ],
    'phone_required' => [
        'it' => 'Il numero di telefono è obbligatorio per la preferenza selezionata.',
        'en' => 'Phone number is required for the selected preference.',
        'es' => 'El número de teléfono es obligatorio para la preferencia seleccionada.'
    ],
    'phone_invalid' => [
        'it' => 'Numero di telefono non valido.',
        'en' => 'Invalid phone number.',
        'es' => 'Número de teléfono no válido.'
    ],
    'cv_missing' => [
        'it' => 'Nessun file CV caricato.',
        'en' => 'No CV file uploaded.',
        'es' => 'No se ha subido ningún archivo de CV.'
    ],
    'cv_too_large' => [
        'it' => 'Il file CV è troppo grande. Dimensione massima: 5MB.',
        'en' => 'The CV file is too large. Maximum size: 5MB.',
        'es' => 'El archivo de CV es demasiado grande. Tamaño máximo: 5MB.'
    ],
    'cv_invalid_format' => [
        'it' => 'Formato file non valido. Sono accettati solo file PDF.',
        'en' => 'Invalid file format. Only PDF files are accepted.',
        'es' => 'Formato de archivo no válido. Solo se aceptan archivos PDF.'
    ],
    'cv_invalid_extension' => [
        'it' => 'Estensione file non valida. Sono accettati solo file PDF.',
        'en' => 'Invalid file extension. Only PDF files are accepted.',
        'es' => 'Extensión de archivo no válida. Solo se aceptan archivos PDF.'
    ],
    'cv_upload_error' => [
        'it' => 'Errore durante il caricamento del CV.',
        'en' => 'Error uploading the CV.',
        'es' => 'Error al subir el CV.'
    ],
    'upload_dir_error' => [
        'it' => 'Impossibile creare directory per i file caricati',
        'en' => 'Unable to create directory for uploaded files',
        'es' => 'No se puede crear el directorio para los archivos subidos'
    ],
    'cv_save_error' => [
        'it' => 'Errore durante il salvataggio del CV',
        'en' => 'Error saving the CV',
        'es' => 'Error al guardar el CV'
    ],
    'email_send_error' => [
        'it' => "Errore nell'invio dell'email",
        'en' => 'Error sending the email',
        'es' => 'Error al enviar el correo electrónico'
    ],
    'invalid_request' => [
        'it' => 'Richiesta non valida.',
        'en' => 'Invalid request.',
        'es' => 'Solicitud no válida.'
    ],
    'method_not_allowed' => [
        'it' => 'Metodo non consentito',
        'en' => 'Method not allowed',
        'es' => 'Método no permitido'
    ],
    'generic_error' => [
        'it' => "Si è verificato un errore durante l'invio. Riprova più tardi.",
        'en' => 'An error occurred while sending. Please try again later.',
        'es' => 'Se produjo un error durante el envío. Por favor, inténtalo de nuevo más tarde.'
    ]
];

// Riga 70: Recupero lingua dal POST
$lang = isset($_POST['lang']) && in_array($_POST['lang'], ['it', 'en', 'es']) ? $_POST['lang'] : 'it';

try {
    // Debug: Log dati ricevuti
    if (DEVELOPMENT_MODE) {
        error_log("Job application - POST data: " . print_r($_POST, true));
        error_log("Job application - FILES data: " . print_r($_FILES, true));
    }
    
    // Controllo campo di sicurezza
    $securityField = isset($_POST['company_url']) ? sanitizeInput($_POST['company_url']) : '';
    if (!empty($securityField)) {
        // Richiesta automatica rilevata - registra e blocca
        error_log("Job application automated request blocked: " . $_SERVER['REMOTE_ADDR'] . " - " . date('Y-m-d H:i:s'));
        echo json_encode(['success' => false, 'message' => $messages['invalid_request'][$lang]]);
        exit;
    }

    // Recupera e sanitizza i dati
    $nome = isset($_POST['nome']) ? sanitizeInput($_POST['nome']) : '';
    $cognome = isset($_POST['cognome']) ? sanitizeInput($_POST['cognome']) : '';
    $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? sanitizeInput($_POST['telefono']) : '';
    $nazione = isset($_POST['nazione']) ? sanitizeInput($_POST['nazione']) : '';
    $citta = isset($_POST['citta']) ? sanitizeInput($_POST['citta']) : '';
    $messaggio = isset($_POST['messaggio']) ? sanitizeInput($_POST['messaggio']) : '';
    $privacy = isset($_POST['privacy']) ? true : false;
    $preferenzaContatto = isset($_POST['preferenza_contatto']) ? sanitizeInput($_POST['preferenza_contatto']) : 'entrambi';

    // Validazione campi sempre obbligatori
    if (empty($nome) || empty($cognome) || empty($messaggio) || !$privacy) {
        echo json_encode(['success' => false, 'message' => $messages['required_fields'][$lang]]);
        exit;
    }

    // Validazione campi in base alla preferenza di contatto
    if ($preferenzaContatto === 'email' || $preferenzaContatto === 'entrambi') {
        if (empty($email)) {
            echo json_encode(['success' => false, 'message' => $messages['email_required'][$lang]]);
            exit;
        }
        if (!validateEmail($email)) {
            echo json_encode(['success' => false, 'message' => $messages['email_invalid'][$lang]]);
            exit;
        }
    }

    if ($preferenzaContatto === 'telefono' || $preferenzaContatto === 'entrambi') {
        if (empty($telefono)) {
            echo json_encode(['success' => false, 'message' => $messages['phone_required'][$lang]]);
            exit;
        }
        if (!validatePhone($telefono)) {
            echo json_encode(['success' => false, 'message' => $messages['phone_invalid'][$lang]]);
            exit;
        }
    }

    // Validazione file CV
    $cvErrors = validateCVFile($_FILES['cv'] ?? null);
    if (!empty($cvErrors)) {
        // Mappo i messaggi di errore CV su quelli multilingua
        $cvErrorMsg = '';
        foreach ($cvErrors as $err) {
            if (strpos($err, 'Nessun file CV caricato') !== false) {
                $cvErrorMsg .= $messages['cv_missing'][$lang] . ' ';
            } elseif (strpos($err, 'troppo grande') !== false) {
                $cvErrorMsg .= $messages['cv_too_large'][$lang] . ' ';
            } elseif (strpos($err, 'Formato file non valido') !== false) {
                $cvErrorMsg .= $messages['cv_invalid_format'][$lang] . ' ';
            } elseif (strpos($err, 'Estensione file non valida') !== false) {
                $cvErrorMsg .= $messages['cv_invalid_extension'][$lang] . ' ';
            } elseif (strpos($err, 'Errore durante il caricamento del CV') !== false) {
                $cvErrorMsg .= $messages['cv_upload_error'][$lang] . ' ';
            } else {
                $cvErrorMsg .= $err . ' ';
            }
        }
        echo json_encode(['success' => false, 'message' => trim($cvErrorMsg)]);
        exit;
    }

    // Crea directory upload se non esiste
    if (!is_dir(UPLOAD_DIR)) {
        if (!mkdir(UPLOAD_DIR, 0755, true)) {
            throw new Exception($messages['upload_dir_error'][$lang]);
        }
    }

    // Sposta file caricato in directory sicura
    $originalFileName = $_FILES['cv']['name'];
    $safeFileName = generateSafeFileName($originalFileName, 'cv_');
    $uploadPath = UPLOAD_DIR . $safeFileName;

    if (!move_uploaded_file($_FILES['cv']['tmp_name'], $uploadPath)) {
        throw new Exception($messages['cv_save_error'][$lang]);
    }

    // Prepara il contenuto dell'email
    $emailBody = "NUOVA CANDIDATURA DAL SITO WEB\n";
    $emailBody .= "================================\n\n";
    
    $emailBody .= "Nome: " . $nome . "\n";
    $emailBody .= "Cognome: " . $cognome . "\n";
    
    // Aggiungi email solo se fornita
    if (!empty($email)) {
        $emailBody .= "Email: " . $email . "\n";
    }
    
    // Aggiungi telefono solo se fornito
    if (!empty($telefono)) {
        $emailBody .= "Telefono: " . $telefono . "\n";
    }
    
    // Preferenza di contatto
    $preferenzeMap = [
        'email' => 'Solo email',
        'telefono' => 'Solo telefono', 
        'entrambi' => 'Email e telefono'
    ];
    $emailBody .= "Preferenza di contatto: " . ($preferenzeMap[$preferenzaContatto] ?? 'Non specificata') . "\n";
    
    if (!empty($nazione)) {
        $emailBody .= "Nazione: " . $nazione . "\n";
    }
    
    if (!empty($citta)) {
        $emailBody .= "Città: " . $citta . "\n";
    }
    
    $emailBody .= "File CV: " . $originalFileName . " (" . round($_FILES['cv']['size'] / 1024, 2) . " KB)\n";
    
    if (!empty($messaggio)) {
        $emailBody .= "\nMessaggio:\n" . $messaggio . "\n";
    }
    
    $emailBody .= "\n================================\n";
    $emailBody .= "Inviato il: " . date('d/m/Y H:i:s') . "\n";
    $emailBody .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";

    // Preparazione allegato CV
    $boundary = md5(time());
    
    // Headers email con allegato
    $headers = "From: " . JOB_EMAIL_FROM . "\r\n";
    $headers .= "Reply-To: " . (!empty($email) ? $email : JOB_EMAIL_FROM) . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";

    // Corpo email con allegato
    $message = "--" . $boundary . "\r\n";
    $message .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $message .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $message .= $emailBody . "\r\n";

    // Allegato CV
    $message .= "--" . $boundary . "\r\n";
    $message .= "Content-Type: application/pdf; name=\"" . $originalFileName . "\"\r\n";
    $message .= "Content-Disposition: attachment; filename=\"" . $originalFileName . "\"\r\n";
    $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $message .= chunk_split(base64_encode(file_get_contents($uploadPath))) . "\r\n";
    $message .= "--" . $boundary . "--\r\n";

    // Invia email
    $success = mail(JOB_EMAIL_TO, JOB_EMAIL_SUBJECT, $message, $headers);

    if ($success) {
        // Log dell'invio (opzionale)
        error_log("Job application submitted: " . ($email ?: 'no-email') . " - CV: " . $originalFileName . " - " . date('Y-m-d H:i:s'));
        
        echo json_encode([
            'success' => true, 
            'message' => $messages['success'][$lang]
        ]);
    } else {
        // Rimuovi file se invio fallito
        if (file_exists($uploadPath)) {
            unlink($uploadPath);
        }
        throw new Exception($messages['email_send_error'][$lang]);
    }

} catch (Exception $e) {
    // Rimuovi file caricato in caso di errore
    if (isset($uploadPath) && file_exists($uploadPath)) {
        unlink($uploadPath);
    }
    
    // Log dell'errore
    error_log("Job application error: " . $e->getMessage() . " - " . date('Y-m-d H:i:s'));
    
    echo json_encode([
        'success' => false, 
        'message' => $messages['generic_error'][$lang]
    ]);
}
?> 