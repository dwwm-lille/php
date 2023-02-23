<?php

/**
 * Ici, on toutes nos fonctions utiles.
 */

/**
 * Permet de tronquer un texte.
 */
function truncate($text, $limit = 15) {
    if (mb_strlen($text) > $limit) {
        return substr($text, 0, $limit).'...';
    }

    return $text;
}

/**
 * Permet de formatter une date au format US.
 */
function format_date($date, $format = 'd/m/Y') {
    return date($format, strtotime($date));
}

/**
 * Permet de formatter une durée brut en minutes. 
 */
function format_duration($duration) {
    $hours = floor($duration / 60);
    $minutes = str_pad($duration % 60, 2, 0, STR_PAD_LEFT); // 2h1 => 2h01

    return $hours.'h'.$minutes;
}

/**
 * Permet d'afficher rapidement la 404
 */
function show404() {
    http_response_code(404);
    require __DIR__.'/../404.php';
    die();
}

/**
 * Permet de nettoyer les données utilisateurs.
 */
function sanitize($value) {
    // ' <script>toto</script> ' => '&lt;script&gt;toto&lt;/script&gt;'
    return trim(htmlspecialchars($value ?? ''));
}
