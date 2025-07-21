<?php
require_once __DIR__ . '/config.php';

// Configurazione email (da spostare in config.php)
define('CONTACT_EMAIL_TO', 'info@ibslab.eu'); // Email destinatario
// define('CONTACT_EMAIL_TO', 'hello@meuro.dev'); // Email destinatario
define('CONTACT_EMAIL_FROM', 'noreply@ibslab.eu'); // Email mittente
define('CONTACT_EMAIL_SUBJECT', 'ibslab.eu - Nuovo contatto dal sito web');

// Headers per JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Riga 10: Inserimento struttura messaggi multilingua
$messages = [
    'success' => [
        'it' => 'Messaggio inviato con successo! Ti risponderemo al più presto.',
        'en' => 'Message sent successfully! We will reply to you soon.',
        'es' => '¡Mensaje enviado con éxito! Te responderemos pronto.'
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
    'email_send_error' => [
        'it' => "Errore nell'invio dell'email - funzione mail() ha restituito false",
        'en' => 'Error sending the email - mail() function returned false',
        'es' => 'Error al enviar el correo electrónico - función mail() devolvió false'
    ],
    'development_success' => [
        'it' => 'Messaggio salvato! (Modalità sviluppo - mail non configurata)',
        'en' => 'Message saved! (Development mode - mail not configured)',
        'es' => '¡Mensaje guardado! (Modo desarrollo - correo no configurado)'
    ],
    'generic_error' => [
        'it' => "Si è verificato un errore durante l'invio. Riprova più tardi.",
        'en' => 'An error occurred while sending. Please try again later.',
        'es' => 'Se produjo un error durante el envío. Por favor, inténtalo de nuevo más tarde.'
    ]
];

// Verifica metodo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Riga 25: Sostituzione messaggio metodo non consentito
    http_response_code(405);
    // Riga 60: Recupero lingua dal POST
    $lang = isset($_POST['lang']) && in_array($_POST['lang'], ['it', 'en', 'es']) ? $_POST['lang'] : 'it';
    echo json_encode(['success' => false, 'message' => $messages['method_not_allowed'][$lang]]);
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

try {
    // Controllo campo di sicurezza
    $securityField = isset($_POST['company_url']) ? sanitizeInput($_POST['company_url']) : '';
    if (!empty($securityField)) {
        // Richiesta automatica rilevata - registra e blocca
        error_log("Automated request blocked: " . $_SERVER['REMOTE_ADDR'] . " - " . date('Y-m-d H:i:s'));
        // Riga 45: Sostituzione messaggio richiesta non valida (campo sicurezza)
        echo json_encode(['success' => false, 'message' => $messages['invalid_request'][$lang]]);
        exit;
    }

    // Recupera e sanitizza i dati
    $azienda = isset($_POST['azienda']) ? sanitizeInput($_POST['azienda']) : '';
    $nome = isset($_POST['nome']) ? sanitizeInput($_POST['nome']) : '';
    $cognome = isset($_POST['cognome']) ? sanitizeInput($_POST['cognome']) : '';
    $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? sanitizeInput($_POST['telefono']) : '';
    $nazione = isset($_POST['nazione']) ? sanitizeInput($_POST['nazione']) : '';
    $citta = isset($_POST['citta']) ? sanitizeInput($_POST['citta']) : '';
    $messaggio = isset($_POST['messaggio']) ? sanitizeInput($_POST['messaggio']) : '';
    $privacy = isset($_POST['privacy']) ? true : false;
    $preferenzaContatto = isset($_POST['preferenza_contatto']) ? sanitizeInput($_POST['preferenza_contatto']) : 'entrambi';

    // Debug: Log dei dati ricevuti (rimuovere in produzione)
    // error_log("Contact form data received: nome=$nome, cognome=$cognome, email=$email, preferenza=$preferenzaContatto");

    // Validazione campi sempre obbligatori
    // Riga 70: Sostituzione messaggio campi obbligatori
    if (empty($nome) || empty($cognome) || empty($messaggio) || !$privacy) {
        echo json_encode(['success' => false, 'message' => $messages['required_fields'][$lang]]);
        exit;
    }

    // Validazione campi in base alla preferenza di contatto
    // Riga 76: Sostituzione messaggi email obbligatoria/valida
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

    // Riga 85: Sostituzione messaggi telefono obbligatorio/valido
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

    // Prepara il contenuto dell'email
    $emailBody = "NUOVO CONTATTO DAL SITO WEB\n";
    $emailBody .= "================================\n\n";
    
    if (!empty($azienda)) {
        $emailBody .= "Azienda: " . $azienda . "\n";
    }
    
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
    
    $emailBody .= "\nMessaggio:\n" . $messaggio . "\n\n";
    $emailBody .= "================================\n";
    $emailBody .= "Inviato il: " . date('d/m/Y H:i:s') . "\n";
    $emailBody .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";

    // Headers email
    $headers = array(
        'From' => CONTACT_EMAIL_FROM,
        'Reply-To' => !empty($email) ? $email : CONTACT_EMAIL_FROM,
        'X-Mailer' => 'PHP/' . phpversion(),
        'Content-Type' => 'text/plain; charset=UTF-8'
    );

    // Converte headers in stringa
    $headerString = '';
    foreach ($headers as $key => $value) {
        $headerString .= $key . ': ' . $value . "\r\n";
    }

    // Debug: Verifica configurazione mail
    // error_log("Attempting to send email to: " . CONTACT_EMAIL_TO);
    // error_log("Mail function available: " . (function_exists('mail') ? 'yes' : 'no'));

    // Invia email
    $success = mail(CONTACT_EMAIL_TO, CONTACT_EMAIL_SUBJECT, $emailBody, $headerString);

    if ($success) {
        // Log dell'invio (opzionale)
        // error_log("Contact form submitted successfully: " . ($email ?: 'no-email') . " - " . date('Y-m-d H:i:s'));
        
        // Riga 150: Sostituzione messaggio successo invio messaggio
        echo json_encode([
            'success' => true, 
            'message' => $messages['success'][$lang]
        ]);
    } else {
        // Log più dettagliato dell'errore mail
        $lastError = error_get_last();
        // error_log("Mail function failed. Last error: " . ($lastError ? $lastError['message'] : 'unknown'));
        
        // Fallback: salva il contatto in un file per sviluppo
        $fallbackFile = __DIR__ . '/contact-fallback.log';
        $fallbackData = date('Y-m-d H:i:s') . " - CONTACT FALLBACK\n" . $emailBody . "\n" . str_repeat('-', 50) . "\n\n";
        file_put_contents($fallbackFile, $fallbackData, FILE_APPEND | LOCK_EX);
        
        // Riga 165: Sostituzione messaggio successo modalità sviluppo
        if (defined('DEVELOPMENT_MODE') && DEVELOPMENT_MODE) {
            // error_log("Contact saved to fallback file due to mail failure");
            echo json_encode([
                'success' => true, 
                'message' => $messages['development_success'][$lang]
            ]);
        } else {
            // Riga 170: Sostituzione messaggio errore invio email
            throw new Exception($messages['email_send_error'][$lang]);
        }
    }

} catch (Exception $e) {
    // Riga 185: Sostituzione messaggio errore generico catch
    // Log dell'errore
    // error_log("Contact form error: " . $e->getMessage() . " - " . date('Y-m-d H:i:s'));
    
    echo json_encode([
        'success' => false, 
        'message' => $messages['generic_error'][$lang]
    ]);
}
?> 