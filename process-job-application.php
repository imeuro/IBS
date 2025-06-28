<?php
require_once __DIR__ . '/config.php';

// Configurazione email per candidature (da personalizzare)
define('JOB_EMAIL_TO', 'daniela.connizzoli@ibslab.eu'); // Email destinatario per candidature
define('JOB_EMAIL_FROM', 'noreply@ibslab.eu'); // Email mittente
define('JOB_EMAIL_SUBJECT', 'ibslab.eu - Nuova candidatura dal sito web');

// Configurazione upload
define('UPLOAD_MAX_SIZE', 2 * 1024 * 1024); // 2MB in bytes
define('UPLOAD_ALLOWED_TYPES', ['application/pdf']);
define('UPLOAD_DIR', __DIR__ . '/uploads/cv/');

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
                $errors[] = 'Il file CV è troppo grande. Dimensione massima: 2MB.';
                break;
            default:
                $errors[] = 'Errore durante il caricamento del CV.';
                break;
        }
        return $errors;
    }
    
    // Verifica dimensione
    if ($file['size'] > UPLOAD_MAX_SIZE) {
        $errors[] = 'Il file CV è troppo grande. Dimensione massima: 2MB.';
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

try {
    // Controllo campo di sicurezza
    $securityField = isset($_POST['company_url']) ? sanitizeInput($_POST['company_url']) : '';
    if (!empty($securityField)) {
        // Richiesta automatica rilevata - registra e blocca
        error_log("Job application automated request blocked: " . $_SERVER['REMOTE_ADDR'] . " - " . date('Y-m-d H:i:s'));
        echo json_encode(['success' => false, 'message' => 'Richiesta non valida.']);
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
    if (empty($nome) || empty($cognome) || !$privacy) {
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

    // Validazione file CV
    $cvErrors = validateCVFile($_FILES['cv'] ?? null);
    if (!empty($cvErrors)) {
        echo json_encode(['success' => false, 'message' => implode(' ', $cvErrors)]);
        exit;
    }

    // Crea directory upload se non esiste
    if (!is_dir(UPLOAD_DIR)) {
        if (!mkdir(UPLOAD_DIR, 0755, true)) {
            throw new Exception('Impossibile creare directory per i file caricati');
        }
    }

    // Sposta file caricato in directory sicura
    $originalFileName = $_FILES['cv']['name'];
    $safeFileName = generateSafeFileName($originalFileName, 'cv_');
    $uploadPath = UPLOAD_DIR . $safeFileName;

    if (!move_uploaded_file($_FILES['cv']['tmp_name'], $uploadPath)) {
        throw new Exception('Errore durante il salvataggio del CV');
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
            'message' => 'Candidatura inviata con successo! Grazie per il tuo interesse. Ti contatteremo al più presto.'
        ]);
    } else {
        // Rimuovi file se invio fallito
        if (file_exists($uploadPath)) {
            unlink($uploadPath);
        }
        throw new Exception('Errore nell\'invio dell\'email');
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
        'message' => 'Si è verificato un errore durante l\'invio. Riprova più tardi.'
    ]);
}
?> 