<?php
/**
 * Configurazione globale dell'applicazione
 */

// Configurazione ambiente
define('INCLUDE_SERVER_NAME_IN_PATH', false); // Impostare a true per includere il nome del server nel path

// Funzione per determinare il basepath in base all'ambiente
function getBasePath() {
    $serverName = $_SERVER['SERVER_NAME'];
    $basePath = '';
    
    // Aggiungi il nome del server al path se richiesto
    if (INCLUDE_SERVER_NAME_IN_PATH) {
        $basePath .= '/' . $serverName;
    }
    
    // Aggiungi il path base per l'ambiente
    if ($serverName === 'localhost' || strpos($serverName, '.dev') !== false) {
        $basePath .= '/IBS';
    }
    
    return $basePath ?: '/';
}

// Costanti globali
define('BASE_PATH', getBasePath());
define('ROOT_PATH', __DIR__ ); // Percorso assoluto alla root del progetto
define('INCLUDES_PATH', ROOT_PATH . '/inc'); // Alias per ROOT_PATH per compatibilità
define('ASSETS_PATH', BASE_PATH . '/assets'); // Path relativo alla root per gli assets
define('IMAGES_PATH', ASSETS_PATH . '/img');
define('JS_PATH', ASSETS_PATH . '/js');
define('CSS_PATH', ASSETS_PATH . '/css');

// Funzione helper per generare URL assoluti
function url($path = '') {
    return BASE_PATH . '/' . ltrim($path, '/');
}

// Funzione helper per generare URL delle risorse
function asset($path = '') {
    return ASSETS_PATH . '/' . ltrim($path, '/');
}

// Funzione helper per generare URL assoluti con dominio
function absoluteUrl($path = '') {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    return $protocol . '://' . $host . url($path);
} 