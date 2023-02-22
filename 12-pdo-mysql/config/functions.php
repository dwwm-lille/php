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
