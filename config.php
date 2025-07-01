<?php
/**
 * Configurazione globale dell'applicazione
 * 
 * PER PRODUZIONE:
 * - Impostare DEVELOPMENT_MODE = false
 * - Impostare DISABLE_CACHE_BUSTING = true (se ci sono problemi con i 404)
 * - Impostare INCLUDE_SERVER_NAME_IN_PATH = false (sempre false in produzione)
 * 
 * PER SVILUPPO LOCALE:
 * - DEVELOPMENT_MODE = true
 * - INCLUDE_SERVER_NAME_IN_PATH = false (a meno che non si usi virtual hosts)
 */

// Configurazione ambiente
define('INCLUDE_SERVER_NAME_IN_PATH', false); // SEMPRE false in produzione
define('DEVELOPMENT_MODE', true); // Impostare a false in produzione
define('DISABLE_CACHE_BUSTING', true); // Impostare a true per disabilitare cache busting in produzione

// Funzione per determinare il basepath in base all'ambiente
function getBasePath() {
    $serverName = $_SERVER['SERVER_NAME'] ?? 'localhost';
    
    // Debug per capire l'ambiente
    if (DEVELOPMENT_MODE) {
        error_log("getBasePath - serverName: $serverName");
        error_log("getBasePath - INCLUDE_SERVER_NAME_IN_PATH: " . (INCLUDE_SERVER_NAME_IN_PATH ? 'true' : 'false'));
    }
    
    // Se INCLUDE_SERVER_NAME_IN_PATH è true, aggiungi il nome del server
    if (INCLUDE_SERVER_NAME_IN_PATH) {
        $result = '/' . $serverName;
        if (DEVELOPMENT_MODE) {
            error_log("getBasePath - using server name in path: $result");
        }
        return $result;
    }
    
    // Altrimenti, determina il path in base all'ambiente
    if ($serverName === 'localhost' || strpos($serverName, '.dev') !== false || strpos($serverName, '.local') !== false) {
        // Ambiente di sviluppo locale
        $result = '/IBS';
        if (DEVELOPMENT_MODE) {
            error_log("getBasePath - development environment: $result");
        }
        return $result;
    } else {
        // Produzione - sito nella root del dominio
        $result = '/';
        if (DEVELOPMENT_MODE) {
            error_log("getBasePath - production environment: $result");
        }
        return $result;
    }
}

// Funzione per normalizzare i path ed evitare doppie barre
function normalizePath($path) {
    return preg_replace('#/+#','/', $path);
}

// Costanti globali
define('BASE_PATH', getBasePath());
define('ROOT_PATH', __DIR__ ); // Percorso assoluto alla root del progetto
define('INCLUDES_PATH', ROOT_PATH . '/inc'); // Alias per ROOT_PATH per compatibilità
define('ASSETS_PATH', normalizePath(BASE_PATH . '/assets'));
define('IMAGES_PATH', normalizePath(ASSETS_PATH . '/img'));
define('JS_PATH', normalizePath(ASSETS_PATH . '/js'));
define('CSS_PATH', normalizePath(ASSETS_PATH . '/css'));

// Funzione helper per generare URL assoluti
function url($path = '') {
    // Unisce BASE_PATH e il path richiesto, rimuovendo eventuali doppie barre
    $full = rtrim(BASE_PATH, '/') . '/' . ltrim($path, '/');
    return preg_replace('#/+#', '/', $full); // garantisce un solo slash
}

// Funzione helper per generare URL delle risorse
function asset($path = '') {
    return normalizePath(ASSETS_PATH . '/' . ltrim($path, '/'));
}

// Funzione helper per generare URL assoluti con dominio
function absoluteUrl($path = '') {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    return $protocol . '://' . $host . url($path);
}

// Funzione per cache busting basato su filemtime
function assetWithVersion($relativePath) {
    // Normalizza il percorso relativo
    $relativePath = ltrim($relativePath, '/');
    
    // Costruisci il percorso completo del file
    $fullPath = ROOT_PATH . '/' . $relativePath;
    
    // Debug in modalità sviluppo
    if (DEVELOPMENT_MODE) {
        error_log("assetWithVersion - relativePath: $relativePath");
        error_log("assetWithVersion - fullPath: $fullPath");
        error_log("assetWithVersion - file_exists: " . (file_exists($fullPath) ? 'yes' : 'no'));
    }
    
    if (file_exists($fullPath)) {
        $version = filemtime($fullPath);
        // Estrai solo la parte dopo 'assets/' per il path finale
        $assetPath = preg_replace('/^assets\//', '', $relativePath);
        return ASSETS_PATH . '/' . $assetPath . '?v=' . $version;
    }
    
    // Fallback se il file non esiste - log dell'errore
    if (DEVELOPMENT_MODE) {
        error_log("assetWithVersion - File not found: $fullPath");
    }
    
    // Fallback: rimuovi 'assets/' dal path e usa ASSETS_PATH
    $assetPath = preg_replace('/^assets\//', '', $relativePath);
    return ASSETS_PATH . '/' . $assetPath;
}

// Funzione sicura per produzione - senza cache busting se ci sono problemi
function assetWithVersionSafe($relativePath) {
    // Se il cache busting è disabilitato o siamo in produzione, usa asset() semplice
    if (DISABLE_CACHE_BUSTING || !DEVELOPMENT_MODE) {
        $result = asset($relativePath);
        if (DEVELOPMENT_MODE) {
            error_log("assetWithVersionSafe (disabled) - input: $relativePath, output: $result");
        }
        return $result;
    }
    
    // In sviluppo, usa la versione con cache busting
    $result = assetWithVersion($relativePath);
    if (DEVELOPMENT_MODE) {
        error_log("assetWithVersionSafe (enabled) - input: $relativePath, output: $result");
    }
    return $result;
} 