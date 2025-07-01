<?php
require_once __DIR__ . '/config.php';

// Configurazione email (da spostare in config.php)
// define('CONTACT_EMAIL_TO', 'info@ibslab.eu'); // Email destinatario
define('CONTACT_EMAIL_TO', 'hello@meuro.dev'); // Email destinatario
define('CONTACT_EMAIL_FROM', 'noreply@ibslab.eu'); // Email mittente
define('CONTACT_EMAIL_SUBJECT', 'ibslab.eu - Nuovo contatto dal sito web');

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

try {
    // Controllo campo di sicurezza
    $securityField = isset($_POST['company_url']) ? sanitizeInput($_POST['company_url']) : '';
    if (!empty($securityField)) {
        // Richiesta automatica rilevata - registra e blocca
        error_log("Automated request blocked: " . $_SERVER['REMOTE_ADDR'] . " - " . date('Y-m-d H:i:s'));
        echo json_encode(['success' => false, 'message' => 'Richiesta non valida.']);
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

    // Validazione campi sempre obbligatori
    if (empty($nome) || empty($cognome) || empty($messaggio) || !$privacy) {
        echo json_encode(['success' => false, 'message' => 'Tutti i campi obbligatori devono essere compilati.']);
        exit;
    }

    // Validazione campi in base alla preferenza di contatto
    if ($preferenzaContatto === 'email' || $preferenzaContatto === 'entrambi') {
        if (empty($email)) {
            echo json_encode(['success' => false, 'message' => 'L\'indirizzo email è obbligatorio per la preferenza selezionata.']);
            exit;
        }
        if (!validateEmail($email)) {
            echo json_encode(['success' => false, 'message' => 'Indirizzo email non valido.']);
            exit;
        }
    }

    if ($preferenzaContatto === 'telefono' || $preferenzaContatto === 'entrambi') {
        if (empty($telefono)) {
            echo json_encode(['success' => false, 'message' => 'Il numero di telefono è obbligatorio per la preferenza selezionata.']);
            exit;
        }
        if (!validatePhone($telefono)) {
            echo json_encode(['success' => false, 'message' => 'Numero di telefono non valido.']);
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

    // Invia email
    $success = mail(CONTACT_EMAIL_TO, CONTACT_EMAIL_SUBJECT, $emailBody, $headerString);

    if ($success) {
        // Log dell'invio (opzionale)
        error_log("Contact form submitted: " . ($email ?: 'no-email') . " - " . date('Y-m-d H:i:s'));
        
        echo json_encode([
            'success' => true, 
            'message' => 'Messaggio inviato con successo! Ti risponderemo al più presto.'
        ]);
    } else {
        throw new Exception('Errore nell\'invio dell\'email');
    }

} catch (Exception $e) {
    // Log dell'errore
    error_log("Contact form error: " . $e->getMessage() . " - " . date('Y-m-d H:i:s'));
    
    echo json_encode([
        'success' => false, 
        'message' => 'Si è verificato un errore durante l\'invio. Riprova più tardi.'
    ]);
}
?> 