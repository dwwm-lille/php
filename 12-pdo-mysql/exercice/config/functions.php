<?php

/**
 * Permet de récupérer les données en POST.
 */
function post($key, $default = null) {
    return sanitize($_POST[$key] ?? $default);
}

/**
 * Permet de nettoyer les données utilisateurs.
 */
function sanitize($value) {
    return trim(htmlspecialchars($value ?? ''));
}

/**
 * Permet de vérifier si le formulaire a été soumis.
 */
function isSubmit() {
    return !empty($_POST);
}
